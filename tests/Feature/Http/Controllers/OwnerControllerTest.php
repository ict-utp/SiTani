<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Owner;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\OwnerController
 */
class OwnerControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $owners = Owner::factory()->count(3)->create();

        $response = $this->get(route('owner.index'));

        $response->assertOk();
        $response->assertViewIs('owner.index');
        $response->assertViewHas('owners');
    }


    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('owner.create'));

        $response->assertOk();
        $response->assertViewIs('owner.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\OwnerController::class,
            'store',
            \App\Http\Requests\OwnerStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects()
    {
        $name = $this->faker->word;
        $phone = $this->faker->word;
        $address = $this->faker->word;

        $response = $this->post(route('owner.store'), [
            'name' => $name,
            'phone' => $phone,
            'address' => $address,
        ]);

        $owners = Owner::query()
            ->where('name', $name)
            ->where('phone', $phone)
            ->where('address', $address)
            ->get();
        $this->assertCount(1, $owners);
        $owner = $owners->first();

        $response->assertRedirect(route('owner.index'));
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\OwnerController::class,
            'update',
            \App\Http\Requests\OwnerUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects()
    {
        $owner = Owner::factory()->create();
        $name = $this->faker->word;
        $phone = $this->faker->word;
        $address = $this->faker->word;

        $response = $this->put(route('owner.update', $owner), [
            'name' => $name,
            'phone' => $phone,
            'address' => $address,
        ]);

        $owner->refresh();

        $response->assertRedirect(route('owner.index'));

        $this->assertEquals($name, $owner->name);
        $this->assertEquals($phone, $owner->phone);
        $this->assertEquals($address, $owner->address);
    }
}

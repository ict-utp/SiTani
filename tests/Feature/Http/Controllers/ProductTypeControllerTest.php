<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Name;
use App\Models\ProductType;
use App\Models\ProductTypes;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\ProductTypeController
 */
class ProductTypeControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $productTypes = ProductType::factory()->count(3)->create();

        $response = $this->get(route('product-type.index'));

        $response->assertOk();
        $response->assertViewIs('product-types.index');
        $response->assertViewHas('product-types');
    }


    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('product-type.create'));

        $response->assertOk();
        $response->assertViewIs('product-types.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\ProductTypeController::class,
            'store',
            \App\Http\Requests\ProductTypeStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects()
    {
        $name = $this->faker->name;

        $response = $this->post(route('product-type.store'), [
            'name' => $name,
        ]);

        $productTypes = ProductTypes::query()
            ->where('name', $name)
            ->get();
        $this->assertCount(1, $productTypes);
        $productType = $productTypes->first();

        $response->assertRedirect(route('product-types.index'));
    }


    /**
     * @test
     */
    public function edit_displays_view()
    {
        $productType = ProductType::factory()->create();

        $response = $this->get(route('product-type.edit', $productType));

        $response->assertOk();
        $response->assertViewIs('product-types.edit');
        $response->assertViewHas('product-types');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\ProductTypeController::class,
            'update',
            \App\Http\Requests\ProductTypeUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects()
    {
        $productType = ProductType::factory()->create();
        $name = $this->faker->name;

        $response = $this->put(route('product-type.update', $productType), [
            'name' => $name,
        ]);

        $productType->refresh();

        $response->assertRedirect(route('product-types.index'));

        $this->assertEquals($name, $productType->name);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects()
    {
        $productType = ProductType::factory()->create();
        $productType = Name::factory()->create();

        $response = $this->delete(route('product-type.destroy', $productType));

        $response->assertRedirect(route('product-types.index'));

        $this->assertModelMissing($productType);
    }
}

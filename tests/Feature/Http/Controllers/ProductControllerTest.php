<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Product;
use App\Models\Products;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\ProductController
 */
class ProductControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $products = Product::factory()->count(3)->create();

        $response = $this->get(route('product.index'));

        $response->assertOk();
        $response->assertViewIs('products.index');
        $response->assertViewHas('products');
    }


    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('product.create'));

        $response->assertOk();
        $response->assertViewIs('products.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\ProductController::class,
            'store',
            \App\Http\Requests\ProductStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects()
    {
        $title = $this->faker->sentence(4);
        $quantity = $this->faker->word;
        $period = $this->faker->word;
        $address = $this->faker->text;
        $description = $this->faker->text;

        $response = $this->post(route('product.store'), [
            'title' => $title,
            'quantity' => $quantity,
            'period' => $period,
            'address' => $address,
            'description' => $description,
        ]);

        $products = Products::query()
            ->where('title', $title)
            ->where('quantity', $quantity)
            ->where('period', $period)
            ->where('address', $address)
            ->where('description', $description)
            ->get();
        $this->assertCount(1, $products);
        $product = $products->first();

        $response->assertRedirect(route('products.index'));
    }


    /**
     * @test
     */
    public function edit_displays_view()
    {
        $product = Product::factory()->create();

        $response = $this->get(route('product.edit', $product));

        $response->assertOk();
        $response->assertViewIs('products.edit');
        $response->assertViewHas('products');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\ProductController::class,
            'update',
            \App\Http\Requests\ProductUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects()
    {
        $product = Product::factory()->create();
        $title = $this->faker->sentence(4);
        $quantity = $this->faker->word;
        $period = $this->faker->word;
        $address = $this->faker->text;
        $description = $this->faker->text;

        $response = $this->put(route('product.update', $product), [
            'title' => $title,
            'quantity' => $quantity,
            'period' => $period,
            'address' => $address,
            'description' => $description,
        ]);

        $product->refresh();

        $response->assertRedirect(route('product-categories.index'));

        $this->assertEquals($title, $product->title);
        $this->assertEquals($quantity, $product->quantity);
        $this->assertEquals($period, $product->period);
        $this->assertEquals($address, $product->address);
        $this->assertEquals($description, $product->description);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects()
    {
        $product = Product::factory()->create();
        $product = Products::factory()->create();

        $response = $this->delete(route('product.destroy', $product));

        $response->assertRedirect(route('products.index'));

        $this->assertModelMissing($product);
    }
}

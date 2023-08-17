<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Name;
use App\Models\ProductCategories;
use App\Models\ProductCategory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\ProductCategoriesController
 */
class ProductCategoriesControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $productCategories = ProductCategories::factory()->count(3)->create();

        $response = $this->get(route('product-category.index'));

        $response->assertOk();
        $response->assertViewIs('product-categories.index');
        $response->assertViewHas('product-categories');
    }


    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('product-category.create'));

        $response->assertOk();
        $response->assertViewIs('product-categories.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\ProductCategoriesController::class,
            'store',
            \App\Http\Requests\ProductCategoriesStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects()
    {
        $name = $this->faker->name;

        $response = $this->post(route('product-category.store'), [
            'name' => $name,
        ]);

        $productCategories = ProductCategories::query()
            ->where('name', $name)
            ->get();
        $this->assertCount(1, $productCategories);
        $productCategory = $productCategories->first();

        $response->assertRedirect(route('product-categories.index'));
    }


    /**
     * @test
     */
    public function edit_displays_view()
    {
        $productCategory = ProductCategories::factory()->create();

        $response = $this->get(route('product-category.edit', $productCategory));

        $response->assertOk();
        $response->assertViewIs('product-categories.edit');
        $response->assertViewHas('product-categories');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\ProductCategoriesController::class,
            'update',
            \App\Http\Requests\ProductCategoriesUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects()
    {
        $productCategory = ProductCategories::factory()->create();
        $name = $this->faker->name;

        $response = $this->put(route('product-category.update', $productCategory), [
            'name' => $name,
        ]);

        $productCategory->refresh();

        $response->assertRedirect(route('product-categories.index'));

        $this->assertEquals($name, $productCategory->name);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects()
    {
        $productCategory = ProductCategories::factory()->create();
        $productCategory = Name::factory()->create();

        $response = $this->delete(route('product-category.destroy', $productCategory));

        $response->assertRedirect(route('product-categories.index'));

        $this->assertModelMissing($productCategory);
    }
}

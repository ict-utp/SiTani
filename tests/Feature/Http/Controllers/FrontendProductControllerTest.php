<?php

namespace Tests\Feature\Http\Controllers;

use Tests\TestCase;

/**
 * @see \App\Http\Controllers\FrontendProductController
 */
class FrontendProductControllerTest extends TestCase
{
    /**
     * @test
     */
    public function index_displays_view()
    {
        $response = $this->get(route('frontend-product.index'));

        $response->assertOk();
        $response->assertViewIs('frontend-product.index');
    }
}

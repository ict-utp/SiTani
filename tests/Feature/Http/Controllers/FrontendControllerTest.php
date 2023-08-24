<?php

namespace Tests\Feature\Http\Controllers;

use Tests\TestCase;

/**
 * @see \App\Http\Controllers\FrontendController
 */
class FrontendControllerTest extends TestCase
{
    /**
     * @test
     */
    public function index_displays_view()
    {
        $response = $this->get(route('frontend.index'));

        $response->assertOk();
        $response->assertViewIs('frontend.index');
    }
}

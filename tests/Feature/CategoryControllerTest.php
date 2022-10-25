<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Category;

class CategoryControllerTest extends TestCase
{
    private $category;

    /**
     * Set category model as a dependency injection
     *
     * @return void
     */
    public function setUp(): void 
    {
        parent::setUp();

        $this->category = new Category;
        $this->authUser();
    }

    /**
     * Test if we could render category page properly.
     *
     * @return void
     * @test
     */
    public function if_we_could_render_all_categories_page()
    {
        $response = $this->get('/category');

        $response->assertViewIs('Category.all_categories');
        $response->assertStatus(200);
    }
}

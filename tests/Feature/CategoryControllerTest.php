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
    
    /**
     * Test if we could get categories from db and render it to the user
     *
     * @test
     * @return void
     */
    public function if_we_could_see_categories_data_on_its_main_page()
    {

        $categories =$this->category::factory()->count(5)->create();
        
        $view = $this->view('Category/all_categories', ['categories'=>$categories]);

        $view->assertSee($categories[1]->name);

    }

    /**
     * Test if we could add new category
     *
     * @return void
     */
    public function if_we_could_add_new_category()
    {

    }
}

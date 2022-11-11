<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Category;
use App\Models\Topic;

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
     * @test
     * @return void
     */
    public function if_we_could_add_new_category()
    {
        $new_category = $this->category::factory()->create();
        $new_category->save();
        
        $db_category = $this->category::find($new_category->id);
        // dd($db_category->name);

        $this->assertEquals($new_category->name, $db_category->name);
    }


    /**
     * Test if user could see topis belongs to a category
     * 
     * @test
     * @return void
     */
    public function if_we_could_render_topics_belongs_to_a_category()
    {
        $new_category = $this->category::factory()
            ->has(Topic::factory()->count(3))
            ->create();

        $view = $this->view('Category/category', ['category'=>$new_category]);

        $view->assertSee($new_category->topics[1]->name);
    }

    /**
     * Test if we can edit a specified category
     * 
     * @test
     * @return void
     */
    public function if_we_could_edit_a_category()
    {
        
        $new_category = $this->category::factory()->create();
        $new_category->save();

        $category = Category::find($new_category->id);

        $category->name ='updated_name';

        $view = $this->view('Category/category', ['category'=>$category]);

        $view->assertSee($category->name);

    }
}

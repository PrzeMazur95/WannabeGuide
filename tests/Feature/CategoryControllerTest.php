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
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}

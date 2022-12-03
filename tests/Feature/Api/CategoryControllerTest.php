<?php

namespace Tests\Feature\api;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class CategoryControllerTest extends TestCase
{
    /**
     * Test if we could add new category
     *
     * @return void
     * @test
     */
    public function if_we_could_add_new_category()
    {
        $response = $this->postJson(
            'api/category', [
                'name'=>'test',
                'user_id'=>User::factory()->create()->id
            ]
        );

        $response->assertCreated();
    }

    /**
     * Test if we could get all categories
     *
     * @return void
     * @test
     */
    public function if_we_could_return_all_categories()
    {
        $response = $this->getJson('api/categories');

        $response->assertStatus(200)
            ->assertJsonStructure( [ 
                0 => [
                "id",
                "name",
                "user_id",
                "created_at",
                "updated_at"
                ]
                ]
            );
    }
}

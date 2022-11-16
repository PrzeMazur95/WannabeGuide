<?php

namespace Tests\Feature\api;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class CategoryControllerTest extends TestCase
{
    /**
     * Test if we could get all categories
     *
     * @return void
     * @test
     */
    public function if_we_could_return_all_categories()
    {
        //to be contiuned after adding route to create a category via API
        $response = $this->getJson('api/category');

        $response->assertStatus(200)
            ->hasAll(['id','name','user_id','created_at','updated_ut']);
    }
}

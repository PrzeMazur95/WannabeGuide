<?php

declare(strict_types=1);

namespace Tests\Feature\Api;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Topic;

class TopicControllerTest extends TestCase
{
    /**
     * If api returns all topics
     *
     * @return void
     * @test
     */
    public function if_we_could_see_all_topics(): void
    {
        $topic = Topic::factory()->create();

        $response = $this->actingAs($this->authUser())->getJson('api/topics');

        $response->assertStatus(200);
        $this->assertDatabaseHas('topics', [
            'name'=>$topic->name
        ]);
        $response->assertJsonStructure([
            0 => [
                "id",
                "name",
                "category_id",
                "description",
                "user_id",
            ]
        ]);
    }
}

<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Topic;

class TopicControllerTest extends TestCase
{
    private $topic;

    public function setUp(): void 
    {
        parent::setUp();

        $this->topic = new Topic;
        $this->authUser();
    }

    /**
     * Test if we could render topics page properly
     *
     * @return void
     * @test
     */
    public function if_we_could_render_topics_page_properly()
    {
        // $topic = $this->topic->factory()->create();
        // $AllTopics = $this->topic::all();
        // $view = $this->view('Topic/AllTopics', ['topics' => $AllTopics]);
        // $view->assertSee('sampleTopic');

        $response = $this->get('/topics');

        $response->assertStatus(200);


    }

    /**
     * Test if we could render db data on topics page properly
     *
     * @return void
     * @test
     */
    public function if_we_could_render_db_data_on_task_page()
    {

    }
}

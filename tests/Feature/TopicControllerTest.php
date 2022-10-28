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
     * Test if we could render db data on topics page properly
     *
     * @return void
     * @test
     */
    public function if_we_could_render_db_data_on_task_page()
    {
        $topic = $this->topic->factory()->create();
        $AllTopics = $this->topic::all();

        $view = $this->view('Topic/all_topics', ['topics' => $AllTopics]);

        $view->assertSee($topic->name);
    }

    /**
     * Test if we could add new topic
     *
     * @return void
     * @test
     */
    public function if_we_could_add_new_topic()
    {
        $topic = $this->topic->factory()->create();
        $topic->save();

        $findTopic = Topic::find($topic->id);

        $this->assertEquals($topic->name, $findTopic->name);
    }
}

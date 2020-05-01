<?php

namespace Tests\Feature;

use App\Faculty;
use App\Project;
use App\User;
use Tests\TestCase;
use WithoutMiddleware;
use Illuminate\Foundation\Testing\RefreshDatabase;
//use Illuminate\Foundation\Testing\WithoutMiddleware;

class ExampleTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $this->assertTrue(true);
    }


    public function test_new_faculty_being_added(){

        $this->assertDatabaseHas('users', [
            'email' => 'david.ebo@gmail.com'
        ]);

    }

    /**
     * @test
     */
    public function random_test(){
        $this->withoutExceptionHandling();

        $response = $this->post('/createMeeting',[
            'mt_id' => 1,
            'mt_date' => now(),
            'mt_objective' => 'work dey',
            'mt_challenges' => 'work really dey',
            'mt_sumofprogress' => 'we go do am',
            'mt_objnxtperiod' => 'p3p33p3',
            'mt_nextDate' => now(),
        ]);
        $response->assertOk();
    }

}


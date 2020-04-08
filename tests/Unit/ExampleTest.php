<?php

namespace Tests\Feature;

use App\Project;
use App\User;
use Tests\TestCase;
use WithoutMiddleware;
use Illuminate\Foundation\Testing\RefreshDatabase;
//use Illuminate\Foundation\Testing\WithoutMiddleware;

class ExampleTest extends TestCase

{
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
            'email' => 'sampah@gmail.com'
        ]);

    }


}


<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ExampleTest extends TestCase
{
    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function testBasicExample()
    {
        $this->visit('/landing')
             ->see('Welcome!');
    }

    public function copied_from_laracast_19()
    {
        $response = $this->call('GET', 'landing');

        $this->assertResponseOk();
    }

}

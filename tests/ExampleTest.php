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
//    After I added the include for analyticstracking.php: 500, and it fails to find that in the views directory
//    public function test_landing()
//    {
//        $this->visit('/landing')
//             ->see('Welcome!');
//    }


//    After I added the include for analyticstracking.php, this gets a 500
//    public function test_landing_GET()
//    {
//        $response = $this->call('GET', 'landing');
//
//        $this->assertResponseOk();
//    }

//I tried giving the full path so it would work from both places, but no luck
//http://superuser.com/questions/153165/what-does-represent-while-giving-path
// And don't want to monkey with the include path in autoload.php if I don't have to:
//http://stackoverflow.com/questions/13129993/phpunit-test-suite-include-path

    public function test_register()
    {
        $this->visit('/register')
             ->see('request account');
    }

}

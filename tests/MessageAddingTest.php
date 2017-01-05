<?php

use Laravel\Lumen\Testing\DatabaseTransactions;

class MessageAddingTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testReturnMessage()
    {
        $response = $this->call('GET', '/message/add');

        /*
        $this->assertEquals(
            $this->app->version(), $this->response->getContent()
        );
        */

        $this->assertEquals(200, $response->status());
    }
}

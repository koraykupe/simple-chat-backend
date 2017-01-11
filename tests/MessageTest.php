<?php

use Laravel\Lumen\Testing\DatabaseTransactions;

/**
 * Class MessageTest
 */
class MessageTest extends TestCase
{
    /**
     * Test Response Code of GET user/messages service
     */
    public function testResponseCodeWhenGettingMessages()
    {
        $response = $this->call('GET', 'user/messages?userId=3');

        $this->assertEquals(200, $response->status());
    }

    /**
     * Test Data Structure of POST user/messages service
     */
    public function testGetMessagesOfAUser()
    {
        $this->get('/user/messages?userId=3')
            ->seeJsonStructure([
                '*' => [
                    'id',
                    'user_id',
                    'message',
                    'created_at',
                    'updated_at'
                ]
            ]);
    }

    /**
     *
     */
    public function testReturnMessage()
    {
        $this->withoutMiddleware();

        $this->json('POST', '/user/messages', ['userId' => 2, 'message' => 'Demo message', 'targetUserId' => 3])
            ->seeJson([
                'user_id' => 2,
            ]);
    }

}

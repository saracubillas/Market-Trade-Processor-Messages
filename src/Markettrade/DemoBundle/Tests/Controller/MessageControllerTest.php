<?php

namespace Markettrade\DemoBundle\Tests\Controller;

use Liip\FunctionalTestBundle\Test\WebTestCase;
use Markettrade\DemoBundle\Tests\Fixtures\Entity\LoadMessageData;

class MessageControllerTest extends WebTestCase {
    protected $client;
    protected $auth;

    public function setUp()
    {
        $this->auth = array(
            'PHP_AUTH_USER' => 'user',
            'PHP_AUTH_PW'   => 'userpass',
        );
        $this->client = static::createClient(array(), $this->auth);
    }
    public function testJsonGetMessageAction()
    {
//        $fixtures = ['Markettrade\DemoBundle\Tests\Fixtures\Entity\LoadMessageData'];
//        $this->loadFixtures($fixtures);
//        $messages = LoadMessageData::$messages;
//        $message = array_pop($messages);
//        $route =  $this->getUrl('api_1_get_message', array('id' => $message->getId(), '_format' => 'json'));
//        $this->client->request('GET', $route, array('ACCEPT' => 'application/json'));
//        $response = $this->client->getResponse();
//        $this->assertJsonResponse($response, 200);
//        $content = $response->getContent();
//        $decoded = json_decode($content, true);
//        $this->assertTrue(isset($decoded['id']));
    }

}
 
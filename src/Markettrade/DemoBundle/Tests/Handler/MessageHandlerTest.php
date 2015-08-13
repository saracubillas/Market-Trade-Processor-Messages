<?php

namespace Markettrade\DemoBundle\Tests\Handler;

use Markettrade\DemoBundle\Handler\MessageHandler;
use PHPUnit_Framework_TestCase;

class MessageHandlerTest extends PHPUnit_Framework_TestCase
{
    
    const PAGE_CLASS = 'Markettrade\DemoBundle\Tests\Handler\DummyMessage';
    /** @var MessageHandler */
    protected $MessageHandler;
    /** @var \PHPUnit_Framework_MockObject_MockObject */
    protected $om;
    /** @var \PHPUnit_Framework_MockObject_MockObject */
    protected $repository;
    /** @var \PHPUnit_Framework_MockObject_MockObject */
    protected $formFactory;

    public function setUp()
    {
        if (!interface_exists('Doctrine\Common\Persistence\ObjectManager')) {
            $this->markTestSkipped('Doctrine Common has to be installed for this test to run.');
        }

        $class = $this->getMock('Doctrine\Common\Persistence\Mapping\ClassMetadata');
        $this->om = $this->getMock('Doctrine\Common\Persistence\ObjectManager');
        $this->repository = $this->getMock('Doctrine\Common\Persistence\ObjectRepository');
        $this->formFactory = $this->getMock('Symfony\Component\Form\FormFactoryInterface');
        $this->om->expects($this->any())
            ->method('getRepository')
            ->with($this->equalTo(static::PAGE_CLASS))
            ->will($this->returnValue($this->repository));
        $this->om->expects($this->any())
            ->method('getClassMetadata')
            ->with($this->equalTo(static::PAGE_CLASS))
            ->will($this->returnValue($class));
        $class->expects($this->any())
            ->method('getName')
            ->will($this->returnValue(static::PAGE_CLASS));
    }

    public function testGet()
    {
        $id = 1;
        $message = $this->getMessage();
        $this->repository->expects($this->once())->method('find')
            ->with($this->equalTo($id))
            ->will($this->returnValue($message));
        $this->MessageHandler = $this->createMessageHandler($this->om, static::PAGE_CLASS, $this->formFactory);
        $this->MessageHandler->get($id);
    }

    protected function createMessageHandler($objectManager, $messageClass, $formFactory)
    {
        return new MessageHandler($objectManager, $messageClass, $formFactory);
    }

    protected function getMessage()
    {
        $messageClass = static::PAGE_CLASS;
        return new $messageClass();
    }

    protected function getMessages($maxMessages = 5)
    {
        $messages = array();
        for ($i = 0; $i < $maxMessages; $i++) {
            $messages[] = $this->getMessage();
        }
        return $messages;
    }
}

class DummyMessage extends \Markettrade\DemoBundle\Entity\Message
{
}

 
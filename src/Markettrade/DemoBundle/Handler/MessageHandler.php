<?php

namespace Markettrade\DemoBundle\Handler;

use Doctrine\Common\Persistence\ObjectManager;
use Markettrade\DemoBundle\Model\MessageHandler as MessageHandlerInterface;

class MessageHandler implements MessageHandlerInterface
{
    public function __construct(ObjectManager $om, $entityClass)
    {
        $this->om = $om;
        $this->entityClass = $entityClass;
        $this->repository = $this->om->getRepository($this->entityClass);
    }

    public function get($id)
    {
        return $this->repository->find($id);
    }
} 
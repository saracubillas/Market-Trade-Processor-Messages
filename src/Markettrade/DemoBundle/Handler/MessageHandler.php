<?php

namespace Markettrade\DemoBundle\Handler;

use Doctrine\Common\Persistence\ObjectManager;
use Markettrade\DemoBundle\Exception\InvalidFormException;
use Markettrade\DemoBundle\Form\MessageType;
use Markettrade\DemoBundle\Model\Message;
use Markettrade\DemoBundle\Model\MessageHandler as MessageHandlerInterface;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class MessageHandler
 * @package Markettrade\DemoBundle\Handler
 */
class MessageHandler implements MessageHandlerInterface
{
    public function __construct(ObjectManager $om, $entityClass, $formFactory)
    {
        $this->om = $om;
        $this->entityClass = $entityClass;
        $this->repository = $this->om->getRepository($this->entityClass);
        $this->formFactory = $formFactory;
    }

    public function get($id)
    {
        return $this->repository->find($id);
    }

    public function post(Request $request)
    {
        $message = $this->createMessage();

        return $this->processForm($message, $request);
    }

    private function createMessage()
    {
        return new $this->entityClass();
    }

    private function processForm(Message $message, Request $request)
    {
        $form = $this->formFactory->createBuilder(new MessageType(), $message)->getForm();
        $form->bind($request->request->all());

        if ($form->isValid()) {
            $message = $form->getData();
            $this->om->persist($message);
            $this->om->flush($message);

            return $message;
        }

        throw new InvalidFormException('Invalid submitted data', $form);
    }
    
    /**
     * Get a list of Messages.
     *
     * @param int $limit  the limit of the result
     * @param int $offset starting from the offset
     *
     * @return array
     */
    public function all($limit = 5, $offset = 0)
    {
        return $this->repository->findBy([], null, $limit, $offset);
    }
    
} 
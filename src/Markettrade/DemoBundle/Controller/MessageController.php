<?php


namespace Markettrade\DemoBundle\Controller;


use FOS\RestBundle\Controller\FOSRestController;

class MessageController extends FOSRestController
{
    public function getMessageAction()
    {
        return $this->getDoctrine()->getRepository('MarkettradeDemoBundle:User')->findAll();
    }
} 
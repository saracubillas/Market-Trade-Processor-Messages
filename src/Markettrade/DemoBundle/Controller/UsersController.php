<?php


namespace Markettrade\DemoBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use FOS\RestBundle\Controller\Annotations\View;

class UsersController extends Controller
{
    /**
     * @return array
     * @View()
     */
    public function getUserAction()
    {
        $users = $this->getDoctrine()->getRepository('MarkettradeDemoBundle:User')->findAll();

        return ['users' => $users];
    }
} 
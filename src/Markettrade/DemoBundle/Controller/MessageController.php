<?php

namespace Markettrade\DemoBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use FOS\RestBundle\Controller\Annotations;

class MessageController extends FOSRestController
{
    /**
     * Get single message,
     *
     * @ApiDoc(
     *   resource = true,
     *   description = "Gets a message for a given id",
     *   output = "Markettrade\DemoBundle\Entity\message",
     *   statusCodes = {
     *     200 = "Returned when successful",
     *     404 = "Returned when the message is not found"
     *   }
     * )
     *
     * @Annotations\View(templateVar="message")
     *
     * @param Request $request the request object
     * @param int     $id      the message id
     *
     * @return array
     *
     * @throws NotFoundHttpException when message not exist
     */
    public function getMessageAction($id)
    {
        $message = $this->container
            ->get('markettrade_demo.message.handler')
            ->get($id);

        return $message;
    }
}

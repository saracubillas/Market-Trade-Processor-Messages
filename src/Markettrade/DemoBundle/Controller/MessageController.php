<?php

namespace Markettrade\DemoBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\View\View;
use Markettrade\DemoBundle\Form\MessageType;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use Symfony\Component\Form\FormTypeInterface;
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

    /**
     * Create a Message from the submitted data.
     *
     * @ApiDoc(
     *   resource = true,
     *   description = "Creates a new message from the submitted data.",
     *   input = "MarketTrade\DemoBundle\Form\MessageType",
     *   statusCodes = {
     *     200 = "Returned when successful",
     *     400 = "Returned when the form has errors"
     *   }
     * )
     *
     * @Annotations\View(
     *  template = "MarkettradeDamoBundle:Message:newMessage.html.twig",
     *  statusCode = 400,
     *  templateVar = "form"
     * )
     *
     * @param Request $request the request object
     *
     * @return FormTypeInterface|View
     */
    public function postMessageAction(Request $request)
    {
        try {

            $newMessage = $this->container->get('markettrade_demo.message.handler')->post($request);

var_dump($newMessage);
            $routeOptions = array(
                'id' => $newMessage->getId(),
                '_format' => $request->get('_format')
            );

            return $this->routeRedirectView('api_1_get_message', $routeOptions, Codes::HTTP_CREATED);
        } catch (\Exception $exception) {

            printf($exception->getMessage());
//            return $exception->getForm();
        }
    }

    /**
     * Presents the form to use to create a new page.
     *
     * @ApiDoc(
     *   resource = true,
     *   statusCodes = {
     *     200 = "Returned when successful"
     *   }
     * )
     *
     * @Annotations\View()
     *
     * @return FormTypeInterface
     */
    public function newMessageAction()
    {
        return $this->createForm(new MessageType());
    }
}

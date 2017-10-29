<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class EmojiAPIController extends Controller
{
    /**
     * @Route("/api/emojis", name="emojis")
     * @Method({"GET"})
     */
    public function indexAction()
    {
        $emojis = $this->getDoctrine()->getRepository('AppBundle:Translation')->findAll();
        $data = $this->get('jms_serializer')->serialize($emojis, 'json');
        $response = new Response($data);
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }

    /**
     * @Route("/api/emojis/{language}", name="emojis_list_translate")
     * @Method({"GET"})
     */
    public function emojisByLanguageAction(Request $request, $language = null)
    {
        $emojis = $this->getDoctrine()->getRepository('AppBundle:Translation')->findAllByLanguage($language);
        $data = $this->get('jms_serializer')->serialize($emojis, 'json');
        $response = new Response($data);
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }



}

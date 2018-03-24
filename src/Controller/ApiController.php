<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Контроллер API
 *
 * @Route("/api")
 *
 */
class ApiController extends AbstractController
{
    /**
     * @Route("/get-cars", name="api_get_cars")
     * @Method("GET")
     */
    public function getCars()
    {
        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery('SELECT c FROM App:Car c');
        $cars = $query->getArrayResult();
        return new JsonResponse($cars);
    }
}
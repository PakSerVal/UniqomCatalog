<?php

namespace App\Controller;

use App\Entity\Car;
use App\Form\CarType;
use App\Repository\CarRepository;
use Knp\Component\Pager\PaginatorInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CatalogController extends AbstractController
{

    /**
     * @Route("/", defaults={"page": "1"}, name="catalog_index")
     * @Route("/page/{page}", name="catalog_page")
     * @Method("GET")
     */
    public function index(int $page, CarRepository $carRepository, PaginatorInterface $paginator): Response
    {
        $cars = $carRepository->findAll();
        $result = $paginator->paginate(
            $cars,
            $page,
            Car::NUM_ITEMS
        );
        return $this->render('catalog/index.html.twig', [
            'cars' => $result
        ]);
    }

    /**
     * @Route("/edit/{carId}", name="edit_car")
     */
    public function edit(int $carId, CarRepository $carRepository, Request $request)
    {
        $car = $carRepository->find($carId);
        $form = $this->createForm(CarType::class, $car);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $car = $form->getData();
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($car);
            $entityManager->flush();
            return $this->redirectToRoute('catalog_index');
        }

        return $this->render('catalog/edit.html.twig', [
            'form' => $form->createView(),
            'car'  => $car
        ]);
    }

    /**
     * @Route("/delete/{carId}", name="delete_car")
     * @Method("GET")
     */
    public function delete(int $carId, CarRepository $carRepository)
    {
        $car = $carRepository->find($carId);
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->remove($car);
        $entityManager->flush();
        return $this->redirectToRoute('catalog_index');
    }

    /**
     * @Route("/add", name="add_car")
     */
    public function add(Request $request)
    {
        $form = $this->createForm(CarType::class);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $car = $form->getData();
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($car);
            $entityManager->flush();
            return $this->redirectToRoute('catalog_index');
        }

        return $this->render('catalog/add.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
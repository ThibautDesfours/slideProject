<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Picture;

class PictureController extends AbstractController
{
    /**
     * @Route("/index", name="index")
     */
    public function index()
    {
        return $this->render('base.html.twig', [
            'controller_name' => 'PictureController',
        ]);
    }

    /**
    * @Route("/picturesGalery", name="picturesGalery")
    */
    public function show(EntityManagerInterface $em):Response
    {
        //find all pictures 
        $pictures = $em->getRepository(Picture::class)->findAll();

        return $this->render('picture/picturesGalery.html.twig', [
            'pictures' => $pictures
        ]);
    }
}

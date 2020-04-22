<?php

namespace App\Controller;

use App\Entity\Slide;
use App\Entity\PictureEffect;
use App\Entity\Picture;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class SlideController extends AbstractController
{
    /**
     * @Route("slide/show/{id}", name="slideShow", requirements={"id"="\d+"})
     */
    public function show(int $id, EntityManagerInterface $em):Response
    {
        $slide = $em ->getRepository(Slide::class)->find($id);
        if($slide === null)
            throw new NotFoundHttpException();
        $picture_effects = $em -> getRepository(PictureEffect::class)->findBySlide($slide->getId());
        return $this->render('slide/show.html.twig',[
            'slide' => $slide,
            'picture_effects' => $picture_effects,

        ]);
    }
}

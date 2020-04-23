<?php

namespace App\Controller;

use App\Entity\Slide;
use App\Entity\Picture;
use App\Form\SlideType;
use App\Entity\PictureEffect;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class SlideController extends AbstractController
{
    
    /**
     * @Route("/slide", name="slideHome")
     */
    public function slide(EntityManagerInterface $em)
    {
        $slides = $em ->getRepository(Slide::class)->findAllPictures();
        
        return $this->render('slide/slides.html.twig',[
            'slides' => $slides,

        ]);
    }

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

     /**
     * @Route("slide/new", name="slideNew")
     */
    public function form(Slide $slide = null, Request $request, EntityManagerInterface $manager)
    {
        if(!$slide){
            $slide = new Slide();
        }

        $form = $this->createForm(SlideType::class, $slide);
        $form ->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            if(!$slide->getId()){
                $slide->setCreatedAt(new \Datetime());
            }
            $manager->persist($slide);
            $manager->flush();

            return $this->redirectToRoute('slideAdd',['id'=>$slide->getId()]);
        }

        return $this->render('slide/modalCreation.html.twig',[
            'formSlide' => $form->createView()
        ]);
    }

    
    /**
     * @Route("slide/add/{id}", name="slideAdd", requirements={"id"="\d+"})
     */
    public function AddPcitures(int $id, EntityManagerInterface $em):Response
    {
        $slide = $em ->getRepository(Slide::class)->find($id);
        if($slide === null)
            throw new NotFoundHttpException();

        return $this->render('slide/add.html.twig',[
            'slide' => $slide,

        ]);
    }
}

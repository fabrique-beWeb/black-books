<?php

namespace LibraryBundle\Controller;

use LibraryBundle\Entity\Book;
use LibraryBundle\Entity\Etat;
use LibraryBundle\Entity\Exemplaire;
use LibraryBundle\Entity\Status;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

/**
 * Description of AdminController
 *
 * @author loic
 * @Route("/administration")
 */
class AdminController extends Controller{
    //put your code here
    /**
     * @Route("/")
     * @Method({"GET"})
     */
    public function getView() {
        return $this->render("administration.twig");
    }

    
    /**
     * @Route("/books/{id}/copy")
     * @Method({"POST"})
     */
    public function addCopy(Request $r,$id){
        $copy = new Exemplaire();
        $copy->setBook($this->getDoctrine()->getRepository(Book::class)->find($id));
        $copy->setStatus($this->getDoctrine()->getRepository(Status::class)->find($r->get("status")));
        $copy->setEtat($this->getDoctrine()->getRepository(Etat::class)->find($r->get("etat")));
        $copy->setPrice($r->get("price"));
        $this->getDoctrine()->getManager()->persist($copy);
        $this->getDoctrine()->getManager()->flush();
        
        return new JsonResponse(["id"=>$copy->getId(),"price"=>$copy->getPrice()]);
    }
    /**
     * @Route("/copies/{id}")
     * @Method({"PUT"})
     * @param Request $r
     */
    public function updateCopy(Request $r,$id){
        $copy = $this->getDoctrine()->getRepository(Exemplaire::class)->find($id);
        if($r->get("etat") != null){
            $etat = $this->getDoctrine()->getRepository(Etat::class)->find($r->get("etat"));
            $copy->setEtat($etat);
        }       
        if($r->get("status") != null){
            $status = $this->getDoctrine()->getRepository(Status::class)->find($r->get("status"));
            $copy->setStatus($status);
        }       
        if($r->get("price") != null){
            $copy->setPrice($r->get("price"));
        } 
        $em = $this->getDoctrine()->getManager();
        $em->merge($copy);
        $em->flush();
        return new JsonResponse($copy);
    }
}

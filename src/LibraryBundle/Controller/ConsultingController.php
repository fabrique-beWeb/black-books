<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace LibraryBundle\Controller;

use LibraryBundle\Entity\Book;
use LibraryBundle\Entity\Etat;
use LibraryBundle\Entity\Exemplaire;
use LibraryBundle\Entity\Status;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

/**
 * Description of ConsultingController
 *
 * @author loic
 * @Route("/consulting")
 * 
 */
class ConsultingController extends Controller {

    /**
     * @Route("/")
     * @Method({"GET"})
     */
    public function getView() {
        return new Response("Consulting view");
    }

    /**
     * @Route("/books")
     * @Method({"GET"})
     */
    public function getBooks() {
        return new JsonResponse(
                $this->getDoctrine()->getRepository(Book::class)->findAll(), 201, array(
            'Access-Control-Allow-Origin' => 'http://www.ah-mazone.sw',
            'Content-Type' => 'text/plain')
        );
//        return new Response("List of All books");
    }

    /**
     * @Route("/books/{id}")
     * @Method({"GET"})
     */
    public function getBook($id) {
        return new JsonResponse(
                $this->getDoctrine()->getRepository(Book::class)->find($id), 201, array(
            'Access-Control-Allow-Origin' => 'http://www.ah-mazone.sw',
            'Content-Type' => 'text/plain')
        );
    }
    /**
     * @Route("/books/{id}/copies")
     * @Method({"GET"})
     * @param type $id
     */
    public function getCopiesByBookId($id){
        $book = $this->getDoctrine()->getRepository(Book::class)->find($id);
        return new JsonResponse(
                $this->getDoctrine()->getRepository(Exemplaire::class)->findByBook($book), 201, array(
            'Access-Control-Allow-Origin' => 'http://www.ah-mazone.sw',
            'Content-Type' => 'text/plain')
        );
    }
    /**
     * @Route("/categories/{id}/books")
     * @Method({"GET"})
     */
    public function getBooksByCategories($id) {

        return new Response("books from category id : " . $id);
    }

    /**
     * @Route("/authors/{id}/books")
     * @Method({"GET"})
     */
    public function getBooksByAuthors($id) {
        return new Response("books from author id : " . $id);
    }

    /**
     * @Route("/books/price/{value}")
     * @Method({"GET"})
     */
    public function getBooksByPrice($value) {
        return new Response("books where price is : " . $value);
    }

    /**
     * @Route("/books/price/max/{value}")
     * @Method({"GET"})
     */
    public function getBooksByPriceMax($value) {
        return new Response("books where max price is : " . $value);
    }

    /**
     * @Route("/books/price/min/{value}")
     * @Method({"GET"})
     */
    public function getBooksByPriceMin($value) {
        return new Response("books where min price is : " . $value);
    }

    /**
     * @Route("/books/price/min/{min}/max/{max}")
     * @Method({"GET"})
     */
    public function getBooksByPriceBetween($min, $max) {
        return new Response("books where price is between : " . $min . " and " . $max);
    }

   

    /**
     * @Route("/copies/status")
     * @Method({"GET"})
     */
    public function getCopiesStatus(){
        return new JsonResponse(
                $this->getDoctrine()->getRepository(Status::class)->findAll(), 201, array(
            'Access-Control-Allow-Origin' => 'http://www.ah-mazone.sw',
            'Content-Type' => 'text/plain')
        );
    }
    /**
     * @Route("/copies/etats")
     * @Method({"GET"})
     */
    public function getCopiesEtats(){
        return new JsonResponse(
                $this->getDoctrine()->getRepository(Etat::class)->findAll(), 201, array(
            'Access-Control-Allow-Origin' => 'http://www.ah-mazone.sw',
            'Content-Type' => 'text/plain')
        );
    }
    
}

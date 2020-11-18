<?php 
namespace App\Controller; 
use Symfony\Component\HttpFoundation\Response ;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController; 
use Symfony\Component\Routing\Annotation\Route; 
 class DefaultController extends AbstractController { 
 
  /** 
  *@Route ("/hello/{name}") 
  */
  
  public function index($name) {
 
  //return new Response ($name); 
  
  return $this->render
  ('default/index.html.twig', [  'name' => $name, ]);
  }  
  
  
  
  
  
  
  /*
  
  public function simple () { 
  return new Response ( 'Simple! Easy! Beautiful!' ); 
  
 }
 */
 
   } 
   

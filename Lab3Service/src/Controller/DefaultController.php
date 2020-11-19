<?php 
namespace App\Controller; 
use App\Services\GreetingGenerator;
use Symfony\Component\HttpFoundation\Response ;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController; 
use Symfony\Component\Routing\Annotation\Route; 
use Psr\Log\LoggerInterface;
 class DefaultController extends AbstractController { 
 
  /** 
  *@Route ("/hello/{name}") 
  */
  
  public function index($name
  ,LoggerInterface $logger,GreetingGenerator $generator
  ) {
 
 $greeting = $generator->getRandomGreeting();
   
  $logger->info("Spune $greeting to $name");
  
  return $this->render
  ('default/index.html.twig', [  'name' => $name, ]);
  }  
  
  
  
  
  
  
  /*
  
  public function simple () { 
  return new Response ( 'Simple! Easy! Beautiful!' ); 
  
 }
 */
 
   } 
   

<?php

namespace App\Controller;
use App\Entity\Forms;
use App\Entity\Task;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Doctrine\ORM\EntityManagerInterface;

class FormsController extends AbstractController
{
    /**
     * @Route("/product", name="create_product")
     */
  
    public function createForms(Request $request):Response
    {
        //  создаёт задачу и задаёт в ней фиктивные данные для этого примера
        $task = new Task();
        $task->setLogin('dima');
        $task->setPassword('dima1234');
        $task->setEmail('d.sterbet@inbox.ru');

        $form = $this->createFormBuilder($task)
            ->add('login', TextType::class)
            ->add('password', TextType::class)
            ->add('email', TextType::class)
            ->add('save', SubmitType::class, array('label' => 'Inregistreaza-ma'))
            ->getForm();
            
             $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
       $entityManager = $this->getDoctrine()->getManager();
        $data = $form->getData();
         

        $forma = new Forms();
        $forma->setLogin($data->getLogin());
        $forma->setPassword($data->getPassword());
        $forma->setEmail($data->getEmail());

      
        $entityManager->persist($forma);

        $entityManager->flush();

        return new Response('Saved new product with id '.$forma->getId());

      
    }
            
            

        return $this->render('default/new.html.twig', array(
            'form' => $form->createView(),
        ));
        
        
    }
}

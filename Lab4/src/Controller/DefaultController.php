<?php
// src/Controller/DefaultController.php
namespace App\Controller;

use App\Entity\Task;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class DefaultController extends AbstractController
{
    public function new(Request $request)
    {
        //  создаёт задачу и задаёт в ней фиктивные данные для этого примера
        $task = new Task();
        $task->setLogin('Write a blog post');
        $task->setPassword('Dimon ii crut');
        $task->setEmail('d.sterbet@inbox.ru');

        $form = $this->createFormBuilder($task)
            ->add('login', TextType::class)
            ->add('password', TextType::class)
            ->add('email', TextType::class)
            ->add('save', SubmitType::class, array('label' => 'Inregistreaza-ma'))
            ->getForm();
            
             $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
        // $form->getData() holds the submitted values
        // но первоначальная переменная `$task` тоже была обновлена
        $data = $form->getData();

        // ... . выполните действия, такие как сохранение задачи в базе данных
        // например, если Task является сущностью Doctrine, сохраните его!
         //$em = $this->getDoctrine()->getManager();
        // $em->persist($task);
         //$em->flush();

       // return $this->redirectToRoute('task_success');
    }
            
            

        return $this->render('default/new.html.twig', array(
            'form' => $form->createView(),
        ));
        
        
    }
}

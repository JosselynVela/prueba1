<?php

namespace App\Controller;

use App\Entity\Task;
use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class TaskController extends AbstractController
{

    public function index()
    {
        $em = $this->getDoctrine()->getManager();
        /*
        $task_repo= $this->getDoctrine()->getRepository(Task::class);
        $tasks =$task_repo->findAll();
        foreach ($tasks as $task){
            echo $task->getUser()->getEmail().': '.$task->getTitle()."<br/>";
        }
        */

        $user_repo= $this->getDoctrine()->getRepository(User::class);
        $users = $user_repo->findAll();

        foreach ($users as $user){
            echo "<h1>{$user->getName()} {$user->getSurname()}</h1>";

            foreach ($user->getTasks() as $task){
                echo $task->getTitle()."<br/>";
            }

        }

        return $this->render('task/register.html.twig', [
            'controller_name' => 'TaskController',
        ]);
    }
}

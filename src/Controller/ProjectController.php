<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;


use Symfony\Component\Validator\Constraints\Date;

use App\Entity\Project;

class ProjectController extends AbstractController
{
    /**
     * @Route("/projects", name="projects")
     */
    public function listProjects()
    {
        //enregistrement en BDD
        // $entityManager = $this->getDoctrine()->getManager();


        // $project = new Project;
        // $project->setName("Projet 2");
        // $project->setUrl("http://local");
        // $project->setUrlGithub("http://local");


        // // tell Doctrine you want to (eventually) save the Project (no queries yet)
        // $entityManager->persist($project);

        // // actually executes the queries (i.e. the INSERT query)
        // $entityManager->flush();


        //affichage des projets
        $ProjectRepo = $this->getDoctrine()->getRepository(Project::class);

        $projects = $ProjectRepo->findAll();

        foreach ($projects as $key => $project) {
            $project->setName(strtoupper($project->getName()));
        }



        return $this->render('project/listProjects.html.twig', [
            "test" => "phrase de test",
            "projets" => $projects
            ]
        );
    }
}

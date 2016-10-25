<?php

namespace ViewBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ViewController extends Controller
{
    /**
     * @Route("/", name="home")
     * @Template("ViewBundle:Default:home.html.twig")
     */
    public function getHome()
    {   
        //On appele l'entity manager de doctrine.
        $em = $this->getDoctrine()->getManager();
        //On va chercher en base de donnée toutes les instances de l'entité Article.
        $article = $em->getRepository("AdminBundle:Article")->findAll();
        //On lie chaque article dans une variable.
        return array("varArticle" => $article);
    }
    /**
     * @Route("/admin", name="admin")
     * @Template("ViewBundle:Default:admin.html.twig")
     */
    public function getArticle()
    {
        //On appele l'entity manager de doctrine.
        $em = $this->getDoctrine()->getManager();
        //On va chercher en base de donnée toutes les instances de l'entité Article.
        $article = $em->getRepository("AdminBundle:Article")->findAll();
        //On lie chaque article dans une variable.
        return array("varArticle" => $article);
    }
    
    /**
     * @Route("/admin/profils",name="adminProfils")
     * @Template("ViewBundle:Default:profils.html.twig")
     */
    public function getProfils()
    {
        //On appele l'entity manager de doctrine.
        $em = $this->getDoctrine()->getManager();
        //On va chercher en base de donnée toutes les instances de l'entité Article.
        $user = $em->getRepository("AdminBundle:User")->findAll();
        //On lie chaque article dans une variable.
        return array("varUser" => $user);
    }
}

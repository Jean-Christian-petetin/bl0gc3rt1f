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
        //On va chercher en base de donnée toutes les instances de l'entité Article qui ont le booleen de la colonne publier a 1.
        $article = $em->getRepository("AdminBundle:Article")->findBy(array('publier' => '1'), array('id'=>'desc'));
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
        $article = $em->getRepository("AdminBundle:Article")->findBy(array(), array('id'=>'desc'));
        //On lie chaque article dans une variable.
        return array("varArticle" => $article);
    }
    
    /**
     * @Route("/admin/publier", name="articlePublier")
     * @Template("ViewBundle:Default:articlePublier.html.twig")
     */
    public function getArticlePublier()
    {
        //On appele l'entity manager de doctrine.
        $em = $this->getDoctrine()->getManager();
        //On va chercher en base de donnée toutes les instances de l'entité Article.
        $article = $em->getRepository("AdminBundle:Article")->findBy(array('publier' => '1'), array('id'=>'desc'));
        //On lie chaque article dans une variable.
        return array("varArticle" => $article);
    }

    /**
     * @Route("/admin/nonPublier", name="articleNonPublier")
     * @Template("ViewBundle:Default:articleNonPublier.html.twig")
     */
    public function getArticleNonPublier()
    {
        //On appele l'entity manager de doctrine.
        $em = $this->getDoctrine()->getManager();
        //On va chercher en base de donnée toutes les instances de l'entité Article.
        $article = $em->getRepository("AdminBundle:Article")->findBy(array('publier' => '0'), array('id'=>'desc'));
        //On lie chaque article dans une variable.
        return array("varArticle" => $article);
    }
    
    /**
     * @Route("/user/profils",name="adminProfils")
     * @Template("ViewBundle:Default:profils.html.twig")
     */
    public function getProfils()
    {
        //On appele l'entity manager de doctrine.
        $em = $this->getDoctrine()->getManager();
        //On va chercher en base de donnée toutes les instances de l'entité User.
        $user = $em->getRepository("AdminBundle:User")->findAll();
        //On lie user dans une variable.
        return array("varUser" => $user);
    }
}

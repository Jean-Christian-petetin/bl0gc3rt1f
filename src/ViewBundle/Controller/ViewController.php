<?php

namespace ViewBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ViewController extends Controller
{
    /**
     * @Route("/")
     * @Template("ViewBundle:Default:home.html.twig")
     */
    public function getHome()
    {
        return null;
    }
    /**
     * @Route("/admin")
     * @Template("ViewBundle:Default:admin.html.twig")
     */
    public function getArticle()
    {
        return null;
    }
    
    /**
     * @Route("/admin/profils")
     * @Template("ViewBundle:Default:profils.html.twig")
     */
    public function getProfils()
    {
        return null;
    }
}

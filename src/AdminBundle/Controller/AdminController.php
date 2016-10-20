<?php

namespace AdminBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AdminController extends Controller
{
    /**
     * @Route("/admin/add/article")
     * @Template("AdminBundle:Default:ajoutArticle.html.twig")
     */
    //la route 
    public function addNews()
    {
        return null;
    }
    
    /**
     * @Route("/admin/edit/article")
     * @Template("AdminBundle:Default:modifArticle.html.twig")
     */
    public function editNews()
    {
        return null;
    }
    /**
     * @Route("/admin/update/article")
     */
    public function updateNews()
    {
        return null;
    }
    
    /**
     * @Route("/admin/delete/news")
     */
    public function deleteNews()
    {
        return null;
    }
    
    /**
     * @Route("/admin/add/profils")
     * @Template("AdminBundle:Default:ajoutProfils.html.twig")
     */
    public function addProfils()
    {
        return null;
    }
    
    /**
     * @Route("/admin/edit/profils")
     * @Template("AdminBundle:Default:modifProfils.html.twig")
     */
    public function editProfils()
    {
        return null;
    }
           
    /**
     * @Route("/admin/update/profils")
     */
    public function updateProfils()
    {
        return null;
    }
    
    /**
     * @Route("/admin/delete/profils") 
     */
    public function deleteProfils()
    {
        return null;
    }
}

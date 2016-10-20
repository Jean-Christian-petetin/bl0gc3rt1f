<?php

namespace AdminBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AdminController extends Controller
{
    /**
     * @Route("/admin/add/article",name="ajoutArticle")
     * @Template("AdminBundle:Default:ajoutArticle.html.twig")
     */
    //la route 
    public function addNews()
    {
        return null;
    }
    
    /**
     * @Route("/admin/edit/article",name="editArticle")
     * @Template("AdminBundle:Default:modifArticle.html.twig")
     */
    public function editNews()
    {
        return null;
    }
    /**
     * @Route("/admin/update/article",name="validNews")
     */
    public function updateNews()
    {
        return null;
    }
    
    /**
     * @Route("/admin/delete/news",name="deleteNews")
     */
    public function deleteNews()
    {
        return null;
    }
    
    /**
     * @Route("/admin/add/profils",name="addProfils")
     * @Template("AdminBundle:Default:ajoutProfils.html.twig")
     */
    public function addProfils()
    {
        return null;
    }
    
    /**
     * @Route("/admin/edit/profils",name="editProfils")
     * @Template("AdminBundle:Default:modifProfils.html.twig")
     */
    public function editProfils()
    {
        return null;
    }
           
    /**
     * @Route("/admin/update/profils",name="validProfils")
     */
    public function updateProfils()
    {
        return null;
    }
    
    /**
     * @Route("/admin/delete/profils",name="deleteProfils") 
     */
    public function deleteProfils()
    {
        return null;
    }
}

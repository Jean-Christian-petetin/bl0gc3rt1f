<?php

namespace AdminBundle\Controller;

use AdminBundle\Entity\Article;
use AdminBundle\Form\ArticleType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class AdminController extends Controller
{
    /**
     * @Route("/admin/formAddArticle")
     * @Template("AdminBundle:Default:ajoutArticle.html.twig")
     */
    public function getformAddArticle()
    {
        //On crée un formulaire a l'appel de la vue et on instancie un nouvel objet Article.
        $f = $this->createForm(ArticleType::class, new Article());
        //On crée la vue avec le formulaire précédement crée.
        return array("formAddNews" => $f->createView());
    }


    /**
     * @Route("/admin/add/article", name="valid")
     */
    //la route 
    public function addNews(Request $request)
    {
        //On crée une nouvelle instance que l'on stocke dans la variable.
        $addNews = new Article();
        //On crée un formulaire (une zone en mémoire tampon est attribuer le temps d'envoyé tout en base de données).
        $f = $this->createForm(ArticleType::class, $addNews);
        //On lie les champs de la vue et le formulaire.
        $f->handleRequest($request);
        
        //On appele l'entity manager de doctrine.
        $em = $this->getDoctrine()->getManager();
        //On enregistre en mémoire le formulaire avec les champs remplis.
        $em->persist($addNews);
        //On envoie le tout dans la base de donnée
        $em->flush();
        
        return $this->redirectToRoute('admin');
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

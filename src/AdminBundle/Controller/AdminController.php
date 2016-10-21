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
     * @Route("/admin/formAddArticle", name="addArticle")
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
        
        //On appele l'entity manager
        $em = $this->getDoctrine()->getManager();
        //On enregistre en mémoire le formulaire avec les champs remplis.
        $em->persist($addNews);
        //On envoie le tout dans la base de donnée
        $em->flush();
        
        return $this->redirectToRoute('admin');
    }
    //cette fonction permet de supprimer un article en prennant son id
    /**
     * @Route("/admin/delete/article/{id}",name="deleteNews")
     */
    public function deleteNews($id)
    {   //on recupere l'entity manager
        $em = $this->getDoctrine()->getEntityManager();
        //on recupere l'id de l'article 
        $getId = $em->find("AdminBundle:Article", $id);
        //on supprime l'article choisi
        $em->remove($getId);
        //on envoie les informations à la base de donnée
        $em->flush();
        //on redirige vers la route selectionnée
        return $this->redirectToRoute('admin');
    }
    //cette fonction permet de modifier un article
    /**
     * @Route("/admin/edit/article/{id}",name="editArticle")
     * @Template("AdminBundle:Default:modifArticle.html.twig")
     */
    public function editNews($id,Article $up)
    {   //on retourne un formulaire avec ses valeurs en paramètre
        //avec l'id correspondant
        return array("formAddArticle" => $this->createForm(ArticleType::class,$up)->createView(),'id'=>$id);
            
    }
    /**
     * @Route("/admin/update/article/{id}",name="validNews")
     */
    public function updateNews(Request $request , Article $up)
    {   //on appelle l'entity manager
        $em = $this->getDoctrine()->getManager();
        //on crée un formulaire
        $f=$this->createForm(ArticleType::class,$up);
        //on fait une verification
        $f->handleRequest($request);
        //on valide les modifications effectuées
        if($f->isValid())
        {   //on valide les modif
            $em->merge($up);
            //on envoie totalité dans la base de donnée
            $em->flush();
        }
        //on redirige vers la route selectionnée
        return $this->redirectToRoute('admin');
    }
    
    
    //les fonctions pour le profil sont identique a ceux utiliser pour les articles
    /**
     * @Route("/admin/add/profils",name="addProfils")
     * @Template("AdminBundle:Default:ajoutProfils.html.twig")
     */
    public function addProfils(Request $request)
    {   
        $addPro = new Article();
        $f = $this->createForm(ArticleType::class, $addPro);
        $f->handleRequest($request);
        $em = $this->getDoctrine()->getManager();
        $em->persist($addPro);
        $em->flush();
        return null;
    }
    
    /**
     * @Route("/admin/delete/profils/{id}",name="deleteProfils") 
     */
    public function deleteProfils($id)
    {
        $em = $this->getDoctrine()->getEntityManager();
        $getId = $em->find("AdminBundle:Profils", $id);
        $em->remove($getId);
        $em->flush();
        return $this->redirectToRoute('adminProfils');
    }
    
    /**
     * @Route("/admin/edit/profils",name="editProfils")
     * @Template("AdminBundle:Default:modifProfils.html.twig")
     */
    public function editProfils($id,Profils $up)
    {
        return array("formProfils" => $this->createForm(ProfilsType::class,$up)->createView(),'id'=>$id);
    }
    
    /**
     * @Route("/admin/update/profils/{id}",name="validProfils")
     */
    public function updateProfils(Request $request , Profils $up)
    {
        $em = $this->getDoctrine()->getManager();
        $f=$this->createForm(ArticleType::class,$up);
        $f->handleRequest($request);
        if($f->isValid())
        {   
            $em->merge($up);
            $em->flush();
        }
        return $this->redirectToRoute('adminProfils');
    }
    
}

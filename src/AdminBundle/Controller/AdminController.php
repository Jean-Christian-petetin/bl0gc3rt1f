<?php

namespace AdminBundle\Controller;

use AdminBundle\Entity\Article;
use AdminBundle\Entity\User;
use AdminBundle\Form\ArticleType;
use AdminBundle\Form\UserType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class AdminController extends Controller {

    /**
     * @Route("/admin/formAddArticle", name="addArticle")
     * @Template("AdminBundle:Default:ajoutArticle.html.twig")
     */
    public function getformAddArticle() {
        //On crée un formulaire a l'appel de la vue et on instancie un nouvel objet Article.
        $f = $this->createForm(ArticleType::class, new Article());
        //On crée la vue avec le formulaire précédement crée.
        return array("formAddNews" => $f->createView());
    }

    /**
     * @Route("/admin/add/article", name="valid")
     */
    //la route 
    public function addNews(Request $request) {
        //On crée une nouvelle instance que l'on stocke dans la variable.
        $addNews = new Article();
        //On crée un formulaire (une zone en mémoire tampon est attribuer le temps d'envoyé tout en base de données).
        $f = $this->createForm(ArticleType::class, $addNews);
        //On lie les champs de la vue et le formulaire.
        $f->handleRequest($request);
        $nomDuFichier = md5(uniqid()) . '.' . $addNews->getImage()->getClientOriginalExtension();
        $addNews->getImage()->move('../web/images', $nomDuFichier);
        $addNews->setImage($nomDuFichier);
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
    public function deleteNews($id) {   //on recupere l'entity manager
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
    public function editNews($id) {   
        //on retourne un formulaire avec ses valeurs en paramètre
        //avec l'id correspondant
        $em = $this->getDoctrine()->getEntityManager();
        $up = $em->find('AdminBundle:Article', $id);
        $f = $this->createForm(ArticleType::class, $up);
        return array("formAddArticle" => $f->createView(), "id" => $id);
    }

    /**
     * @Route("/admin/update/article/{id}",name="validNews")
     */
    public function updateNews(Request $request, $id) {
        $em = $this->getDoctrine()->getEntityManager();
        $f = $em->find('AdminBundle:Article', $id);
        $b = $this->createForm(ArticleType::class, $f);
        if ($request->getMethod() == 'POST') {
            $b->handleRequest($request);
            $nomDuFichier = md5(uniqid()) . '.' . $f->getImage()->getClientOriginalExtension();
            $f->getImage()->move('../web/images', $nomDuFichier);
            $f->setImage($nomDuFichier);
            $em = $this->getDoctrine()->getEntityManager();
            $em->merge($f);
            $em->flush();
            return $this->redirect($this->generateUrl('admin'));
        }
    }

    /**
     * @Route("/admin/formAddProfils", name="addProfils")
     * @Template("AdminBundle:Default:ajoutProfils.html.twig")
     */
    public function getformAddProfils() {
        //On crée un formulaire a l'appel de la vue et on instancie un nouvel objet Article.
        $f = $this->createForm(UserType::class, new User());
        //On crée la vue avec le formulaire précédement crée.
        return array("formAddProfils" => $f->createView());
    }

    /**
     * @Route("/admin/add/profils", name="validPro")
     */
    public function addProfils(Request $request) {
        $addPro = new User();
        $f = $this->createForm(UserType::class, $addPro);
        $f->handleRequest($request);
        $nomDuFichier = md5(uniqid()) . '.' . $addPro->getAvatar()->getClientOriginalExtension();
        $addPro->getAvatar()->move('../web/images', $nomDuFichier);
        $addPro->setAvatar($nomDuFichier);
        $em = $this->getDoctrine()->getManager();
        $em->persist($addPro);
        $em->flush();
        return $this->redirectToRoute('adminProfils');
    }

    /**
     * @Route("/admin/delete/profils/{id}",name="deleteProfils") 
     */
    public function deleteProfils($id) {
        $em = $this->getDoctrine()->getEntityManager();
        $getId = $em->find("AdminBundle:User", $id);
        $em->remove($getId);
        $em->flush();
        return $this->redirectToRoute('adminProfils');
    }

    /**
     * @Route("/admin/edit/profils/{id}",name="editProfils")
     * @Template("AdminBundle:Default:modifProfils.html.twig")
     */
    public function editProfils($id) {   
        //on retourne un formulaire avec ses valeurs en paramètre
        //avec l'id correspondant
        $em = $this->getDoctrine()->getEntityManager();
        $up = $em->find('AdminBundle:User', $id);
        $f = $this->createForm(UserType::class, $up);
        return array("formAddProfils" => $f->createView(), "id" => $id);
    }

    /**
     * @Route("/admin/update/profils/{id}",name="validProfils")
     */
    public function updateProfils(Request $request, $id) {
        $em = $this->getDoctrine()->getEntityManager();
        $f = $em->find('AdminBundle:User', $id);
        $b = $this->createForm(UserType::class, $f);
        if ($request->getMethod() == 'POST') {
            $b->handleRequest($request);
            $nomDuFichier = md5(uniqid()) . '.' . $f->getAvatar()->getClientOriginalExtension();
            $f->getAvatar()->move('../web/images', $nomDuFichier);
            $f->setAvatar($nomDuFichier);
            $em = $this->getDoctrine()->getEntityManager();
            $em->merge($f);
            $em->flush();
            return $this->redirect($this->generateUrl('adminProfils'));
        }
    }

    /**
     * @Route("/admin/publierUnArticle/{id}", name="publierUnArticle")
     */
    public function publierArticle(Article $up) {
        //On appelle l'entity manager de Doctrine.
        $em = $this->getDoctrine()->getManager();
        //on met le booleen de publier a 1.
        $up->setPublier(1);
        //on réecris les anciennes données par les nouvles.
        $em->merge($up);
        //on envoie le tout en Base de données.
        $em->flush();

        return $this->redirectToRoute('articleNonPublier');
    }

}

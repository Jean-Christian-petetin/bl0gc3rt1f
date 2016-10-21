<?php


namespace AdminBundle\Controller;

use AdminBundle\Entity\User;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Config\Definition\Exception\Exception;

/**
 * Description of LoginController
 *
 * @author hicham
 */
class LoginController extends Controller
{
    /**
     * c'est une méthode qui est déclarer par le contrôleur mais
     * la requête est intercepté par la methode formLogin par le
     * fichier security.yml
     * @Route("/loginCheck",name="loginCheck")
     * @throws Exception
     */
    public function LoginCheck() {
        throw new Exception('Verifiez votre fichier security');
    }
    /**
     * on fait la meme methode pour la déconnexion
     * @Route("/logOut",name="logOut")
     * @throws Exception
     */
    public function logOut() {
        throw new Exception('Verifiez votre fichier security');
    }
 
    /**
     * là c'est la petite methode pour ajouter un utilisateur 
     * @Route("/add",name="add")
     * @throws Exception
     */
    public function add() {
        $u = new User();
        $u->setNom("admin");
        $u->setPrenom("admin");
        $u->setEmail("admin@admin.com");
        $u->setMotDePasse("admin");
        $u->setAvatar("imageAdmin");
        $u->setRole(array("ROLE_ADMIN"));
        
        $em = $this->getDoctrine()->getManager();
        $em->persist($u);
        $em->flush();
        
        return $this->redirectToRoute("home");
    }
}

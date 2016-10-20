<?php


namespace AdminBundle\Controller;

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
     * @Route("/loginCheck",name="loginCheck"
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
 
}

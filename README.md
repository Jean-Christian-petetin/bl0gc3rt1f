#SerialSeriz

##Tehno utillisé 
        * SASS 3.4.22
        * PHP 5.6
        * Mysql 5.7.16
        * Symfony 2.8

##Lien utile
        * [Framapad] <https://mypads.framapad.org/mypads/?/mypads/group/blog-certif-wv6227yk/pad/view/carnet-de-bord-yz6m27g6>
        * [Trello] <https://trello.com/b/DZ1j00Xk/blog-certif>

##Procédure d'installation (Netbeans IDE 8.1)
        1. Projet Click droit, composer, install dev.
        2. Faire un chmod -R a+rwx a la racine du dossier. (sous linux)
        3. Configurer la base de donnée dans parameters.yml
        4. Terminal : php bin/console doctrine:database:create
                    : php bin/console doctrine:schema:create:update --force
        5. Creer un admin en ajoutant /add a l'url.
        6. Identifiant : admin@admin.com
           Mot de passe : admin


A Symfony project created on October 18, 2016, 9:44 am.

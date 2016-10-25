#TBlogCertif

##Tehno utillisé 
        * SASS
        * PHP 5.6
        * Mysql
        * Symfony

##Lien utile
        * [Framapad] (https://mypads.framapad.org/mypads/?/mypads/group/blog-certif-wv6227yk/pad/view/carnet-de-bord-yz6m27g6)
        * [Trello] (https://trello.com/b/DZ1j00Xk/blog-certif)

##Procédure d'installation 
        1. Projet Click droit, composer, install dev.
        2. Faire un chmod a la racine du fichier.
        3. Changer la base de donnée dans parameters.yml
        4. Terminal : php bin/console doctrine:database:create
                    : php bin/console doctrine:schema:update --force
        5. Creer un admin en ajoutant /add a l'url.
        6. Identifiant : admin@admin.com
           Mot de passe : admin


A Symfony project created on October 18, 2016, 9:44 am.

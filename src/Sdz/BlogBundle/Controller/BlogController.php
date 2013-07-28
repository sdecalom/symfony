<?php

//namespace Sdz\BlogBundle\Controller;
//
//use Symfony\Bundle\FrameworkBundle\Controller\Controller;
//
//class DefaultController extends Controller
//{
//    public function indexAction($name)
//    {
//        return $this->render('SdzBlogBundle:Default:index.html.twig', array('name' => $name));
//    }
//}
//
//
// src/Sdz/BlogBundle/Controller/BlogController.php

namespace Sdz\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class BlogController extends Controller {

    public function voir2Action($id) {
        //return new Response("Affichage test de l'article d'id : ".$id.".");
        // RENDER On utilise le raccourci : il crée un objet Response
        // Et lui donne comme contenu le contenu du template
        //return $this->render('SdzBlogBundle:Blog:voir.html.twig', array('id'  => $id,));
        // REDIRECTION On utilise la méthode « generateUrl() » pour obtenir l'URL de la liste des articles à la page 2
        // Par exemple
        //return $this->redirect( $this->generateUrl('sdzblog_accueil', array('page' => 2)) );
        //ENVOIE REPONSE JSON DIFF REPONSE HTTP  
        // Créons nous-mêmes la réponse en JSON, grâce à la fonction json_encode()
        //$response = new Response(json_encode(array('id' => $id)));
        // Ici, nous définissons le Content-type pour dire que l'on renvoie du JSON et non du HTML
        //$response->headers->set('Content-Type', 'application/json');
        //return $response;
        //RECUPERATION SERVICE ENVOI MAIL 
        //Récupération du service
        //$mailer = $this->get('mailer');
        //Création de l'e-mail : le service mailer utilise SwiftMailer, donc nous créons une instance de Swift_Message
        //    $message = \Swift_Message::newInstance()
        //      ->setSubject('Hello zéro !')
        //      ->setFrom('tutorial@symfony2.com')
        //      ->setTo('votre@email.com')
        //      ->setBody('Coucou, voici un email que vous venez de recevoir !');
        // Retour au service mailer, nous utilisons sa méthode « send() » pour envoyer notre $message
        //$mailer->send($message);
        // N'oublions pas de retourner une réponse, par exemple une page qui afficherait « L'e-mail a bien été envoyé »
        //return new Response('Email bien envoyé');
        //RECUP SERVICE TEMPLATING
        // Récupération du service
        //$templating = $this->get('templating');
        // On récupère le contenu de notre template
        //$contenu = $templating->render('SdzBlogBundle:Blog:voir.html.twig');
        // On crée une réponse avec ce contenu et on la retourne
        //return new Response($contenu);
        //RECUP SESSION
        //Récupération du service
        //$session = $this->get('session');
        // On récupère le contenu de la variable user_id
        //$user_id = $session->get('user_id'); 
        // On définit une nouvelle valeur pour cette variable user_id
        //$session->set('user_id', 91);
        // On n'oublie pas de renvoyer une réponse
        //return new Response('Désolé je suis une page de test, je n\'ai rien à dire');
    }

    public function indexAction($page) {
        // On ne sait pas combien de pages il y a
        // Mais on sait qu'une page doit être supérieure ou égale à 1
        //if ($page < 1) {
        // On déclenche une exception NotFoundHttpException
        // Cela va afficher la page d'erreur 404 (on pourra personnaliser cette page plus tard d'ailleurs)
        //http://localhost/Symfony/web/app_dev.php/blog/0
        //   throw $this->createNotFoundException('Page inexistante (page = ' . $page . ')');
        // }
        // Ici, on récupérera la liste des articles, puis on la passera au template
        // Mais pour l'instant, on ne fait qu'appeler le template
        //   return $this->render('SdzBlogBundle:Blog:index.html.twig');

        $articles = array(
            array(
                'titre' => 'Mon weekend a Phi Phi Island !',
                'id' => 1,
                'auteur' => 'winzou',
                'contenu' => 'Ce weekend était trop bien. Blabla…',
                'date' => new \Datetime()),
            array(
                'titre' => 'Repetition du National Day de Singapour',
                'id' => 2,
                'auteur' => 'winzou',
                'contenu' => 'Bientôt prêt pour le jour J. Blabla…',
                'date' => new \Datetime()),
            array(
                'titre' => 'Chiffre d\'affaire en hausse',
                'id' => 3,
                'auteur' => 'M@teo21',
                'contenu' => '+500% sur 1 an, fabuleux. Blabla…',
                'date' => new \Datetime())
        );

        // Puis modifiez la ligne du render comme ceci, pour prendre en compte nos articles :
        return $this->render('SdzBlogBundle:Blog:index.html.twig', array(
                    'articles' => $articles
        ));
    }

    public function voirAction($id) {
        // Ici, on récupérera l'article correspondant à l'id $id

        $article = array(
            'id' => 1,
            'titre' => 'Mon weekend a Phi Phi Island !',
            'auteur' => 'winzou',
            'contenu' => 'Ce weekend était trop bien. Blabla…',
            'date' => new \Datetime()
        );

        // Puis modifiez la ligne du render comme ceci, pour prendre en compte l'article :
        return $this->render('SdzBlogBundle:Blog:voir.html.twig', array(
                    'article' => $article
        ));
    }

    public function ajouterAction() {
        // La gestion d'un formulaire est particulière, mais l'idée est la suivante :

        if ($this->get('request')->getMethod() == 'POST') {
            // Ici, on s'occupera de la création et de la gestion du formulaire

            $this->get('session')->getFlashBag()->add('notice', 'Article bien enregistré');

            // Puis on redirige vers la page de visualisation de cet article
            return $this->redirect($this->generateUrl('sdzblog_voir', array('id' => 5)));
        }

        // Si on n'est pas en POST, alors on affiche le formulaire
        return $this->render('SdzBlogBundle:Blog:ajouter.html.twig');
    }

    public function modifierAction($id) {
        // Ici, on récupérera l'article correspondant à $id
        // Ici, on s'occupera de la création et de la gestion du formulaire

        $article = array(
            'id' => 1,
            'titre' => 'Mon weekend a Phi Phi Island !',
            'auteur' => 'winzou',
            'contenu' => 'Ce weekend était trop bien. Blabla…',
            'date' => new \Datetime()
        );

        // Puis modifiez la ligne du render comme ceci, pour prendre en compte l'article :
        return $this->render('SdzBlogBundle:Blog:modifier.html.twig', array(
                    'article' => $article
        ));
    }

    public function supprimerAction($id) {
        // Ici, on récupérera l'article correspondant à $id
        // Ici, on gérera la suppression de l'article en question

        return $this->render('SdzBlogBundle:Blog:supprimer.html.twig');
    }

    public function menuAction($nombre) { // Ici, nouvel argument $nombre, on l'a transmis via le render() depuis la vue
        // On fixe en dur une liste ici, bien entendu par la suite on la récupérera depuis la BDD !
        // On pourra récupérer $nombre articles depuis la BDD,
        // avec $nombre un paramètre qu'on peut changer lorsqu'on appelle cette action
        $liste = array(
            array('id' => 2, 'titre' => 'Mon dernier weekend !'),
            array('id' => 5, 'titre' => 'Sortie de Symfony2.1'),
            array('id' => 9, 'titre' => 'Petit test')
        );

        return $this->render('SdzBlogBundle:Blog:menu.html.twig', array(
                    'liste_articles' => $liste // C'est ici tout l'intérêt : le contrôleur passe les variables nécessaires au template !
        ));
    }

}
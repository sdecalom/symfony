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
use Sdz\BlogBundle\Entity\Article;
use Sdz\BlogBundle\Form\ArticleType; //a rajouter pour utiliser le formulaire type
use Sdz\BlogBundle\Form\ArticleEditType; //a rajouter pour utiliser le formulaire type
use JMS\SecurityExtraBundle\Annotation\Secure;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

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

//    public function indexAction($page) {
//        // On ne sait pas combien de pages il y a
//        // Mais on sait qu'une page doit être supérieure ou égale à 1
//        //if ($page < 1) {
//        // On déclenche une exception NotFoundHttpException
//        // Cela va afficher la page d'erreur 404 (on pourra personnaliser cette page plus tard d'ailleurs)
//        //http://localhost/Symfony/web/app_dev.php/blog/0
//        //   throw $this->createNotFoundException('Page inexistante (page = ' . $page . ')');
//        // }
//        // Ici, on récupérera la liste des articles, puis on la passera au template
//        // Mais pour l'instant, on ne fait qu'appeler le template
//        //   return $this->render('SdzBlogBundle:Blog:index.html.twig');
//
//        $articles = array(
//            array(
//                'titre' => 'Mon weekend a Phi Phi Island !',
//                'id' => 1,
//                'auteur' => 'winzou',
//                'contenu' => 'Ce weekend était trop bien. Blabla…',
//                'date' => new \Datetime()),
//            array(
//                'titre' => 'Repetition du National Day de Singapour',
//                'id' => 2,
//                'auteur' => 'winzou',
//                'contenu' => 'Bientôt prêt pour le jour J. Blabla…',
//                'date' => new \Datetime()),
//            array(
//                'titre' => 'Chiffre d\'affaire en hausse',
//                'id' => 3,
//                'auteur' => 'M@teo21',
//                'contenu' => '+500% sur 1 an, fabuleux. Blabla…',
//                'date' => new \Datetime())
//        );
//
//        // Puis modifiez la ligne du render comme ceci, pour prendre en compte nos articles :
//        return $this->render('SdzBlogBundle:Blog:index.html.twig', array(
//                    'articles' => $articles
//        ));
//    }
//
//    public function voirAction($id) {
//        // Ici, on récupérera l'article correspondant à l'id $id
//
//        $article = array(
//            'id' => 1,
//            'titre' => 'Mon weekend a Phi Phi Island !',
//            'auteur' => 'winzou',
//            'contenu' => 'Ce weekend était trop bien. Blabla…',
//            'date' => new \Datetime()
//        );
//
//        // Puis modifiez la ligne du render comme ceci, pour prendre en compte l'article :
//        return $this->render('SdzBlogBundle:Blog:voir.html.twig', array(
//                    'article' => $article
//        ));
//    }
//
//    public function ajouterAction() {
//        // La gestion d'un formulaire est particulière, mais l'idée est la suivante :
//
//        if ($this->get('request')->getMethod() == 'POST') {
//            // Ici, on s'occupera de la création et de la gestion du formulaire
//
//            $this->get('session')->getFlashBag()->add('notice', 'Article bien enregistré');
//
//            // Puis on redirige vers la page de visualisation de cet article
//            return $this->redirect($this->generateUrl('sdzblog_voir', array('id' => 5)));
//        }
//
//        // Si on n'est pas en POST, alors on affiche le formulaire
//        return $this->render('SdzBlogBundle:Blog:ajouter.html.twig');
//    }
//
//    public function modifierAction($id) {
//        // Ici, on récupérera l'article correspondant à $id
//        // Ici, on s'occupera de la création et de la gestion du formulaire
//
//        $article = array(
//            'id' => 1,
//            'titre' => 'Mon weekend a Phi Phi Island !',
//            'auteur' => 'winzou',
//            'contenu' => 'Ce weekend était trop bien. Blabla…',
//            'date' => new \Datetime()
//        );
//
//        // Puis modifiez la ligne du render comme ceci, pour prendre en compte l'article :
//        return $this->render('SdzBlogBundle:Blog:modifier.html.twig', array(
//                    'article' => $article
//        ));
//    }
//
//    public function supprimerAction($id) {
//        // Ici, on récupérera l'article correspondant à $id
//        // Ici, on gérera la suppression de l'article en question
//
//        return $this->render('SdzBlogBundle:Blog:supprimer.html.twig');
//    }
//
//    public function menuAction($nombre) { // Ici, nouvel argument $nombre, on l'a transmis via le render() depuis la vue
//        // On fixe en dur une liste ici, bien entendu par la suite on la récupérera depuis la BDD !
//        // On pourra récupérer $nombre articles depuis la BDD,
//        // avec $nombre un paramètre qu'on peut changer lorsqu'on appelle cette action
//        $liste = array(
//            array('id' => 2, 'titre' => 'Mon dernier weekend !'),
//            array('id' => 5, 'titre' => 'Sortie de Symfony2.1'),
//            array('id' => 9, 'titre' => 'Petit test')
//        );
//
//        return $this->render('SdzBlogBundle:Blog:menu.html.twig', array(
//                    'liste_articles' => $liste // C'est ici tout l'intérêt : le contrôleur passe les variables nécessaires au template !
//        ));
//    }
    //CONTROLEUR AC BDD
    //fait une recherche ac find
//    public function indexAction($page)
//    {
//    // On ne sait pas combien de pages il y a
//    // Mais on sait qu'une page doit être supérieure ou égale à 1
//    // Bien sûr pour le moment on ne se sert pas (encore !) de cette variable
//    if ($page < 1) {
//      // On déclenche une exception NotFoundHttpException 
//      // Cela va afficher la page d'erreur 404
//      // On pourra la personnaliser plus tard
//      throw $this->createNotFoundException('Page inexistante (page = '.$page.')');
//    }
// 
//    // Pour récupérer la liste de tous les articles : on utilise findAll()
//    $articles = $this->getDoctrine()
//                     ->getManager()
//                     ->getRepository('SdzBlogBundle:Article')
//                     ->findAll();
// 
//    // L'appel de la vue ne change pas
//    return $this->render('SdzBlogBundle:Blog:index.html.twig', array(
//      'articles' => $articles
//    ));
//  }
    //utilisation du reposotory
//  public function indexAction($page)
//  {
//    // On ne sait pas combien de pages il y a
//    // Mais on sait qu'une page doit être supérieure ou égale à 1
//    // Bien sûr pour le moment on ne se sert pas (encore !) de cette variable
//    if ($page < 1) {
//      // On déclenche une exception NotFoundHttpException
//      // Cela va afficher la page d'erreur 404
//      // On pourra la personnaliser plus tard
//      throw $this->createNotFoundException('Page inexistante (page = '.$page.')');
//    }
// 
//    // Pour récupérer la liste de tous les articles : on utilise notre nouvelle méthode
//    $articles = $this->getDoctrine()
//                     ->getManager()
//                     ->getRepository('SdzBlogBundle:Article')
//                     ->getArticles();
// 
//    // L'appel de la vue ne change pas
//    return $this->render('SdzBlogBundle:Blog:index.html.twig', array(
//      'articles' => $articles
//    ));
//  }
    //utilisation du reposotory   ac pagination
    public function indexAction($page) {
        $articles = $this->getDoctrine()
                ->getManager()
                ->getRepository('SdzBlogBundle:Article')
                ->getArticles(2, $page); // 3 articles par page : c'est totalement arbitraire !
        // On ajoute ici les variables page et nb_page à la vue
        return $this->render('SdzBlogBundle:Blog:index.html.twig', array(
                    'articles' => $articles,
                    'page' => $page,
                    'nombrePage' => ceil(count($articles) / 1)
        ));

//        // On récupère le service
//        $antispam = $this->container->get('sdz_blog.antispam');
//        $text="test@msn.com,test2@msn.com,test3@msn.com";
//        // Je pars du principe que $text contient le texte d'un message quelconque
//        if ($antispam->isSpam($text)) {
//            throw new \Exception('Votre message a été détecté comme spam !');
//        }

        // Le message n'est pas un spam, on continue l'action…
    }

//  public function voirAction($id)
//  {
//    // On récupère l'EntityManager
//    $em = $this->getDoctrine()
//               ->getManager();
//     
//    // Pour récupérer un article unique : on utilise find()
//    $article = $em->getRepository('SdzBlogBundle:Article')
//                  ->find($id);
// 
//    if ($article === null) {
//      throw $this->createNotFoundException('Article[id='.$id.'] inexistant.');
//    }
// 
//    // On récupère les articleCompetence pour l'article $article
//    $liste_articleCompetence = $em->getRepository('SdzBlogBundle:ArticleCompetence')
//                                  ->findByArticle($article->getId());
// 
//    // Puis modifiez la ligne du render comme ceci, pour prendre en compte les variables :
//    return $this->render('SdzBlogBundle:Blog:voir.html.twig', array(
//      'article'                 => $article,
//      'liste_articleCompetence' => $liste_articleCompetence,
//      // Pas besoin de passer les commentaires à la vue, on pourra y accéder via {{ article.commentaires }}
//      // 'liste_commentaires'   => $article->getCommentaires()
//    ));
//  }
    //Avec l'atribut de type Article
    public function voirAction(Article $article) {
        // À ce stade, la variable $article contient une instance de la classe Article
        // Avec l'id correspondant à l'id contenu dans la route !
        // On récupère ensuite les articleCompetence pour l'article $article
        // On doit le faire à la main pour l'instant, car la relation est unidirectionnelle
        // C'est-à-dire que $article->getArticleCompetences() n'existe pas !
        $listeArticleCompetence = $this->getDoctrine()
                ->getManager()
                ->getRepository('SdzBlogBundle:ArticleCompetence')
                ->findByArticle($article->getId());

        return $this->render('SdzBlogBundle:Blog:voir.html.twig', array(
                    'article' => $article,
                    'listeArticleCompetence' => $listeArticleCompetence
        ));
    }

//  public function ajouterAction()
//  {
//    // La gestion d'un formulaire est particulière, mais l'idée est la suivante :
//   
//    if ($this->get('request')->getMethod() == 'POST') {
//      // Ici, on s'occupera de la création et de la gestion du formulaire
//   
//      $this->get('session')->getFlashBag()->add('info', 'Article bien enregistré');
//   
//      // Puis on redirige vers la page de visualisation de cet article
//      return $this->redirect( $this->generateUrl('sdzblog_voir', array('id' => 1)) );
//    }
//   
//    // Si on n'est pas en POST, alors on affiche le formulaire
//    return $this->render('SdzBlogBundle:Blog:ajouter.html.twig');
//  }
//  
    //action ac le formulaire sans soummission
//    public function ajouterAction() {
//        // On crée un objet Article
//        $article = new Article();
//
//        // On crée le FormBuilder grâce à la méthode du contrôleur
//        $formBuilder = $this->createFormBuilder($article);
//
//        // On ajoute les champs de l'entité que l'on veut à notre formulaire
//        $formBuilder
//                ->add('date', 'date')
//                ->add('titre', 'text')
//                ->add('contenu', 'textarea')
//                ->add('auteur', 'text')
//                ->add('publication', 'checkbox');
//        // Pour l'instant, pas de commentaires, catégories, etc., on les gérera plus tard
//        // À partir du formBuilder, on génère le formulaire
//        $form = $formBuilder->getForm();
//
//        // On passe la méthode createView() du formulaire à la vue afin qu'elle puisse afficher le formulaire toute seule
//        return $this->render('SdzBlogBundle:Blog:ajouter.html.twig', array(
//                    'form' => $form->createView(),
//        ));
//    }
    //action ac le formulaire et soumission
//    public function ajouterAction() {
//        $article = new Article;
//
//        // J'ai raccourci cette partie, car c'est plus rapide à écrire !
//        $form = $this->createFormBuilder($article)
//                ->add('date', 'date')
//                ->add('titre', 'text')
//                ->add('contenu', 'textarea')
//                ->add('auteur', 'text')
//                ->add('publication', 'checkbox')
//                ->getForm();
//
//        // On récupère la requête
//        $request = $this->get('request');
//
//        // On vérifie qu'elle est de type POST
//        if ($request->getMethod() == 'POST') {
//            // On fait le lien Requête <-> Formulaire
//            // À partir de maintenant, la variable $article contient les valeurs entrées dans le formulaire par le visiteur
//            $form->bind($request);
//
//            // On vérifie que les valeurs entrées sont correctes
//            // (Nous verrons la validation des objets en détail dans le prochain chapitre)
//            if ($form->isValid()) {
//                // On l'enregistre notre objet $article dans la base de données
//                $em = $this->getDoctrine()->getManager();
//                $em->persist($article);
//                $em->flush();
//
//                // On redirige vers la page de visualisation de l'article nouvellement créé
//                return $this->redirect($this->generateUrl('sdzblog_voir', array('id' => $article->getId())));
//            }
//        }
//
//        // À ce stade :
//        // - Soit la requête est de type GET, donc le visiteur vient d'arriver sur la page et veut voir le formulaire
//        // - Soit la requête est de type POST, mais le formulaire n'est pas valide, donc on l'affiche de nouveau
//
//        return $this->render('SdzBlogBundle:Blog:ajouter.html.twig', array(
//                    'form' => $form->createView(),
//        ));
//    }
    //ajouterAction ac le formtype


    public function ajouterAction() {

        // On teste que l'utilisateur dispose bien du rôle ROLE_AUTEUR(ne pas oublier le use AccessDeniedHttpException)
        if (!$this->get('security.context')->isGranted('ROLE_AUTEUR')) {
            // Sinon on déclenche une exception « Accès interdit »
            throw new AccessDeniedHttpException('Accès limité aux auteurs');
        }



        $article = new Article;

        // On crée le formulaire grâce à l'ArticleType
        $form = $this->createForm(new ArticleType(), $article);

        // On récupère la requête
        $request = $this->getRequest();

        // On vérifie qu'elle est de type POST
        if ($request->getMethod() == 'POST') {
            // On fait le lien Requête <-> Formulaire
            $form->bind($request);

            // On vérifie que les valeurs entrées sont correctes
            // (Nous verrons la validation des objets en détail dans le prochain chapitre)
            if ($form->isValid()) {
                // On enregistre notre objet $article dans la base de données
                $em = $this->getDoctrine()->getManager();
                $em->persist($article);
                $em->flush();

                // On définit un message flash
                $this->get('session')->getFlashBag()->add('info', 'Article bien ajouté');

                // On redirige vers la page de visualisation de l'article nouvellement créé
                return $this->redirect($this->generateUrl('sdzblog_voir', array('id' => $article->getId())));
            }
        }

        // À ce stade :
        // - Soit la requête est de type GET, donc le visiteur vient d'arriver sur la page et veut voir le formulaire
        // - Soit la requête est de type POST, mais le formulaire n'est pas valide, donc on l'affiche de nouveau

        return $this->render('SdzBlogBundle:Blog:ajouter.html.twig', array(
                    'form' => $form->createView(),
        ));
    }
    
//  statique
//    public function modifierAction($id) {
//        // On récupère l'EntityManager
//        $em = $this->getDoctrine()
//                ->getEntityManager();
//
//        // On récupère l'entité correspondant à l'id $id
//        $article = $em->getRepository('SdzBlogBundle:Article')
//                ->find($id);
//
//        // Si l'article n'existe pas, on affiche une erreur 404
//        if ($article == null) {
//            throw $this->createNotFoundException('Article[id=' . $id . '] inexistant');
//        }
//
//        // Ici, on s'occupera de la création et de la gestion du formulaire
//
//        return $this->render('SdzBlogBundle:Blog:modifier.html.twig', array(
//                    'article' => $article
//        ));
//    }

    //modifier ac article type
    public function modifierAction(Article $article) {
        // On utiliser le ArticleEditType
        $form = $this->createForm(new ArticleEditType(), $article);

        $request = $this->getRequest();

        if ($request->getMethod() == 'POST') {
            $form->bind($request);

            if ($form->isValid()) {
                // On enregistre l'article
                $em = $this->getDoctrine()->getManager();
                $em->persist($article);
                $em->flush();

                // On définit un message flash
                $this->get('session')->getFlashBag()->add('info', 'Article bien modifié');

                return $this->redirect($this->generateUrl('sdzblog_voir', array('id' => $article->getId())));
            }
        }

        return $this->render('SdzBlogBundle:Blog:modifier.html.twig', array(
                    'form' => $form->createView(),
                    'article' => $article
        ));
    }

    //supprimer statique
//    public function supprimerAction($id) {
//        // On récupère l'EntityManager
//        $em = $this->getDoctrine()
//                ->getEntityManager();
//
//        // On récupère l'entité correspondant à l'id $id
//        $article = $em->getRepository('SdzBlogBundle:Article')
//                ->find($id);
//
//        // Si l'article n'existe pas, on affiche une erreur 404
//        if ($article == null) {
//            throw $this->createNotFoundException('Article[id=' . $id . '] inexistant');
//        }
//
//        if ($this->get('request')->getMethod() == 'POST') {
//            // Si la requête est en POST, on supprimera l'article
//
//            $this->get('session')->getFlashBag()->add('info', 'Article bien supprimé');
//
//            // Puis on redirige vers l'accueil
//            return $this->redirect($this->generateUrl('sdzblog_accueil'));
//        }
//
//        // Si la requête est en GET, on affiche une page de confirmation avant de supprimer
//        return $this->render('SdzBlogBundle:Blog:supprimer.html.twig', array(
//                    'article' => $article
//        ));
//    }

     public function supprimerAction(Article $article)
  {
    // On crée un formulaire vide, qui ne contiendra que le champ CSRF
    // Cela permet de protéger la suppression d'article contre cette faille
    $form = $this->createFormBuilder()->getForm();
 
    $request = $this->getRequest();
    if ($request->getMethod() == 'POST') {
      $form->bind($request);
 
      if ($form->isValid()) {
        // On supprime l'article
        $em = $this->getDoctrine()->getManager();
        $em->remove($article);
        $em->flush();
 
        // On définit un message flash
        $this->get('session')->getFlashBag()->add('info', 'Article bien supprimé');
 
        // Puis on redirige vers l'accueil
        return $this->redirect($this->generateUrl('sdzblog_accueil'));
      }
    }
 
    // Si la requête est en GET, on affiche une page de confirmation avant de supprimer
    return $this->render('SdzBlogBundle:Blog:supprimer.html.twig', array(
      'article' => $article,
      'form'    => $form->createView()
    ));
  }
  
    public function menuAction($nombre) {
        $liste = $this->getDoctrine()
                ->getManager()
                ->getRepository('SdzBlogBundle:Article')
                ->findBy(
                array(), // Pas de critère
                array('date' => 'desc'), // On trie par date décroissante
                $nombre, // On sélectionne $nombre articles
                0                // À partir du premier
        );

        return $this->render('SdzBlogBundle:Blog:menu.html.twig', array(
                    'liste_articles' => $liste // C'est ici tout l'intérêt : le contrôleur passe les variables nécessaires au template !
        ));
    }

}
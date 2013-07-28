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
 
class BlogController extends Controller
{
  public function indexAction()
  {
    //return new Response("Hello World !");
    return $this->render('SdzBlogBundle:Blog:index.html.twig', array('nom' => 'winzou'));
    
    /****GENERATION URL***********
    
    // On fixe un id au hasard ici, il sera dynamique par la suite, évidemment
    $id = 5;
 
    // On veut avoir l'URL de l'article d'id $id.Pour générer une URL absolue, lorsque vous l'envoyez par e-mail, par exemple, il faut mettre le troisième argument à true. 
    $url = $this->generateUrl('sdzblog_voir', array('id' => $id));
    // $url vaut « /blog/article/5 »
 
    // On redirige vers cette URL (ça ne sert à rien, on est d'accord, c'est pour l'exemple !)
    return $this->redirect($url);
      
     *******************************/
    
    
  }
}
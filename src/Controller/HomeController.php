<?php
/**
 * Created by PhpStorm.
 * User: julien
 * Date: 14/04/17
 * Time: 19:41
 */

namespace Clara\Controller;


use Clara\Model\ContentManager;

class HomeController extends Controller
{
    public function homeContent()
    {
        $em = new ContentManager();
        $lastEvenement = $em->findLastType('evenement');
        $lastBlog = $em->findLastType('blog');
        $lastPortrait = $em->findLastType('portrait');
        return $this->getTwig()->render('home.html.twig', ['evenement'=>$lastEvenement, 'blog'=>$lastBlog, 'portrait'=>$lastPortrait]);
}
}
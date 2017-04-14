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
//        $newHats = $em->findNewHats();
        return $this->getTwig()->render('home.html.twig', ['evenement' => $lastEvenement, 'blog' => $lastBlog, 'portrait' => $lastPortrait]);
    }

    /**
     * @param $id
     * @return string
     */
    public function showContent($id)
    {
        $db = new ContentManager();
        $res = $db->findOne($id);
        return $this->getTwig()->render('content.html.twig', ['data' => $res]);
    }

    public function showContents($type)
    {
        $db = new ContentManager();
        $res = $db->findAll($type);
        return $this->getTwig()->render('contents.html.twig', ['datas'=>$res]);
    }
}
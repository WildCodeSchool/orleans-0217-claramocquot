<?php
/**
 * Created by PhpStorm.
 * User: julien
 * Date: 14/04/17
 * Time: 19:41
 */

namespace Clara\Controller;


use Clara\Model\ContentManager;
use Clara\Model\HatManager;
use Clara\Model\PictureHomeManager;
use Clara\Model\Visibility_marraineManager;

class FrontController extends Controller
{
    public function homeContent()
    {
        $em = new ContentManager();
        $em2 = new HatManager();
        $em3 = new PictureHomeManager();
        $lastEvenement = $em->findLastType('evenement');
        $lastBlog = $em->findLastType('blog');
        $lastPortrait = $em->findLastType('portrait');
        $newHats = $em2->showNewHats();
        $picture = $em3->findPictureHome();
        return $this->getTwig()->render('home.html.twig', ['evenement' => $lastEvenement, 'blog' => $lastBlog, 'portrait' => $lastPortrait, 'news'=>$newHats, 'picture'=>$picture]);
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
        $em = new Visibility_marraineManager();
        $visibility = $em->showVisibility();
        $res = $db->findAll($type);
        return $this->getTwig()->render('contents.html.twig', ['datas'=>$res,'type'=>$type, 'visibility'=>$visibility]);
    }

    public function showHats($res)
    {

        $em = new HatManager();
        $datas = $em->showHats();
        $oldHats= $em->showOldHats();
        return $this->getTwig()->render('products.html.twig', ['datas' => $datas, 'res' => $res, 'olds' =>$oldHats]);
    }
    public function showHat($id)
    {
        $db = new HatManager();
        $res = $db->showHat($id);
        return $this->getTwig()->render('product.html.twig', ['hats' => $res]);
    }


}
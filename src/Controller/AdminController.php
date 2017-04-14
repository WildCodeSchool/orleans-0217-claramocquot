<?php
/**
 * Created by PhpStorm.
 * User: julien
 * Date: 07/04/17
 * Time: 18:53
 */

namespace Clara\Controller;


class AdminController extends Controller
{
    public function showHats()
    {
        $hat= new HatController(false);
        return $hat->showHats();
    }
    public function addHat()
    {
        $hat= new HatController(false);
        return $hat->addHat();
    }
    public function updateHat()
    {
        $hat = new HatController(false);
        return $hat->updateHate();
    }
    public function showContents($type)
    {
        $content = new ContentController(false);
        return $content->showContents($type);
    }
    public function showContent($id)
    {
        $content = new ContentController(false);
        return $content->showContent($id);
    }
    public function addContent($type)
    {
        $content = new ContentController(false);
        return $content->addContent($type);
    }
    public function updateContent($type, $id)
    {
        $content = new ContentController(false);
        return $content->updateContent($type, $id);
    }
    public function deleteContent($type, $id)
    {
        $content = new ContentController(false);
        return $content->deleteContent($type, $id);
    }
    public function showPicturesHome()
    {
        return $this->getTwig()->render('showPicturesHome.html.twig');
    }
    public function addPictureHome()
    {
        return $this->getTwig()->render('addPictureHome.html.twig');
    }
    public function updatePictureHome()
    {
        return $this->getTwig()->render('updatePictureHome.html.twig');
    }
    public function homeAdmin()
    {
        return $this->getTwig()->render('homeAdmin.html.twig');
    }
}


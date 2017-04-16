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
    public function showHats($res)
    {
        $hat= new HatController(false);
        return $hat->showHats($res);
    }

    public function showHat($id)
    {
        $hat= new HatController(false);
        return $hat->showHat($id);
    }

    public function addHat()
    {
        $hat= new HatController(false);
        return $hat->addHat();
    }


    public function updateHat($id)
    {
        $hat = new HatController(false);
        return $hat->updateHate($id);
    }

    public function deleteHat($id)
    {
        $hat = new HatController(false);
        return $hat->deleteHat($id);
    }
    /**
     * @param $type
     * @param $result
     * @return string
     */
    public function showContents($type, $result)
    {
        $content = new ContentController(false);
        return $content->showContents($type, $result);
    }

    /**
     * @param $id
     * @return string
     */
    public function showContent($id)
    {
        $content = new ContentController(false);
        return $content->showContent($id);
    }

    /**
     * @param $type
     * @return string
     */
    public function addContent($type)
    {
        $content = new ContentController(false);
        return $content->addContent($type);
    }

    /**
     * @param $id
     * @return string
     */
    public function updateContent($id)
    {
        $content = new ContentController(false);
        return $content->updateContent($id);
    }

    /**
     * @param $type
     * @param $id
     * @return string
     */
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


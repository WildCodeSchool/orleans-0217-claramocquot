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

    public function addHat($res)
    {
        $hat= new HatController(false);
        return $hat->addHat($res);
    }


    public function updateHat($id, $res)
    {
        $hat = new HatController(false);
        return $hat->updateHate($id, $res);
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
    public function addContent($type, $res)
    {
        $content = new ContentController(false);
        return $content->addContent($type, $res);
    }

    /**
     * @param $id
     * @return string
     */
    public function updateContent($id, $res)
    {
        $content = new ContentController(false);
        return $content->updateContent($id, $res);
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

    public function showPicturesHome($res)
    {
        $picture = new PictureHomeController(false);
        return $picture->showPicturesHome($res);
    }

    public function homeAdmin()
    {
        return $this->getTwig()->render('homeAdmin.html.twig');
    }
}


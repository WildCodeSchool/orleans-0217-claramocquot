<?php


namespace clara\controller;


class PictureHomeController
{

    public function add($id, $url, $visibility)
    {
        $db= new DB();
        $pictureHome = $db->addPictureHome('pictureHome', $id, $url, $visibility);
        return $this->render('addPictureHome.php', ['pictureHome' => $pictureHome]);
    }


    public function update($id, $url, $visibility)
    {
        $db= new DB();
        $pictureHome= $db->updatePictureHome('pictureHome', $id, $url, $visibility);
        return $this->render('updatePictureHome.php', ['pictureHome' => $pictureHome]);
    }


    public function delete($id)
    {
        $db= new DB();
        $pictureHome = $db->deletePictureHome('pictureHome', $id);
        return $this->render('deletePictureHome.php', ['pictureHome' => $pictureHome]);
    }
}
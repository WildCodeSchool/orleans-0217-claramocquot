<?php


namespace clara\controller;


class PictureHomeController
{

    public function add($id, $url, $visibility)
    {
        $db= new DB();
        $pictureHome = $db->addPictureHome('pictureHome', $id, $url, $visibility);
        return $this->render('addPictureHome.html.twig', ['pictureHome' => $pictureHome]);
    }


    public function update($id, $url, $visibility)
    {
        $db= new DB();
        $pictureHome= $db->updatePictureHome('pictureHome', $id, $url, $visibility);
        return $this->render('updatePictureHome.html.twig', ['pictureHome' => $pictureHome]);
    }


    public function delete($id)
    {
        $db= new DB();
        $pictureHome = $db->deletePictureHome('pictureHome', $id);
        return $this->render('deletePictureHome.html.twig', ['pictureHome' => $pictureHome]);
    }
}
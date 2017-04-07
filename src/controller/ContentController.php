<?php
/**
 * Created by PhpStorm.
 * User: julien
 * Date: 02/04/17
 * Time: 17:26
 */

namespace clara\controller;

use clara\DB;

class ContentController extends Controller
{

    /**
     * @param $id
     * @return string
     */
    public function show($id)
    {
        $db = new DB();
        $summernote = $db->findOne('summernote', $id);
        return $this->render('article.php', ['summernote' => $summernote]);

    }

    /**
     * @param $id
     * @return string
     */
    public function showType($type)
    {
        $db = new DB();
        $summernote = $db->findAllType('summernote', $type);
        return $this->render('articles.php', ['summernote' => $summernote]);

    }

    /**
     * @param $title
     * @param $type
     * @param $content
     * @param $visibility
     * @param $date
     * @param $img
     * @param $sumup
     * @return string
     */
    public function add($title, $type, $content, $visibility, $date, $img, $sumup)
    {
        $db= new DB();
        $summernote = $db->addOneType('summernote', $title, $type, $content, $visibility, $date, $img, $sumup);
        return $this->render('addSummernote.php', ['summernote' => $summernote]);
    }

    /**
     * @param $id
     * @param $title
     * @param $type
     * @param $content
     * @param $visibility
     * @param $date
     * @param $img
     * @param $sumup
     * @return string
     */
    public function update($id, $title, $type, $content, $visibility, $date, $img, $sumup)
    {
        $db= new DB();
        $summernote = $db->updateOneType('summernote', $id, $title, $type, $content, $visibility, $date, $img, $sumup);
        return $this->render('updateContent.php', ['summernote' => $summernote]);
    }

    /**
     * @param $id
     * @return string
     */
    public function delete($id)
    {
        $db= new DB();
        $summernote = $db->deleteOneType('summernote', $id);
        return $this->render('deleteContent.php', ['summernote' => $summernote]);
    }


}

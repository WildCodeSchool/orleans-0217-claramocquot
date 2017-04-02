<?php
/**
 * Created by PhpStorm.
 * User: julien
 * Date: 02/04/17
 * Time: 17:26
 */

namespace clara\controller;

use clara\DB;

class SummernoteController extends Controller
{
     /**
     * @return string
     */
    public function listAll()
    {
        $db = new DB();
        $summernote = $db -> findAll('summernote');
        return $this->render('articles.php', ['summernote'=>$summernote]);
    }

    /**
     * @param $id
     * @return string
     */
    public function show($id)
    {
        $db = new DB();
        $summernote = $db -> findOne('summernote', $id);
        return $this->render('article.php', ['summernote'=>$summernote]);

    }

    /**
     * j'ajoute un élève
     */
    public function add() {

    }

    /**
     *
     */
    public function update() {

    }

    /**
     *
     */
    public function delete() {

    }



}
}
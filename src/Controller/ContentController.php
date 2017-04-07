<?php
/**
 * Created by PhpStorm.
 * User: julien
 * Date: 02/04/17
 * Time: 17:26
 */

namespace Clara\Controller;

use Clara\DB;
use Clara\Form\ContentForm;
use Clara\Form\ContentFilter;

/**
 * Class ContentController
 * @package clara\Controller
 */
class ContentController extends Controller
{

    /**
     * @param $id
     * @return string
     */
    public function show($id)
    {
        $db = new DB();
        $res = $db->findOne('content', $id);
        return $this->render('article.php', ['content' => $res]);
    }

    /**
     * @param $id
     * @return string
     */
    public function showType($type)
    {
        $db = new DB();
        $res = $db->findAllContentType('content', $type);
        return $this->render('articles.php', ['content' => $res]);

    }

    /**
     * @param $type
     * @param $title
     * @param $date
     * @param $image
     * @param $content
     * @param $sumup
     * @return string
     */
    public function add()
    {
        $form = new ContentForm();
        if (isset($_POST['Ajouter'])) {
            $filter = new ContentFilter();
            $form->setInputFilter($filter);
            $form->setData($_POST);
            if ($form->isValid()) {
                $db= new DB();
                return $db->addOneContent('content', $type, $title, $date, $image, $content, $sumup);
            }
        }
        return $this->render('admin/addContent.php', ['form'=>$form]);
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
    public function update($id, $type, $title, $date, $image, $content, $sumup)
    {
        $db= new DB();
        $res = $db->updateOneType('content', $id, $type, $title, $date, $image, $content, $sumup);
        return $this->render('updateContent.php', ['content' => $res]);
    }

    /**
     * @param $id
     * @return string
     */
    public function delete($id)
    {
        $db= new DB();
        $res = $db->deleteOneType('content', $id);
        return $this->render('deleteContent.php', ['content' => $res]);
    }


}

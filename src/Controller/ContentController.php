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
use Clara\Model\Content;
use Clara\Model\ContentManager;

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
        $db = new ContentManager();
        $res = $db->findOne('content', $id);
        return $this->render('content.html.twig', ['content' => $res]);
    }

    /**
     * @param $id
     * @return string
     */
    public function showType($type)
    {
        $db = new ContentManager();
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
            $content = new Content();
            //hydrater $content avec $_POST
            $filter = new ContentFilter();
            $form->setInputFilter($filter);
            $form->setData($_POST);
            if ($form->isValid()) {
                $db = new ContentManager();
                return $db->addOneContent($content);
            }
        }
        return $this->getTwig()->render('addContent.html.twig', ['form' => $form]);
//        return $this->render('Admin/addContent.html.twig', ['form'=>$form]);
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
        $db = new ContentManager();
        $res = $db->updateOneType('content', $id, $type, $title, $date, $image, $content, $sumup);
        return $this->render('updateContent.html.twig', ['content' => $res]);
    }

    /**
     * @param $id
     * @return string
     */
    public function delete($id)
    {
        $db = new ContentManager();
        $res = $db->deleteOneType('content', $id);
        return $this->render('deleteContent.html.twig', ['content' => $res]);
    }


}

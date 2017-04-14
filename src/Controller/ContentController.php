<?php
/**
 * Created by PhpStorm.
 * User: julien
 * Date: 02/04/17
 * Time: 17:26
 */

namespace Clara\Controller;

use Clara\Form\Validator\ImageValidators;
use Del\Form\Form;
use Del\Form\Field\Text;
use Del\Form\Field\Hidden;
use Del\Form\Field\TextArea;
use Del\Form\Field\FileUpload;
use Del\Form\Field\Submit;
use Clara\Model\ContentManager;
use Del\Form\Filter\Adapter\FilterAdapterZf;
use Del\Form\Validator\Adapter\ValidatorAdapterZf;
use Zend\Validator\Between;
use Zend\Validator\Callback;
use Zend\Validator\Date;
use Zend\Validator\File\ImageSize;
use Zend\Validator\File\IsImage;

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
    public function showContent($id)
    {
        $db = new ContentManager();
        $res = $db->findOne($id);
        return $this->getTwig()->render('showContent.html.twig', ['data' => $res]);
    }

    /**
     * @param $id
     * @return string
     */
    public function showContents($type)
    {
        $em = new ContentManager();
        $datas = $em->findAll($type);
        return $this->getTwig()->render('showContents.html.twig', ['datas' => $datas, 'type' => $type]);
    }

    /**
     * @param $type
     * @return string
     */
    public function addContent($type)
    {

        $res = '';
        $form = new Form('addContent');
        $form->setEncType('multipart/form-data');
        $title = new Text('title');
        $date = new Text('date');
        $date->setValue(date('Y-m-d'));
        $dateVal = new ValidatorAdapterZf(new Date());
        $date->addValidator($dateVal);
        $image = new FileUpload('image');
        $sumup = new Text('sumup');
        $content = new \Clara\Form\Field\TextArea('content');
        $hidden = new Hidden('type');
        $submit = new Submit('submit');
        $title->setLabel('Titre :');
        $date->setLabel('Date de création (YYYY-MM-DD) :');
        $image->setLabel('Image de miniature (500px X 500px) :');
        $sumup->setLabel('Résumé de la miniature :');
        $content->setLabel('Mise en page de l\'article');
        $title->setRequired(true);
        $image->setRequired(true);
        $date->setRequired(true);
        $sumup->setRequired(true);
        $content->setRequired(true);
        $hidden->setValue($type);
        $title->setPlaceholder('Titre de l\'article');
        $sumup->setPlaceholder('Résumé de l\'article');
        $date->setPlaceholder('YYYY-MM-DD');
        $content->setClass('input-block-level');
        $image->setId('img');
        $content->setId('summernote');
        $image->setUploadDirectory('../img/upload/');
        $submit->setValue('Ajouter');
        $form->addField($title)
            ->addField($date)
            ->addField($image)
            ->addField($sumup)
            ->addField($content)
            ->addField($hidden)
            ->addField($submit);


        if (!empty($_FILES)) {
            $imageVal = new Callback([new ImageValidators(), 'isValid']);
            if (!$imageVal->isValid($_FILES['image']['tmp_name'])) {
                $message = $imageVal->getMessages();
                return $this->getTwig()->render('addContent.html.twig', ['form' => $form, 'type' => $type, 'noResult' => 'L\'image n\'est pas valide ou n\'est pas au bon format !']);
            }
        }

        if (isset($_POST['submit'])) {
            $data = $_POST;
            $form->populate($data);
            if ($form->isValid()) {
                $filteredData = $form->getValues();
                $em = new ContentManager();
                if ($em->addContent($filteredData)) {
                    $res = 'Article ajouté';
                }
                
            }
        }
        return $this->getTwig()->render('addContent.html.twig', ['form' => $form, 'type' => $type, 'result' => $res]);
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
    public function update($data)
    {
        $form = new Form('addContent');
        $title = new Text('title');
        $date = new Text('date');
        $image = new FileUpload('image');
        $sumup = new Text('sumup');
        $content = new TextArea('content');
        $hidden = new Hidden('type');
        $submit = new Submit('submit');
        $title->setLabel('Titre :');
        $date->setLabel('Date de création :');
        $image->setLabel('Image de mignature :');
        $sumup->setLabel('Résumé de la mignature :');
        $content->setLabel('Mise en page de l\'article');
        $title->setRequired(true);
        $image->setRequired(true);
        $date->setRequired(true);
        $sumup->setRequired(true);
        $content->setRequired(true);
        $hidden->setValue($type);
        $title->setPlaceholder('Titre de l\'article');
        $sumup->setPlaceholder('Résumé de l\'article');
        $date->setPlaceholder('YYYY-MM-DD');
        $content->setClass('input-block-level');
        $content->setId('summernote');
        $image->setUploadDirectory('/../img/upload/');
        $submit->setValue('Ajouter');
        $form->addField($title)
            ->addField($date)
            ->addField($image)
            ->addField($sumup)
            ->addField($content)
            ->addField($hidden)
            ->addField($submit);

        if (isset($_POST['submit'])) {
            $data = $_POST;
            $form->populate($data);
            if ($form->isValid()) {
                $filteredData = $form->getValues();
                $em = new ContentManager();
                if ($em->updateContent($filteredData)) {
                    echo 'Article Ajouté !';
                }
            }
        }
        return $this->getTwig()->render('updateContent.html.twig', ['form' => $form, 'type' => $type]);
    }

    /**
     * @param $id
     * @return string
     */
    public function delete($type, $id)
    {
        $db = new ContentManager();
        $db->deleteContent($type, $id);
        return $this->getTwig()->render('showContents.html.twig', ['type' => $type]);
    }


}

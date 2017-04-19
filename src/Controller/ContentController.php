<?php
/**
 * Created by PhpStorm.
 * User: julien
 * Date: 02/04/17
 * Time: 17:26
 */

namespace Clara\Controller;

use Clara\Form\Validator\ImageValidators;
use Clara\Model\Visibility_marraineManager;
use Del\Form\Field\Select;
use Del\Form\Form;
use Del\Form\Field\Text;
use Del\Form\Field\Hidden;
use Del\Form\Field\FileUpload;
use Del\Form\Field\Submit;
use Clara\Model\ContentManager;
use Del\Form\Validator\Adapter\ValidatorAdapterZf;
use Zend\Validator\Callback;
use Zend\Validator\Date;

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
     * @param $type
     * @param $result
     * @return string
     */
    public function showContents($type, $result)
    {
        $form='';
        $em = new ContentManager();
        if ($type == 'marraine') {
            $db = new Visibility_marraineManager();
            $actualVisibility = $db->showVisibility();
            $form = new Form('changeVisibility');
            $visibility = new Select('visibility');
            $submit = new Submit('submit');
            $submit->setValue('Changer');
            $submit->setClass('btn btn-default');
            $visibility->setValue($actualVisibility->getVisibility());
            $visibility->setLabel('Activer le recrutement des marraines ');
            $visibility->setOptions([1 => 'Oui', 0 => 'Non']);
            $form->addField($visibility)
                ->addField($submit);

            if (isset($_POST['submit'])) {
                $data = $_POST;
                $form->populate($data);
                if ($form->isValid()) {
                    $filteredData = $form->getValues();
                    if ($db->updateVisibility($filteredData)) {
                        $result = 'Modification effectuée';
                    }
                }
            }
        }
        $datas = $em->findAll($type);
        return $this->getTwig()->render('showContents.html.twig', ['datas' => $datas, 'type' => $type, 'result' => $result, 'form' => $form]);
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
        $content->setId('editor');
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
                return $this->getTwig()->render('addContent.html.twig', ['form' => $form, 'type' => $type, 'noResult' => 'L\'image n\'est pas valide ou n\'est pas au bon format de 500x500 !']);
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
     * @return string
     */
    public function updateContent($id)
    {
        $em = new ContentManager();
        $data1 = $em->findOne($id);
        $form = new Form('addContent');
        $form->setEncType('multipart/form-data');
        $title = new Text('title');
        $title->setValue($data1->getTitle());
        $date = new Text('date');
        $date->setValue($data1->getDate());
        $image = new FileUpload('image');
        //$image->setValue($data1->getImage());
        $sumup = new Text('sumup');
        $sumup->setValue($data1->getSumup());
        $content = new \Clara\Form\Field\TextArea('content');
        $content->setValue($data1->getContent());
        $hidden = new Hidden('type');
        $hidden->setValue($data1->getType());
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
        $hidden->setValue($data1->getType());
        $title->setPlaceholder('Titre de l\'article');
        $sumup->setPlaceholder('Résumé de l\'article');
        $date->setPlaceholder('YYYY-MM-DD');
        $content->setClass('input-block-level');
        $content->setId('editor');
        $image->setUploadDirectory('../img/upload/');
        $submit->setValue('Modifier');
        $form->addField($title)
            ->addField($date)
            ->addField($image)
            ->addField($sumup)
            ->addField($content)
            ->addField($hidden)
            ->addField($submit);
        $res = '';

        if (!empty($_FILES)) {
            $imageVal = new Callback([new ImageValidators(), 'isValid']);
            if (!$imageVal->isValid($_FILES['image']['tmp_name'])) {
                return $this->getTwig()->render('addContent.html.twig', ['form' => $form, 'type' => $data1->getType(), 'noResult' => 'L\'image n\'est pas valide ou n\'est pas au bon format !']);
            }
        }

        if (isset($_POST['submit'])) {
            $data = $_POST;
            $form->populate($data);
            if ($form->isValid()) {
                $filteredData = $form->getValues();

                if ($em->updateContent($filteredData, $id)) {
                    $res = 'Article Modifié !';
                }
            }
        }
        return $this->getTwig()->render('updateContent.html.twig', ['form' => $form, 'type' => $data1->getType(), 'result' => $res]);
    }

    /**
     * @param $type
     * @param $id
     * @return string
     */
    public function deleteContent($type, $id)
    {
        $db = new ContentManager();
        $res = '';
        if ($db->deleteContent($id)) {
            $res = 'Article Supprimé !';
            return $this->showContents($type, $res);
        }
    }

}

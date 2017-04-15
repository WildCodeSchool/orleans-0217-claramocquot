<?php
/**
 * Created by PhpStorm.
 * User: wilder2
 * Date: 11/04/17
 * Time: 16:52
 */

namespace Clara\Controller;

use Clara\Model\Hat;
use Clara\Model\HatManager;
use Del\Form\Form;
use Del\Form\Field\Text;
use Del\Form\Field\Submit;
use Del\Form\Field\FileUpload;
use Del\Form\Field\Select;
use Del\Form\Field\TextArea;
use Del\Form\Field\Radio;
use Del\Form\Field\Hidden;


use Del\Form\Filter\Adapter\FilterAdapterZf;
use Del\Form\Validator\Adapter\ValidatorAdapterZf;
use Zend\Filter\StripTags;
use Zend\Filter\StringTrim;
use Zend\Filter\StringToLower;


class HatController extends Controller
{

    public function addHat()
    {
        $res = '';
        $form = new Form('addHat');
        $form->setEncType('multipart/form-data');
        $name = new Text('name');
        $content = new TextArea('content');
        $price = new Text('price');
        $select = new Select('localisation');
        $select->setOptions([
            '0' => 'Accueil + Collection',
            '1' => 'Collection',
            '2' => 'Produit indisponible',
            '3' => 'Ancienne Collection',
            '4' => 'Ne pas afficher',
        ]);
        $image1 = new FileUpload('image1');
        $image2 = new FileUpload('image2');
        $image3 = new FileUpload('image3');
        $image4 = new FileUpload('image4');
        $radio = new Radio('radio');
        $radio->setRenderInline(true);
        $radio->setOptions([
            '0' => 'Image 1',
            '1' => 'Image 2',
            '2' => 'Image 3',
            '3' => 'Image 4',
        ]);
        $radio->setValue(0);
        $submit = new Submit('submit');
        $radio->setLabel('Choississez votre image de miniature :   ');
        $name->setLabel('Nom du produit');
        $content->setLabel('Description');
        $price->setLabel('Prix');
        $select->setLabel('Choississez ou l\'afficher');
        $image1->setLabel('Choississez les images de votre produit');
        $image2->setLabel('Image 2 ');
        $image3->setLabel('Image 3');
        $image4->setLabel('Image 4');
        $image1->setUploadDirectory('../img/upload');
        $image2->setUploadDirectory('../img/upload');
        $image3->setUploadDirectory('../img/upload');
        $image4->setUploadDirectory('../img/upload');

        $name->setRequired(true);
        $content->setRequired(true);
        $price->setRequired(true);
        $select->setRequired(true);
        $image1->setRequired(true);
        $radio->setRequired(true);
        $form->addField($name)
            ->addField($content)
            ->addField($price)
            ->addField($select)
            ->addField($image1)
            ->addField($image2)
            ->addField($image3)
            ->addField($image4)
            ->addField($radio)
            ->addField($submit);


        if (isset($_POST['submit'])) {
            $data = $_POST;
            $form->populate($data);
            if ($form->isValid()) {
                $filteredData = $form->getValues();
                $em = new HatManager();
                if ($em->addHat($filteredData)) {
                    $res = 'bien joue bebe';
                }
            }
        }

        return $this->getTwig()->render('addHat.html.twig', ['form' => $form, 'result' => $res]);


    }

    public function showHat($id)
    {
        $db = new HatManager();
        $res = $db->showHat($id);
        return $this->getTwig()->render('showHat.html.twig', ['hats' => $res]);
    }

    public function showHats()
    {
        $em = new HatManager();
        $datas = $em->showHats();
        return $this->getTwig()->render('showHats.html.twig', ['datas' => $datas]);
    }

    public function updateHate($id)
    {
        $form = new Form('addHat');
        $form->setEncType('multipart/form-data');
        $name = new Text('name');
        $content = new TextArea('content');
        $price = new Text('price');
        $select = new Select('localisation');
        $select->setOptions([
            '0' => 'Accueil + Collection',
            '1' => 'Collection',
            '2' => 'Produit indisponible',
            '3' => 'Ancienne Collection',
            '4' => 'Ne pas afficher',
        ]);
        $image1 = new FileUpload('image1');
        $image2 = new FileUpload('image2');
        $image3 = new FileUpload('image3');
        $image4 = new FileUpload('image4');
        $radio = new Radio('radio');
        $hiden = new Hidden($id);
        $radio->setRenderInline(true);
        $radio->setOptions([
            '0' => 'Image 1',
            '1' => 'Image 2',
            '2' => 'Image 3',
            '3' => 'Image 4',
        ]);
        $hiden->setValue($id);
        $radio->setValue(0);
        $submit = new Submit('submit');
        $radio->setLabel('Choississez votre image de miniature :   ');
        $name->setLabel('Nom du produit');
        $content->setLabel('Description');
        $price->setLabel('Prix');
        $select->setLabel('Choississez ou l\'afficher');
        $image1->setLabel('Choississez les images de votre produit');
        $image2->setLabel('Image 2 ');
        $image3->setLabel('Image 3');
        $image4->setLabel('Image 4');
        $image1->setUploadDirectory('../img/upload');
        $image2->setUploadDirectory('../img/upload');
        $image3->setUploadDirectory('../img/upload');
        $image4->setUploadDirectory('../img/upload');

        $name->setRequired(true);
        $content->setRequired(true);
        $price->setRequired(true);
        $select->setRequired(true);
        $image1->setRequired(true);
        $radio->setRequired(true);
        $form->addField($name)
            ->addField($content)
            ->addField($price)
            ->addField($select)
            ->addField($image1)
            ->addField($image2)
            ->addField($image3)
            ->addField($image4)
            ->addField($radio)
            ->addField($hiden)
            ->addField($submit);


        if (isset($_POST['submit'])) {
            $data = $_POST;
            $form->populate($data);
            if ($form->isValid()) {
                $filteredData = $form->getValues();
                $em = new HatManager();
                if ($em->updateHat($filteredData)) {
                    $res = 'Modifié bebe';
                }
            }
        }

        return $this->getTwig()->render('updateHat.html.twig', ['form' => $form, 'result' => $res]);


    }
}



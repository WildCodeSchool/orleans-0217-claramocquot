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
use Del\Form\Field\FieldInterface;

use Del\Form\Filter\Adapter\FilterAdapterZf;
use Del\Form\Validator\Adapter\ValidatorAdapterZf;
use Zend\Filter\StripTags;
use Zend\Filter\StringTrim;
use Zend\Filter\StringToLower;


class HatController extends Controller
{

    public function addHat()
    {
        $res='';
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
        $image = new FileUpload('image');
        $submit = new Submit('submit');

        $name->setLabel('Nom du produit');
        $content->setLabel('Description');
        $price->setLabel('Prix');
        $select->setLabel('Choississez ou l\'afficher');
        $image->setLabel('Choississez les images de votre produit');
        $image->setUploadDirectory('../img/upload');

        $name->setRequired(true);
        $content->setRequired(true);
        $price->setRequired(true);
        $select->setRequired(true);
        $image->setRequired(true);
        $form->addField($name)
            ->addField($content)
            ->addField($price)
            ->addField($select)
            ->addField($image)
            ->addField($submit);



        if (isset($_POST['submit'])) {
            $data = $_POST;
            $form->populate($data);
            if ($form->isValid()) {
                $filteredData = $form->getValues();
                $em = new HatManager();
                if ($em->addHat($filteredData)) {
                    $res= 'bien joue bebe';
                }
            }
        }

        return $this->getTwig()->render('addHat.html.twig', ['form' => $form, 'result'=>$res]);


    }
}



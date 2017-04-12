<?php

namespace Clara\Controller;

use Del\Form\Form;
use Del\Form\Field\Text;
use Del\Form\Field\Hidden;
use Del\Form\Field\TextArea;
use Del\Form\Field\FileUpload;
use Del\Form\Field\Submit;
use Clara\Model\HomePictureManager;
use Zend\Form\Element\Date;
use Del\Form\Field\FieldInterface;


/**
 * Class HomePictureController
 * @package Clara\Controller
 */
class HomePictureController extends Controller
{
    // Montrer toutes les images d'accueil dans l'interface adminitrateur:
    /**
     * @param $type
     * @return string
     */
    public function showHomePictures($type)
    {
        $em = new HomePictureManager();
        $datas = $em->findAll($type);
        return $this->getTwig()->render('showHomePictures.html.twig', ['datas' => $datas, 'type' => $type]);
    }

    // Uploader une image d'accueil :
    /**
     * @param $type
     * @return string
     */
    public function addHomePicture($type)
    {
        $res = '';
        $form = new Form('addHomePicture');
        $form->setEncType('multipart/form-data');
        $image = new FileUpload('image');
        $submit = new Submit('submit');
        $image->setLabel('Image d\'accueil');
        $image->setRequired(true);
        $image->setId('img');
        $image->setUploadDirectory('../img/upload/');
        $submit->setValue('Ajouter une image d\'accueil');
        $form->addField($image)
            ->addField($submit);

        if (isset($_POST['submit'])) {
            $data = $_POST;
            $form->populate($data);
            if ($form->isValid()) {
                $filteredData = $form->getValues();
                $em = new HomePictureManager();
                if ($em->addHomePicture($filteredData)) {
                    $res = 'Image d\'accueil ajoutée';
                }
            }
        }
        return $this->getTwig()->render('addHomePicture.html.twig', ['form' => $form, 'type' => $type, 'result' => $res]);
    }

    // Supprimer une image d'accueil :
    /**
     * @param $type
     * @param $id
     * @return string
     */
    public function delete($type, $id)
    {
        $db = new HomePictureManager();
        $db->deleteHomePicture($type, $id);
        return $this->getTwig()->render('showHomePictures.html.twig', ['type' => $type]);
    }

    // Afficher l'image d'accueil sur le site :
    public function EnableHomePicture();
    {
        // En attente !
    }
}

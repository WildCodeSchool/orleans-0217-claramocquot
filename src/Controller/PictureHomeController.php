<?php


namespace clara\controller;


use Clara\Model\PictureHomeManager;
use Clara\Form\Validator\ImageValidators;
use Del\Form\Field\Hidden;
use Del\Form\Field\Submit;
use Del\Form\Form;
use Del\Form\Field\FileUpload;
use Zend\Validator\Callback;

class PictureHomeController extends Controller
{

    public function showPicturesHome($res)
    {
        $em = new PictureHomeManager();
        $form = new Form('addPicture');
        $form->setEncType('multipart/form-data');
        $image = new FileUpload('name');
        $submit = new Submit('Ajouter');
        $hidden = new Hidden('visibility');
        $hidden->setValue('1');
        $image->setLabel('Ajouter une image d\'accueil (1920x1080) :');
        $image->setUploadDirectory('../img/upload/');
        $form->addField($image)
            ->addField($hidden)
            ->addField($submit);

        if (isset($_POST['Ajouter'])) {

            if (!empty($_FILES['name'])) {
                $imageVal = new Callback([new ImageValidators(), 'isValidHome']);
                if (!$imageVal->isValid($_FILES['name']['tmp_name'])) {
                    return $this->getTwig()->render('showPicturesHome.html.twig', ['form' => $form, 'noResult' => 'L\'image n\'est pas valide ou n\'est pas au bon format !']);
                }
            }
        }

        if (isset($_POST['Ajouter'])) {
            $data = $_POST;
            $form->populate($data);
            if ($form->isValid()) {
                $filteredData = $form->getValues();
                if ($em->addPictureHome($filteredData)) {
                    $res = 'Image d\'acceuil ajoutée !';
                    header('Location: index.php?route=images&res='.$res);

                }
            }
        }

        if (isset($_POST['submitVisibility'])) {
                if ($em->updatePictureHomeVisibility($_POST)) {
                    $res = 'Image d\'acceuil changée !';
                    header('Location: index.php?route=images&res='.$res);

                }
            }

        if (isset($_POST['submitDelete'])) {
                if ($em->deletePictureHome($_POST)) {
                    $res = 'Image supprimée !';
                    header('Location: index.php?route=images&res='.$res);

                }
            }

        $pictures = $em->findAll();
        return $this->getTwig()->render('showPicturesHome.html.twig', ['form' => $form, 'pictures' => $pictures, 'result' => $res]);
    }

    public function showPictureHome()
    {
        $em = new PictureHomeManager();

        return $this->getTwig()->render('showPictureHome.html.twig');
    }

    public function addPictureHome($id, $url, $visibility)
    {
        $db = new PictureHomeManager();
        $pictureHome = $db->addPictureHome('pictureHome', $id, $url, $visibility);
        return $this->render('addPictureHome.html.twig', ['pictureHome' => $pictureHome]);
    }


    public function updatePictureHome($id, $url, $visibility)
    {
        $db = new PictureHomeManager();
        $pictureHome = $db->updatePictureHome('pictureHome', $id, $url, $visibility);
        return $this->render('updatePictureHome.html.twig', ['pictureHome' => $pictureHome]);
    }


    public function deletePictureHome($id)
    {
        $db = new PictureHomeManager();
        $pictureHome = $db->deletePictureHome('pictureHome', $id);
        return $this->render('deletePictureHome.html.twig', ['pictureHome' => $pictureHome]);
    }
}
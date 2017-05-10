<?php
/**
 * Created by PhpStorm.
 * User: julien
 * Date: 12/04/17
 * Time: 20:43
 */

namespace Clara\Form\Validator;


use Zend\Validator\ValidatorInterface;

class ImageValidators implements ValidatorInterface
{
    /**
     * @var array
     */
    private $notValid = [];

    /**
     * @return mixed
     */
    public function getNotValid()
    {
        return $this->notValid;
    }

    /**
     * @param mixed $notValid
     */
    public function setNotValid($notValid)
    {
        $this->notValid = $notValid;
    }

    /**
     * @param mixed $image
     * @return bool
     */
    public function isValid($image)
    {
        if (!empty($image)) {
            if (getimagesize($image)) {
                $size = getimagesize($image);
                if ($size[0] == 700 && $size[1] == 700) {
                    return true;
                } else {
                    $this->setNotValid([0 => 'L\'image envoyée n\'est pas au bon format de 700x700!']);

                }
            } else {
                $this->setNotValid([0 => 'L\'image envoyée n\'est pas valide !']);
            }
        }
        return false;
    }

    public function isValidHome($image)
    {
        if (!empty($image)) {
            if (getimagesize($image)) {
                $size = getimagesize($image);
                if ($size[0] == 1920 && $size[1] == 1080) {
                    return true;
                } else {
                    $this->setNotValid([0 => 'L\'image envoyée n\'est pas au bon format de 700px x 700px!']);

                }
            } else {
                $this->setNotValid([0 => 'L\'image envoyée n\'est pas valide !']);
            }
        }
        return false;
    }

    /**
     * @return mixed
     */
    public function getMessages()
    {
        return $this->getNotValid();
    }
}
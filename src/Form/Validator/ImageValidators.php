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
                if ($size[0] == 500 && $size[1] == 500) {
                    return true;
                } else {
                    $this->setNotValid([0 => 'L\'image envoyée n\'est pas au bon format de 500x500!']);

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
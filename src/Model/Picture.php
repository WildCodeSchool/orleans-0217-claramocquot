<?php
/**
 * Created by PhpStorm.
 * User: julien
 * Date: 18/04/17
 * Time: 15:12
 */

namespace Clara\Model;


class Picture
{
private $id;
private $image;
private $id_hat;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param mixed $image
     */
    public function setImage($image)
    {
        $this->image = $image;
    }

    /**
     * @return mixed
     */
    public function getIdHat()
    {
        return $this->id_hat;
    }

    /**
     * @param mixed $id_hat
     */
    public function setIdHat($id_hat)
    {
        $this->id_hat = $id_hat;
    }

}
<?php
/**
 * Created by PhpStorm.
 * User: julien
 * Date: 15/04/17
 * Time: 11:45
 */

namespace Clara\Model;


class Visibility_marraine
{
    /**
     * @var int
     */
private $id;
    /**
     * @var int
     */
private $visibility;

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
    public function getVisibility()
    {
        return $this->visibility;
    }

    /**
     * @param mixed $visibility
     */
    public function setVisibility($visibility)
    {
        $this->visibility = $visibility;
    }


}
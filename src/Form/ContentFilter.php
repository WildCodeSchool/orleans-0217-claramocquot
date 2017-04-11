<?php
/**
 * Created by PhpStorm.
 * User: julien
 * Date: 07/04/17
 * Time: 12:48
 */

namespace Clara\Form;

use Zend\InputFilter\InputFilter;
use Zend\Validator\NotEmpty;
use Zend\Validator\StringLength;


class ContentFilter extends InputFilter
{
    public function __construct()
    {
        $this->add([
            'name' => 'title',
            'allow_empty' => false,
            'required' => true,
            'validators' => [[
                'name' => NotEmpty::class
            ],
                [
                    'name' => StringLength::class,
                    'options' =>
                        [
                            'max' => 5,
                        ]
                ]],
        ]);

    }
}
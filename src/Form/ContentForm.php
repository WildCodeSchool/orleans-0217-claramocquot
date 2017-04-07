<?php

namespace Clara\Form;


use Zend\Form\Element\Csrf;
use Zend\Form\Element\Text;
use Zend\Form\Form;

class ContentForm extends Form
{
    public function __construct($name = null, array $options = [])
    {
        parent::__construct($name, $options);
        $this->add([
            'type'  => Text::class,
            'name' => 'title',
            'options' => [
                'label' => 'Titre de l\'article',
            ],
        ]);

        $this->add([
            'type'  => Csrf::class,
            'name' => 'csrf',
        ]);
    }
}
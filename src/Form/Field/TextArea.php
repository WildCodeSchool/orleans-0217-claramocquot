<?php
/**
 * Created by PhpStorm.
 * User: julien
 * Date: 12/04/17
 * Time: 15:33
 */

namespace Clara\Form\Field;

use Del\Form\Filter\Adapter\FilterAdapterZf;
use Zend\Filter\StringTrim;
use Del\Form\Renderer\Field\TextAreaRender;

class TextArea extends \Del\Form\Field\TextArea
{
    public function init()
    {
        $this->setAttribute('type', 'text');
        $this->setAttribute('class', 'form-control');
        $stringTrim = new FilterAdapterZf(new StringTrim());
        $this->addFilter($stringTrim);
        $this->setRenderer(new TextAreaRender());
    }
}
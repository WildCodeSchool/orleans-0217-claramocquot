<?php

namespace clara\controller;


class Controller
{
    /**
     * @param $path
     * @param $param
     * @return string
     */
    public function render ($path, $param)
    {
        extract($param);
        ob_start();
        require '../view/'.$path;
        $buffer = ob_get_clean();
        return $buffer;
    }
}
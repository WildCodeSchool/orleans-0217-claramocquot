<?php
/**
 * Created by PhpStorm.
 * User: julien
 * Date: 07/04/17
 * Time: 18:47
 */

namespace Clara\Controller;


class UserController extends Controller
{
    public function articles($type)
    {
        $content = new HomeController(true);
        return $content->showContents($type);
    }
    public function article($id)
    {
        $content = new HomeController(true);
        return $content->showContent($id);
    }
    public function manifest()
    {
        return $this->getTwig()->render('manifest.html.twig');
    }
    public function firm()
    {
        return $this->getTwig()->render('firm.html.twig');
    }
    public function products()
    {
        return $this->getTwig()->render('products.html.twig');
    }
    public function product()
    {
        return $this->getTwig()->render('product.html.twig');
    }
    public function home()
    {
        $content = new HomeController(true);
        return $content->homeContent();
    }
}
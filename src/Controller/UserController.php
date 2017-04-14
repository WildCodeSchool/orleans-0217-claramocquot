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
    public function articles()
    {
        return $this->getTwig()->render('contents.html.twig');
    }
    public function article()
    {
        return $this->getTwig()->render('content.html.twig');
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
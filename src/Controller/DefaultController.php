<?php
/**
 * Created by PhpStorm.
 * User: julien
 * Date: 07/04/17
 * Time: 18:47
 */

namespace Clara\Controller;


class DefaultController extends Controller
{
    public function articles()
    {
        return $this->getTwig()->render('articles.html.twig');
    }
    public function article()
    {
        return $this->getTwig()->render('article.html.twig');
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
        return $this->getTwig()->render('home.html.twig');
    }
}
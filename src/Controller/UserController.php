<?php
/**
 * Created by PhpStorm.
 * User: julien
 * Date: 07/04/17
 * Time: 18:47
 */

namespace Clara\Controller;
use Clara\Controller\MailController;

class UserController extends Controller
{
    public function articles($type)
    {
        $content = new FrontController(true);
        return $content->showContents($type);
    }

    public function article($id)
    {
        $content = new FrontController(true);
        return $content->showContent($id);
    }

    public function manifest()
    {
        $msg = new MailController(true);
        if (isset($_POST['submitcontact'])) {
            $msg->contact($_POST);
            header('Location:index.php?route=manifeste');}
        return $this->getTwig()->render('manifest.html.twig');
    }

    public function firm()
    {
        $msg = new MailController(true);
        if (isset($_POST['submitcontact'])) {
            $msg->contact($_POST);
            header('Location:index.php?route=entreprise');}
        return $this->getTwig()->render('firm.html.twig');
    }

    public function products($res)
    {
        $hats= new FrontController(true);
        return $hats->showHats($res);
    }

    public function product($id)
    {
        $hat= new FrontController(true);
        return $hat->showHat($id);
    }

    public function home(){

        $content = new FrontController(true);
        return $content->homeContent();
    }
}
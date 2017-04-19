<?php
/**
 * Created by PhpStorm.
 * User: julien
 * Date: 07/04/17
 * Time: 18:47
 */

namespace Clara\Controller;

require __DIR__ . '/../../vendor/swiftmailer/swiftmailer/lib/swift_required.php';
use Swift_SmtpTransport;
use Swift_Mailer;
use Swift_Message;

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
        return $this->getTwig()->render('manifest.html.twig');
    }

    public function firm()
    {
        return $this->getTwig()->render('firm.html.twig');
    }

    public function products($res)
    {
        $hats= new FrontController(true);
        return $hats->showHats($res);
    }

    public function mailer(){

        $mail = new MailController(true);
        return $mail->product();
}
//    public function product()
//    {
//        if (isset($_POST['submit'])) {
//            $transport = Swift_SmtpTransport::newInstance('smtp.googlemail.com', 465, 'ssl')
//                ->setUsername('lefadak3@gmail.com')
//                ->setPassword('ahglagla');
//            $mailer = Swift_Mailer::newInstance($transport);
//            $message = Swift_Message::newInstance('Renseignements Commande')
//                ->setSubject('Renseignements Commande')
//                ->setFrom(array($_POST['email'] => $_POST['firstname'] . ' ' . $_POST['name']))
//                ->setTo(array('julienmartin.opto@gmail.com' => 'Julien Martin'))
//                ->setDate(time())
//                ->setBody($_POST['address'] . '<br/>' . $_POST['size'] . '<br/>' . $_POST['comment'] . '<br/>');
//            $res = $mailer->send($message);
//            echo $res;
//        }
//        return $this->getTwig()->render('product.html.twig');
//    }

    public function home()
    {
        $content = new FrontController(true);
        return $content->homeContent();
    }
}
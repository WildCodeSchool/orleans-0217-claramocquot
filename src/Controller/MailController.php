<?php
/**
 * Created by PhpStorm.
 * User: wilder2
 * Date: 18/04/17
 * Time: 14:34
 */

namespace Clara\Controller;
require __DIR__ . '/../../vendor/swiftmailer/swiftmailer/lib/swift_required.php';


class MailController extends Controller
{
    public function product()
    {
        if (isset($_POST['submit'])) {
            $transport = Swift_SmtpTransport::newInstance('smtp.googlemail.com', 465, 'ssl')
                ->setUsername('lefadak3@gmail.com')
                ->setPassword('ahglagla');
            $mailer = Swift_Mailer::newInstance($transport);
            $message = Swift_Message::newInstance('Renseignements Commande')
                ->setSubject('Renseignements Commande')
                ->setFrom(array($_POST['email'] => $_POST['firstname'] . ' ' . $_POST['name']))
                ->setTo(array('derot7@gmail.com' => 'Julien Martin'))
                ->setDate(time())
                ->addPart($_POST['address'] . '<br/>' . $_POST['size'] . '<br/>' . $_POST['comment'] . '<br/>');
            $res = $mailer->send($message);
            echo $res;
        }
        return $this->getTwig()->render('product.html.twig');
    }




}
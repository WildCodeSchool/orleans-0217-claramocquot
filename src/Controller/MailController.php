<?php
/**
 * Created by PhpStorm.
 * User: wilder2
 * Date: 18/04/17
 * Time: 14:34
 */

namespace Clara\Controller;
require __DIR__ . '/../../vendor/swiftmailer/swiftmailer/lib/swift_required.php';
use Swift_SmtpTransport;
use Swift_Mailer;
use Swift_Message;

class MailController extends Controller
{



    public function contactProduct($data)
    {
        $body = '<h1><b>Demande renseignement Produit :</b></h1><br>';
        foreach ($data as $key => $value) {
            if ($key != 'submitproduit') {
                $body .= '<b>' . $key . '</b> : ' . $value . '<br>';
            }
        }

        $transport = Swift_SmtpTransport::newInstance('smtp.googlemail.com', 465, 'ssl')
            ->setUsername('lefadak3@gmail.com')
            ->setPassword('ahglagla');
        $mailer = Swift_Mailer::newInstance($transport);
        $message = Swift_Message::newInstance('Renseignements Commande')
            ->setSubject('Renseignements Commande')
            ->setFrom(array($_POST['Email'] => $_POST['Prenom'] . ' ' . $_POST['Nom']))
            ->setReplyTo($_POST['Email'])
            ->setTo(array('derot7@gmail.com' => 'Julien Martin'))
            ->setDate(time())
            ->setBody($body, 'text/html');
        $mailer->send($message);

    }




    public function contact($data)
    {
        $body = '<h1><b>Demande renseignements :</b></h1><br>';
        foreach ($data as $key => $value) {
            if ($key != 'submitcontact') {
                $body .= '<b>' . $key . '</b> : ' . $value . '<br>';
            }
        }

        $transport = Swift_SmtpTransport::newInstance('smtp.googlemail.com', 465, 'ssl')
            ->setUsername('lefadak3@gmail.com')
            ->setPassword('ahglagla');
        $mailer = Swift_Mailer::newInstance($transport);
        $message = Swift_Message::newInstance('Prise de contact')
            ->setSubject('Prise de contact')
            ->setFrom(array($_POST['Email'] => $_POST['Prenom'] . ' ' . $_POST['Nom']))
            ->setReplyTo($_POST['Email'])
            ->setTo(array('derot7@gmail.com' => 'Julien Martin'))
            ->setDate(time())
            ->setBody($body, 'text/html');
        $mailer->send($message);
    }




    public function contactMarraine($data)
    {
        $body = '<h1><b>Demande Marraine :</b></h1><br>';
        foreach ($data as $key => $value) {
            if ($key != 'submitmarraine') {
                $body .= '<b>' . $key . '</b> : ' . $value . '<br>';
            }
        }

        $transport = Swift_SmtpTransport::newInstance('smtp.googlemail.com', 465, 'ssl')
            ->setUsername('lefadak3@gmail.com')
            ->setPassword('ahglagla');
        $mailer = Swift_Mailer::newInstance($transport);
        $message = Swift_Message::newInstance('Demande Marraine')
            ->setSubject('Demande Marraine')
            ->setFrom(array($_POST['Email'] => $_POST['Prenom'] . ' ' . $_POST['Nom']))
            ->setReplyTo($_POST['Email'])
            ->setTo(array('derot7@gmail.com' => 'Julien Martin'))
            ->setDate(time())
            ->setBody($body, 'text/html');
        $mailer->send($message);
    }


    public function contactTemoignage($data)
    {
        $body = '<h1><b>Proposition de témoignage : </b></h1><br>';
        foreach ($data as $key => $value) {
            if ($key != 'submittemoignage') {
                $body .= '<b>' . $key . '</b> : ' . $value . '<br>';
            }
        }

        $transport = Swift_SmtpTransport::newInstance('smtp.googlemail.com', 465, 'ssl')
            ->setUsername('lefadak3@gmail.com')
            ->setPassword('ahglagla');
        $mailer = Swift_Mailer::newInstance($transport);
        $message = Swift_Message::newInstance('Proposition témoignage')
            ->setSubject('Proposition témoignage')
            ->setFrom(array($_POST['Email'] => $_POST['Prenom'] . ' ' . $_POST['Nom']))
            ->setReplyTo($_POST['Email'])
            ->setTo(array('derot7@gmail.com' => 'Julien Martin'))
            ->setDate(time())
            ->setBody($body, 'text/html');
        $mailer->send($message);
    }


    public function contactPartenaire($data)
    {
        $body = '<h1><b>Proposition partenaire : </b></h1><br>';
        foreach ($data as $key => $value) {
            if ($key != 'submitpartenaire') {
                $body .= '<b>' . $key . '</b> : ' . $value . '<br>';
            }
        }

        $transport = Swift_SmtpTransport::newInstance('smtp.googlemail.com', 465, 'ssl')
            ->setUsername('lefadak3@gmail.com')
            ->setPassword('ahglagla');
        $mailer = Swift_Mailer::newInstance($transport);
        $message = Swift_Message::newInstance('Renseignements Partenaires')
            ->setSubject('Renseignements Partenaires')
            ->setFrom(array($_POST['Email'] => $_POST['Prenom'] . ' ' . $_POST['Nom']))
            ->setReplyTo($_POST['Email'])
            ->setTo(array('derot7@gmail.com' => 'Julien Martin'))
            ->setDate(time())
            ->setBody($body, 'text/html');
        $mailer->send($message);
    }

}
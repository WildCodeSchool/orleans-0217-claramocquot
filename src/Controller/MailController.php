<?php
/**
 * Created by PhpStorm.
 * User: julien
 * Date: 15/04/17
 * Time: 20:31
 */

namespace Clara\Controller;


class MailController extends Controller
{

    public function sendMail($data)
    {
        if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $mail)) {
            $lineBreak = "\r\n";
        } else {
            $lineBreak = "\n";
        }
        $header = "From: \"WeaponsB\"<weaponsb@mail.fr>" . $lineBreak;
        $header .= "Reply-to: \"WeaponsB\" <weaponsb@mail.fr>" . $lineBreak;
        $header .= "MIME-Version: 1.0" . $lineBreak;
        $header .= "Content-Type: multipart/alternative;" . $lineBreak . " boundary=\"$boundary\"" . $lineBreak;
    }
}
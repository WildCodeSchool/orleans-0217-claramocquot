<?php
/**
 * Created by PhpStorm.
 * User: wilder2
 * Date: 12/04/17
 * Time: 09:54
 */

namespace Clara\Model;


use Clara\DB;
use Doctrine\DBAL\Driver\PDOException;

class HatManager extends DB
{
    public function addHat($form)
    {
        if ($form['localisation'] == 0) {


            $new_prod = 1;
            $product = 0;
            $unavailable = 0;
            $old = 0;
            $hide = 0;
        } elseif ($form['localisation'] == 1) {


            $new_prod = 0;
            $product = 1;
            $unavailable = 0;
            $old = 0;
            $hide = 0;
        } elseif ($form['localisation'] == 2) {


            $new_prod = 0;
            $product = 0;
            $unavailable = 1;
            $old = 0;
            $hide = 0;
        } elseif ($form['localisation'] == 3) {


            $new_prod = 0;
            $product = 0;
            $unavailable = 0;
            $old = 1;
            $hide = 0;
        } elseif ($form['localisation'] == 4) {


            $new_prod = 0;
            $product = 0;
            $unavailable = 0;
            $old = 0;
            $hide = 1;
        }
        $req = "INSERT INTO  hat (content, price, name, new_prod, product, unavailable, old, hide) 
                VALUES (:content, :price, :name, :new_prod, :product, :unavailable, :old, :hide)";

        $prep = $this->db->prepare($req);
        $prep->bindValue(':content', $form['content'], \PDO::PARAM_STR);
        $prep->bindValue(':price', $form['price'], \PDO::PARAM_INT);
        $prep->bindValue(':name', $form['name'], \PDO::PARAM_STR);
        $prep->bindValue(':new_prod', $new_prod, \PDO::PARAM_INT);
        $prep->bindValue(':product', $product, \PDO::PARAM_INT);
        $prep->bindValue(':unavailable', $unavailable, \PDO::PARAM_INT);
        $prep->bindValue(':old', $old, \PDO::PARAM_INT);
        $prep->bindValue(':hide', $hide, \PDO::PARAM_INT);
        $prep->execute();


        $lastid = $this->db->lastInsertId();

        $req2 = "INSERT INTO picture (image, id_hat) VALUES (:img, :idhat)";
        $prep2 = $this->db->prepare($req2);
        $prep2->bindValue(':img', $form['image']);
        $prep2->bindValue(':idhat', $lastid);
        $prep2->execute();



        $res = true;
        return $res;
    }

    public function showHat(){

        $req = "SELECT * FROM hat";



    }
}



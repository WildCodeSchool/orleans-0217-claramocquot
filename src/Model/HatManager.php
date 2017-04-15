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
        $new_prod = $product = $unavailable = $old = $hide = 0;
        if ($form['localisation'] == 0) {
            $new_prod = 1;
        } elseif ($form['localisation'] == 1) {
            $product = 1;
        } elseif ($form['localisation'] == 2) {
            $unavailable = 1;
        } elseif ($form['localisation'] == 3) {
            $old = 1;
        } elseif ($form['localisation'] == 4) {
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



        $radio1 = $radio2 = $radio3 = $radio4 = 0;
        if ($form['radio'] == 0) {
            $radio1 = 1;
        } elseif ($form['radio'] == 1) {
            $radio2 = 1;
        } elseif ($form['radio'] == 2) {
            $radio3 = 1;
        } elseif ($form['radio'] == 3) {
            $radio4 = 1;
        }
        $lastid = $this->db->lastInsertId();

        $req2 = "INSERT INTO picture (image, id_hat, radio) VALUES (:img, :idhat, :radio)";
        $prep2 = $this->db->prepare($req2);
        $prep2->bindValue(':img', $form['image1']);
        $prep2->bindValue(':idhat', $lastid);
        $prep2->bindValue(':radio', $radio1);
        $prep2->execute();

        if (!empty($form['image2'])) {
            $req3 = "INSERT INTO picture (image, id_hat, radio) VALUES (:img, :idhat, :radio)";
            $prep3 = $this->db->prepare($req3);
            $prep3->bindValue(':img', $form['image2']);
            $prep3->bindValue(':idhat', $lastid);
            $prep3->bindValue(':radio', $radio2);

            $prep3->execute();
        }
        if (!empty($form['image3'])) {
            $req4 = "INSERT INTO picture (image, id_hat, radio) VALUES (:img, :idhat, :radio)";
            $prep4 = $this->db->prepare($req4);
            $prep4->bindValue(':img', $form['image3']);
            $prep4->bindValue(':idhat', $lastid);
            $prep4->bindValue(':radio', $radio3);

            $prep4->execute();
        }
        if (!empty($form['image4'])) {
            $req5 = "INSERT INTO picture (image, id_hat, radio) VALUES (:img, :idhat, :radio)";
            $prep5 = $this->db->prepare($req5);
            $prep5->bindValue(':img', $form['image4']);
            $prep5->bindValue(':idhat', $lastid);
            $prep5->bindValue(':radio', $radio4);

            $prep5->execute();
        }


        $res = true;
        return $res;
    }

    public function showHat($id)
    {
        $req = "SELECT * FROM picture JOIN hat ON picture.id_hat=hat.id WHERE id_hat=:id";
        $prep = $this->db->prepare($req);
        $prep->bindValue(':id', $id, \PDO::PARAM_INT);
        $prep->execute();
        $res = $prep->fetchAll(\PDO::FETCH_CLASS, __NAMESPACE__ . '\\' . ucfirst('hat'));
        return $res;
    }

    public function showHats()
    {

        $req = "SELECT * FROM picture JOIN hat ON picture.id_hat=hat.id WHERE radio=1";
        $prep = $this->db->prepare($req);
        $prep->execute();
        $res = $prep->fetchAll(\PDO::FETCH_CLASS, __NAMESPACE__ . '\\' . ucfirst('hat'));
        return $res;


    }

    public function updateHat($table, $id, $content, $price, $name, $new_prod, $product, $unavailable, $old, $hide){


        $req = "UPDATE $table SET (content=:content, price=:price, name=:name, new_prod=:new_prod, product=:product, unavailable=:unavailable, old=:old, hide=:hide) WHERE id=:id";
        $prep = $this->db->prepare($req);
        $prep->bindValue(':id', $id, \PDO::PARAM_INT);
        $prep->bindValue(':content', $content, \PDO::PARAM_STR);
        $prep->bindValue(':price', $price, \PDO::PARAM_STR);
        $prep->bindValue(':name', $name, \PDO::PARAM_STR);
        $prep->bindValue(':new_prod', $new_prod, \PDO::PARAM_STR);
        $prep->bindValue(':product', $product, \PDO::PARAM_STR);
        $prep->bindValue(':unavailable', $unavailable, \PDO::PARAM_STR);
        $prep->bindValue(':old', $old, \PDO::PARAM_STR);
        $prep->bindValue(':hide', $hide, \PDO::PARAM_STR);
        $prep->execute();
        $res = 'Element modifié';
        return $res;

    }
}



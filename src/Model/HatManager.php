<?php
/**
 * Created by PhpStorm.
 * User: wilder2
 * Date: 12/04/17
 * Time: 09:54
 */

namespace Clara\Model;


use Clara\Model\DB;
use Doctrine\DBAL\Driver\PDOException;

class HatManager extends DB
{
    public function addHat($form)
    {
        $res = '';
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


        $lastid = $this->db->lastInsertId();

        $req2 = "INSERT INTO picture (image, id_hat) VALUES (:img, :idhat)";
        $prep2 = $this->db->prepare($req2);
        $prep2->bindValue(':img', $form['image1']);
        $prep2->bindValue(':idhat', $lastid);
        $prep2->execute();

        if (!empty($form['image2'])) {
            $req3 = "INSERT INTO picture (image, id_hat) VALUES (:img, :idhat)";
            $prep3 = $this->db->prepare($req3);
            $prep3->bindValue(':img', $form['image2']);
            $prep3->bindValue(':idhat', $lastid);

            $prep3->execute();
        }
        if (!empty($form['image3'])) {
            $req4 = "INSERT INTO picture (image, id_hat) VALUES (:img, :idhat)";
            $prep4 = $this->db->prepare($req4);
            $prep4->bindValue(':img', $form['image3']);
            $prep4->bindValue(':idhat', $lastid);

            $prep4->execute();
        }
        if (!empty($form['image4'])) {
            $req5 = "INSERT INTO picture (image, id_hat) VALUES (:img, :idhat)";
            $prep5 = $this->db->prepare($req5);
            $prep5->bindValue(':img', $form['image4']);
            $prep5->bindValue(':idhat', $lastid);

            $res = $prep5->execute();
        }

$res = 'Chapeau Ajouté';
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
        $req = "SELECT min(picture.image) as image, hat.* 
                FROM mocquot.picture JOIN hat ON picture.id_hat = hat.id 
                GROUP BY id_hat ORDER BY id_hat DESC ";
        $prep = $this->db->prepare($req);
        $prep->execute();
        $res = $prep->fetchAll(\PDO::FETCH_CLASS, __NAMESPACE__ . '\\' . ucfirst('hat'));
        return $res;
    }

    public function showNewHats()
    {
        $req = "SELECT min(picture.image) as image, hat.* 
                FROM mocquot.picture JOIN hat ON picture.id_hat = hat.id 
                WHERE new_prod=1 GROUP BY id_hat ORDER BY id_hat DESC ";
        $prep = $this->db->prepare($req);
        $prep->execute();
        $res = $prep->fetchAll(\PDO::FETCH_CLASS, __NAMESPACE__ . '\\' . ucfirst('hat'));
        return $res;
    }

    public function updateHat($data, $id)
    {

        $new_prod = $product = $unavailable = $old = $hide = 0;
        if ($data['localisation'] == 0) {
            $new_prod = 1;
        } elseif ($data['localisation'] == 1) {
            $product = 1;
        } elseif ($data['localisation'] == 2) {
            $unavailable = 1;
        } elseif ($data['localisation'] == 3) {
            $old = 1;
        } elseif ($data['localisation'] == 4) {
            $hide = 1;
        }


        $req = "UPDATE hat SET content=:content, price=:price, name=:name, new_prod=:new_prod, product=:product, unavailable=:unavailable, old=:old, hide=:hide WHERE id=:id";
        $prep = $this->db->prepare($req);
        $prep->bindValue(':id', $id, \PDO::PARAM_INT);
        $prep->bindValue(':content', $data['content'], \PDO::PARAM_STR);
        $prep->bindValue(':price', $data['price'], \PDO::PARAM_STR);
        $prep->bindValue(':name', $data['name'], \PDO::PARAM_STR);
        $prep->bindValue(':new_prod', $new_prod, \PDO::PARAM_INT);
        $prep->bindValue(':product', $product, \PDO::PARAM_INT);
        $prep->bindValue(':unavailable', $unavailable, \PDO::PARAM_INT);
        $prep->bindValue(':old', $old, \PDO::PARAM_INT);
        $prep->bindValue(':hide', $hide, \PDO::PARAM_INT);
        $prep->execute();

        $req2 = "SELECT * FROM picture WHERE id_hat=:id";
        $prep2 = $this->db->prepare($req2);
        $prep2->bindValue(':id', $id, \PDO::PARAM_INT);
        $prep2->execute();
        $imagesHat = $prep2->fetchAll(\PDO::FETCH_CLASS, __NAMESPACE__ . '\\' . ucfirst('picture'));

        foreach ($imagesHat as $index => $imageHat) {
            if (!empty($data['image' . ($index + 1)])) {
                $req3 = "UPDATE picture SET image =:image WHERE id=:id";
                $prep3 = $this->db->prepare($req3);
                $prep3->bindValue(':image', $data['image' . ($index + 1)], \PDO::PARAM_STR);
                $prep3->bindValue(':id', $imageHat->getId(), \PDO::PARAM_INT);
                $prep3->execute();
            }
        }
        for ($i = 1; $i <= 4; $i++) {
            if (!empty($data['image'. ($i+1)]) && !isset($imagesHat[$i])) {
                $req4 = "INSERT INTO picture (image, id_hat) VALUES (:img, :idhat)";
                $prep4 = $this->db->prepare($req4);
                $prep4->bindValue(':img', $data['image'. ($i+1)], \PDO::PARAM_STR);
                $prep4->bindValue(':idhat', $id, \PDO::PARAM_INT);
                $prep4->execute();
            }

        }
        $res = 'Element modifié';
        return $res;
    }

    public function deleteHat($id)
    {
        $req = "DELETE FROM hat WHERE id = :id";
        $prep = $this->db->prepare($req);
        $prep->bindValue(':id', $id);
        $res = $prep->execute();
        return $res;
    }
}



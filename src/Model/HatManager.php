<?php
/**
 * Created by PhpStorm.
 * User: wilder2
 * Date: 12/04/17
 * Time: 09:54
 */

namespace Clara\Model;


use Clara\DB;

class HatManager extends DB
{
    public function addHat($form)
    {


        if ($form['localisation'] = 0) {


            $new_prod = 1;
            $product = 0;
            $unavailable = 0;
            $old = 0;
            $hide = 0;
        } elseif ($form['localisation'] = 1) {


            $new_prod = 0;
            $product = 1;
            $unavailable = 0;
            $old = 0;
            $hide = 0;
        } elseif ($form['localisation'] = 2) {


            $new_prod = 0;
            $product = 0;
            $unavailable = 1;
            $old = 0;
            $hide = 0;
        } elseif ($form['localisation'] = 3) {


            $new_prod = 0;
            $product = 0;
            $unavailable = 0;
            $old = 1;
            $hide = 0;
        } elseif ($form['localisation'] = 4) {


            $new_prod = 0;
            $product = 0;
            $unavailable = 0;
            $old = 0;
            $hide = 1;
        }
        /**
         * @param $table
         * @param $content
         * @param $name
         * @param $price
         * @param $new_prod
         * @param $product
         * @param $unavailable
         * @param $old
         * @param $hide
         * @return string
         */

        $req ="INSERT INTO  table(content, price, name, new_prod, product, unavailable, old, hide,) VALUES (content = :content, price = :price, name = :name, new_prod= :new_prod ,product = :product, unavailable = :unavailable, old = :old, hide = :hide)";

        $prep = $this->db->prepare($req);
        $prep->bindValue(':table', 'hat', \PDO::PARAM_STR);
        $prep->bindValue(':content', $content->getContent(), \PDO::PARAM_STR);
        $prep->bindValue(':price', $price-> getPrice(), \PDO::PARAM_INT);
        $prep->bindValue(':name',$name-> getName(), \PDO::PARAM_STR);
        $prep->bindValue(':new_prod', $new_prod->getNew_Prod(), \PDO::PARAM_STR);
        $prep->bindValue(':product', $product->getProduct(),\PDO::PARAM_STR);
        $prep->bindValue(':unavailable',$unavailable->getUnavailable(), \PDO::PARAM_STR);
        $prep->bindValue(':old',$old->getOld(), \PDO::PARAM_STR);
        $prep->bindValue(':hide',$hide->getHide, \PDO::PARAM_STR);
        $prep->execute();

//        $req= "INSERT INTO picture (image, id_hat) VALUES ()"






        $res='bien joué bebe';
        echo $res;


    }

}



<?php
/**
 * Created by PhpStorm.
 * User: julien
 * Date: 15/04/17
 * Time: 11:47
 */

namespace Clara\Model;


use Clara\Model\DB;
use Clara\Model\Visibility_marraine;

class Visibility_marraineManager extends DB
{
    public function showVisibility()
    {
        $req = "SELECT * FROM visibility_marraine";
        $prep = $this->db->prepare($req);
        $prep->execute();
        $res = $prep->fetchAll(\PDO::FETCH_CLASS, __NAMESPACE__ . '\\' . ucfirst('visibility_marraine'));
        return $res[0];
    }

    public function updateVisibility($data)
    {
        $req = "UPDATE visibility_marraine SET visibility= :visibility";
        $prep = $this->db->prepare($req);
        $prep->bindValue(':visibility', $data['visibility'], \PDO::PARAM_INT);
        $res = $prep->execute();
        return $res;
    }
}
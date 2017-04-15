<?php
/**
 * Created by PhpStorm.
 * User: julien
 * Date: 08/04/17
 * Time: 15:38
 */

namespace Clara\Model;


use Clara\Model\DB;

class PictureHomeManager extends DB
{

    // mocquot_picture_home

    /**
     * @param $table
     * @param $id
     * @param $url
     * @param $visibility
     */
    public function addPictureHome($table, $id, $url, $visibility)
    {
        $req = "INSERT INTO $table(id, url, visibility) VALUES(:id, :url, :visibility)";
        $prep = $this->db->prepare($req);
        $prep->bindValue(':id', $id, \PDO::PARAM_STR);
        $prep->bindValue(':url', $url, \PDO::PARAM_STR);
        $prep->bindValue(':visibility', $visibility, \PDO::PARAM_INT);
        $prep->execute();
        $res = 'Élément ajouté.';
        return $res;
    }

    /**
     * @param $table
     * @param $id
     * @param $url
     * @param $visibility
     * @return string
     */
    public function updatePictureHome($table, $id, $url, $visibility)
    {
        $req = "UPDATE $table SET (id=:id, url=:url, visibility=:visibility) WHERE id=:id";
        $prep = $this->db->prepare($req);
        $prep->bindValue(':id', $id, \PDO::PARAM_INT);
        $prep->bindValue(':url', $url, \PDO::PARAM_STR);
        $prep->bindValue(':visibility', $visibility, \PDO::PARAM_INT);
        $prep->execute();
        $res = 'Élément modifié.';
        return $res;
    }

    public function deletePictureHome($table, $id)
    {
        $req = "DELETE FROM $table WHERE id=:id";
        $prep = $this->db->prepare($req);
        $prep->bindValue(':id', $id, \PDO::PARAM_INT);
        $prep->execute();
        $res = 'Élément supprimé';
        return $res;
    }
}
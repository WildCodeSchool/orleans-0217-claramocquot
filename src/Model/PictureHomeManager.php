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

    public function findAll()
    {
        $req = "SELECT * FROM picture_home ORDER BY id DESC";
        $prep = $this->db->prepare($req);
        $prep->execute();
        $res = $prep->fetchAll(\PDO::FETCH_CLASS, __NAMESPACE__ . '\\' . ucfirst('pictureHome'));
        return $res;
    }

    public function findPictureHome()
    {
        $req = "SELECT * FROM picture_home WHERE visibility=1";
        $prep = $this->db->prepare($req);
        $prep->execute();
        $res = $prep->fetchAll(\PDO::FETCH_CLASS, __NAMESPACE__ . '\\' . ucfirst('pictureHome'));
        return $res[0];
    }

    /**
     * @param $table
     * @param $id
     * @param $url
     * @param $visibility
     */
    public function addPictureHome($data)
    {
        $this->resetPictureHomeVisibility();
        $req = "INSERT INTO picture_home(name, visibility) VALUES(:name, :visibility)";
        $prep = $this->db->prepare($req);
        $prep->bindValue(':name', $data['name'], \PDO::PARAM_STR);
        $prep->bindValue(':visibility', $data['visibility'], \PDO::PARAM_INT);
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
    public function resetPictureHomeVisibility()
    {
        $req = "UPDATE picture_home SET visibility=:visibility";
        $prep = $this->db->prepare($req);
        $prep->bindValue(':visibility', 0, \PDO::PARAM_INT);
        $res=$prep->execute();
        return $res;
    }

    public function updatePictureHomeVisibility($data)
    {
        $this->resetPictureHomeVisibility();
        $req = "UPDATE picture_home SET visibility=:visibility WHERE id=:id";
        $prep = $this->db->prepare($req);
        $prep->bindValue(':id', $data['id'], \PDO::PARAM_INT);
        $prep->bindValue(':visibility', '1', \PDO::PARAM_INT);
        $res=$prep->execute();
        return $res;
    }


    public function deletePictureHome($data)
    {
        $req = "DELETE FROM picture_home WHERE id=:id";
        $prep = $this->db->prepare($req);
        $prep->bindValue(':id', $data['id'], \PDO::PARAM_INT);
        $res=$prep->execute();
        return $res;
    }
}
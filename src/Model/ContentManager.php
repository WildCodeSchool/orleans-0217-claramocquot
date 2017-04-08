<?php
/**
 * Created by PhpStorm.
 * User: julien
 * Date: 08/04/17
 * Time: 15:36
 */

namespace Clara\Model;


use Clara\DB;

class ContentManager extends DB
{

    /**
     * @param $table
     * @return array
     */
    public function findAllContentType($table, $type)
    {
        $req = "SELECT * FROM $table WHERE type=:type";
        $prep = $this->db->prepare($req);
        $prep->bindValue(':type', $type, \PDO::PARAM_STR);
        $prep->execute();
        $res = $prep->fetchAll(\PDO::FETCH_CLASS, __NAMESPACE__ . '\model\\' . ucfirst($table));

        return $res;
    }

    /**
     * @param $table
     * @param $id
     * @return mixed
     */
    public function findOneContentType($table, $id)
    {
        $req = "SELECT * FROM $table WHERE id=:id";
        $prep = $this->db->prepare($req);
        $prep->bindValue(':id', $id, \PDO::PARAM_INT);
        $prep->execute();
        $res = $prep->fetchAll(\PDO::FETCH_CLASS, __NAMESPACE__ . '\model\\' . ucfirst($table));

        return $res[0];
    }

    /**
     * @param $table
     * @param $type
     * @param $title
     * @param $date
     * @param $image
     * @param $content
     * @param $sumup
     * @return string
     */
    public function addOneContent($table, $type, $title, $date, $image, $content, $sumup)
    {
        $req = "INSERT INTO $table(type, title, date, image, content, sumup) VALUES(:type, :title, :date, :image, :content, :sumup)";
        $prep = $this->db->prepare($req);
        $prep->bindValue(':type', $type, \PDO::PARAM_STR);
        $prep->bindValue(':title', $title, \PDO::PARAM_STR);
        $prep->bindValue(':date', $date, \PDO::PARAM_STR);
        $prep->bindValue(':img', $image, \PDO::PARAM_STR);
        $prep->bindValue(':content', $content, \PDO::PARAM_STR);
        $prep->bindValue(':sumup', $sumup, \PDO::PARAM_STR);
        $prep->execute();
        $res = 'Element ajouté';
        return $res;
    }

    /**
     * @param $table
     * @param $id
     * @return mixed
     */
    public function updateOneContent($table, $id, $type, $title, $date, $image, $content, $sumup)
    {
        $req = "UPDATE $table SET (type=:type, title=:title,  date=:date,  image=:image, content=:content, sumup=:sumup) WHERE id=:id";
        $prep = $this->db->prepare($req);
        $prep->bindValue(':id', $id, \PDO::PARAM_INT);
        $prep->bindValue(':type', $type, \PDO::PARAM_STR);
        $prep->bindValue(':title', $title, \PDO::PARAM_STR);
        $prep->bindValue(':date', $date, \PDO::PARAM_STR);
        $prep->bindValue(':img', $image, \PDO::PARAM_STR);
        $prep->bindValue(':content', $content, \PDO::PARAM_STR);
        $prep->bindValue(':sumup', $sumup, \PDO::PARAM_STR);
        $prep->execute();
        $res = 'Element modifié';
        return $res;
    }

    /**
     * @param $table
     * @param $id
     * @return mixed
     */
    public function deleteOneContent($table, $id)
    {
        $req = "DELETE FROM $table WHERE id=:id";
        $prep = $this->db->prepare($req);
        $prep->bindValue(':id', $id, \PDO::PARAM_INT);
        $prep->execute();
        $res = 'Element supprimé';
        return $res;
    }

}
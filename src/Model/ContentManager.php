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
    public function findAll($type)
    {
        $req = "SELECT * FROM content WHERE type=:type";
        $prep = $this->db->prepare($req);
        $prep->bindValue(':type', $type, \PDO::PARAM_STR);
        $prep->execute();
        $res = $prep->fetchAll(\PDO::FETCH_CLASS, __NAMESPACE__ . '\\' . ucfirst('content'));
        return $res;
    }

    /**
     * @param $table
     * @param $id
     * @return mixed
     */
    public function findOne($id)
    {
        $req = "SELECT * FROM content WHERE id=:id";
        $prep = $this->db->prepare($req);
        $prep->bindValue(':id', $id, \PDO::PARAM_INT);
        $prep->execute();
        $res = $prep->fetchAll(\PDO::FETCH_CLASS, __NAMESPACE__ . '\\' . ucfirst(content));

        return $res[0];
    }

    /**
     * @param $data
     * @return string
     */
    public function addContent($data)
    {
        $req = "INSERT INTO content(type, title, date, image, content, sumup) VALUES(:type, :title, :date, :image, :content, :sumup)";
        $prep = $this->db->prepare($req);
        $prep->bindValue(':type', $data['type'], \PDO::PARAM_STR);
        $prep->bindValue(':title', $data['title'], \PDO::PARAM_STR);
        $prep->bindValue(':date', $data['date'], \PDO::PARAM_STR);
        $prep->bindValue(':image', $data['image'], \PDO::PARAM_STR);
        $prep->bindValue(':content', $data['content'], \PDO::PARAM_STR);
        $prep->bindValue(':sumup', $data['sumup'], \PDO::PARAM_STR);
        $prep->execute();
        $res = true;
        return $res;
    }

    /**
     * @param $table
     * @param $id
     * @return mixed
     */
    public function updateContent($table, $id, $type, $title, $date, $image, $content, $sumup)
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
    public function deleteContent($table, $id)
    {
        $req = "DELETE FROM $table WHERE id=:id";
        $prep = $this->db->prepare($req);
        $prep->bindValue(':id', $id, \PDO::PARAM_INT);
        $prep->execute();
        $res = 'Element supprimé';
        return $res;
    }

}
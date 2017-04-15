<?php
/**
 * Created by PhpStorm.
 * User: julien
 * Date: 08/04/17
 * Time: 15:36
 */

namespace Clara\Model;


use Clara\DB;

/**
 * Class ContentManager
 * @package Clara\Model
 */
class ContentManager extends DB
{

    /**
     * @param $type
     * @return array
     */
    public function findAll($type)
    {
        $req = "SELECT * FROM content WHERE type=:type ORDER BY id DESC";
        $prep = $this->db->prepare($req);
        $prep->bindValue(':type', $type, \PDO::PARAM_STR);
        $prep->execute();
        $res = $prep->fetchAll(\PDO::FETCH_CLASS, __NAMESPACE__ . '\\' . ucfirst('content'));
        return $res;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function findOne($id)
    {
        $req = "SELECT * FROM content WHERE id=:id";
        $prep = $this->db->prepare($req);
        $prep->bindValue(':id', $id, \PDO::PARAM_INT);
        $prep->execute();
        $res = $prep->fetchAll(\PDO::FETCH_CLASS, __NAMESPACE__ . '\\' . ucfirst('content'));
        return $res[0];
    }

    public function findLastType($type)
    {
        $req = "SELECT * FROM content WHERE type=:type ORDER BY id DESC LIMIT 0,1";
        $prep = $this->db->prepare($req);
        $prep->bindValue(':type', $type, \PDO::PARAM_STR);
        $prep->execute();
        $res = $prep->fetchAll(\PDO::FETCH_CLASS, __NAMESPACE__ . '\\' . ucfirst('content'));
        return $res[0];
    }

    /**
     * @param $data
     * @return bool
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
        $res = $prep->execute();
        return $res;
    }

    /**
     * @param $data
     * @param $id
     * @return bool
     */
    public function updateContent($data, $id)
    {
        $req = "UPDATE content SET title=:title,  date=:date,  image=:image, content=:content, sumup=:sumup WHERE id=:id";
        $prep = $this->db->prepare($req);
        $prep->bindValue(':id', $id, \PDO::PARAM_INT);
        $prep->bindValue(':title', $data['title'], \PDO::PARAM_STR);
        $prep->bindValue(':date', $data['date'], \PDO::PARAM_STR);
        $prep->bindValue(':image', $data['image'], \PDO::PARAM_STR);
        $prep->bindValue(':content', $data['content'], \PDO::PARAM_STR);
        $prep->bindValue(':sumup', $data['sumup'], \PDO::PARAM_STR);
        $res = $prep->execute();
        return $res;
    }

    /**
     * @param $id
     * @return bool
     */
    public function deleteContent($id)
    {
        $req = "DELETE FROM content WHERE id=:id";
        $prep = $this->db->prepare($req);
        $prep->bindValue(':id', $id, \PDO::PARAM_INT);
        $res = $prep->execute();
        return $res;
    }
}
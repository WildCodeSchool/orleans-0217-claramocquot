<?php


namespace clara;

class DB
{
    /**
     * @var \PDO
     */
    private $db;

    /**
     * DB constructor.
     */
    public function __construct()
    {
        $this->db = new \PDO(DSN, USER, PASS);
    }

    /**
     * @param $table
     * @return array
     */
    public function findAll($table)
    {
        $req = "SELECT * FROM $table";
        $res = $this->db->query($req);
        return $res->fetchAll(\PDO::FETCH_CLASS, __NAMESPACE__ . '\model\\' . ucfirst($table));
    }

    /**
     * @param $table
     * @param $id
     * @return mixed
     */
    public function findOne($table, $id)
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
     * @return array
     */
    public function findAllType($table, $type)
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
    public function findOneType($table, $id)
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
     * @param $id
     * @return mixed
     */
    public function addOneType($table, $title, $type, $content, $visibility, $date, $img, $sumup)
    {
        $req = "INSERT INTO $table(title, type, content, visibility, date, img, sumup) VALUES(:title, :type, :content, :date, :img, :sumup)";
        $prep = $this->db->prepare($req);
        $prep->bindValue(':title', $title, \PDO::PARAM_STR);
        $prep->bindValue(':type', $type, \PDO::PARAM_STR);
        $prep->bindValue(':content', $content, \PDO::PARAM_STR);
        $prep->bindValue(':visibility', $visibility, \PDO::PARAM_STR);
        $prep->bindValue(':date', $date, \PDO::PARAM_STR);
        $prep->bindValue(':img', $img, \PDO::PARAM_STR);
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
    public function updateOneType($table, $id, $title, $type, $content, $visibility, $date, $img, $sumup)
    {
        $req = "UPDATE $table SET (title=:title, type=:type, content=:content, visibility=;visibility, date=:date, img=:img, sumup=:sumup) WHERE id=:id";
        $prep = $this->db->prepare($req);
        $prep->bindValue(':id', $id, \PDO::PARAM_INT);
        $prep->bindValue(':title', $title, \PDO::PARAM_STR);
        $prep->bindValue(':type', $type, \PDO::PARAM_STR);
        $prep->bindValue(':content', $content, \PDO::PARAM_STR);
        $prep->bindValue(':visibility', $visibility, \PDO::PARAM_STR);
        $prep->bindValue(':date', $date, \PDO::PARAM_STR);
        $prep->bindValue(':img', $img, \PDO::PARAM_STR);
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
    public function deleteOneType($table, $id)
    {
        $req = "DELETE FROM $table WHERE id=:id";
        $prep = $this->db->prepare($req);
        $prep->bindValue(':id', $id, \PDO::PARAM_INT);
        $prep->execute();
        $res = 'Element supprimé';

        return $res;
    }

}
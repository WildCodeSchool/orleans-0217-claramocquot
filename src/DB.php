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
    public function findOneType($table, $type, $id)
    {
        $req = "SELECT * FROM $table WHERE id=:id && type=:type";
        $prep = $this->db->prepare($req);
        $prep->bindValue(':id', $id, \PDO::PARAM_INT);
        $prep->bindValue(':type', $type, \PDO::PARAM_STR);
        $prep->execute();
        $res = $prep->fetchAll(\PDO::FETCH_CLASS, __NAMESPACE__ . '\model\\' . ucfirst($table));

        return $res[0];
    }

    /**
     * @param $table
     * @param $id
     * @return mixed
     */
    public function addOneType($table, $type)
    {
        $req = "INSERT INTO * FROM $table WHERE id=:id && type=:type";
        $prep = $this->db->prepare($req);
        $prep->bindValue(':type', $type, \PDO::PARAM_STR);
        $prep->execute();
        $res = $prep->fetchAll(\PDO::FETCH_CLASS, __NAMESPACE__ . '\model\\' . ucfirst($table));

        return $res[0];
    }

    /**
     * @param $table
     * @param $id
     * @return mixed
     */
    public function updateOneType($table, $type, $id)
    {
        $req = "SELECT * FROM $table WHERE id=:id && type=:type";
        $prep = $this->db->prepare($req);
        $prep->bindValue(':id', $id, \PDO::PARAM_INT);
        $prep->bindValue(':type', $type, \PDO::PARAM_STR);
        $prep->execute();
        $res = $prep->fetchAll(\PDO::FETCH_CLASS, __NAMESPACE__ . '\model\\' . ucfirst($table));

        return $res[0];
    }

    /**
     * @param $table
     * @param $id
     * @return mixed
     */
    public function deleteOneType($table, $type, $id)
    {
        $req = "SELECT * FROM $table WHERE id=:id && type=:type";
        $prep = $this->db->prepare($req);
        $prep->bindValue(':id', $id, \PDO::PARAM_INT);
        $prep->bindValue(':type', $type, \PDO::PARAM_STR);
        $prep->execute();
        $res = $prep->fetchAll(\PDO::FETCH_CLASS, __NAMESPACE__ . '\model\\' . ucfirst($table));

        return $res[0];
    }

}
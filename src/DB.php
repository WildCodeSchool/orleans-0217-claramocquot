<?php


namespace Clara;

class DB
{
    /**
     * @var \PDO
     */
    protected $db;

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

}




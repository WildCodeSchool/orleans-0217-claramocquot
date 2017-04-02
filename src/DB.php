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
    public function findAll($table) {
        $req = "SELECT * FROM $table";
        $res = $this->db->query($req);
        return $res->fetchAll(\PDO::FETCH_CLASS, __NAMESPACE__ . '\model\\'.ucfirst($table));
    }

    /**
     * @param $table
     * @param $id
     * @return mixed
     */
    public function findOne($table, $id) {
        $req = "SELECT * FROM $table WHERE id=:id";
        $prep = $this->db->prepare($req);
        $prep->bindValue(':id', $id, \PDO::PARAM_INT);

        $prep->execute();

        $res = $prep->fetchAll(\PDO::FETCH_CLASS, __NAMESPACE__ . '\model\\'.ucfirst($table));
        return $res[0];
    }

    /**
     * @param $table
     * @return array
     */
    public function findAllEvenement($table) {
        $req = "SELECT * FROM $table";
        $res = $this->db->query($req);
        return $res->fetchAll(\PDO::FETCH_CLASS, __NAMESPACE__ . '\model\\'.ucfirst($table));
    }

    /**
     * @param $table
     * @param $id
     * @return mixed
     */
    public function findOneEvenement($table, $id) {
        $req = "SELECT * FROM $table WHERE id=:id";
        $prep = $this->db->prepare($req);
        $prep->bindValue(':id', $id, \PDO::PARAM_INT);

        $prep->execute();

        $res = $prep->fetchAll(\PDO::FETCH_CLASS, __NAMESPACE__ . '\model\\'.ucfirst($table));
        return $res[0];
    }

    /**
     * @param $table
     * @return array
     */
    public function findAllBlog($table) {
        $req = "SELECT * FROM $table";
        $res = $this->db->query($req);
        return $res->fetchAll(\PDO::FETCH_CLASS, __NAMESPACE__ . '\model\\'.ucfirst($table));
    }

    /**
     * @param $table
     * @param $id
     * @return mixed
     */
    public function findOneBlog($table, $id) {
        $req = "SELECT * FROM $table WHERE id=:id";
        $prep = $this->db->prepare($req);
        $prep->bindValue(':id', $id, \PDO::PARAM_INT);

        $prep->execute();

        $res = $prep->fetchAll(\PDO::FETCH_CLASS, __NAMESPACE__ . '\model\\'.ucfirst($table));
        return $res[0];
    }

    /**
     * @param $table
     * @return array
     */
    public function findAllMarraine($table) {
        $req = "SELECT * FROM $table";
        $res = $this->db->query($req);
        return $res->fetchAll(\PDO::FETCH_CLASS, __NAMESPACE__ . '\model\\'.ucfirst($table));
    }

    /**
     * @param $table
     * @param $id
     * @return mixed
     */
    public function findOneMarraine($table, $id) {
        $req = "SELECT * FROM $table WHERE id=:id";
        $prep = $this->db->prepare($req);
        $prep->bindValue(':id', $id, \PDO::PARAM_INT);

        $prep->execute();

        $res = $prep->fetchAll(\PDO::FETCH_CLASS, __NAMESPACE__ . '\model\\'.ucfirst($table));
        return $res[0];
    }

    /**
     * @param $table
     * @return array
     */
    public function findAllPrestation($table) {
        $req = "SELECT * FROM $table";
        $res = $this->db->query($req);
        return $res->fetchAll(\PDO::FETCH_CLASS, __NAMESPACE__ . '\model\\'.ucfirst($table));
    }

    /**
     * @param $table
     * @param $id
     * @return mixed
     */
    public function findOnePrestation($table, $id) {
        $req = "SELECT * FROM $table WHERE id=:id";
        $prep = $this->db->prepare($req);
        $prep->bindValue(':id', $id, \PDO::PARAM_INT);

        $prep->execute();

        $res = $prep->fetchAll(\PDO::FETCH_CLASS, __NAMESPACE__ . '\model\\'.ucfirst($table));
        return $res[0];
    }

    /**
     * @param $table
     * @return array
     */
    public function findAllPortrait($table) {
        $req = "SELECT * FROM $table";
        $res = $this->db->query($req);
        return $res->fetchAll(\PDO::FETCH_CLASS, __NAMESPACE__ . '\model\\'.ucfirst($table));
    }

    /**
     * @param $table
     * @param $id
     * @return mixed
     */
    public function findOnePortrait($table, $id) {
        $req = "SELECT * FROM $table WHERE id=:id";
        $prep = $this->db->prepare($req);
        $prep->bindValue(':id', $id, \PDO::PARAM_INT);

        $prep->execute();

        $res = $prep->fetchAll(\PDO::FETCH_CLASS, __NAMESPACE__ . '\model\\'.ucfirst($table));
        return $res[0];
    }

    /**
     * @param $table
     * @return array
     */
    public function findAllPartenaire($table) {
        $req = "SELECT * FROM $table";
        $res = $this->db->query($req);
        return $res->fetchAll(\PDO::FETCH_CLASS, __NAMESPACE__ . '\model\\'.ucfirst($table));
    }

    /**
     * @param $table
     * @param $id
     * @return mixed
     */
    public function findOnePartenaire($table, $id) {
        $req = "SELECT * FROM $table WHERE id=:id";
        $prep = $this->db->prepare($req);
        $prep->bindValue(':id', $id, \PDO::PARAM_INT);

        $prep->execute();

        $res = $prep->fetchAll(\PDO::FETCH_CLASS, __NAMESPACE__ . '\model\\'.ucfirst($table));
        return $res[0];
    }
}
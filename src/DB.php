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
        $prep->bindValue(':visibility', $visibility \PDO::PARAM_INT);
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




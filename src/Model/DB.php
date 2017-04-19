<?php


namespace Clara\Model;

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

}




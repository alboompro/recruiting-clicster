<?php

use Interop\Container\ContainerInterface;

abstract class BaseModel
{
    protected $table;
    protected $db;

    public function __construct($db)
    {
        $this->db = $db->table($this->table);
    }

    public function query()
    {
      return $this->db;
    }

    public function get($filter=null) {
      return $this->query()->get();
    }
}

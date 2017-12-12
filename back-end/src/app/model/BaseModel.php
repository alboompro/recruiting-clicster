<?php

use Illuminate\Database\Eloquent;
// require '../../vendor/illuminate/database/Eloquent/Model.php';

abstract class BaseModel
{
    protected $db;
    protected $table;
    protected $primaryKey;

    public function __construct($db)
    {
        // $db->setKeyName($this->primaryKey);
        $this->db = $db->table($this->table);
    }

    public function query()
    {
      return $this->db;
    }

    public function get($filter=null)
    {
      return $this->query()->get();
    }

    public function find($id)
    {        
        return $this->query()->where($this->primaryKey, '=', $id)->get();
    }

    public function insert($attributes)
    {
      return $this->query()->insert($attributes);
    }
}

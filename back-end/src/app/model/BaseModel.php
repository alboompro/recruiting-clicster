<?php

use Illuminate\Database\Eloquent;
// require '../../vendor/illuminate/database/Eloquent/Model.php';

abstract class BaseModel
{
    protected $db;
    protected $table;
    protected $primaryKey;
    protected $fillable;

    public function __construct($db)
    {
        $this->db = $db->table($this->table);
    }

    public function query()
    {
        return $this->db;
    }

    public function prepareFields($attributes)
    {
        $preparedFields = [];
        foreach ($this->fillable as $key => $value) {
            if (array_key_exists($value, $attributes)) {
                $preparedFields[$value] = $attributes[$value];
            }
        }
        return $preparedFields;
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
        $preparedFields = $this->prepareFields($attributes);
        return $this->query()->insert($attributes);
    }

    public function update($id, $attributes)
    {
        $preparedFields = $this->prepareFields($attributes);

        return $this->query()->where($this->primaryKey, '=', $id)->update($preparedFields);
    }

    public function delete($id)
    {
        return $this->query()->where($this->primaryKey, '=', $id)->delete();
    }
}

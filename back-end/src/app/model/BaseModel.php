<?php

use Illuminate\Database\Eloquent;

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
        return $this->query()->where($this->primaryKey, '=', $id)->get()[0];
    }

    public function insert($attributes)
    {
        $preparedFields = $this->prepareFields($attributes);

        return $this->query()->insertGetId($preparedFields);
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

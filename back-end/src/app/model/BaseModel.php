<?php

// The base model will be responsible for manage all others models.
// This base will provide an easy communication with query builder

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

    public function getPrimaryKey()
    {
        return $this->primaryKey;
    }

    public function query()
    {
        return $this->db;
    }

    // Preparing fields according with the fillable property.
    // With this method, won't be necessary map request attributes
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

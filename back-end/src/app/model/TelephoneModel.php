<?php

use Interop\Container\ContainerInterface;

class TelephoneModel extends BaseModel
{
    protected $fillable = ['tel_id_clients', 'tel_ddd', 'tel_number'];
    protected $primaryKey = 'tel_id';

    public function __construct($db)
    {
        $this->table = 'telephones';
        Parent::__construct($db);
    }

}

<?php

use Interop\Container\ContainerInterface;

class CompanyModel extends BaseModel
{
    protected $fillable = ['com_name', 'com_address'];
    protected $primaryKey = 'com_id';

    public function __construct($db)
    {
        $this->table = 'companies';
        Parent::__construct($db);
    }

}

<?php

use Interop\Container\ContainerInterface;

class ClientModel extends BaseModel
{
    protected $fillable = ['cli_nome', 'cli_company'];
    protected $primaryKey = 'cli_id';

    public function __construct($db)
    {
        $this->table = 'clients';
        Parent::__construct($db);
    }

}

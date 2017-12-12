<?php

use Interop\Container\ContainerInterface;

class ClientModel extends BaseModel
{
    protected $fillable = ['cli_nome', 'cli_company'];
    
    public function __construct($db)
    {
        $this->table = 'clients';
        Parent::__construct($db);
    }

}

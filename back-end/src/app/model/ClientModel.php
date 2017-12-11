<?php

use Interop\Container\ContainerInterface;

class ClientModel extends BaseModel
{

    public function __construct($db)
    {
        $this->table = 'clients';
        Parent::__construct($db);
    }

}

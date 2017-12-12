<?php

use Interop\Container\ContainerInterface;

class EmailModel extends BaseModel
{
    protected $fillable = ['ema_id_clients', 'ema_email'];
    protected $primaryKey = 'ema_id';

    public function __construct($db)
    {
        $this->table = 'emails';
        Parent::__construct($db);
    }

}

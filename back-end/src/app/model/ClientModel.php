<?php

use Interop\Container\ContainerInterface;

class ClientModel extends BaseModel
{
    protected $fillable = ['cli_name', 'cli_company'];
    protected $primaryKey = 'cli_id';

    public function __construct($db)
    {
        $this->table = 'clients';
        Parent::__construct($db);
    }

    public function insert($attributes)
    {
      $db = $this->query()->getConnection();
      $db->beginTransaction();

      $telephoneModel = new TelephoneModel($db);
      $emailModel = new EmailModel($db);

      try {
          $insertedId = Parent::insert($attributes);
          $attributes['ema_id_clients'] = $insertedId;
          $attributes['tel_id_clients'] = $insertedId;

          $emailModel->insert($attributes);
          $telephoneModel->insert($attributes);
          $db->commit();
      } catch (Exception $e) {
          $db->rollBack();
          return $e;
      }
      return $insertedId;
    }

    public function update($cli_id, $attributes)
    {
      $db = $this->query()->getConnection();
      $db->beginTransaction();

      $telephoneModel = new TelephoneModel($db);
      $emailModel = new EmailModel($db);

      try {
          Parent::update($cli_id, $attributes);

          $emailModel->update($attributes[$emailModel->getPrimaryKey()], $attributes);
          $telephoneModel->update($attributes[$telephoneModel->getPrimaryKey()], $attributes);
          $db->commit();
      } catch (Exception $e) {
          $db->rollBack();
          return $e;
      }
      return $cli_id;
    }

}

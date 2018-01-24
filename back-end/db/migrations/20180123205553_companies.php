<?php


use Phinx\Migration\AbstractMigration;

class Companies extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-abstractmigration-class
     *
     * The following commands can be used in this method and Phinx will
     * automatically reverse them when rolling back:
     *
     *    createTable
     *    renameTable
     *    addColumn
     *    renameColumn
     *    addIndex
     *    addForeignKey
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function change()
    {

        $table = $this->table('companies', ['id' => false, 'primary_key' => ['company_id']]);
        $table->addColumn('company_id', 'integer', ['identity' => true, 'signed' => false])
              ->addColumn('name', 'string', ['length' => 255])
              ->addColumn('street', 'string', ['length' => 255])
              ->addColumn('number', 'string', ['length' => 20])
              ->addColumn('neighborhood', 'string', ['length' => 255])
              ->addColumn('city', 'string', ['length' => 255])
              ->addColumn('state', 'string', ['length' => 255])
              ->addColumn('country', 'string', ['length' => 255])
              ->addColumn('updated_at', 'datetime')
              ->addColumn('created_at', 'datetime')
              ->create();
    }
}

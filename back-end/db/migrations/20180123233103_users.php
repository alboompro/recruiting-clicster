<?php


use Phinx\Migration\AbstractMigration;

class Users extends AbstractMigration
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
        $table = $this->table('users', ['id' => false, 'primary_key' => ['user_id']]);
        $table->addColumn('user_id', 'integer', ['identity' => true, 'signed' => false])
              ->addColumn('company_id', 'integer', ['signed' => false])
              ->addColumn('first_name', 'string', ['length' => 255])
              ->addColumn('last_name', 'string', ['length' => 255])
              ->addColumn('thumbnail', 'string', ['length' => 255])
              ->addColumn('updated_at', 'datetime')
              ->addColumn('created_at', 'datetime')
              ->addForeignKey('company_id', 'companies', 'company_id',
                                                            ['delete'=> 'NO_ACTION', 'update'=> 'NO_ACTION'])
              ->create();

    }
}

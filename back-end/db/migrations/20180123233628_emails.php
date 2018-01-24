<?php


use Phinx\Migration\AbstractMigration;

class Emails extends AbstractMigration
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
        $table = $this->table('emails', ['id' => false, 'primary_key' => ['email_id']]);
        $table->addColumn('email_id', 'integer', ['identity' => true, 'signed' => false])
              ->addColumn('user_id', 'integer', ['signed' => false])
              ->addColumn('email', 'string', ['length' => 255])
              ->addColumn('updated_at', 'datetime')
              ->addColumn('created_at', 'datetime')
              ->addForeignKey('user_id', 'users', 'user_id',
                                               ['delete'=> 'NO_ACTION', 'update'=> 'NO_ACTION'])
              ->create();

    }
}

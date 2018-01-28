<?php


use Phinx\Migration\AbstractMigration;

class Contacts extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *integer
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
        $table = $this->table('contacts', ['id' => false, 'primary_key' => ['contact_id']]);
        $table->addColumn('contact_id', 'integer', ['identity' => true, 'signed' => false])
            ->addColumn('user_id', 'integer', ['signed' => false])
            ->addColumn('type', 'string')
            ->addColumn('contact', 'string')
            ->addColumn('updated_at', 'datetime')
            ->addColumn('created_at', 'datetime')
            ->addForeignKey('user_id', 'users', 'user_id',
                ['delete'=> 'NO_ACTION', 'update'=> 'NO_ACTION'])
            ->create();
    }
}

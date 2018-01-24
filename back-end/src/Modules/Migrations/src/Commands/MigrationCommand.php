<?php
/**
 * Created by PhpStorm.
 * User: pedroguimaraes
 * Date: 1/23/18
 * Time: 7:26 PM
 */

namespace App\Migrations\Commands;


use Phinx\Console\Command\Migrate;

class MigrationCommand extends Migrate
{
    protected function configure()
    {
        parent::configure();
        $this->setName("migration:run");
    }
}
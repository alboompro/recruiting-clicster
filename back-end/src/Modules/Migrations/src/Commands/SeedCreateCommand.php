<?php
/**
 * Created by PhpStorm.
 * User: pedroguimaraes
 * Date: 1/23/18
 * Time: 7:29 PM
 */

namespace App\Migrations\Commands;


use Phinx\Console\Command\SeedCreate;

class SeedCreateCommand extends SeedCreate
{
    protected function configure()
    {
        parent::configure();
        $this->setName('migration:seed:create');
    }
}
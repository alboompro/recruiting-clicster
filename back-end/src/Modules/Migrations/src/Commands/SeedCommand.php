<?php
/**
 * Created by PhpStorm.
 * User: pedroguimaraes
 * Date: 1/23/18
 * Time: 7:28 PM
 */

namespace App\Migrations\Commands;


use Phinx\Console\Command\SeedRun;

class SeedCommand extends SeedRun
{
    protected function configure()
    {
        parent::configure();
        $this->setName("migration:seed:run");
    }
}
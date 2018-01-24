<?php
/**
 * Created by PhpStorm.
 * User: pedroguimaraes
 * Date: 1/23/18
 * Time: 7:22 PM
 */

namespace App\Migrations\Commands;

use Phinx\Console\Command\Init;


class InitCommand extends Init
{

    protected function configure()
    {
        parent::configure();
        $this->setName('migration:init');
    }

}
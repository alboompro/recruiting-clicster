<?php
/**
 * Created by PhpStorm.
 * User: pedroguimaraes
 * Date: 1/23/18
 * Time: 7:05 PM
 */

namespace App\Core\Commands;

use \Symfony\Component\Console\Command\Command as SymfonyCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ServerCommand extends SymfonyCommand
{
    protected function configure()
    {
        $this->setName('serve')
             ->setDescription('PHP built-in server');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->write('Running server in http://localhost:8080');

        exec('php -S localhost:8080 -t ' . getcwd() . DIRECTORY_SEPARATOR . 'public');

    }
}
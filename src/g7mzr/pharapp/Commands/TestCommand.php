<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace g7mzr\pharapp\Commands;

use GetOpt\Command;
use GetOpt\GetOpt;
use GetOpt\Operand;

class TestCommand extends Command
{
    public function __construct()
    {
        parent::__construct('test', [$this, 'handle']);

        $this->addOperands([
            Operand::create('source', Operand::REQUIRED)
                ->setValidation('is_readable'),
            Operand::create('destination', Operand::REQUIRED)
        ]);  //  ->setValidation('is_writable')
        $this->setDescription(
                    'This is a test command for phar-test useing getopt/getopt.' .
                    PHP_EOL .
                    'It returns the source and destination file names'
        )->setShortDescription('Test Command');

    }

    public function handle(GetOpt $getOpt)
    {
        echo PHP_EOL;
        echo "TEST COMMAND" . PHP_EOL . PHP_EOL;
        echo "Source File: " . $getOpt->getOperand('source')  . PHP_EOL;
        echo "Destination File: " . $getOpt->getOperand('destination') . PHP_EOL;
        echo PHP_EOL;
    }
}

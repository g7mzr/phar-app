<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace g7mzr\pharapp;
use GetOpt\GetOpt;
use GetOpt\Option;
use GetOpt\Command;
use GetOpt\ArgumentException;
use GetOpt\ArgumentException\Missing;

class App {

    protected $programName = "PHAR-APP";
    protected $version = "0.2.0";
    protected $getOpt = null;


     public function __construct()
     {
        $this->getOpt = new GetOpt();

        // Define the comon options
        $this->getOpt->addOptions(
            [
                Option::create(null, 'option1', GetOpt::NO_ARGUMENT)
                    ->setDescription(
                        "This is additional option 1"
                ),

                Option::create(null, 'option2', GetOpt::NO_ARGUMENT)
                    ->setDescription("SThis is additional option 2"),

                Option::create(null, 'version', GetOpt::NO_ARGUMENT)
                    ->setDescription("Show the version information and quit"),

                Option::create(null, 'help', GetOpt::NO_ARGUMENT)
                    ->setDescription("Show this help and quit")
            ]
        );
        $this->getOpt->addCommands([
            Command::create('setup', '\g7mzr\pharapp\Commands\Setup::setup')
                ->setDescription('Setup the application'),
        ]);
        $this->getOpt->addCommand(new \g7mzr\pharapp\Commands\TestCommand());
     }

     public function run()
     {

        // process arguments and catch user errors
        try {
            try {
                $this->getOpt->process();
            } catch (Missing $exception) {
                // catch missing exceptions if help is requested
                if (!$this->getOpt->getOption('help')) {
                    throw $exception;
                }
            }
        } catch (ArgumentException $exception) {
            file_put_contents('php://stderr', $exception->getMessage() . PHP_EOL);
            echo PHP_EOL . $this->getOpt->getHelpText();
            exit;
        }

        // show version and quit
        if ($this->getOpt->getOption('version')) {
            echo sprintf('%s: %s' . PHP_EOL, $this->programName, $this->version);
            exit;
        }

        // show help and quit
        if ($this->getOpt->getOption('help')) {
            echo $this->getOpt->getHelpText();
            exit;
        }


        $command = $this->getOpt->getCommand();
        if (!$command) {
            // no command given - show help?
            echo $this->getOpt->getHelpText();
        } else {
            // do something with the command - example:
            // call the requested command
            call_user_func($command->getHandler(), $this->getOpt);


            // Set the control variables
            $option1 = $this->getOpt->getOption('option1');
            $option2 = $this->getOpt->getOption('option2');

            if ($option1 == true) {
                echo "Option 1 has been selected" . PHP_EOL;
            }

            if ($option2 == true) {
                echo "Option 2 has been selected" . PHP_EOL;
            }
        }
    }
}
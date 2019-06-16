<?php
/**
 * This file is part of PharApp
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code or follow the link below.
 *
 * @package   PharApp
 * @subpackage Main Code
 * @author    Sandy McNeil <g7mzrdev@gmail.com>
 * @copyright 2018 Sandy McNeil
 * @license   https://github.com/g7mzr/phar-app/blob/master/LICENSE GNU GPL v3.0
 * @link      https://github.com/g7mzr/phar-app
 */

namespace g7mzr\pharapp;

use GetOpt\GetOpt;
use GetOpt\Option;
use GetOpt\Command;
use GetOpt\ArgumentException;
use GetOpt\ArgumentException\Missing;
use g7mzr\pharapp\common\Version;
/**
 * PharApp Main Class
 *
 * This is the main Application Class for PharAPP.  It is used to initialise  the
 * application and then select and run the user selected command with the requested
 * options.
 *
 * @package  PharApp
 * @author   Sandy McNeil <g7mzrdev@gmail.com>
 * @license  https://github.com/g7mzr/phar-app/blob/master/LICENSE GNU GPL v3.0
 */
class App
{
    /**
     * Property
     * @var \GetOpt\GetOpt
     * @access protected
     */
    protected $getOpt = null;

    /**
     * Constructor
     *
     * Constructor used for APP Class.  It is used to initialise  GetOpt class with
     * the required Operands and global options.
     */
    public function __construct()
    {
        $this->getOpt = new GetOpt();

        // Define the comon options
        $this->getOpt->addOptions(
            [
            Option::create(null, 'version', GetOpt::NO_ARGUMENT)
                  ->setDescription("Show the version information and quit"),

              Option::create(null, 'help', GetOpt::NO_ARGUMENT)
                  ->setDescription("Show this help and quit")
            ]
        );

        $commandlist = scandir(__DIR__ . "/Commands");
        foreach ($commandlist as $file) {
            if (($file != ".") and ($file != "..")) {
                $basefile = basename($file, ".php");
                $classname = "\\g7mzr\\pharapp\\Commands\\" . $basefile;
                $this->getOpt->addCommand(new $classname());
            }
        }
    }

    /**
     * Run Method
     *
     * This is the main method for PharApp.  It used to process the users commands
     * via GetOp-PHP and call the required Command.  It can also be used to display
     * the applications version and help text.
     *
     * @throws Missing If an error is encountered processing "help" option.
     *
     * @return boolen False in an error is encountered.  True otherwise.
     */
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
            return false;
        }

        // show version and quit
        if ($this->getOpt->getOption('version')) {
            echo sprintf('%s: %s' . PHP_EOL, Version::NAME, Version::VERSION);
            return true;
        }

        // show help and quit
        if ($this->getOpt->getOption('help')) {
            echo $this->getOpt->getHelpText();
            return true;
        }


        $command = $this->getOpt->getCommand();
        if (!$command) {
            // no command given - show help?
            echo $this->getOpt->getHelpText();
            return false;
        }

        // call the requested command
        $result = call_user_func($command->getHandler(), $this->getOpt);

        return $result;
    }
}

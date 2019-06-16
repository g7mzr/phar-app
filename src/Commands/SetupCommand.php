<?php
/**
 * This file is part of PharApp
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code or follow the link below.
 *
 * @package   PharApp
 * @subpackage Commands
 * @author    Sandy McNeil <g7mzrdev@gmail.com>
 * @copyright 2018 Sandy McNeil
 * @license   https://github.com/g7mzr/phar-app/blob/master/LICENSE GNU GPL v3.0
 * @link      https://github.com/g7mzr/phar-app
 */

namespace g7mzr\pharapp\Commands;

use GetOpt\Command;
use GetOpt\GetOpt;
use GetOpt\Operand;
use GetOpt\Option;

/**
 * Setup is a test command for PharApp.
 *
 * @package  PharApp
 * @author   Sandy McNeil <g7mzrdev@gmail.com>
 * @license  https://github.com/g7mzr/phar-app/blob/master/LICENSE GNU GPL v3.0
 */
class SetupCommand extends Command
{
    /**
     * Constructor
     *
     * Constructor used for TestCommand Class.  It is used to initialise the
     * command including setting up operands and help text.
     */
    public function __construct()
    {
        parent::__construct('setup', [$this, 'handle']);

        // Set up Operands fot Test Command

        // Setup description for Test Command
        $this->setDescription(
            'This is a test command for phar-test using getopt/getopt.' . PHP_EOL
        )->setShortDescription('Setup');

        $this->addOptions(
            [
            Option::create('b', 'beta', GetOpt::NO_ARGUMENT)
                  ->setDescription("Setup Option")
            ]
        );
    }

    /**
     * This is the entry point for the command
     *
     * @param GetOpt $getOpt Pointer to the GetOpt structure for PharApp.
     *
     * @return boolean False in an error is encountered.  True otherwise.
     */
    public function handle(GetOpt $getOpt)
    {
        echo $getOpt->getCommand()->getName() . " works." . PHP_EOL;
        if ($getOpt->getOption("beta")) {
            echo "BETA is set" . PHP_EOL;
        }
        return true;
    }
}

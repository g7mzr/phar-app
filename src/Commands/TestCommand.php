<?php
/**
 * This file is part of PharApp
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code or follow the link below.

 * @category  PHP
 * @package   PharApp
 * @author    Sandy McNeil <g7mzrdev@gmail.com>
 * @copyright 2018 Sandy McNeil
 * @license   https://github.com/g7mzr/phar-app/blob/master/LICENSE GNU GPL v3.0
 * @link      https://github.com/g7mzr/phar-app
 */
namespace g7mzr\pharapp\Commands;

use GetOpt\Command;
use GetOpt\GetOpt;
use GetOpt\Operand;

/**
 * TestCommand Class
 *
 * This is a Test Command created by extending the \GetOpt\Command base class.
 *
 * @package  PharApp
 * @author   Sandy McNeil <g7mzrdev@gmail.com>
 * @license  https://github.com/g7mzr/phar-app/blob/master/LICENSE GNU GPL v3.0
 */
class TestCommand extends Command
{
    /**
     * Constructor
     *
     * Constructor used for TestCommand Class.  It is used to initialise the
     * command including setting up operands and help text.
     */
    public function __construct()
    {
        parent::__construct('test', [$this, 'handle']);

        // Set up Operands fot Test Command
        $sourceoperand = new Operand('source', Operand::REQUIRED);
        $sourceoperand->setValidation("is_readable");
        $destinationoperand = new Operand('destination', Operand::REQUIRED);
        $this->addOperands([$sourceoperand, $destinationoperand]);

        // Setup decription for Test Command
        $this->setDescription(
            'This is a test command for phar-test useing getopt/getopt.' .
                    PHP_EOL .
                    'It returns the source and destination file names'
        )->setShortDescription('Test Command');
    }

    /**
     * This is the entry point for the command
     *
     * @param GetOpt $getOpt Pointer to the GetOpt structure for PharApp
     *
     * @return boolean False in an error is encountered.  True otherwise.
     */
    public function handle(GetOpt $getOpt)
    {
        echo PHP_EOL;
        echo "TEST COMMAND" . PHP_EOL . PHP_EOL;
        echo "Source File: " . $getOpt->getOperand('source')  . PHP_EOL;
        echo "Destination File: " . $getOpt->getOperand('destination') . PHP_EOL;
        echo PHP_EOL;
        return true;
    }
}

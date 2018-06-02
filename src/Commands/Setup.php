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

use GetOpt\GetOpt;

/**
 * Setup is a test command for PharApp.
 *
 * @package  PharApp
 * @author   Sandy McNeil <g7mzrdev@gmail.com>
 * @license  https://github.com/g7mzr/phar-app/blob/master/LICENSE GNU GPL v3.0
 */
class Setup
{
    /**
     * This is a test function for PharApp
     *
     * @param GetOpt $getOpt Pointer to the GetOpt structure for PharApp
     *
     * @return boolen False in an error is encountered.  True otherwise.
     */
    public static function setup(GetOpt $getOpt)
    {
        echo $getOpt->getCommand()->getName() . " works" . PHP_EOL;
        return true;
    }
}

<?php
/**
 * This file is part of PharApp
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code or follow the link below.
 *
 * @package   PharApp
 * @subpackage Common Code
 * @author    Sandy McNeil <g7mzrdev@gmail.com>
 * @copyright 2018 Sandy McNeil
 * @license   https://github.com/g7mzr/phar-app/blob/master/LICENSE GNU GPL v3.0
 * @link      https://github.com/g7mzr/phar-app
 */

namespace g7mzr\pharapp\common;

/**
 * Version Class
 *
 * Version Class is used to define the Default Name and Version for PharApp.
 *
 * @codeCoverageIgnore
 *
 */
class Version
{
    const NAME = "PHP PHAR APP";
    const VERSION = "0.3.0";

    /**
     * Version Class Constructor
     *
     * @access private
     */
    private function __construct()
    {
    }
}

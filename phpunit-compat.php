<?php
/*
 * This file is part of Translator
 *
 * (c) William Skates <will@stuffby.ws>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

require_once __DIR__ . '/vendor/autoload.php';

if (!class_exists("PHPUnit_Framework_TestCase")) {
	class PHPUnit_Framework_TestCase extends \PHPUnit\Framework\TestCase {

	}
}

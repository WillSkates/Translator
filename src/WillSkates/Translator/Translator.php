<?php
declare(strict_types=1);

/*
 * This file is part of Translator
 *
 * (c) William Skates <will@stuffby.ws>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace WillSkates\Translator;

/**
 * A default container for the translator trait.
 *
 * @author WillSkates <will@stuffby.ws>
 */
class Translator implements TranslatorInterface
{
    use TranslatorTrait;
}

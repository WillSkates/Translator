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
interface TranslatorInterface
{

	/**
     * Provide an array of information to use as translation data
     * for a provided language.
     *
     * @param array   $info     The array of information to use.
     * @param Boolean $merge    True or false depending on whether the array should be
     *                          merged with existing data for this language if there is any.
     */
    public function useTranslations(array $info, bool $merge = false);

    /**
     * Get all translation information for a given language.
     *
     * @return array            The language that the translations are written in. (e.g. 'en').
     */
    public function translations();

    /**
     * Set the translation of a given term or phrase within a given language.
     *
     * @param string $orig        The original string.
     * @param string $translation The translation.
     */
    public function useTranslation(string $orig, string $translation);

    /**
     * Get the translation for a given string.
     *
     * @param  string         $orig     The original string.
     *
     * @return string The translated string.
     */
    public function translate(string $orig);
}

<?php
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
    /**
     * An array containing all of the translation information.
     *
     * @var array
     */
    protected $translations = array();

    /**
     * Provide an array of information to use as translation data
     * for a provided language.
     *
     * @param array   $info     The array of information to use.
     * @param bool    $merge    True or false depending on whether the array should be
     *                          merged with existing data for this language if there is any.
	 *
	 * @return void
     */
    public function useTranslations(array $info, $merge = false)
    {

        if ($merge) {

            $this->translations= array_merge(
                $this->translations,
                $info
            );

        } else {
            $this->translations = $info;
        }

    }

    /**
     * Get all translation information for a given language.
     *
     * @return array            The language that the translations are written in. (e.g. 'en').
     */
    public function translations()
    {
        return $this->translations;
    }

    /**
     * Set the translation of a given term or phrase within a given language.
     *
     * @param string $orig        The original string.
     * @param string $translation The translation.
	 * 
	 * @return void
	 */
    public function useTranslation($orig, $translation)
    {
        $this->translations[$orig] = $translation;
    }

    /**
     * Get the translation for a given string.
     *
     * @param  string         $orig     The original string.
     *
     * @return string|bool The translated string or false if it doesn't exist.
     */
    public function translate($orig)
    {

        if ( isset($this->translations[$orig]) ) {
            return $this->translations[$orig];
        }

        return false;

    }
}

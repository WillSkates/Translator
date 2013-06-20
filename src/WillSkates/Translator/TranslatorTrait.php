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
 * A Trait which allows a class to provide the ability to translate strings.
 *
 * @author WillSkates <will@stuffby.ws>
 */
trait TranslatorTrait
{

    /**
     * An array containing all of the translation information.
     *
     * @var array
     */
    protected $translations = array();

    /**
     * A string dictating the default language to translate into. (e.g. 'en').
     *
     * @var String
     */
    protected $defaultLang = 'en';

    /**
     * Provide an array of information to use as translation data
     * for a provided language.
     *
     * @param array  $info     The array of information to use.
     * @param String $language The language that the translations are written in. (e.g. 'en').
     */
    public function setTranslations(array $info, $language)
    {

        if ( isset($this->translations[$language]) ) {

            $this->translations[$language] = array_merge(
                $this->translations[$language],
                $info
            );

        } else {
            $this->translations[$language] = $info;
        }

    }

    /**
     * Get all translation information for a given language.
     *
     * @param  String $language The name of language that this information is made up of.
     * @return array            The language that the translations are written in. (e.g. 'en').
     */
    public function getTranslations($language)
    {
        if ( isset($this->translations[$language]) ) {
            return $this->translations[$language];
        }

        return array();
    }

    /**
     * Set the translation of a given term or phrase within a given language.
     *
     * @param String $orig        The original string.
     * @param String $translation The translation.
     * @param String $language    The language that the translation is written in. (e.g. 'en').
     */
    public function setTranslation($orig, $translation, $language)
    {

        if ( !isset($this->translations[$language]) ) {
            $this->translations[$language] = array();
        }

        $this->translations[$language][$orig] = $translation;

    }

    /**
     * Get the translation for a given string.
     *
     * @param  String         $orig     The original string.
     * @param  boolean|String $language The language that the translation is written in. (e.g. 'en').
     *
     * @return String The translated string.
     */
    public function getTranslation($orig, $language = false)
    {

        if (!$language) {
            $language = $this->defaultLang;
        }

        if ( isset($this->translations[$language][$orig]) ) {
            return $this->translations[$language][$orig];
        }

        return false;

    }

    /**
     * Gets the string dictating the default language to translate into. (e.g. 'en').
     *
     * @return String
     */
    public function getDefaultLang()
    {
        return $this->defaultLang;
    }

    /**
     * Sets the string dictating the default language to translate into. (e.g. 'en').
     *
     * @param String $defaultLang A string representing the default language to translate into. (e.g. 'en').
     *
     * @return self
     */
    public function setDefaultLang($defaultLang)
    {
        $this->defaultLang = $defaultLang;

        return $this;
    }
}
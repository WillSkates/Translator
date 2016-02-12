<?php

use WillSkates\Translator\Translator;

class TranslatorTests extends PHPUnit_Framework_TestCase
{

	private $translator;

	public function setUp()
	{
		$this->translator = new Translator();
	}

	public function testCreation()
	{
	    $this->assertInstanceOf('WillSkates\Translator\TranslatorInterface', $this->translator);
	}

	public function testEnglish()
	{

		$en = array(
			'hello' => 'hi',
			'nice' => 'yay'
		);

		$this->translator->useTranslations($en);

		$translated = $this->translator->translations();

		$this->assertCount(count($en), $translated);

		foreach ( $en as $orig => $translation ) {
			$this->assertTrue(isset($translated[$orig]));
			$this->assertEquals($translation, $translated[$orig]);
			$this->translator->useTranslation($orig, $translation);
			$this->assertEquals($translation, $this->translator->translate($orig));
			$this->assertEquals($translation, $this->translator->translate($orig));
		}

		//test merge.
		$en['hello'] = 'hey';
		$en['person'] = 'person';
		$this->translator->useTranslations($en, true);

		$translated = $this->translator->translations();

		$this->assertCount(count($en), $translated);

		foreach ( $en as $orig => $translation ) {
			$this->assertTrue(isset($translated[$orig]));
			$this->assertEquals($translation, $translated[$orig]);
			$this->translator->useTranslation($orig, $translation);
			$this->assertEquals($translation, $this->translator->translate($orig));
			$this->assertEquals($translation, $this->translator->translate($orig));
		}

		//test merge.
		unset($en['nice']);
		$en['hello'] = 'hey';
		$en['person'] = 'person';
		$this->translator->useTranslations($en, false);

		$translated = $this->translator->translations();

		$this->assertCount(count($en), $translated);

		foreach ( $translated as $orig => $translation ) {
			$this->assertTrue(isset($en[$orig]));
			$this->assertEquals($translation, $this->translator->translate($orig));
		}

	}

}
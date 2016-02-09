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
	    $this->assertEquals('en', $this->translator->defaultLang());
	}

	public function testEnglish()
	{

		$en = array(
			'hello' => 'hi',
			'nice' => 'yay'
		);

		$this->translator->useTranslations($en, 'en');

		$translated = $this->translator->translations('en');

		$this->assertCount(count($en), $translated);

		$this->translator->useDefaultLang('en');

		foreach ( $en as $orig => $translation ) {
			$this->assertTrue(isset($translated[$orig]));
			$this->assertEquals($translation, $translated[$orig]);
			$this->translator->useTranslation($orig, $translation, 'en');
			$this->assertEquals($translation, $this->translator->translate($orig, 'en'));
			$this->assertEquals($translation, $this->translator->translate($orig));
		}

		//test merge.
		$en['hello'] = 'hey';
		$en['person'] = 'person';
		$this->translator->useTranslations($en, 'en', true);

		$translated = $this->translator->translations('en');

		$this->assertCount(count($en), $translated);

		foreach ( $en as $orig => $translation ) {
			$this->assertTrue(isset($translated[$orig]));
			$this->assertEquals($translation, $translated[$orig]);
			$this->translator->useTranslation($orig, $translation, 'en');
			$this->assertEquals($translation, $this->translator->translate($orig, 'en'));
			$this->assertEquals($translation, $this->translator->translate($orig));
		}

		//test merge.
		unset($en['nice']);
		$en['hello'] = 'hey';
		$en['person'] = 'person';
		$this->translator->useTranslations($en, 'en', false);

		$translated = $this->translator->translations('en');

		$this->assertCount(count($en), $translated);

		foreach ( $translated as $orig => $translation ) {
			$this->assertTrue(isset($en[$orig]));
			$this->assertEquals($translation, $this->translator->translate($orig, 'en'));
		}

	}

	public function testGerman()
	{

		$de = array(
			'hello' => 'hallo',
			'nice' => 'gut'
		);

		$this->translator->useTranslations($de, 'de');

		$translated = $this->translator->translations('de');

		$this->assertCount(count($de), $translated);

		$this->translator->useDefaultLang('de');

		foreach ( $de as $orig => $translation ) {
			$this->assertTrue(isset($translated[$orig]));
			$this->assertEquals($translation, $translated[$orig]);
			$this->translator->useTranslation($orig, $translation, 'de');
			$this->assertEquals($translation, $this->translator->translate($orig, 'de'));
			$this->assertEquals($translation, $this->translator->translate($orig));
		}

		//test merge.
		$de['hello'] = 'hey';
		$de['person'] = 'person';
		$this->translator->useTranslations($de, 'de', true);

		$translated = $this->translator->translations('de');

		$this->assertCount(count($de), $translated);

		foreach ( $de as $orig => $translation ) {
			$this->assertTrue(isset($translated[$orig]));
			$this->assertEquals($translation, $translated[$orig]);
			$this->translator->useTranslation($orig, $translation, 'de');
			$this->assertEquals($translation, $this->translator->translate($orig, 'de'));
			$this->assertEquals($translation, $this->translator->translate($orig));
		}

		//test merge.
		unset($de['nice']);
		$de['hello'] = 'hey';
		$de['person'] = 'person';
		$this->translator->useTranslations($de, 'de', false);

		$translated = $this->translator->translations('de');

		$this->assertCount(count($de), $translated);

		foreach ( $translated as $orig => $translation ) {
			$this->assertTrue(isset($de[$orig]));
			$this->assertEquals($translation, $this->translator->translate($orig, 'de'));
		}

	}

	public function testBro()
	{

		$bro = array(
			'hello' => 'Yo!',
			'nice' => 'Dayum!'
		);

		$this->translator->useTranslations($bro, 'bro');

		$translated = $this->translator->translations('bro');

		$this->assertCount(count($bro), $translated);

		$this->translator->useDefaultLang('bro');

		foreach ( $bro as $orig => $translation ) {
			$this->assertTrue(isset($translated[$orig]));
			$this->assertEquals($translation, $translated[$orig]);
			$this->translator->useTranslation($orig, $translation, 'bro');
			$this->assertEquals($translation, $this->translator->translate($orig, 'bro'));
			$this->assertEquals($translation, $this->translator->translate($orig));
		}

		//test merge.
		$bro['hello'] = 'hey';
		$bro['person'] = 'person';
		$this->translator->useTranslations($bro, 'bro', true);

		$translated = $this->translator->translations('bro');

		$this->assertCount(count($bro), $translated);

		foreach ( $bro as $orig => $translation ) {
			$this->assertTrue(isset($translated[$orig]));
			$this->assertEquals($translation, $translated[$orig]);
			$this->translator->useTranslation($orig, $translation, 'bro');
			$this->assertEquals($translation, $this->translator->translate($orig, 'bro'));
			$this->assertEquals($translation, $this->translator->translate($orig));
		}

		//test merge.
		unset($bro['nice']);
		$bro['hello'] = 'hey';
		$bro['person'] = 'person';
		$this->translator->useTranslations($bro, 'bro', false);

		$translated = $this->translator->translations('bro');

		$this->assertCount(count($bro), $translated);

		foreach ( $translated as $orig => $translation ) {
			$this->assertTrue(isset($bro[$orig]));
			$this->assertEquals($translation, $this->translator->translate($orig, 'bro'));
		}

	}

	public function testTranslator()
	{

		$this->translator->useDefaultLang('de');
		$this->assertEquals('de', $this->translator->defaultLang());

	}


}
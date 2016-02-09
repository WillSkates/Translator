<?php

use WillSkates\Translator\Translator;

class TranslatorTests extends PHPUnit_Framework_TestCase
{

	private $this->translator;

	public function setUp()
	{
		$this->translator = new Translator();
	}

	public function testCreation()
	{
	    $this->assertEquals('en', $this->translator->getDefaultLang());
	}

	public function testEnglish()
	{

		$en = array(
			'hello' => 'hi',
			'nice' => 'yay'
		);

		$this->translator->setTranslations($en, 'en');

		$translated = $this->translator->getTranslations('en');

		$this->assertCount(count($en), $translated);

		$this->translator->setDefaultLang('en');

		foreach ( $en as $orig => $translation ) {
			$this->assertTrue(isset($translated[$orig]));
			$this->assertEquals($translation, $translated[$orig]);
			$this->translator->setTranslation($orig, $translation, 'en');
			$this->assertEquals($translation, $this->translator->getTranslation($orig, 'en'));
			$this->assertEquals($translation, $this->translator->getTranslation($orig));
		}

		//test merge.
		$en['hello'] = 'hey';
		$en['person'] = 'person';
		$this->translator->setTranslations($en, 'en', true);

		$translated = $this->translator->getTranslations('en');

		$this->assertCount(count($en), $translated);

		foreach ( $en as $orig => $translation ) {
			$this->assertTrue(isset($translated[$orig]));
			$this->assertEquals($translation, $translated[$orig]);
			$this->translator->setTranslation($orig, $translation, 'en');
			$this->assertEquals($translation, $this->translator->getTranslation($orig, 'en'));
			$this->assertEquals($translation, $this->translator->getTranslation($orig));
		}

		//test merge.
		unset($en['nice']);
		$en['hello'] = 'hey';
		$en['person'] = 'person';
		$this->translator->setTranslations($en, 'en', false);

		$translated = $this->translator->getTranslations('en');

		$this->assertCount(count($en), $translated);

		foreach ( $translated as $orig => $translation ) {
			$this->assertTrue(isset($en[$orig]));
			$this->assertEquals($translation, $this->translator->getTranslation($orig, 'en'));
		}

	}

	public function testGerman()
	{

		$this->translator = $this->make();

		$de = array(
			'hello' => 'hallo',
			'nice' => 'gut'
		);

		$this->translator->setTranslations($de, 'de');

		$translated = $this->translator->getTranslations('de');

		$this->assertCount(count($de), $translated);

		$this->translator->setDefaultLang('de');

		foreach ( $de as $orig => $translation ) {
			$this->assertTrue(isset($translated[$orig]));
			$this->assertEquals($translation, $translated[$orig]);
			$this->translator->setTranslation($orig, $translation, 'de');
			$this->assertEquals($translation, $this->translator->getTranslation($orig, 'de'));
			$this->assertEquals($translation, $this->translator->getTranslation($orig));
		}

		//test merge.
		$de['hello'] = 'hey';
		$de['person'] = 'person';
		$this->translator->setTranslations($de, 'de', true);

		$translated = $this->translator->getTranslations('de');

		$this->assertCount(count($de), $translated);

		foreach ( $de as $orig => $translation ) {
			$this->assertTrue(isset($translated[$orig]));
			$this->assertEquals($translation, $translated[$orig]);
			$this->translator->setTranslation($orig, $translation, 'de');
			$this->assertEquals($translation, $this->translator->getTranslation($orig, 'de'));
			$this->assertEquals($translation, $this->translator->getTranslation($orig));
		}

		//test merge.
		unset($de['nice']);
		$de['hello'] = 'hey';
		$de['person'] = 'person';
		$this->translator->setTranslations($de, 'de', false);

		$translated = $this->translator->getTranslations('de');

		$this->assertCount(count($de), $translated);

		foreach ( $translated as $orig => $translation ) {
			$this->assertTrue(isset($de[$orig]));
			$this->assertEquals($translation, $this->translator->getTranslation($orig, 'de'));
		}

	}

	public function testBro()
	{

		$this->translator = $this->make();

		$bro = array(
			'hello' => 'Yo!',
			'nice' => 'Dayum!'
		);

		$this->translator->setTranslations($bro, 'bro');

		$translated = $this->translator->getTranslations('bro');

		$this->assertCount(count($bro), $translated);

		$this->translator->setDefaultLang('bro');

		foreach ( $bro as $orig => $translation ) {
			$this->assertTrue(isset($translated[$orig]));
			$this->assertEquals($translation, $translated[$orig]);
			$this->translator->setTranslation($orig, $translation, 'bro');
			$this->assertEquals($translation, $this->translator->getTranslation($orig, 'bro'));
			$this->assertEquals($translation, $this->translator->getTranslation($orig));
		}

		//test merge.
		$bro['hello'] = 'hey';
		$bro['person'] = 'person';
		$this->translator->setTranslations($bro, 'bro', true);

		$translated = $this->translator->getTranslations('bro');

		$this->assertCount(count($bro), $translated);

		foreach ( $bro as $orig => $translation ) {
			$this->assertTrue(isset($translated[$orig]));
			$this->assertEquals($translation, $translated[$orig]);
			$this->translator->setTranslation($orig, $translation, 'bro');
			$this->assertEquals($translation, $this->translator->getTranslation($orig, 'bro'));
			$this->assertEquals($translation, $this->translator->getTranslation($orig));
		}

		//test merge.
		unset($bro['nice']);
		$bro['hello'] = 'hey';
		$bro['person'] = 'person';
		$this->translator->setTranslations($bro, 'bro', false);

		$translated = $this->translator->getTranslations('bro');

		$this->assertCount(count($bro), $translated);

		foreach ( $translated as $orig => $translation ) {
			$this->assertTrue(isset($bro[$orig]));
			$this->assertEquals($translation, $this->translator->getTranslation($orig, 'bro'));
		}

	}

	public function testTranslator()
	{

		$this->translator = $this->make();

		$this->translator->setDefaultLang('de');
		$this->assertEquals('de', $this->translator->getDefaultLang());

	}


}
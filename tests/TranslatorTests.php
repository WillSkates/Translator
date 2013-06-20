<?php

use WillSkates\Translator\Translator;

class TranslatorTests extends PHPUnit_Framework_TestCase
{

	public function make()
	{
		return new Translator();
	}

	public function testCreation()
	{
	    $translator = $this->make();
	    $this->assertEquals('en', $translator->getDefaultLang());
	}

	public function testEnglish()
	{

		$translator = $this->make();

		$en = array(
			'hello' => 'hi',
			'nice' => 'yay'
		);

		$translator->setTranslations($en, 'en');

		$translated = $translator->getTranslations('en');

		$this->assertCount(count($en), $translated);

		$translator->setDefaultLang('en');

		foreach ( $en as $orig => $translation ) {
			$this->assertTrue(isset($translated[$orig]));
			$this->assertEquals($translation, $translated[$orig]);
			$translator->setTranslation($orig, $translation, 'en');
			$this->assertEquals($translation, $translator->getTranslation($orig, 'en'));
			$this->assertEquals($translation, $translator->getTranslation($orig));
		}

		//test merge.
		$en['hello'] = 'hey';
		$en['person'] = 'person';
		$translator->setTranslations($en, 'en', true);

		$translated = $translator->getTranslations('en');

		$this->assertCount(count($en), $translated);

		foreach ( $en as $orig => $translation ) {
			$this->assertTrue(isset($translated[$orig]));
			$this->assertEquals($translation, $translated[$orig]);
			$translator->setTranslation($orig, $translation, 'en');
			$this->assertEquals($translation, $translator->getTranslation($orig, 'en'));
			$this->assertEquals($translation, $translator->getTranslation($orig));
		}

		//test merge.
		unset($en['nice']);
		$en['hello'] = 'hey';
		$en['person'] = 'person';
		$translator->setTranslations($en, 'en', false);

		$translated = $translator->getTranslations('en');

		$this->assertCount(count($en), $translated);

		foreach ( $translated as $orig => $translation ) {
			$this->assertTrue(isset($en[$orig]));
			$this->assertEquals($translation, $translator->getTranslation($orig, 'en'));
		}

	}

	public function testGerman()
	{

		$translator = $this->make();

		$de = array(
			'hello' => 'hallo',
			'nice' => 'gut'
		);

		$translator->setTranslations($de, 'de');

		$translated = $translator->getTranslations('de');

		$this->assertCount(count($de), $translated);

		$translator->setDefaultLang('de');

		foreach ( $de as $orig => $translation ) {
			$this->assertTrue(isset($translated[$orig]));
			$this->assertEquals($translation, $translated[$orig]);
			$translator->setTranslation($orig, $translation, 'de');
			$this->assertEquals($translation, $translator->getTranslation($orig, 'de'));
			$this->assertEquals($translation, $translator->getTranslation($orig));
		}

		//test merge.
		$de['hello'] = 'hey';
		$de['person'] = 'person';
		$translator->setTranslations($de, 'de', true);

		$translated = $translator->getTranslations('de');

		$this->assertCount(count($de), $translated);

		foreach ( $de as $orig => $translation ) {
			$this->assertTrue(isset($translated[$orig]));
			$this->assertEquals($translation, $translated[$orig]);
			$translator->setTranslation($orig, $translation, 'de');
			$this->assertEquals($translation, $translator->getTranslation($orig, 'de'));
			$this->assertEquals($translation, $translator->getTranslation($orig));
		}

		//test merge.
		unset($de['nice']);
		$de['hello'] = 'hey';
		$de['person'] = 'person';
		$translator->setTranslations($de, 'de', false);

		$translated = $translator->getTranslations('de');

		$this->assertCount(count($de), $translated);

		foreach ( $translated as $orig => $translation ) {
			$this->assertTrue(isset($de[$orig]));
			$this->assertEquals($translation, $translator->getTranslation($orig, 'de'));
		}

	}

	public function testBro()
	{

		$translator = $this->make();

		$bro = array(
			'hello' => 'Yo!',
			'nice' => 'Dayum!'
		);

		$translator->setTranslations($bro, 'bro');

		$translated = $translator->getTranslations('bro');

		$this->assertCount(count($bro), $translated);

		$translator->setDefaultLang('bro');

		foreach ( $bro as $orig => $translation ) {
			$this->assertTrue(isset($translated[$orig]));
			$this->assertEquals($translation, $translated[$orig]);
			$translator->setTranslation($orig, $translation, 'bro');
			$this->assertEquals($translation, $translator->getTranslation($orig, 'bro'));
			$this->assertEquals($translation, $translator->getTranslation($orig));
		}

		//test merge.
		$bro['hello'] = 'hey';
		$bro['person'] = 'person';
		$translator->setTranslations($bro, 'bro', true);

		$translated = $translator->getTranslations('bro');

		$this->assertCount(count($bro), $translated);

		foreach ( $bro as $orig => $translation ) {
			$this->assertTrue(isset($translated[$orig]));
			$this->assertEquals($translation, $translated[$orig]);
			$translator->setTranslation($orig, $translation, 'bro');
			$this->assertEquals($translation, $translator->getTranslation($orig, 'bro'));
			$this->assertEquals($translation, $translator->getTranslation($orig));
		}

		//test merge.
		unset($bro['nice']);
		$bro['hello'] = 'hey';
		$bro['person'] = 'person';
		$translator->setTranslations($bro, 'bro', false);

		$translated = $translator->getTranslations('bro');

		$this->assertCount(count($bro), $translated);

		foreach ( $translated as $orig => $translation ) {
			$this->assertTrue(isset($bro[$orig]));
			$this->assertEquals($translation, $translator->getTranslation($orig, 'bro'));
		}

	}

	public function testTranslator()
	{

		$translator = $this->make();

		$translator->setDefaultLang('de');
		$this->assertEquals('de', $translator->getDefaultLang());

	}


}
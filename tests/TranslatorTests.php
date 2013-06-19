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

	public function testTranslator()
	{

		$translator = $this->make();

		$translator->setDefaultLang('de');
		$this->assertEquals('de', $translator->getDefaultLang());

		$en = array(
			'hello' => 'hi',
			'nice' => 'yay'
		);

		$de = array(
			'hello' => 'hallo',
			'nice' => 'gut'
		);

		$bro = array(
			'hello' => 'Yo!',
			'nice' => 'Dayum!'
		);

		$translator->setTranslations($en, 'en');
		$translator->setTranslations($de, 'de');
		$translator->setTranslations($bro, 'bro');

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

		$translated = $translator->getTranslations('de');

		$this->assertCount(count($en), $translated);

		$translator->setDefaultLang('de');

		foreach ( $de as $orig => $translation ) {
			$this->assertTrue(isset($translated[$orig]));
			$this->assertEquals($translation, $translated[$orig]);
			$translator->setTranslation($orig, $translation, 'de');
			$this->assertEquals($translation, $translator->getTranslation($orig, 'de'));
			$this->assertEquals($translation, $translator->getTranslation($orig));
		}

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

	}


}
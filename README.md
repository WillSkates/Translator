Translator
==========

Translator is a very simple string translation library for PHP.

##Build
[![Build Status](https://secure.travis-ci.org/WillSkates/Translator.png?branch=master)](http://travis-ci.org/WillSkates/Translator)

##How To Install.

The best way to install Translator is through composer.

```JSON
	{
	    "require": {
	        "willskates/translator": "v1.0.1"
	    }
	}
```

##Usage.

###Creating the Translator Object

```PHP
	<?php
		$translator = new Translator();
	?>
```

###Setting a Translation.

```PHP

	<?php
		$translator->setTranslation('Hello', 'Hallo', 'de');
	?>

```

###Getting a Translation.

```PHP

	<?php
		$hello = $translator->getTranslation('Hello', 'de');
		//The value of $hello is 'Hallo'.
	?>

```


###Setting a list of translations.

```PHP

	<?php
		$translator->setTranslations(
			array(
				'Hello' => 'Hallo',
				'Goodbye' => 'auf Wiedersehen'
			),
			'de'
		);
	?>

```

###Getting a list of translations.

```PHP

	<?php
		$german = $translator->getTranslations('de');

		//$german is an array, assuming they were set it will contain ['Hello' => 'Hallo', 'Goodbye' => 'auf Wiedersehen'].
	?>

```

###Setting and using the default language.

```PHP

	<?php
		$translator->setTranslations(
			array(
				'Hello' => 'Hallo',
				'Goodbye' => 'auf Wiedersehen'
			),
			'de'
		);

		$translator->setTranslations(
			array(
				'Hello' => 'Yo',
				'Goodbye' => 'Piece!'
			),
			'bro'
		);

		$translator->setDefaultLang('de');
		$hello = $translator->getTranslation('Hello'); //Hallo
		$goodbye = $translator->getTranslation('Goodbye'); //auf Wiedersehen

		$translator->setDefaultLang('bro');
		$hello = $translator->getTranslation('Hello'); //Yo
		$goodbye = $translator->getTranslation('Goodbye'); //Piece!

	?>

```
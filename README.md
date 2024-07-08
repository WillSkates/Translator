Translator
==========

Translator is a very simple string translation library for PHP.

## Build
[![Build Status](https://secure.travis-ci.org/WillSkates/Translator.png?branch=master)](http://travis-ci.org/WillSkates/Translator)

## How To Install.

The best way to install Translator is through composer.

```JSON
{
    "require": {
        "willskates/translator": "1.1.0"
    }
}
```

## Usage.

### Creating the Translator Object

```PHP
$translator = new Translator();
```

### Setting a Translation.

```PHP
$translator->useTranslation('Hello', 'Hallo');
```

### Getting a Translation.

```PHP
$hello = $translator->translate('Hello');
//The value of $hello is 'Hallo'.
```


### Setting a list of translations.

```PHP
$translator->useTranslations(
    [
        'Hello' => 'Hallo',
        'Goodbye' => 'auf Wiedersehen'
    ]
);
```

### Getting a list of translations.

```PHP
$german = $translator->translations();

//$german is an array, assuming they were set it will contain ['Hello' => 'Hallo', 'Goodbye' => 'auf Wiedersehen'].
```

### Setting and using the default language.

```PHP
$deTranslator = new Translator();

$deTranslator->useTranslations(
    [
        'Hello' => 'Hallo',
        'Goodbye' => 'auf Wiedersehen'
    ]
);

$hello = $deTranslator->translate('Hello'); //Hallo
$goodbye = $deTranslator->translate('Goodbye'); //auf Wiedersehen

$broTranslator = new Translator();

$broTranslator->useTranslations(
    [
        'Hello' => 'Yo',
        'Goodbye' => 'Piece!'
    ]
);

$hello = $broTranslator->translate('Hello'); //Yo
$goodbye = $broTranslator->translate('Goodbye'); //Piece!
```

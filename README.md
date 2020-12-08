# URL Language extractor

[![Build status](https://travis-ci.com/roelofjan-elsinga/url-language-extractor.svg)](https://travis-ci.com/roelofjan-elsinga/url-language-extractor)
[![StyleCI Status](https://github.styleci.io/repos/205117674/shield)](https://github.styleci.io/repos/205117674)
[![Code coverage](https://codecov.io/gh/roelofjan-elsinga/url-language-extractor/branch/master/graph/badge.svg)](https://codecov.io/gh/roelofjan-elsinga/url-language-extractor)
[![Total Downloads](https://poser.pugx.org/roelofjan-elsinga/url-language-extractor/downloads)](https://packagist.org/packages/roelofjan-elsinga/url-language-extractor)
[![Latest Stable Version](https://poser.pugx.org/roelofjan-elsinga/url-language-extractor/v/stable)](https://packagist.org/packages/roelofjan-elsinga/url-language-extractor)
[![License](https://poser.pugx.org/roelofjan-elsinga/url-language-extractor/license)](https://packagist.org/packages/roelofjan-elsinga/url-language-extractor)

This package helps you to resolve the language in a URL.

## Requirements
- php >= 8.0

## Installation
You can require the package through Composer.

```bash
composer require roelofjan-elsinga/url-language-extractor
```

# Usage

You can extract the language from the URL by using the following code:

```php
$short_code = LanguageExtractor::forUrl('/page/en/content-page')
    ->setAcceptedShortCodes(['en', 'nl', 'es', 'fr'])
    ->extract();

print $short_code; // 'en'
```

## Contributing
Do you want to contribute to this project? Great! You can contribute by working on the following things:
- Adding additional ways to detect a language from a URL
- Writing tests to detect edge cases
- Filing issues for new features or bugs

## Testing
You can run tests by running ``vendor/bin/phpunit`` in your terminal.

<p align="center">
<a href="https://travis-ci.com/roelofjan-elsinga/url-language-extractor"><img src="https://travis-ci.com/roelofjan-elsinga/url-language-extractor.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/roelofjan-elsinga/url-language-extractor"><img src="https://poser.pugx.org/roelofjan-elsinga/url-language-extractor/downloads" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/roelofjan-elsinga/url-language-extractor"><img src="https://poser.pugx.org/roelofjan-elsinga/url-language-extractor/v/stable" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/roelofjan-elsinga/url-language-extractor"><img src="https://poser.pugx.org/roelofjan-elsinga/url-language-extractor/license" alt="License"></a>
</p>

# URL Language extractor

This package helps you to resolve the language in a URL.

## Requirements
- php >= 7.2

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

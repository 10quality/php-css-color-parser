# CSS Color Parser

[![Latest Stable Version](https://poser.pugx.org/10quality/php-css-color-parser/v/stable)](https://packagist.org/packages/10quality/php-css-color-parser)
[![Total Downloads](https://poser.pugx.org/10quality/php-css-color-parser/downloads)](https://packagist.org/packages/10quality/php-css-color-parser)
[![License](https://poser.pugx.org/10quality/php-css-color-parser/license)](https://packagist.org/packages/10quality/php-css-color-parser)

A little package used to parse CSS colors in order to normalize them into different formats (supported: hex and argb).

## Requirements

* PHP >= 5.4

## Install

```bash
composer require 10quality/php-css-color-parser
```

## Usage

Use statement:
```php
use TenQuality\Utility\Color\CssParser;
```

For a normalized HEX code:
```php
// This will echo "#44FCCD"
echo CssParser::hex('#44fCCd');

// This will echo "#44FFFF"
echo CssParser::hex('#4ff');

// This will echo "#FFFFFF"
echo CssParser::hex('white');

// This will echo "#89CC7F"
echo CssParser::hex('89cc7F');
```

For a normalized HEX code (with transparency):
```php
// This will echo "#44FCCD44"
echo CssParser::hexTransparent('#44fCCd44');

// This will echo "#44FFFF00"
echo CssParser::hexTransparent('#4ff');

// This will echo "#FFFFFF00"
echo CssParser::hexTransparent('white');
```

For ARGB:
```php
// This will echo "0x44FCCD44"
echo CssParser::argb('#44fCCd44');

// This will echo "0x44FFFF00"
echo CssParser::argb('#4ff');

// This will echo "0xFFFFFF00"
echo CssParser::argb('white');
```

To add more CSS color labes:
```php
// This will exho "#00008B"
echo CssParser::hex('darkblue', ['/darkblue/','/darkgreen/'], ['00008B','006400']);
```
**NOTE:** Second parameter passed by containes the list of additional css labels to parse and the third paramener contains its HEX code in caps and without the hashtag character.

## Copyright & License

MIT License.

(c) 2018 [10 Quality](https://www.10quality.com/)
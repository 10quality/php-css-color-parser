# CSS Color Parser

[![Latest Stable Version](https://poser.pugx.org/10quality/php-css-color-parser/v/stable)](https://packagist.org/packages/10quality/php-css-color-parser)
[![Total Downloads](https://poser.pugx.org/10quality/php-css-color-parser/downloads)](https://packagist.org/packages/10quality/php-css-color-parser)
[![License](https://poser.pugx.org/10quality/php-css-color-parser/license)](https://packagist.org/packages/10quality/php-css-color-parser)

A little package used to parse CSS colors in order to normalize them into different formats (supported: hex, argb and rgba).

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

// This will echo "#44FFFFFF"
echo CssParser::hexTransparent('#4ff');

// This will echo "#FFFFFFFF"
echo CssParser::hexTransparent('white');
```

For ARGB:
```php
// This will echo "0x4444FCCD"
echo CssParser::argb('#44fCCd44');

// This will echo "0xFF44FFFF"
echo CssParser::argb('#4ff');

// This will echo "0xFFFFFFFF"
echo CssParser::argb('white');
```

For RGBA:
```php
// This will echo "rgba(57,115,157,0.53)"
echo CssParser::rgba('#39739d88');

// This will echo "rgba(255,255,255,1)"
echo CssParser::rgba('white');
```

### Casting

To return the color's rgba codes as an array:
```php
// This will dump the following array "[57,115,157,255]"
var_dump(CssParser::array('#39739d'));
```

To return the color's rgba codes as a JSON string:
```php
// This will echo "{"red":57,"green":115,"blue":157,"alpha":255}"
echo CssParser::string('#39739d');
```

### Extending named colors

To add more CSS named colors:
```php
// This will exho "#00008B"
echo CssParser::hex('darkblue', ['/darkblue/','/darkgreen/'], ['00008B','006400']);
```
**NOTE:** Second parameter passed by containes the list of additional css labels (names) to parse and the third paramener contains its HEX code in caps and without the hashtag character.

## Copyright & License

MIT License.

(c) 2018 [10 Quality](https://www.10quality.com/)
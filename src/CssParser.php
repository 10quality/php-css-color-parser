<?php

namespace TenQuality\Utility\Color;

/**
 * Parser class used to normalize CSS colors them into different formats.
 *
 * @author Cami Mostajo
 * @package TenQuality\Utility\Colors
 * @license MIT
 * @version 1.0.0
 */
class CssParser
{
    /**
     * Raw color being parsed.
     * @since 1.0.0
     *
     * @var string
     */
    protected $raw;
    /**
     * NOMALIZED Color.
     * @since 1.0.0
     *
     * @var string
     */
    protected $color;
    /**
     * Additional color labels.
     * @since 1.0.0
     *
     * @var array
     */
    protected $labels;
    /**
     * Additional color labels' hex codes.
     * @since 1.0.0
     *
     * @var array
     */
    protected $hexCodes;
    /**
     * Default constructor.
     * @since 1.0.0
     *
     * @param string $color    CSS color to parse.
     * @param array  $labels   Additional CSS labels to parse in `parseColorLabels()`.
     * @param array  $hexCodes HEX Codes of the additional CSS labels to parse in `parseColorLabels()`.
     */
    public function __construct($color, $labels = [], $hexCodes = [])
    {
        $this->raw = $color;
        $this->color = $color;
        $this->labels = $labels;
        $this->hexCodes = $hexCodes;
    }
    /**
     * Returns color as a normalized HEX code.
     * STATIC CONSTRUCTOR.
     * @since 1.0.0
     *
     * @param string $color    CSS color to parse.
     * @param array  $labels   Additional CSS labels to parse in `parseColorLabels()`.
     * @param array  $hexCodes HEX Codes of the additional CSS labels to parse in `parseColorLabels()`.
     *
     * @return string
     */
    public static function hex($color, $labels = [], $hexCodes = [])
    {
        $parser = new self($color, $labels, $hexCodes);
        return $parser->applyFilters()
            ->normalizeAbbreviations()
            ->parseColorLabels()
            ->toHex();
    }
    /**
     * Returns color as a normalized HEX code (with transparency).
     * STATIC CONSTRUCTOR.
     * @since 1.0.0
     *
     * @param string $color    CSS color to parse.
     * @param array  $labels   Additional CSS labels to parse in `parseColorLabels()`.
     * @param array  $hexCodes HEX Codes of the additional CSS labels to parse in `parseColorLabels()`.
     *
     * @return string
     */
    public static function hexTransparent($color, $labels = [], $hexCodes = [])
    {
        $parser = new self($color, $labels, $hexCodes);
        return $parser->applyFilters()
            ->normalizeAbbreviations()
            ->parseColorLabels()
            ->toHexTransparent();
    }
    /**
     * Returns color as a normalized ARGB code.
     * STATIC CONSTRUCTOR.
     * @since 1.0.0
     *
     * @param string $color    CSS color to parse.
     * @param array  $labels   Additional CSS labels to parse in `parseColorLabels()`.
     * @param array  $hexCodes HEX Codes of the additional CSS labels to parse in `parseColorLabels()`.
     *
     * @return string
     */
    public static function argb($color, $labels = [], $hexCodes = [])
    {
        $parser = new self($color, $labels, $hexCodes);
        return $parser->applyFilters()
            ->normalizeAbbreviations()
            ->parseColorLabels()
            ->toArgb();
    }
    /**
     * Applies basic filters:
     * - trim.
     * - upper case conversion.
     * - hashtag removal.
     * @since 1.0.0
     *
     * @return object|CssParser
     */
    public function applyFilters()
    {
        $this->color = str_replace('#', '', strtoupper(trim($this->color)));
        return $this;
    }
    /**
     * Applies normalization to abbreviations.
     * i.e. #CCC to #CCCCCC
     * @since 1.0.0
     *
     * @return object|CssParser
     */
    public function normalizeAbbreviations()
    {
        if (strlen($this->color) === 3) {
            $code = [
                substr($this->color, 0, 1),
                substr($this->color, 1, 1),
                substr($this->color, 2, 1)
            ];
            $this->color = $code[0].$code[0].$code[1].$code[1].$code[2].$code[2];
        }
        return $this;
    }
    /**
     * Parses color labels and converts them into HEX codes.
     * @since 1.0.0
     *
     * @return object|CssParser
     */
    public function parseColorLabels()
    {
        $this->color = preg_replace(
            array_merge([
                '/WHITE/',
                '/BLACK/',
                '/RED/',
                '/GREEN/',
                '/BLUE/',
                '/YELLOW/',
                '/PURPLE/',
                '/MAGENTA/',
                '/BROWN/',
                '/CYAN/',
                '/GREY/',
                '/LIME/',
                '/CORAL/',
            ], $this->labels),
            array_merge([
                'FFFFFF',
                '000000',
                'FF0000',
                '008000',
                '0000FF',
                'FFFF00',
                '800080',
                'FF00FF',
                'A52A2A',
                '00FFFF',
                '808080',
                '00FF00',
                'FF7F50',
            ], $this->hexCodes),
            $this->color
        );
        return $this;
    }
    /**
     * Returns color's hex code.
     * @since 1.0.0
     *
     * @return string
     */
    public function toHex()
    {
        return '#'. substr($this->color, 0, 6);
    }
    /**
     * Returns color's hex code (with transparency).
     * @since 1.0.0
     *
     * @return string
     */
    public function toHexTransparent()
    {
        return '#'.str_pad($this->color, 8, '0');
    }
    /**
     * Returns color's RGBA code.
     * @since 1.0.0
     *
     * @return string
     */
    public function toArgb()
    {
        return '0x'.str_pad(str_replace('#', '', $this->color), 8, '0');
    }
}
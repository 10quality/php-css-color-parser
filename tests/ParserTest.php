<?php

use TenQuality\Utility\Color\CssParser;

/**
 * Emoji unit testing.
 *
 * @author Cami Mostajo
 * @package TenQuality\Utility\Colors
 * @license MIT
 * @version 1.0.4
 */
class ParserTest extends PHPUnit_Framework_TestCase
{
    public function testFilters()
    {
        $this->assertEquals(
            '#CFCF88',
            CssParser::hex(' #cfCf8833  ')
        );
    }
    public function testAbbrv()
    {
        $this->assertEquals(
            '#FF5588',
            CssParser::hex('#f58')
        );
    }
    public function testHexTransparent()
    {
        $this->assertEquals(
            '#CFCF8833',
            CssParser::hexTransparent('#cfCf8833')
        );
    }
    public function testHexTransparentPadding()
    {
        $this->assertEquals(
            '#FFFFFFFF',
            CssParser::hexTransparent('#fff')
        );
    }
    public function testArgb()
    {
        $this->assertEquals(
            '0xFFFF8855',
            CssParser::argb('#f85')
        );
    }
    public function testWhiteLabel()
    {
        $this->assertEquals(
            '#FFFFFF',
            CssParser::hex('white')
        );
    }
    public function testCoralLabel()
    {
        $this->assertEquals(
            '#FF7F50',
            CssParser::hex('coral')
        );
    }
    public function testNoHastag()
    {
        $this->assertEquals(
            '#89CC7F',
            CssParser::hex('89cc7F')
        );
    }
    public function testRgba()
    {
        $this->assertEquals(
            'rgba(57,115,157,0.53)',
            CssParser::rgba('#39739d88')
        );
    }
    public function testRgbaOpaque()
    {
        $this->assertEquals(
            'rgba(57,115,157,1)',
            CssParser::rgba('#39739d')
        );
    }
    public function testArray()
    {
        $this->assertEquals(
            [57,115,157,255],
            CssParser::array('#39739d')
        );
    }
    public function testString()
    {
        $this->assertEquals(
            '{"red":57,"green":115,"blue":157,"alpha":255}',
            CssParser::string('#39739d')
        );
    }
    public function testArgbFromHex()
    {
        $this->assertEquals(
            '0xFFDBDD3C',
            CssParser::argb('#dbdd3c')
        );
    }
    public function testArgbFromHexTransparent()
    {
        $this->assertEquals(
            '0xCC39739D',
            CssParser::argb('#39739dCC')
        );
    }
    public function testAlpha()
    {
        CssParser::setAlpha(CssParser::ALPHA_TRANSPARENT);
        $this->assertEquals(
            '0x00DBDD3C',
            CssParser::argb('#dbdd3c')
        );
        // Restore
        CssParser::setAlpha(CssParser::ALPHA_OPAQUE);
        $this->assertEquals(
            '0xFFDBDD3C',
            CssParser::argb('#dbdd3c')
        );
    }
    public function testConstants()
    {
        $this->assertEquals('F', CssParser::ALPHA_OPAQUE);
        $this->assertEquals('0', CssParser::ALPHA_TRANSPARENT);
    }
}
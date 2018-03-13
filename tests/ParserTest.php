<?php

use TenQuality\Utility\Color\CssParser;

/**
 * Emoji unit testing.
 *
 * @author Cami Mostajo
 * @package TenQuality\Utility\Colors
 * @license MIT
 * @version 1.0.0
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
            '#FFFFFF00',
            CssParser::hexTransparent('#fff')
        );
    }
    public function testArgb()
    {
        $this->assertEquals(
            '0xFF885500',
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
}
<?php
require_once 'PHPUnit/Framework.php';

require_once 'RomanNumeral.php';

class MainTest
extends PHPUnit_Framework_TestCase
{
    public function provide_numerals ( )
    {
        return array(
            array( 1, 'I' ),
            array( 2, 'II' ),
            array( 3, 'III' ),
            array( 4, 'IIII' ),
            array( 4, 'IV' ),
            array( 5, 'V'),
            array( 6, 'VI'),
            array( 7, 'VII'),
            array( 8, 'VIII'),
            array( 9, 'VIIII'),
            array( 9, 'IX' ),
            array( 10, 'X'),
            array( 20, 'XX'),
            array( 40, 'XL'),
            array( 49, 'XLIX'),
            array( 50, 'L'),
            array( 100, 'C'),
            array( 500, 'D'),
            array( 1000, 'M'),
            array( 1234, 'MCCXXXIV' ),
        ); // END datasets
    }

    /**
     * @dataProvider provide_numerals
     * @param integer $expected
     * @param string $numeral
     */
    public function test_basic_stuff ( $expected, $numeral )
    {
        $Numeral = new RomanNumeral($numeral);

        $this->assertEquals($expected, $Numeral->toInt());

    }
    public function provide_parsables(){
        return array(
            array(array('I'), 'I'),
            array(array('I', 'I'), 'II'),
            array(array('I', 'I', 'I'), 'III'),
            array(array('I', 'I', 'I', 'I'), 'IIII'),
            array(array('V'), 'V'),
        );
    }

    /**
     * @dataProvider provide_parsables
     * @param integer $expected
     * @param string $numeral
     */
    public function test_parse( $expected, $numeral ){
        $Numeral = new RomanNumeral($numeral);
        $this->assertEquals($expected, $Numeral->parse());
    }


     /**
     * @dataProvider provide_numerals
     * @param integer $expected
     * @param string $numeral
     */
    public function test_addEmUp($expected, $numeral) {
        $Numeral = new RomanNumeral($numeral);
        $parsed = $Numeral->parse();
        $this->assertEquals($expected, $Numeral->addEmUp($parsed));
    }

} // END RomanNumeralTest

// MainTest->test_basic_stuff(1, 'I');
// MainTest->test_basic_stuff(2, 'II');

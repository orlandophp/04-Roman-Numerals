<?php

require_once 'PHPUnit/Framework.php';

require_once 'RomanNumeral.php';

class RomanNumeralTest
extends PHPUnit_Framework_TestCase
{
    public function test_class_exists ( )
    {
        $this->assertTrue(
            class_exists('RomanNumeral')
        );
    } // END test_class_exists

    public function test_class_attr()
    {
        $Numeral = new RomanNumeral('XVII');
        $expected = 'XVII';
        $this->assertEquals($expected, $Numeral->numeral);
    } // END test_class_attr





    public function test_validate_true ( )
    {
        $Numeral = new RomanNumeral('XVII');

        $this->assertTrue(method_exists(
            $Numeral, 'isValid'
        ), 'The $Numeral should have a isValid() method!');

        $this->assertTrue($Numeral->isValid());


    } // END test_validate_true


    public static function provide_false_validations ( )
    {
        return array
        (
            'Repeating Ls is ERROR' => array( 'LL' ),
            'Putting L before C is ERROR' => array( 'LC' ),
            'Repeating D is ERROR' => array( 'DD' ),
            'Repeating V is ERROR' => array( 'VV' ),
        ); // END datasets
    } // END provide_false_validations


    /**
     * @dataProvider provide_false_validations
     * @param string $numeral
     */
    public function test_validate_false ( $numeral )
    {
        $Numeral = new RomanNumeral($numeral);
        $this->assertFalse($Numeral->isValid());

    } //END test_validate_false



} // END RomanNumeralTest
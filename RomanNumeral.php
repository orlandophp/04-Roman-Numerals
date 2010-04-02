<?php

class RomanNumeral
{
    public $numeral;

    public $numerals = 'IVXLCDM';

    public $num_array = array();


    public function __construct($value){
        $this->numeral = $value;
    }

    public function isValid ( )
    {
        foreach (array('VV','LL','CC','DD') as $doubles)
        {
           if ( stripos( $this->numeral, $doubles) !== false )
            return false;
        }

        foreach ( str_split($this->numeral) as $numeral )
        {
            if ( stripos( $this->numerals, $numeral ) === false )
                return false;

        } // END foreach



        if ($this->numeral=='LC')
            return false;

        return true;
    } // END isValid


    public function getNumeral(){
        return $this->numeral;
    } // END getNumeral

} // END RomanNumeral
<?php

class RomanNumeral
{
    public function __construct ( $numeral )
    {
        $this->_value = $numeral;
        $this->_lookup =array (
        'I'=> 1,
        'V' => 5,
        'X' => 10,
        'L' => 50,
        'C' => 100,
        'D' => 500,
        'M' => 1000,
        );

    }

    public function toInt ( )
    {
        return $this->addEmUp($this->parse());
    }

    public function parse() {
        return str_split($this->_value );
    }

    public function addEmUp($numerals) {
        $calculated = 0;
        // array ('X', 'L', 'I', 'X')
        $numerals = array_reverse($numerals);
        // array ('X', 'I', 'L', 'X')
        foreach ($numerals as $numeral) {
            // numeral = X , calculated = 0

            $calculated += $this->_lookup[$numeral];
        }
        return $calculated;
    }

}
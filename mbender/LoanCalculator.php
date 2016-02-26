<?php

namespace Mbender;

class LoanCalculator {


    /**
     * @param $rate The interest rate for the loan expressed as a monthly rate.
     * @param $payment The monthly payment, which should always be shown as a negative amount.
     * @param $presentValue The current loan balance
     * @return float|null
     */
    public static function NPER($rate, $payment, $presentValue)
    {
        $f = new \Financial();
        return $f->NPER($rate/12, $payment*-1, $presentValue);
    }

}
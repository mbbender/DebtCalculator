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

    /**
     * Summary
     * Calculates the cumulative interest over a range of payment periods for an investment based
     * on constant-amount periodic payments and a constant interest rate.
     *
     * @param $rate float The interest Rate
     * @param $number_of_periods int The number of payments to be made
     * @param $present_value float The current value of the annuity
     * @param $first_period int The number of the payment period to begin the cumulative calculation
     * @param $last_period int The number of the payment period to end the cumulative calculation
     * @param $end_or_beginning int Whether payments are due at the end or beginning of each period.
     */
    public static function CUMIPMT($rate, $number_of_periods, $present_value, $first_period, $last_period, $end_or_beginning)
    {
        $f = new \Financial();
     //   $nper =
    //    $f->IPMT($rate/12,1,)

    }



}
<?php

namespace Mbender;

class AmortizationRecord {

    /**
     * @var \Carbon\Carbon
     */
    private $date;
    private $balance;
    private $payment;
    /**
     * @var int
     */
    private $principal;
    /**
     * @var int
     */
    private $interest;

    /**
     * AmortizationRecord constructor.
     * @param \Carbon\Carbon $date
     * @param $balance
     * @param $payment
     * @param int $principal
     * @param int $interest
     */
    public function __construct($date, $balance, $payment, $principal, $interest)
    {
        $this->date = $date;
        $this->balance = $balance;
        $this->payment = $payment;
        $this->principal = $principal;
        $this->interest = $interest;
    }
}
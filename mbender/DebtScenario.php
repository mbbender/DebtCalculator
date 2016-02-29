<?php

namespace Mbender;


use Carbon\Carbon;

class DebtScenario {

    private $debts = [];
    private $lumpPayments;
    private $monthlyPayments;
    private $amortizationTable = [];

    public function __construct($debts, $lumpPayments, $monthlyPayments)
    {

        $this->addDebts($debts, false);
        $this->lumpPayments = $lumpPayments;
        $this->monthlyPayments = $monthlyPayments;
    }

    public function addDebt($debt, $reamortize = true)
    {
        $this->debts[$debt->getId()] = $debt;

        $this->sortDebtByRate();

        //$reamortize && $this->amortize($this->debts);
    }

    public function addDebts($debts)
    {
        foreach($debts as $debt)
        {
            $this->addDebt($debt);
        }
    }

    /**
     * @return array
     */
    public function getDebts()
    {
        return $this->debts;
    }

    /**
     * @return mixed
     */
    public function getLumpPayments()
    {
        return $this->lumpPayments;
    }

    /**
     * @return mixed
     */
    public function getMonthlyPayments()
    {
        return $this->monthlyPayments;
    }


    /**
     * @param $debt \Mbender\Debt
     */
    public function amortize($debt)
    {

        if($debt->getCurrentBalance() > 0)
        {
            $date = new Carbon();
            $payment = $debt->getMinimumPayment();
            $balance = $debt->getCurrentBalance() - $payment;
            $principal = 0;
            $interest = 0;

            $amortizationRecord = new AmortizationRecord($date, $balance, $payment, $principal, $interest);
            $this->amortizationTable[$date->getTimestamp()][$debt->getId()] = $amortizationRecord;
        }


    }



    protected function sortDebtByRate()
    {
        usort($this->debts, function ($a, $b)
        {
            if ($a->getCurrentInterestRate() == $b->getCurrentInterestRate()) return 0;

            return ($a->getCurrentInterestRate() > $b->getCurrentInterestRate()) ? - 1 : 1;
        });
    }

}
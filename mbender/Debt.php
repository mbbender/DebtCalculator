<?php

namespace Mbender;


use Money\Money;

class Debt {

    private $name;
    private $currentInterestRate;
    private $currentBalance;
    private $minimumPayment;


    private function __construct($name = null,
                                $currentInterestRate = null,
                                $currentBalance = null,
                                $minimumPayment = null)
    {

        $this->setName($name);
        $this->setCurrentInterestRate($currentInterestRate);
        $this->setCurrentBalance($currentBalance);
        $this->setMinimumPayment($minimumPayment);
    }

    public static function fromYaml($yaml)
    {
        return new static(
            $yaml['name'],
            $yaml['interest-rate'],
            $yaml['current-balance'],
            $yaml['minimum-payment']
        );
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getCurrentInterestRate()
    {
        return $this->currentInterestRate;
    }

    /**
     * @param mixed $currentInterestRate
     */
    public function setCurrentInterestRate($currentInterestRate)
    {
        $this->currentInterestRate = $currentInterestRate / 100;
    }

    /**
     * @return mixed
     */
    public function getCurrentBalance()
    {
        return $this->currentBalance->getAmount();
    }

    /**
     * @param mixed $currentBalance
     */
    public function setCurrentBalance($currentBalance)
    {
        $this->currentBalance = Money::USD((int)($currentBalance*100));
    }


    /**
     * @return mixed
     */
    public function getMinimumPayment()
    {
        return $this->minimumPayment->getAmount();
    }

    /**
     * @param mixed $minimumPayment
     */
    public function setMinimumPayment($minimumPayment)
    {
        $this->minimumPayment = Money::USD((int)($minimumPayment*100));
    }



}
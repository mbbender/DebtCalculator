<?php

namespace Mbender;


use Money\Money;

class Debt {

    private $id;
    private $name;
    private $currentInterestRate;
    private $currentBalance;
    private $minimumPayment;
    private $minimumPayoffPeriod;


    private function __construct($name = null,
                                $currentInterestRate = null,
                                $currentBalance = null,
                                $minimumPayment = null)
    {

        $this->id = uniqid();
        $this->setName($name);
        $this->setCurrentInterestRate($currentInterestRate);
        $this->setCurrentBalance($currentBalance);
        $this->setMinimumPayment($minimumPayment);
        $this->setMinimumPayoffPeriod();
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

    public function getId(){
        return $this->id;
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
    protected function setCurrentInterestRate($currentInterestRate)
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
    protected function setCurrentBalance($currentBalance)
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
    protected function setMinimumPayment($minimumPayment)
    {
        $this->minimumPayment = Money::USD((int)($minimumPayment*100));
    }

    public function getMinimumPayoffPeriod()
    {
        return $this->minimumPayoffPeriod;
    }

    protected function setMinimumPayoffPeriod()
    {
        $this->minimumPayoffPeriod = (new \Financial())->NPER(
            $this->getCurrentInterestRate()/12,
            $this->getMinimumPayment()*-1,
            $this->getCurrentBalance());
    }


}
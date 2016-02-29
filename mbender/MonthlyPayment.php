<?php

namespace Mbender;

use Money\Money;

class MonthlyPayment {

    private $id;
    private $memo;
    private $amount;
    private $startDate;

    private function __construct($memo, $amount, $startDate)
    {
        $this->id = uniqid();
        $this->setMemo($memo);
        $this->setAmount($amount);
        $this->setStartDate($startDate);

    }

    public static function fromYaml($yaml)
    {
        return new static(
            $yaml['memo'],
            $yaml['amount'],
            $yaml['start-date']
        );
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getMemo()
    {
        return $this->memo;
    }

    /**
     * @param mixed $memo
     */
    protected function setMemo($memo)
    {
        $this->memo = $memo;
    }



    /**
     * @return mixed
     */
    public function getAmount()
    {
        return $this->amount->getAmount();
    }

    /**
     * @param mixed $amount
     */
    protected function setAmount($amount)
    {
        $this->amount = Money::USD((int)($amount * 100));
    }

    /**
     * @return mixed
     */
    public function getStartDate()
    {
        return $this->startDate;
    }

    /**
     * @param mixed $startDate
     */
    protected function setStartDate($startDate)
    {
        $this->startDate = $startDate;
    }


}
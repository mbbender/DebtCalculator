<?php

namespace Mbender;


use Money\Money;


class LumpPayment {

    private $memo;
    private $amount;
    private $date;
    private $id;

    private function __construct($memo, $amount, $date)
    {
        $this->id = uniqid();
        $this->setMemo($memo);
        $this->setAmount($amount);
        $this->setDate($date);
    }

    public static function fromYaml($yaml)
    {
        return new static(
            $yaml['memo'],
            $yaml['amount'],
            $yaml['date']
        );
    }

    /**
     * @return string
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
    public function setMemo($memo)
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
    public function setAmount($amount)
    {
        $this->amount = Money::USD((int) ($amount * 100));
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param mixed $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }


}
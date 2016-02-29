<?php

namespace Mbender;

use Symfony\Component\Yaml\Yaml;

class YamlMonthlyPaymentRepository {

    /**
     * @var string
     */
    private $filename;

    public function __construct($filename = 'data.yml')
    {
        $this->filename = $filename;
    }


    public function all()
    {
        $debts = [];
        foreach (Yaml::parse(file_get_contents($this->filename))['monthly'] as $debt)
        {
            $debts[] = MonthlyPayment::fromYaml($debt);
        }

        return $debts;
    }
}
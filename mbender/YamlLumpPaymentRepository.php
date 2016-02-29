<?php

namespace Mbender;

use Symfony\Component\Yaml\Yaml;

class YamlLumpPaymentRepository {

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
        foreach(Yaml::parse(file_get_contents($this->filename))['lump'] as $debt)
        {
            $debts[] = LumpPayment::fromYaml($debt);
        }

        return $debts;
    }
}
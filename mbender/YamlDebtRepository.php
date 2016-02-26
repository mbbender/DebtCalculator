<?php

namespace Mbender;

use Symfony\Component\Yaml\Yaml;

class YamlDebtRepository {

    /**
     * @var string
     */
    private $filename;

    public function __construct($filename = 'debts.yml')
    {
        $this->filename = $filename;
    }


    public function all()
    {
        $debts = [];
        foreach(Yaml::parse(file_get_contents($this->filename)) as $debt)
        {
            $debts[] = Debt::fromYaml($debt);
        }

        return $debts;
    }


}
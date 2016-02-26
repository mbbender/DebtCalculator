<?php

use Mbender\Debt;
use Mbender\LoanCalculator;
use Mbender\YamlDebtRepository;
use Windwalker\Renderer\BladeRenderer;

date_default_timezone_set('America/New_York');

require __DIR__ . '/vendor/autoload.php';

$views = __DIR__ . '/views';
$cache = __DIR__ . '/cache';
$blade = new BladeRenderer($views,array('cache_path' => $cache));


$debts = (new YamlDebtRepository('debts.yml'))->all();

foreach($debts as $debt)
{
    $debt->minPayoff = \Mbender\HumanTimeFormatter::humanTimeFromMonths(
        LoanCalculator::NPER(
            $debt->getCurrentInterestRate(),
            $debt->getMinimumPayment(),
            $debt->getCurrentBalance())
    );
}

echo $blade->render('debt-table',['debts' => $debts]);
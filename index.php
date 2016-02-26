<?php

use Mbender\Debt;
use Mbender\DebtScenario;
use Mbender\LoanCalculator;
use Mbender\YamlLumpPaymentRepository;
use Mbender\YamlDebtRepository;
use Mbender\YamlMonthlyPaymentRepository;
use Windwalker\Renderer\BladeRenderer;

date_default_timezone_set('America/New_York');

require __DIR__ . '/vendor/autoload.php';

$views = __DIR__ . '/views';
$cache = __DIR__ . '/cache';
$blade = new BladeRenderer($views,array('cache_path' => $cache));


$dm = new DebtScenario(
    (new YamlDebtRepository('data.yml'))->all(),
    (new YamlLumpPaymentRepository('data.yml'))->all(),
    (new YamlMonthlyPaymentRepository('data.yml'))->all()
);


echo $blade->render('dashboard',
    [
        'debts' => $dm->getDebts(),
        'lumpPayments' => $dm->getLumpPayments(),
        'monthlyPayments' => $dm->getMonthlyPayments()
    ]);
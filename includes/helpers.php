<?php
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Map currency code → symbol and flag
 */
function fixer_get_currency_info($currency_code) {
    $currencies = [
        'EUR' => ['symbol' => '€', 'flag' => '🇪🇺'],
        'USD' => ['symbol' => '$', 'flag' => '🇺🇸'],
        'GBP' => ['symbol' => '£', 'flag' => '🇬🇧'],
        'JPY' => ['symbol' => '¥', 'flag' => '🇯🇵'],
        'RUB' => ['symbol' => '₽', 'flag' => '🇷🇺'],
        'CNY' => ['symbol' => '¥', 'flag' => '🇨🇳'],
        'CHF' => ['symbol' => 'CHF', 'flag' => '🇨🇭'],
        'PLN' => ['symbol' => 'zł', 'flag' => '🇵🇱'],
    ];

    return $currencies[$currency_code] ?? ['symbol' => $currency_code, 'flag' => ''];
}

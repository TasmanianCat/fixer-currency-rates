<?php
if (!defined('ABSPATH')) {
    exit;
}

function fixer_currency_shortcode($atts) {
    $atts = shortcode_atts(
        [
            'code'     => 'USD',
            'decimals' => 2,
        ],
        $atts
    );

    $rates = fixer_get_exchange_rates();

    if (!$rates || !isset($rates[$atts['code']])) {
        return 'N/A';
    }

    $currency_info = fixer_get_currency_info($atts['code']);
    $symbol = $currency_info['symbol'];
    $flag   = $currency_info['flag'];
    $rate   = number_format((float) $rates[$atts['code']], (int) $atts['decimals']);

    return sprintf(
        '<span class="currency-flag">%s</span> <span class="currency-value">%s %s</span>',
        esc_html($flag),
        esc_html($rate),
        esc_html($symbol)
    );
}
add_shortcode('currency_rate', 'fixer_currency_shortcode');
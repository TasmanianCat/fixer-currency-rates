<?php
if (!defined('ABSPATH')) {
    exit;
}

function fixer_get_exchange_rates() {
    $cache_key = 'fixer_exchange_rates';

    $cached = get_transient($cache_key);
    if ($cached !== false) {
        return $cached;
    }

    $endpoint = 'latest';
    $access_key = FIXER_API_KEY;

    $url = add_query_arg(
        ['access_key' => $access_key],
        "https://data.fixer.io/api/{$endpoint}"
    );

    $response = wp_remote_get($url, [
        'timeout' => 10,
    ]);

    // Network error
    if (is_wp_error($response)) {
        // Cache failure for 1 hour to avoid API hammering
        set_transient($cache_key, null, HOUR_IN_SECONDS);
        return null;
    }

    // HTTP error
    if (wp_remote_retrieve_response_code($response) !== 200) {
        set_transient($cache_key, null, HOUR_IN_SECONDS);
        return null;
    }

    $data = json_decode(wp_remote_retrieve_body($response), true);

    // API error (quota, invalid key, etc.)
    if (empty($data['success']) || empty($data['rates'])) {
        set_transient($cache_key, null, HOUR_IN_SECONDS);
        return null;
    }

    // SUCCESS → cache longer
    set_transient($cache_key, $data['rates'], DAY_IN_SECONDS);

    return $data['rates'];
}
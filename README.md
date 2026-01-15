# Fixer Currency Rates

A lightweight WordPress plugin to display exchange rates per 1 EUR using the [Fixer.io](https://fixer.io) API.

## Features

- Shortcode support
- Caching with WordPress transients
- Flags and currency symbols
- Optimized for Fixer free plan (100 requests/month)
- Safe for production use

## Usage

Use the shortcode anywhere in posts, pages, or theme templates:

```
[currency_rate code="USD"]
[currency_rate code="JPY"]
[currency_rate code="RUB"]
[currency_rate code="CNY"]
```

Each shortcode will display the current exchange rate with the currency symbol and flag.

## Setup

1. Get an API key from https://fixer.io

2. Add this to wp-config.php:

```
define('FIXER_API_KEY', 'your_api_key_here');
```

3. Activate the plugin in the WordPress admin under Plugins → Installed Plugins.

## Example Output

🇺🇸 1.09 $
🇯🇵 157.32 ¥
🇷🇺 102.45 ₽
🇨🇳 7.22 ¥

(Values are updated once per 24 hours by default to stay under the free plan limit.)

## FAQ

Q: Does this plugin expose my API key?
A: No. All API calls are handled server-side and your API key is never sent to the browser.

Q: How often does it update?
A: Exchange rates are cached for 24 hours using WordPress transients to stay safe with the Fixer free plan.

Q: Can I display multiple currencies at once?
A: Yes, just add multiple [currency_rate code="XXX"] shortcodes where needed.

## License

This plugin is licensed under the GPL v2 or later.

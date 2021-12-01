<?php
/**
 * Plugin Name: CSV Data
 * Description: Shortcode for fetching data from csv file/url
 * Version: 0.1.0
 * Author: Jukka Hyytiälä
 * Author URI: https://jukkahyytiala.fi
 */

// Usage: [csv_data url="https://example.com/data.csv" column=1 row=1 cache=3600]
// url: url or file path to csv file
// column: column number (starting from 0)
// row: row number (starting from 0)
// cache: cache time in seconds (optional, default: 0 = no cache)
add_shortcode('csv_data', function ($attr) {
  $settings = shortcode_atts([
    'url' => '',
    'column' => 0,
    'row' => 0,
    'cache' => 0,
  ], $attr);

  $url = $settings['url'];
  $column = $settings['column'];
  $row = $settings['row'];
  $cache = $settings['cache'];

  // check if found from transient
  if ($cache) {
    $transient_name = 'csv_data_' . $url . '_' . $column . '_' . $row;
    $data = get_transient($transient_name);
    if ($data) {
      return $data;
    }
  }

  // read csv file
  $data = @file_get_contents($url);

  // check if file is readable
  if (!$data) {
    return '<!-- CSV Data: File not found. -->';
  }

  // parse csv file
  $data = explode("\n", $data);
  $data = explode(",", $data[$row] ?? '');
  $data = $data[$column] ?? '';

  // save to transient
  if ($cache) {
    set_transient($transient_name, $data, $cache);
  }

  return $data;
});

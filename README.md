<h1 align="center">Welcome to CSV Data 👋</h1>
<p>
  <img alt="Version" src="https://img.shields.io/badge/version-1.0.0-blue.svg?cacheSeconds=2592000" />
  <a href="https://github.com/jukkah/csv-data/blob/main/LICENSE.md" target="_blank">
    <img alt="License: GPLv3" src="https://img.shields.io/badge/License-GPLv3-yellow.svg" />
  </a>
</p>

CSV Data is a simple WordPress plugin that introduces a shortcode for fetching data from CSV file.

## Install

You can install this plugin by simply copying the content of `src` directory to `/path/to/wp-content/plugins/csv-data` directory in your WordPress server. Then you need to activate it from WordPress admin.

## Usage

This plugin introduces `csv_data` shortcode.

```
[csv_data url="https://example.com/data.csv" column=1 row=1 cache=3600]
```

### Parameters

| Name       | Description                       | Type, etc.                            |
|:-----------|:----------------------------------|:--------------------------------------|
| **url**    | Url or file path to the CSV file. | string, required                      |
| **column** | Column number (starting from 0).  | int, required                         |
| **row**    | Row number (starting from 0).     | int, required                         |
| **cache**  | Cache time in seconds.            | int, optional, default = 0 (no cache) |

## Development

### Install

```sh
docker-compose up
```

Then open http://localhost:8000, install WordPress, and activate the plugin.

## Author

👤 **Jukka Hyytiälä**

* Website: https://jukkahyytiala.fi
* GitHub: [@jukkah](https://github.com/jukkah)

## Show your support

Give a ⭐️ if this project helped you!

## 📝 License

Copyright © 2021 [Jukka Hyytiälä](https://github.com/jukkah).<br />
This project is licensed under [GPLv3](https://github.com/jukkah/csv-data/blob/main/LICENSE.md).

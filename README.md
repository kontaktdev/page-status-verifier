# Request Status Verifier

Request Status Verifier is a PHP utility that allows you to check the availability of websites using various HTTP methods (GET, POST, HEAD) with custom timeouts. It provides a flexible and structured way to monitor your websites or URLs.

## Table of Contents
- [Installation](#installation)
- [Usage](#usage)
- [Contributing](#contributing)
- [License](#license)

## Installation

Clone the repository. You can install the Request Status Verifier with Composer:

```shell
composer install
```

## Usage

1. Create Source objects, specifying the URL, custom timeout, and HTTP method for each URL source you want to check.

```shell
$sources = [
    new Source('https://example.com', 5, 'POST'),
    new Source('https://example.org', 15, 'GET'),
    // Add more url sources as needed
];
```

2. Create an instance of the RequestStatusVerifier class, passing the Source objects and check the availability.

```shell
$requestStatusVerifier = new RequestStatusVerifier($sources);
$results = $requestStatusVerifier->checkSources();
```

3. The results can be checked as following:

```shell
$available = $results->getAvailable();
$unavailable = $results->getUnavailable();

foreach ($available as $url) {
    echo "$url is alive!" . PHP_EOL;
}

foreach ($unavailable as $url) {
    echo "$url is not alive." . PHP_EOL;
```
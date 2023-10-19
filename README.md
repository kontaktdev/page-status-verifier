# Request Status Verifier

Request Status Verifier is a PHP utility that allows you to check the availability of websites using various HTTP methods (GET, POST, HEAD) with custom timeouts. It provides a flexible and structured way to monitor your websites or URLs.

## Table of Contents
- [Installation](#installation)
- [Usage](#usage)
- [Contributing](#contributing)
- [License](#license)

## Installation

You can install the Website Checker utility using Composer. Run the following command in your project directory:

```shell
composer require kontaktdev/request-status-verifier
```

## Usage

1. Create Source objects, specifying the URL, custom timeout, and HTTP method for each URL source you want to check.

```shell
use KontaktDev;

$sources = [
    new Source('https://example.com', 5, 'POST'),
    new Source('https://example.org', 15, 'GET'),
    // Add more url sources as needed
];
```

2. Create an instance of the RequestStatusVerifier class, passing the Source objects.

```shell
use YourNamespace\WebsiteChecker;
use YourNamespace\Result;

// Without Result injection
$websiteChecker = new WebsiteChecker($websites);

// With Result injection
$result = new Result();
$websiteChecker = new WebsiteChecker($websites, $result);

$results = $websiteChecker->checkWebsites();
```

3. The results can be analyzed using the Result object, which separates available and unavailable sources.

```shell
$available = $results->getAvailable();
$unavailable = $results->getUnavailable();

foreach ($available as $url) {
    echo "$url is alive!" . PHP_EOL;
}

foreach ($unavailable as $url) {
    echo "$url is not alive." . PHP_EOL;
```
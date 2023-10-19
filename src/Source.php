<?php
namespace KontaktDev;

/**
 * Class Source
 * @package KontaktDev
 */
class Source
{
    private $url;
    private $customTimeout;
    private $httpMethod;

    public function __construct(string $url, int $customTimeout = 10, string $httpMethod = 'GET') {
        $this->url = $url;
        $this->customTimeout = $customTimeout;
        $this->httpMethod = $httpMethod;
    }

    /**
     * @return string
     */
    public function getUrl(): string {
        return $this->url;
    }

    /**
     * @return int
     */
    public function getCustomTimeout(): int {
        return $this->customTimeout;
    }

    /**
     * @return string
     */
    public function getHttpMethod(): string {
        return $this->httpMethod;
    }
}


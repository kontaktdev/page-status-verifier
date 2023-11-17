<?php
namespace Kontakt\RequestStatusVerifier;

/**
 * Class Source
 * @package Kontakt\RequestStatusVerifier
 */
class Source
{
    private string $url;
    private int $customTimeout;
    private string $httpMethod;

    /**
     * Source constructor.
     *
     * @param string $url
     * @param int $customTimeout
     * @param string $httpMethod
     */
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


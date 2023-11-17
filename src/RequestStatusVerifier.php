<?php
namespace Kontakt\RequestStatusVerifier;

/**
 * Class RequestStatusVerifier
 * @package Kontakt\RequestStatusVerifier
 */
class RequestStatusVerifier
{
    private array $sources;
    private Result $result;

    /**
     * RequestStatusVerifier constructor.
     * @param array $sources
     */
    public function __construct(array $sources) {
        $this->sources = $sources;
        $this->result = new Result();
    }

    /**
     * @return Result
     */
    public function checkSources(): Result {
        foreach ($this->sources as $source) {
            $url = $source->getUrl();
            $timeout = $source->getCustomTimeout();
            $httpMethod = $source->getHttpMethod();
            $is200 = $this->is200($url, $timeout, $httpMethod);

            if ($is200) {
                $this->result->addAvailable($url);
            } else {
                $this->result->addUnavailable($url);
            }
        }

        return $this->result;
    }

    /**
     * @param string $url
     * @param int $timeout
     * @param string $httpMethod
     * @return bool
     */
    private function is200(string $url, int $timeout, string $httpMethod): bool {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, $timeout);

        if ($httpMethod === 'POST') {
            curl_setopt($ch, CURLOPT_POST, true);
        } elseif ($httpMethod === 'HEAD') {
            curl_setopt($ch, CURLOPT_NOBODY, true);
        }

        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        return $httpCode == 200;
    }
}
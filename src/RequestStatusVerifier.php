<?php
namespace KontaktDev;

class RequestStatusVerifier
{
    private $sources;
    private $result;

    public function __construct(array $sources) {
        $this->sources = $sources;
        $this->result = new Result();
    }

    public function checkSources() {
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

    private function is200(string $url, int $timeout, string $httpMethod) {
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
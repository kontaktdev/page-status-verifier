<?php

use PHPUnit\Framework\TestCase;
use Kontakt\RequestStatusVerifier\Source;
use Kontakt\RequestStatusVerifier\RequestStatusVerifier;
use Kontakt\RequestStatusVerifier\Result;

class RequestStatusVerifierTest extends TestCase {

    public function testManyRequestStatus() {
        $sources = [
            new Source('https://example.com', 5, 'POST'),
            new Source('https://example.com', 5, 'GET'),
            new Source('https://example.com', 5, 'HEAD'),
            new Source('https://zxcvbnm.com', 3, 'POST'),
            new Source('https://zxcvbnm.com', 3, 'GET'),
            new Source('https://zxcvbnm.com', 3, 'HEAD'),
        ];

        $requestStatusVerifier = new RequestStatusVerifier($sources);

        /** @var Result $result */
        $result = $requestStatusVerifier->checkSources();

        $available = $result->getAvailable();
        $unavailable = $result->getUnavailable();

        print_r($available);
        print_r($unavailable);

        $this->assertCount(3, $available);
        $this->assertCount(3, $unavailable);

        $this->assertContains('https://example.com', $available);
        $this->assertContains('https://example.com', $available);
        $this->assertContains('https://example.com', $available);

        $this->assertContains('https://zxcvbnm.com', $unavailable);
        $this->assertContains('https://zxcvbnm.com', $unavailable);
        $this->assertContains('https://zxcvbnm.com', $unavailable);
    }
}
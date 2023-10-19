<?php

use PHPUnit\Framework\TestCase;
use KontaktDev\Result;

class ResultTest extends TestCase {
    public function testAddingAvailableAndUnavailable() {
        $result = new Result();

        $result->addAvailable('https://example.com');
        $available = $result->getAvailable();
        $this->assertEquals(['https://example.com'], $available);

        $result->addUnavailable('https://example.org');
        $unavailable = $result->getUnavailable();
        $this->assertEquals(['https://example.org'], $unavailable);
    }

    public function testEmptyResult() {
        $result = new Result();

        $available = $result->getAvailable();
        $unavailable = $result->getUnavailable();

        $this->assertEmpty($available);
        $this->assertEmpty($unavailable);
    }
}
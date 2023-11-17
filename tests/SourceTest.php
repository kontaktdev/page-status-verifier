<?php

use PHPUnit\Framework\TestCase;
use Kontakt\RequestStatusVerifier\Source;

class SourceTest extends TestCase {

    public function testWebsiteCreation() {
        $url = 'https://example.com';
        $timeout = 10;
        $httpMethod = 'GET';

        $source = new Source($url, $timeout, $httpMethod);

        $this->assertInstanceOf(Source::class, $source);
        $this->assertEquals($url, $source->getUrl());
        $this->assertEquals($timeout, $source->getCustomTimeout());
        $this->assertEquals($httpMethod, $source->getHttpMethod());
    }
}
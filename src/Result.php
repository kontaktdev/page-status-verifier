<?php
namespace Kontakt\RequestStatusVerifier;

/**
 * Class Result
 * @package Kontakt\RequestStatusVerifier
 */
class Result {
    private array $available;
    private array $unavailable;

    /**
     * Result constructor.
     */
    public function __construct() {
        $this->available = [];
        $this->unavailable = [];
    }

    /**
     * @param $url
     */
    public function addAvailable($url): void {
        $this->available[] = $url;
    }

    /**
     * @param $url
     */
    public function addUnavailable($url): void {
        $this->unavailable[] = $url;
    }

    /**
     * @return array
     */
    public function getAvailable(): array {
        return $this->available;
    }

    /**
     * @return array
     */
    public function getUnavailable(): array {
        return $this->unavailable;
    }
}
<?php
namespace KontaktDev;

/**
 * Class Result
 * @package KontaktDev
 */
class Result {
    private $available;
    private $unavailable;

    public function __construct() {
        $this->available = [];
        $this->unavailable = [];
    }

    /**
     * @param $url
     */
    public function addAvailable($url) {
        $this->available[] = $url;
    }

    /**
     * @param $url
     */
    public function addUnavailable($url) {
        $this->unavailable[] = $url;
    }

    /**
     * @return array
     */
    public function getAvailable() {
        return $this->available;
    }

    /**
     * @return array
     */
    public function getUnavailable() {
        return $this->unavailable;
    }
}
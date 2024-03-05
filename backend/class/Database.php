<?php

class Database
{
    // params
    private $urlCsv;
    // constructor
    public function __construct($urlCsv)
    {
        $this->urlCsv = $urlCsv;
    }
    // setters & getters

    /**
     * @param string $urlCsv
     */
    public function getUrlCsv(): string
    {
        return $this->urlCsv;
    }

    /**
     * @param string $urlCsv
     *
     * @return  self
     */
    public function setUrlCsv(string $urlCsv): self
    {
        $this->urlCsv = $urlCsv;

        return $this;
    }

    // mehods
}

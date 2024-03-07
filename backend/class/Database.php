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


    // function for open csv mode only read
    private function openReadCsv()
    {
        return fopen($this->urlCsv, 'r');
    }

    // function for open csv mode only write
    private function openWriteCsv()
    {
        return fopen($this->urlCsv, 'ab');
    }

    // function for read csv
    public function readCsv(): array
    {
        $data = [];
        $csv = $this->openReadCsv();
        $row = 1;

        if ($csv !== false) {
            while (($row = fgetcsv($csv)) !== false) {
                $data[] = $row;
            }
            fclose($this->openReadCsv());
        }
        return $data;
    }

    // function to write a new event
    public function writeEvents(array $array)
    {
        if ($this->openWriteCsv() !== false) {
            if (filesize($this->urlCsv) == 0) {
                $entete = array('Region', 'EventName', 'Date', 'Comment');
                fputcsv($this->openWriteCsv(), $entete, ";");
            }
        }
        fputcsv($this->openWriteCsv(), $array, ";");
        fclose($this->openWriteCsv());
    }

    // function to write a new user
    public function writeUsers(array $array)
    {
        if ($this->openWriteCsv() !== false) {
            if (filesize($this->urlCsv) == 0) {
                $entete = array('Firstname', 'Lastname', 'age', 'sex', 'phone', 'mail', 'region', 'Availability day', 'Availability hour', 'Privileged post', 'Free expression');
                fputcsv($this->openWriteCsv(), $entete, ";");
            }
        }
        fputcsv($this->openWriteCsv(), $array, ";");
        fclose($this->openWriteCsv());
    }

    // Function to create a new mission with assignment of volunteers
    public function writeMissions(array $array)
    {
        if ($this->openWriteCsv() !== false) {
            if (filesize($this->urlCsv) == 0) {
                $entete = array('Event Name', 'Volunteers',  'Date');
                fputcsv($this->openWriteCsv(), $entete, ";");
            }
        }
        fputcsv($this->openWriteCsv(), $array, ";");
        fclose($this->openWriteCsv());
    }
}
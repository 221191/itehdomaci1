<?php

class Glumac
{
    public $id;
    public $ime;
    public $prezime;
    public $predstava_id;

    function __construct($id, $ime, $prezime, $predstava_id)
    {
        $this->id = $id;
        $this->ime = $ime;
        $this->prezime = $prezime;
        $this->predstava_id = $predstava_id;
    }
}
?>
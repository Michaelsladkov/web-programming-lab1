<?php

class ShotData
{
    private $execution_time;
    private $time;
    private $result;
    private $x;
    private $y;
    private $r;

    public function __construct($x, $y, $r, $result, $time, $execution_time)
    {
         $this -> x = $x;
         $this -> y = $y;
         $this -> r = $r;
         $this -> result = $result;
         $this -> time = $time;
         $this -> execution_time = $execution_time;
    }

    public function getY()
    {
        return $this->y;
    }

    public function getR()
    {
        return $this->r;
    }

    public function getX()
    {
        return $this->x;
    }

    public function getResult()
    {
        return $this->result;
    }

    public function getTime()
    {
        return $this->time;
    }

    public function getExecutionTime()
    {
        return $this->execution_time;
    }
}
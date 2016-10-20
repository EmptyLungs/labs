<?php

/**
 * Created by PhpStorm.
 * User: rint
 * Date: 19.10.2016
 * Time: 6:58
 */
class TPNumber
{
    public $a; //число
    public $b; //система счисления
    public $c; //точность
    public $number;

    public function __construct($a, $b, $c)
    {
        $this->a = $a;
        $this->b = $b;
        $this->c = $c;
    }
    public function __toString()
    {
        return "$this->a, $this->b, $this->c";
    }

    public static function getByInt($a,$b,$c){
        return new self($a,$b,$c);
    }

    public function copy(){
        return $this;
    }

    public function add($TPNumber){
        if($this->b == $TPNumber->d && $this->c == $TPNumber->c)
            return new self($this->a+$TPNumber->a,$this->b, $this->c);
        return null;

    }
    public function mult($TPNumber){
        if($this->b == $TPNumber->d && $this->c == $TPNumber->c)
            return new self($this->a*$TPNumber->a,$this->b, $this->c);
        else return null;
    }
    public function sub($TPNumber){
        if($this->b == $TPNumber->d && $this->c == $TPNumber->c)
            return new self($this->a-$TPNumber->a,$this->b, $this->c);
        else return null;
    }
    public function div($TPNumber){
        if($this->b == $TPNumber->d && $this->c == $TPNumber->c)
            return new self($this->a/$TPNumber->a,$this->b, $this->c);
        else return null;
    }
    public function rev(){
        if($this->a != 0)
            return new self(1/$this->a, $this->b, $this->c);
        else return null;
    }
    public function square(){
        return new self($this->a*$this->a, $this->b, $this->c);
    }
    public function setB($b){
        $this->b = $b;
    }
    public function setC($c){
        $this->c = $c;
    }



}
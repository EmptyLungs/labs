<?php

/**
 * Created by PhpStorm.
 * User: rint
 * Date: 11.10.2016
 * Time: 18:52
 */
class TFrac
{
    public $a;
    public $b;

    /**
     * @param $a
     * @param $b
     * @return mixed общий делитель
     */
    private function euc($a, $b) {
        while ($a != $b)
            if ($a>$b)
                $a -= $b;
            else
                $b -= $a;
        return $a;
    }

    /**
     * сокращение дроби
     */
    private function dev(){
        if ($this->a!=0) {
            $z = $this->euc($this->a, $this->b);
            $this->a/=$z;
            $this->b/=$z;
        }
    }

    /**
     * TFrac constructor.
     * @param $ina int ислитель
     * @param $inb int знаминатель
     */
    public function __construct($ina, $inb){
        $this->a = $ina;
        $this->b = $inb;
        $this->dev();
    }

    /**
     * @param $string string входная строка
     * @return TFrac дробь
     */
    public static function getByString($string){
        list($a, $b) = explode('/', $string);
                if ($b!=0)
        return new self($a, $b);
        else
            echo "new $a/$b divide by zero";
            return null;
    }

    /**
     * @param $a int числитель
     * @param $b int знаминатель
     * @return TFrac дробь
     */
    public static function getByInt($a, $b){
        if ($b!=0)
        return new self($a, $b);
        else {
            echo "new $a/$b divide by zero";
            return null;
        }
    }
    public function copy(){
        return new self($this->a, $this->b);
    }

    public function add($TFrac){
        $b = $TFrac->b * $this->b;
        if ($this->b > $TFrac->b){
            $a = $this->a + $TFrac * $this->b;
        } else {
            $a = $this->a * $TFrac->b + $TFrac->a;
        }

        return new self($a,$b);
    }
    public function mult($TFrac){
        $a = $this->a * $TFrac->a;
        $b = $this->b * $TFrac->b;

        return new self($a,$b);
    }
    public function sub($TFrac){
        $b = $TFrac->b * $this->b;
        if ($this->b > $TFrac->b){
            $a = $this->a - $TFrac->a * $this->b;
        } else {
            $a = $this->a * $TFrac->b - $TFrac->a;
        }
        return new self($a, $b);
    
    public function div($TFrac){
        $a = $this->a * $TFrac->b;
        $b = $this->b * $TFrac->a;

        return new self($a,$b);
    }
    public function pow(){
        return $this->mult($this);
    }
    public function reverse(){ //ask p
        if($this->a!=0)
        return new self($this->b, $this->a);
        else {
            echo "reversed $this->b/$this->a divide by zero \n";
            return null;
        }
    }
    public function compare($TFrac){
        if ($this->a == $TFrac->a && $this->b == $TFrac->b) return true;
        else
            return false;
    }
    public function isBigger($TFrac){
        if ($this->a/$this->b > $TFrac->a/$TFrac->b) return true;
        else
            return false;
    }
    public function getA(){
        return "$this->a";
    }
    public function getB(){
        return "$this->b";
    }
    public function __toString()
    {
        return "$this->a/$this->b";
    }


}

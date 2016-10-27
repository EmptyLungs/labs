<?php

/**
 * Created by PhpStorm.
 * User: rint
 * Date: 11.10.2016
 * Time: 18:52
 */
class TFrac
{
    private $a;
    private $b;

    private function euc($a, $b) {
        while ($a != $b)
            if ($a>$b)
                $a -= $b;
            else
                $b -= $a;
        return $a;
    }

    private function dev(){
        if ($this->a!=0) {
            $z = $this->euc($this->a, $this->b);
            $this->a/=$z;
            $this->b/=$z;
        }
    }



    public function __construct(){
        $params = func_get_args();
        $num = func_num_args();
        if ($num == 1){
            list($a, $b) = explode('/', $params[0]);
            if ($b != 0) {
                $this->a = $a;
                $this->b = $b;
                $this->dev();
            }  else {
                throw new Exception('div by 0');
            }
        } elseif ($num == 2) {
            if ($params[1] == 0) throw new Exception('div by 0');
            $this->a = $params[0];
            $this->b = $params[1];
            $this->dev();
        }
    }


    public static function getByString($string){
        list($a, $b) = explode('/', $string);
        if ($b!=0)
        return new self($a, $b);
        else
            echo "new $a/$b divide by zero";
            return null;
    }

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
    }
    public function suba($TFrac){
        return $this->add($this->minus($TFrac));
    }
    public function div($TFrac){
        $a = $this->a * $TFrac->b;
        $b = $this->b * $TFrac->a;

        return new self($a,$b);
    }
    public function pow(){
        return $this->mult($this);
    }
    public function reverse(){ 
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
    public function minus($TFrac){
        return new self(-$TFrac->a, $TFrac->b);
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

//exec
try {
    $foo = new TFrac('1/3');
    $foo = new TFrac(1, 0);
    echo $foo;
} catch(Exception $e) {
    echo $e->getMessage();
}

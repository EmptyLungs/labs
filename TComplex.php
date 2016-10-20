<?php

/**
 * Created by PhpStorm.
 * User: rint
 * Date: 16.10.2016
 * Time: 0:06
 */
class TComplex
{
    public $a;
    public $b;

    public function __construct($a, $b)
    {
        $this->a = $a;
        $this->b = $b;
    }
    public function __toString()
    {
        if ($this->b>0) return "$this->a+i*$this->b";
        else
            $b = $this->b * -1;
            return "$this->a-i*$b";
    }

    public static function getByInt($a, $b){
        return new self($a, $b);
    }
    public static function getByString($string){
        if (strpos($string, '+')){
            list ($a, $b) = explode('+i*', $string);
            return new self($a,$b);
        } elseif(strpos($string, '-')){
            list($a,$b) = explode('-i*', $string);
            return new self($a, $b*-1);
        }

    }
    public static function getByStr($string){
        preg_match_all('!\d+!', $string, $matches);
        return new self($matches[0], $matches[1]);
    }

    public function copy(){
        return $this;
    }

    public function add($TComplex){
        $a = $this->a + $TComplex->a;
        $b = $this->b + $TComplex->b;
        return new self($a, $b);
    }

    public function mult($TComplex){
        $a = $this->a * $TComplex->a - $this->b * $TComplex->b;
        $b = $this->a * $TComplex->b + $TComplex->a * $this->b;
        return new self($a, $b);
    }

    public function double(){
        $a = $this->a * $this->a - $this->b * $this->b;
        $b = $this->a * $this->b + $this->a * $this->b;
        return new self($a, $b);
    }

    public function reverse(){
        return new self($this->b, -$this->a);
    }

    public function selfSub(){
        $a = $this->a - $this->a;
        $b = $this->b - $this->b;
        return new self($a, $b);
    }

    public function div($TComplex){
        $a = ($this->a * $TComplex->a + $this->b * $TComplex->b) / ($TComplex->a * $TComplex->a + $TComplex->b * $TComplex->b);
        $b = ($TComplex->a * $this->b - $this->a * $TComplex->b) / ($TComplex->a * $TComplex->a + $TComplex->b * $TComplex->b);
        return new self ($a, $b);
    }

    public function sub(){} //?????????????????????????????????????????

    public function mod(){
        $mod = sqrt($this->a * $this->a + $this->b * $this->b);
        return $mod;
    }
    public function radAngle(){
        if ($this->a > 0){
            return atan($this->b / $this->a);
        }
        if($this->a <0 && $this->b > 0){
            return 3.14+atan($this->b / $this->a);
        }
        if ($this->a < 0 && $this->b <0){
            return -3.14+atan($this->b / $this->a);
        }
    }
    public function degAngle(){
        return $this->radAngle()*57.2958;
    }
    public function pow($n){

    }
//rn(cos (n*fi)+ i* sin (n*fi)).


}
/**$foo = TComplex::getByString('35-i*35');
echo "$foo \n";

$foo1 = TComplex::getByInt(35,-3);
echo "$foo1\n";
$a = $foo1->radAngle();
echo "$a\n";
$b = $foo1->degAngle();
echo $b; */
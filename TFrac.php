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
        return new self($a, $b);
    }

    /**
     * @param $a int числитель
     * @param $b int знаминатель
     * @return TFrac дробь
     */
    public static function getByInt($a, $b){
        return new self($a, $b);
    }
    public function copy(){
        $a = $this->a;
        $b = $this->b;
        return $this->getByInt($a, $b);
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
    public function minus($TFrac){
        $b = $TFrac->b * $this->b;
        if ($this->b > $TFrac->b){
            $a = $this->a - $TFrac * $this->b;
        } else {
            $a = $this->a * $TFrac->b - $TFrac->a;
        }

        return new self($a,$b);
    }
    public function div($TFrac){
        $a = $this->a * $TFrac->b;
        $b = $this->b * $TFrac->a;

        return new self($a,$b);
    }
    public function pow(){
        return $this->mult($this);
    }
    public function reverse(){ //ask p
        $ff = clone $this;
        $z = new self(1,1);
        return $z->div($ff);
    }
    public function compare($TFrac){
        if ($this->a == $TFrac->a && $this->b == $TFrac->b) return true;
    }
    public function bigger($TFrac){
        if ($this->a/$this->b > $TFrac->a/$TFrac->b) return true;
    }
    public function outAStr(){
        return "$this->a";
    }
    public function outBSstr(){
        return "$this->b";
    }
    public function __toString()
    {
        return "$this->a/$this->b";
    }


}
$foo = TFrac::getByInt(6,10);
echo "$foo \n";

$foo1 = TFrac::getByString('20/10');
echo "$foo1 \n";

$z = $foo1->add($foo);
echo "$foo1+$foo = $z \n";

$y = $foo1->minus($foo);
echo "$foo1-$foo = $y \n";

$w = $foo->div($foo1);
echo "$foo/$foo1=$w \n";

$zz = $foo->mult($foo1);
echo "$foo*$foo1=$zz \n";

$zzz = $foo->pow();
echo "$foo v kvadrate = $zzz \n";

$ws = $foo->copy();
$bool1 = $foo->compare($ws);
echo "$foo = $ws:\n";
var_dump($bool1);

$bool2 = $foo1->bigger($foo);
echo "$foo1 > $foo:\n";
var_dump($bool2);

$u = $foo->reverse();
echo "$foo reverse = $u";
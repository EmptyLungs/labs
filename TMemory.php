<?php

/**
 * Created by PhpStorm.
 * User: rint
 * Date: 19.10.2016
 * Time: 7:22
 */
include "autoload.php";

class TMemory
{
    public $FNumber;
    private $FState;

    public function __construct($a)
    {
        if ($a instanceof TPNumber)
            $this->FNumber = TPNumber::getByInt($a->a, $a->b, $a->c);
        if ($a instanceof TFrac)
            $this->FNumber = TFrac::getByInt($a->a, $a->b);
        if ($a instanceof TComplex)
            $this->FNumber = TComplex::getByInt($a->a, $a->b);
        $this->FState = true;
    }
    public function getMeme(){
        return $this->FNumber;
    }
    public function add($TObject){
        if($TObject instanceof $this->FNumber)
        $this->FNumber = $TObject->add($this->FNumber);
        else return null;
    }
    public function clear(){
        $this->FNumber = null;
        $this->FState = false;
    }
    public function __toString()
    {
        return "contains $this->FNumber \n";
    }
}

$foo = TFrac::getByInt(5,7);
$foo1 = TFrac::getByInt(11,7);

$meme = new TMemory($foo);
echo "$meme \n";

$meme->add($foo1);
echo "$meme \n";
$meme->clear();
echo $meme;

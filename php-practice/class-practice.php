<?php

// $a = 1; // 變數
// const SOME_CONSTANT = 1; // 常數

// for ($i=0; $i < 10; $i++) {
//     echo "Hi $i $a\n";
//     // echo "{$constant(SOME_CONSTANT)}";
//     $a += 1;
//     // SOME_CONSTANT += 1;
// }

// $obj = [
//     'hi' => function () {
//         echo 'hi :))';
//     }
// ];

// $obj['hi']();

class TargetClass {
    const SOME_CONS = 100;

    public $count = 0;
    
    static public function compareTwoVar(float $var1, float $var2) {
        return $var1 > $var2;
    }

    function addCount(float $var) {
        $this->count += $var;
    }

    public function compareWithCount(float $var) {
        return $var > $this->count;
    }
}


// print TargetClass->$count; // 不行

$target = new TargetClass();

// print_r(
//     $target
// );

// echo $target->$count; // wrong!
// echo $target->count; // correct!

print(
    $target->SOME_CONS
);

print(
    TargetClass::SOME_CONS
);

// var_dump(
//     TargetClass::compareTwoVar(1, 2)
// );

// var_dump(
//     $target->compareWithCount(1)
// );
// $target->addCount(10);
// var_dump($target->count);

// var_dump(
//     $target->compareWithCount(1)
// );
<?php

include_once '../../../../src/Com/Jblsoftware/Functions/functions.php';

use function Com\Jblsoftware\Functions\compose;
use function Com\Jblsoftware\Functions\flatten;
use function Com\Jblsoftware\Functions\head;
use function Com\Jblsoftware\Functions\println;
use function Com\Jblsoftware\Functions\tail;
use function Com\Jblsoftware\Functions\implode as implode;

$arr = [1, 2, 3, 4, 5];
$arr2 = [['a' =>1, 'b' => 2, 'c' => 3], 4, [5]];


assert(head($arr) == 1);
assert(tail($arr) == [2, 3, 4, 5]);

println(implode($arr));

print_r(flatten($arr2));
print_r(flatten(head($arr2)));

$a = function($val) {
    return str_word_count($val);
};
$b = function($val) {
    return $val - 2;
};
$c = compose($a, $b);
println($c('Here is some text to word count.'));


<?php

namespace Com\Jblsoftware\Functions;

function println($message)
{
    print $message . \PHP_EOL;
}

function head(array $arr)
{
    return reset($arr);
}

function tail(array $arr)
{
    return array_slice($arr, 1);
}

function implode(array $arr)
{
    $s = head($arr) . ', ';
    if (tail($arr)) $s .= implode(tail($arr));
    return $s;
}

function flatten(array $array, $maxDepth = null, $currentDepth = 1)
{
    $out = [];
    foreach ($array as $key => $value) {
        if (!is_array($value)) {
            if (is_int($key)) {
                $out[] = $value;
            } else {
                $out[$key] = $value;
            }
        } else {
            if (is_null($maxDepth) || $currentDepth < $maxDepth) {
                $val = flatten($value, $maxDepth, $currentDepth + 1);
                $out = array_merge($out, $val);
            }
        }
    }
    return $out;
}

function compose(callable $f1, callable $f2)
{
    return function() use ($f1, $f2) {
        $args = \func_get_args();
        return $f2(\call_user_func_array($f1, $args));
    };
}

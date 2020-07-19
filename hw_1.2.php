<?php
function task($n)
{
    $i = 2;
    while ($i * $i < $n) {
        while ($n % $i == 0) {
            $n = $n / $i;
        }
        $i = $i + 1;
    }
    return $n;
}
$res = task(600851475143);
echo $res; // 6857

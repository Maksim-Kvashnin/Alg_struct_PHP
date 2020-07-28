<?php

//$myArray = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 12, 13, 14, 15, 16]; // => 11
//$myArray = [1, 2, 4, 5, 6]; // => 3
$myArray = []; // => 1

function binSearch($myArray)
{
    $start = 0;
    $end = count($myArray) - 1;

    while ($start <= $end) {
        $mid = floor(($start + $end) / 2);
        echo 'проверяется элемент - '.$myArray[$mid].PHP_EOL;
        if (($myArray[$mid + 1] - ($myArray[$mid] )) == 2) {
            return $myArray[$mid] + 1;
        }
        elseif (($myArray[$mid] - $mid) == 1) {
            $start = $mid + 1;
        }
        elseif (($myArray[$mid] - $mid) == 2 ) {
            $end = $mid - 1;
        }
    }
	return 1;
}
echo 'пропущенное число - ' . binSearch($myArray);

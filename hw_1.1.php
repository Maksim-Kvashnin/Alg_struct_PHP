<?php
$str = "Это тестовый вариант проверки (задачи со скобками). И вот еще скобки: {[][()]}";

function balanced($str)
{
    $braces = [
		'}' => '{',
		')' => '(',
		']' => '[',
	];
    
    $stack = [];
    for($i = 0; $i < strlen($str); $i++) {
        $char = $str[$i];
        
        if (isset($braces[$char])) {
            $el = array_pop($stack);
            if ($el != $braces[$char]) {
                return 'NO';
            }
        } else {
            array_push($stack, $char);
        }
    }
    
    return $stack ? "NO" : "YES";
}

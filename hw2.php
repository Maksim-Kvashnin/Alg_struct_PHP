/*
1. Определить сложность следующих алгоритмов:
- Поиск элемента массива с известным индексом     - O(1)
- Дублирование одномерного массива через foreach  - O(n)
- Рекурсивная функция нахождения факториала числа - O(n)
- Удаление элемента массива с известным индексом  - O(n)



2.Определить сложность следующих алгоритмов. Сколько произойдет итераций?
1)
$n = 100;
$array[]= [];

for ($i = 0; $i < $n; $i++) {
  for ($j = 1; $j < $n; $j *= 2) {
     $array[$i][$j]= true;
} }
Ответ: О(n*log(n));
На каждую итерацию внешнего цикла получим 7 итераций внутреннего и в итоге получаем 700 итераций


2)
$n = 100;
$array[] = [];

for ($i = 0; $i < $n; $i += 2) {
  for ($j = $i; $j < $n; $j++) {
   $array[$i][$j]= true;
} }
Ответ: O(n^2);
По первому циклу - 50 итераций, по второму циклу - 100 итераций и в итоге получаем 5000 итераций



3. Требуется написать метод, принимающий на вход размеры двумерного массива и выводящий массив в виде инкременированной цепочки чисел, идущих по спирали.
Примеры:
2х3
1 2
6 3
5 4

3х1
1 2 3
4х4
01 02 03 04
12 13 14 05
11 16 15 06
10 09 08 07

0х7
Ошибка!
*/

<?php
class MatrixBuilder
{
    protected $rows;
    protected $columns;

    protected function _initMatrix($x, $y)
    {
        if ($x == 0 || $y == 0) {
            return 'ERROR';
        }
        $matrix = [];
        for ($i = 0; $i < $y; $i++) {
            for ($j = 0; $j < $x; $j++) {
                $matrix[$i][] = 0;
            }
        }
        return $matrix;
    }

    protected function _render($matrix)
    {
        if ($matrix == 'ERROR') return $matrix . "<br>"; //PHP_EOL;
		for ($i = 0; $i < count($matrix); $i++) {
            $matrix[$i] = implode(' ', $matrix[$i]) . "<br>"; //PHP_EOL;
        }
        return implode($matrix) . PHP_EOL;
    }

    protected function _fillMatrix($matrix, $allRows, $allColumns, $rowCounter, $columnCounter, $counter, $exitRows, $exitCols)
    {
        for ($column = $columnCounter; $column < $allColumns; $column++) {
            $matrix[$rowCounter][$column] = ($counter >= 10) ? $counter++ : '0' . $counter++;
            $columnCounter = $column;
        }

        $rowCounter++;
        $exitRows--;

        if ($exitRows == 0 || $exitCols == 0) return $matrix;

        for ($row = $rowCounter; $row < $allRows; $row++) {
            $matrix[$row][$columnCounter] = ($counter >= 10) ? $counter++ : '0' . $counter++;
            $rowCounter = $row;
        }

        $columnCounter--;
        $exitCols--;

        if ($exitRows == 0 || $exitCols == 0) return $matrix;

        for ($column = $columnCounter; $column >= count($matrix) - $allRows; $column--) {
            $matrix[$rowCounter][$column] = ($counter >= 10) ? $counter++ : '0' . $counter++;
            $columnCounter = $column;
        }

        $rowCounter--;
        $exitRows--;

        if ($exitRows == 0 || $exitCols == 0) return $matrix;

        for ($row = $rowCounter; $row > count($matrix[$rowCounter]) - $allColumns; $row--) {
            $matrix[$row][$columnCounter] = ($counter >= 10) ? $counter++ : '0' . $counter++;
            $rowCounter = $row;
        }
        $columnCounter++;
        $exitCols--;

        if ($exitRows == 0 || $exitCols == 0) return $matrix;

        $allColumns--;
        $allRows--;

        return $this->_fillMatrix($matrix, $allRows, $allColumns, $rowCounter, $columnCounter, $counter, $exitRows, $exitCols);
    }

    public function drawMatrix($x, $y)
    {
        $this->rows = $y;
        $this->columns = $x;
        $matrix = $this->_initMatrix($x, $y);
        if ($matrix != 'ERROR') {
            $allRows = count($matrix);
            $allColumns = count($matrix[0]);
            $exitRows = $allRows;
            $exitCols = $allColumns;
            $rowCounter = 0;
            $columnCounter = 0;
            $counter = 1;
            $matrix = $this->_fillMatrix($matrix, $allRows, $allColumns, $rowCounter, $columnCounter, $counter, $exitRows, $exitCols);
        }
        echo $this->_render($matrix);
    }
}

$obj = new MatrixBuilder();
$obj->drawMatrix(3, 3);

$obj->drawMatrix(5, 5);
$obj->drawMatrix(2, 2);
$obj->drawMatrix(2, 5);
$obj->drawMatrix(4, 2);
$obj->drawMatrix(10, 3);
$obj->drawMatrix(7, 10);
$obj->drawMatrix(8, 8);
$obj->drawMatrix(0, 5);
$obj->drawMatrix(1, 10);


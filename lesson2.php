<?php

/*
** Task1
*/

// - Поиск элемента массива с известным индексом => O(1), т.к. никаких вычислений нет, требуется 1 операция, которая не меняется в зависимости от размера
// - Дублирование одномерного массива через foreach => O(n) - время и количество операций линейно, то есть по каждому элементу массива, цикл пройдёт
// - Рекурсивная функция нахождения факториала числа O(n) - 


/*
** Task 2
*/

// 1) 

$n = 100;
$array[]= [];

for ($i = 0; $i < $n; $i++) { //O(n)
for ($j = 1; $j < $n; $j *= 2) { //O(log(n)) из-за $j *=2, то есть быстрее дойдёт до $n
$array[$i][$j]= true;
} } //O(n * log(n)) = O(nlog(n))

// 2)

$n = 100;
$array[] = [];

for ($i = 0; $i < $n; $i += 2) { //О(n/2)
for ($j = $i; $j < $n; $j++) { //тоже O(n/2), так как $j зависит от $i
$array[$i][$j]= true;
} } // O(n/2 * n/2) = O(n^2/4) => O(n^2)

/*
** Task 3
*Требуется написать метод, принимающий на вход размеры двумерного массива 
*и выводящий массив в виде инкременированной цепочки чисел, идущих по спирали.
*/

function makeSpiral($row,$col)
{
    if($row <= 0 || $col <= 0)
    {
        throw new Error('Wrong zero value');
    } $getArray = [[]];
    if($row == 1)
    {
        for ($i=1; $i <= $col; $i++) { 
            echo $i . ' .... ';
        }
    } else 
    {
        $minRow = 0;
        $maxRow = $row-1;
        $minCol = 0;
        $maxCol = $col-1;
        $count = 1;
        $max = $row * $col;

        while ($count < $max) {
            for ($i = $minCol; $i <= $maxCol; $i++) 
            {
                $getArray[$minRow][$i] = $count;
                $count++;
            }
            $minRow = $minRow + 1;
            for ($i = $minRow; $i <= $maxRow; $i++) 
            {
                $getArray[$i][$maxCol] = $count;
                $count++;
            }
            $maxCol = $maxCol - 1;
            for ($i = $maxCol; $i >= $minCol; $i--) 
            {
                $getArray[$maxRow][$i] = $count;
                $count++;
            }
            $maxRow = $maxRow - 1;
            for ($i = $maxRow; $i >= $minRow; $i--) 
            {
                $getArray[$i][$minCol] = $count;
                $count++;
            }
            $minCol = $minCol + 1;
        }

        for ($i = 0; $i < $row; $i++) {
            for ($j = 0; $j < $col; $j++) 
            {
                echo $getArray[$i][$j].' .... ';
            }
            echo '<br/>';
        }
    }
//

    
}
echo "5x4";
echo "<br>";
makeSpiral(5,4);
echo "<br>";
echo "10x6";
echo "<br>";
makeSpiral(10,6);
echo "<br>";
echo "1x7";
echo "<br>";
makeSpiral(1,7);
echo "<br>";
echo "<br>";
echo "0x7";
makeSpiral(0,7);




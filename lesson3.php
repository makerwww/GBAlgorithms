<?php


// Nested Sets - способ хранения дерева в базе данных, 
// при котором в узлах хранятся уровень нахождения элемента, 
// идентификатор каждого узла и 2 ключа(правый и левый).


/* 
*  Дан массив из n элементов, начиная с 1. 
*  Каждый следующий элемент равен (предыдущий + 1). 
*  Но в массиве гарантированно 1 число пропущено. 
*  Необходимо вывести на экран пропущенное число. 
*/

function emptyElem($arr)
{
    if (count($arr) == 0) {
        echo '1';
    } else{
        for ($i=0; $i < count($arr)-1; $i++) { 
            echo $i.'<br>';
            if($arr[$i+1] - $arr[$i] != 1){
                echo $arr[$i] + 1;
                break;
            } 
        }
    }
}
// emptyElem([1,3,4,5,6,7,8]);
echo '<br/>';
emptyElem([]);
echo '<br/>';
echo '<br/>';

// echo count([1,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20]);
function findLose($arr)
{
    while(count($arr) > 2)
    {   
        $center = round(count($arr)/2);
        $left_part = array_slice($arr, 0, $center); //Левая часть массива
        $right_part = array_slice($arr, $center); //правая часть массива
        $left_count = count($left_part); //

        print_r($left_part);
        echo '<br>';
        print_r($right_part);
        echo '<br>';
        echo '<br>';
        
        $left_part[$left_count-1] - $left_part[0] != $left_count-1 ? $arr = $left_part : $arr = $right_part;
        // $arr = [1,2,3];
        // echo $center;

    }
    echo $arr[1]-$arr[0] == 1 ? $arr[0] - 1 : $arr[1]-1;
    print_r($arr);
    echo '<br>';
};

function randArr($length) // Для генерации массива без 1-го случайного числа
{
    $arr =range(0,$length);
    $delNumb = rand(0, $length);
    array_splice($arr, $delNumb, 1);
    return $arr;
}

findLose(randArr(1000));

// ВОПРОС -- при делении массива пополам, иногда происходит ситуация, когда он делится так, что отсутствующее число вылетает
// то есть так: [1,2,3,4] [6,7,8,9] и программа работает не так, как этого избежать, что сделать?
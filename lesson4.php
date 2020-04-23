<?php

// Реализовать функцию a+b, где каждое из чисел а и b имеет не менее 1000 разрядов. 
// Числа хранятся в файле chisla.txt на двух строчках. Ответ вписать на третью строчку


function generateNum($nums = 1000) // Генерирует огромное число, заносит в массив по цифре и потом в файл в виде строки
{
    $bigNumber =[];
    while(count($bigNumber) != $nums)
    {
        empty($bigNumber) ? array_push($bigNumber, rand(1,9)) : array_push($bigNumber, rand(0,9)); 
    }

    return implode('',$bigNumber);
}

function writeFile($fileName = 'chisla.txt') //добавляет в файл 2 числа и затем считает их сумму
{
    if(!file_exists($fileName))
    {
        throw new Exception("Файла не Существует", 1);
    } else {
        $firstOpen = fopen($fileName, 'w+');
        fwrite($firstOpen,generateNum().PHP_EOL);
        fclose($firstOpen);

        $secondOpen = fopen($fileName, 'a+');
        fwrite($secondOpen, generateNum().PHP_EOL);
        fclose($secondOpen);

        addBigNums();
        $resultOpen = fopen($fileName, 'a+');
        fwrite($resultOpen, implode('',addBigNums()).PHP_EOL);
        fclose($resultOpen); 
    }
}

function getNumbers($fileName = 'chisla.txt') // достает из файла числа
{
    if(!file_exists($fileName))
    {
        throw new Exception("Файла не Существует", 1);
    } else {

        $fInfo = fopen($fileName, 'r');
        $fileArr = file($fileName);
        $firstNumArr = str_split($fileArr[0]); 
        $secondNumArr = str_split($fileArr[1]);
        fclose($fInfo);

        array_pop($firstNumArr);
        array_pop($secondNumArr);

        return [$firstNumArr,$secondNumArr];
    }
}

function addBigNums() // Сложение чисел по элементам массива и получение массива с результатом
{
    $numberArray = getNumbers();
    $i = 999; 
    $boolCheck = false;
    $result = [];

    while($i != -1) {
        if($i == 0){
            $boolCheck == true ? $newNum = $numberArray[0][$i] + $numberArray[1][$i] + 1 : $newNum = $numberArray[0][$i] + $numberArray[1][$i];
            array_unshift($result, $newNum);
        } else {
            $boolCheck == true ? $newNum = $numberArray[0][$i] + $numberArray[1][$i] + 1 : $newNum = $numberArray[0][$i] + $numberArray[1][$i];
            if($newNum > 9){
                $boolCheck = true;
                $pushNum = $newNum - 10;
                array_unshift($result,$pushNum);
            } else {
                $boolCheck = false;
                array_unshift($result,$newNum);
            }
        }
       $i--;
    }
    echo count($result);
    return $result;
}
writeFile();
// echo pow(2,1023);


<?php
/*
Use PHP to describe the quick sort. Input array (2,4,1,5,8,4,10,8,9,7)
*/

function php_quick_sort($arr)
{
    if(count($arr) <= 1){
        return $arr;
    }
    else{
        $pivot = $arr[0];
        $left = array();
        $right = array();
        for($i = 1; $i < count($arr); $i++)
        {
            if($arr[$i] < $pivot){
                $left[] = $arr[$i];
            }
            else{
                $right[] = $arr[$i];
            }
        }
        return array_merge(php_quick_sort($left), array($pivot), php_quick_sort($right));
    }
}


$inputArray = array(2,4,1,5,8,4,10,8,9,7);
echo "Input Array:";
print_r($inputArray);
echo "<hr>";

$output = php_quick_sort($inputArray);
echo "Sorted Output: ";
print_r($output);
<?php
//Получить сумму всех вторых элементов массива произвольного размера и вложенности, не обращая внимание на ключ
$arr = [8,8,4,[1,[2,9,4],5,1],7,[7,4],9];
$arr = ['start',5,4,[8,[2,5,2],3,7],'end'];
$sum = 0;
function summa_second_element($arr, &$sum)
{
    if (!is_array($arr[1])) {
        $sum += $arr[1];
        $second_elem = next($arr);
        if (!is_array($second_elem)) {
            $num = (float)$second_elem;
            $sum += $num;
        }

        foreach ($arr as $key => $value) {
            if (is_array($value)) {
                summa_second_element($value, $sum);
            }
        }
    }
}
summa_second_element($arr, $sum);
echo 'Сумма всех вторых элементов равна: ' . $sum;


//Определить количество символов входящих в произвольную строку, т.е у строки 'afrae' a = 2, e=1, f=1,r=1
echo '</br>';
$string = 'ученье свет';
$arr = preg_split('//u',$string,-1,PREG_SPLIT_NO_EMPTY);
$result = array_count_values($arr);
foreach ($result as $key=>$value) {
    echo $key . '=' . $value . '<br>';
}

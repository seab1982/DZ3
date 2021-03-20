<?php
//Форматирование строки в виде CSV и запись её в файловый указатель
$list = array (
    'aaa,bbb,ccc,dddd',
    '123,456,789',
    '"aaa","bbb"'
);

$fp = fopen('file.csv', 'w');



foreach ($list as $fields) {
    fputcsv($fp, (array)$fields);
}


fclose($fp);

?>

<?php
//Чтение и вывод на экран содержания CSV-файла

$row = 1;
$handle = fopen("file.csv", "r");
while (($data = fgetcsv($handle, 10, ",")) !== FALSE) {
    $num = count($data);
    echo "<p> $num полей в строке $row: <br /></p>\n";
    $row++;
    for ($c=0; $c < $num; $c++) {
        echo $data[$c] . "<br />\n";
    }
}
fclose($handle);

$arrayHelper = array('foo' => array('bar' => 'baz'));
$mas = ['Aaa' => array('dino'=> 'zavr')];
$arrayHelper = array_dot($mas);
echo " $arrayHelper ";

// array('foo.bar' => 'baz');

function exempleConcat()
{
    global $str1, $str2;
    return $str1.$str2;
}

/*
 * 2. Определить количество символов входящих в произвольную строку,
 * т.е у строки 'afrae' a=2, e=1, f=1, r=1
 * */

function getCharCounters($input, $mb = false)

@ValeriyShnurovoy ValeriyShnurovoy 9 days ago
у тебя получилась управляемая функция, сделай ее не управляемой


@vsolomka vsolomka 9 days ago Author Owner
Переделал. Если конечно я правильно понял что такое "неуправляемая".

@seab1982	Reply…
{
    $output = [];
    $chars = $mb? mb_str_split($input): str_split($input);
    foreach ($chars as $key => $char) {
        $output[$char]++;
    }
    return $output;
}

echo PHP_EOL;
print_r(getCharCounters("afrae"));
echo PHP_EOL;
print_r(getCharCounters("юfraю", true));

?>
<?php

use Kl\User;
use Kl\UserPaymentsService;

require_once 'vendor/autoload.php';

$userPaymentService = new UserPaymentsService();

$testData = require 'test-data.php';

foreach ($testData as $testDataRow) {
    list($user, $amount) = $testDataRow;

    try {
        $userModel = new User($user['id'], $user['balance'], $user['balance']);
        $userPaymentService->changeBalance($userModel, $amount);
        $expectedBalance = $user['balance'] + $amount;
        $resultBalance = $userModel->balance;
        $info = sprintf('User balance should be updated %s: %s', $expectedBalance, $expectedBalance);
        $result = assert($expectedBalance === $resultBalance, $info);
    } catch (Exception $e) {
        $result = false;
        $info = sprintf('User balance should be updated, exception: %s', $e->getMessage());
    }

    echo sprintf("[%s] %s\n", $result ? 'SUCCESS' : 'FAIL', $info);
}

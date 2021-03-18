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
?>
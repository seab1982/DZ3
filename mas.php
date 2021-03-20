

<?php
//Форматирование строки в виде CSV и запись её в файловый указатель
$list = array (
    'aaa,bbb,ccc,dddd',
    '123,456,789',
    '"aaa","bbb"'
);

$fp = fopen('file.csv', 'w');

//foreach ($list as $line) {
//    fputcsv($fp, ',' , $line);
//}

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


# 1. Создать абстрактный класс "животные"
abstract class Animal
{
    abstract function getNutritionType(): string;
}

# 2. Создать абстрактный класс "Транспортные средства"
abstract class Vehicle
{
    abstract function getMode();
}

# 3. Создать наследников от животных - хищники, травоядные
# 4. Создать наследников от транспортных средств - лодки, легковые авто, грузовики
# 5. Создать реализации для всех наследников первого уровня

class Predator extends Animal
{
    function getNutritionType(): string
    {
        return "Predator";
    }
}

class Herbivorous extends Animal
{
    function getNutritionType(): string
    {
        return "Herbivorous";
    }
}

class Boat extends Vehicle
{
    function getMode()
    {
        return "sailing";
    }
}

class Car extends Vehicle
{
    function getMode()
    {
        return "driving";
    }
}

class Lorry extends Vehicle
{
    function getMode()
    {
        return "carrying loads";
    }
}

$animal1 = new Predator();
$animal2 = new Herbivorous();
echo hString::writeln_html("I am " . $animal1->getNutritionType());
echo hString::writeln_html("I am " . $animal2->getNutritionType());

$vehicles = [
    new Boat(),
    new Car(),
    new Lorry(),
    new Car(),
];

foreach ($vehicles as $vehicle) {
    echo hString::writeln_html(get_class($vehicle) . " is " . $vehicle->getMode());
}

# 6. Создать хелпер работающий с массивами
class hArray
{
    static function print_prepare(array $arr): array
    {
        $output = [];
        foreach ($arr as $value) {
            switch (gettype($value)) {
                case "integer":
                case "double":
                    $cell = $value;
                    break;
                case "boolean":
                    $cell = $value ? "true" : "false";
                    break;
                case "string":
                    $cell = '"' . $value . '"';
                    break;
                default:
                    if (is_callable($value)) {
                        $cell = "[callable]";
                    } else {
                        $cell = "[" . gettype($value) . "]";
                    }
            }
            $output[] = $cell;
        }
        return $output;
    }

    static function print_row(array $arr): string
    {
        $output = "[" . implode(", ", self::print_prepare($arr)) . "]";
        return $output;
    }

    static function print_col(array $arr): string
    {
        $output = "[" . PHP_EOL . "    "
            . implode(
                "," . PHP_EOL . "    ",
                self::print_prepare($arr)
            )
            . PHP_EOL . "]";
        return $output;
    }

}

$test_array = [
    17,
    "Line",
    new Car(),
    function ($x) {
        return $x * 5;
    },
    17.4567,
    false,
    [101, 102, 103],
];

echo hArray::print_row($test_array) . PHP_EOL;
echo "<pre>";
echo hArray::print_col($test_array) . PHP_EOL;
echo "</pre>";

# 7. Создать хелпер работающий со строками
#

class hString
{
    static function writeln_html(string $str): string
    {
        return $str . "<br/>" . PHP_EOL;
    }
}
?>
<?php

/*
 * 1) создать функцию - фабрику вызова функций пользователя через безымянную функцию
 */

function myFactory(callable $func):callable
{
    return function (...$arg) use ($func) {
        $func(...$arg);
    };
}

$my_dump = myFactory("var_dump");
$my_dump((string) 4); // string(1) "4"

/*
 * 2) создать функцию обеспечивающую запись в csv файл
 */

function writeFileCSV($filename, array $data)
{
    $file = fopen($filename, "w");
    foreach ($data as $line) {
        fputcsv($file, is_array($line) ? $line : [$line]);
    }
    fclose($file);
}

$data = [
    7,
    44,
    [
        true,
        "te,xt",
        17.5,
        [
            101,
            102
        ]
    ]
];
writeFileCSV("test.txt", $data);

/*
 * 3) создать функцию обеспечивающую чтение из csv файла
 */

function readFileCSV($filename): array
{
    return array_map(
        function ($line) {
            return str_getcsv($line);
        },
        file($filename)
    );
}

$arr = readFileCSV("test.txt");
print_r($arr);

function getCharCounters($input)
{
    $output = [];

    if (mb_strlen($input) < strlen($input)) {
        $chars = mb_str_split($input);
    } else {
        $chars = str_split($input);
    }

    foreach ($chars as $key => $char) {
        $output[$char]++;
    }

    return $output;
}

echo PHP_EOL;
print_r(getCharCounters("afrae"));
echo PHP_EOL;
print_r(getCharCounters("юfraю"));


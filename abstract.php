<?php

// Пункт 1 создаем абстрактный класс - животные
abstract class Animal

{

    abstract protected function prefixName($name);

}

// Пункт 2 создаем абстрактный класс - транспортные средства
abstract class Vehicle
{

    abstract protected function prefixValueMax($prefixMax);

}
 //Пункт 3 создаем наследников от животных - травоядные и хищники
class Herbivores extends Animal
{
    public function getName($say) {
        return "{$say}Herby-bo";
    }

    public function prefixName($prefix) {
        return "{$prefix}Herby";
    }
}

class Predators extends Animal
{

    public function prefixName($name ) {

        return "It  {$name}";

    }
    public function getVoice($voy) {
        return "{$voy}Rrr-r-r";
    }
}

// Пункт4 Создаем наследников от транспортных средств - лодки, легковые авто, грузовики

class Boat extends Vehicle
{
    public function getMaxStorm($value){
        return " {$value}  ball";
    }
    public function prefixValueMax($prefix) {
        echo "{$prefix} kabeltovh Speed";
    }



}

class Car extends Vehicle
{
    public function getMaxPeople($value){
        return " {$value} People";
    }
    public function prefixValueMax($prefix) {
        return "{$prefix} km/h";
    }



}
class Lorry extends Vehicle
{
    public function getmaxKg($value){
        return " {$value} Kg";
    }
    public function prefixValueMax($prefix) {
        return "{$prefix} Km/h";
    }



}



// Пункт 5.1 создаем реализации для животных
$class = new Predators();
echo "<br>";
echo $class->prefixName("R-man"), "\n";
echo $class->getVoice(""), "\n";

echo "<br>";

$gra = new Herbivores();
echo $gra->prefixName('') ."\n";
echo $gra->getName('Smoll') ."\n";

echo "<br>";
echo "<br>";


// Пункт 5.2 создаем реализации для транспортных средств
$riv = new Boat();
echo $riv->prefixValueMax('10') . "\n";
echo "<br>";
echo $riv->getMaxStorm('2') . "\n";

echo "<br>";

$jac = new Car();
echo $jac->prefixValueMax('103') . "\n";
echo "<br>";
echo $jac->getMaxPeople('4') . "\n";

echo "<br>";

$zil = new Lorry();
echo $zil->prefixValueMax('50') . "\n";
echo "<br>";
echo $zil->getmaxKg('10000') . "\n";

echo "<br>";

var_dump($zil);
var_dump($gra);
var_dump($riv);
var_dump($jac);
var_dump($class);





?>
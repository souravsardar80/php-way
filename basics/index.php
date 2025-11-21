<?php 


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);





echo "Evil Spirit";
echo "</br>";



// 1.0 Variables & Datatype
$name = "John"; // String
$age = 25; // Integer
$price = 19.99; // Float
$is_active = true; // Boolean
$colors = ["red", "green", "blue"]; // Array

// 2.0 Operators
// 2.1 Arithmetic
$sum = 10 + 15;
$diff = 23 - 12;
$product = 10 * 5;
$quotient = 10 / 2;
$remainder = 10 % 5;

// 2.2 Comparison
$is_equal =  (5 == "5"); // true (loose comparison)
$is_identical = (5 === "5"); // false (strict comparison)
$not_equal = (5 != 6);
$greater = (10 > 5);

// 2.3 Logical
$and = (true && false);
$or = (true || false);
$not = !true;

// 3.0 Control Structure
// 3.1 if-else
if ($age >= 18) {
    echo "Adult";
} elseif ($age >= 13) {
    echo "Teenager";
} else {
    echo "Child";
}

// 3.2 Switch
$day = "Friday";
switch ($day) {
    case 'Monday':
        echo "Start of week";
        break;
    case 'Sunday':
        echo "Holiday";
        break;
    
    default:
        echo "Regular Day";
        break;
}

// 3.3 Ternary operator
$status = ($age >= 18) ? "Adult" : "Minor";

// 4.0 Loops
// 4.1 For loop
for ($i=0; $i < 5; $i++) { 
    echo $i . " ";
}

// 4.2 while loop
$count = 0;
while ($count < 6) {
    echo $count . " ";
    $count++;
}

// 4.3 Do-while
$num = 0;
do {
    echo $num . " ";
    $num++;
} while ($num < 5);


// 4.4 Foreach loop
foreach ($colors as $color) {
    echo $color . " ";
}

// 4.5 Foreach with keys
$person = ["name" => "John", "age" => 35];
// echo $person["name"];
foreach ($person as $key => $value) {
    echo "$key:$value ";
}

// 5.0 Arrays
// 5.1 Indexed Arrays
// same $colors array example 
// 5.2 Associative Array 
// same $person array example

// 5.3 Multi Dimensional arrays
$users = [
    ["name" => "Bikram Singha", "age" => 45],
    ["name" => "Sukhen Haldar", "age" => 52]
];

echo $users[1]["name"];


// 6.0 Functions
// 6.1 Basic function
function greet($name) {
    return "Hello, $name";
}

echo greet("Boxxer");

// 6.2 Type Hint (php 7+)
function add(int $a, int $b): int {
    return $a + $b;
}

echo add(45,282);

// 6.3 Variable-length arguments
function sum(...$numbers) {
    return array_sum($numbers);
}

echo sum(1, 2, 3, 4, 5, 6, 7);


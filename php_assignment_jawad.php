<?php
// 1. Dynamic Type Conversion

function dynamicOperation($input1, $input2) {
    if (is_numeric($input1) && is_numeric($input2)) {
        return $input1 * $input2;
    } elseif (is_string($input1) && is_string($input2)) {
        $strings = [$input1, $input2];
        sort($strings);
        return implode(' ', $strings);
    } else {
        return $input1 . $input2;
    }
}

// 2. Constant Functionality (USD to EUR)

define('EXCHANGE_RATE', 0.85);

function convertCurrency($amounts, $toEUR = true) {
    return array_map(function($amount) use ($toEUR) {
        return $toEUR ? $amount * EXCHANGE_RATE : $amount / EXCHANGE_RATE;
    }, $amounts);
}

// 3. String Manipulation

function reverseWords($paragraph) {
    $sentences = explode('.', $paragraph);
    $reversed = array_map(function($sentence) {
        return implode(' ', array_reverse(explode(' ', trim($sentence))));
    }, $sentences);
    return implode('. ', $reversed) . '.';
}

// 4. Data Types and Error Handling

function detectDataTypes(...$vars) {
    foreach ($vars as $var) {
        $type = gettype($var);
        if ($type === 'resource') {
            throw new Exception("Resource type not supported.");
        }
        echo "Type: $type, Value: " . print_r($var, true) . "\n";
    }
}

// 5. Complex Conditional Operations (FizzBuzz + Prime)

function fizzBuzzPrime($num) {
    if ($num <= 1) return "$num is not prime";
    for ($i = 2; $i <= sqrt($num); $i++) {
        if ($num % $i == 0) {
            return $num % 15 == 0 ? 'FizzBuzz' : ($num % 3 == 0 ? 'Fizz' : 'Buzz');
        }
    }
    return 'Prime';
}

// 6. Bitwise Comparison

function bitwiseEquality($a, $b) {
    return ($a ^ $b) === 0;
}

// 7. Logical Operators in Complex Conditions

function evaluateConditions(...$conditions) {
    $result = true;
    foreach ($conditions as $condition) {
        $result = $result && $condition;  // AND operation
    }
    return $result;
}

// 8. Nested Conditional Logic (Discount Calculator)

function calculateDiscount($years, $isPremium) {
    $discount = $years > 5 ? 30 : ($years >= 3 ? 20 : 10);
    return $isPremium ? $discount + 10 : $discount;
}

// 9. Ternary Challenges

function personalizedMessage($age, $memberStatus, $purchaseAmount) {
    return $age >= 18 ? ($memberStatus ? 'Member' : 'Guest') : ($purchaseAmount > 100 ? 'Big Spender' : 'Regular');
}

// 10. Switch Statement Puzzle (Simple Calculator)

function simpleCalculator($input) {
    $parts = explode(' ', $input);
    if (count($parts) !== 3) return "Invalid format";
    
    [$a, $operator, $b] = $parts;
    $a = (int)$a; $b = (int)$b;
    
    switch ($operator) {
        case '+': return $a + $b;
        case '-': return $a - $b;
        case '*': return $a * $b;
        case '/': return $b != 0 ? $a / $b : "Cannot divide by zero";
        default: return "Unsupported operation";
    }
}

// 11. Nested Loops and Patterns

function printPyramid($size) {
    for ($i = 1; $i <= $size; $i++) {
        for ($j = 1; $j <= $i; $j++) {
            echo $j . " ";
        }
        echo "\n";
    }
}

// 12. Dynamic Loop Generation

function sumWithSkip($size) {
    $numbers = array_map(fn() => rand(1, 100), range(1, $size));
    $sum = 0;
    for ($i = 0; $i < count($numbers); $i++) {
        if ($i % 2 == 0) {
            $sum += $numbers[$i];
        }
    }
    return $sum;
}

// 13. Fibonacci Sequence with Loops

function fibonacci($n) {
    $fib = [0, 1];
    for ($i = 2; $i < $n; $i++) {
        $fib[] = $fib[$i - 1] + $fib[$i - 2];
    }
    return $fib;
}

// 14. Prime Number Finder (Optimized Loop)

function findPrimes($limit) {
    $primes = [];
    for ($i = 2; $i <= $limit; $i++) {
        $isPrime = true;
        for ($j = 2; $j * $j <= $i; $j++) {
            if ($i % $j == 0) {
                $isPrime = false;
                break;
            }
        }
        if ($isPrime) $primes[] = $i;
    }
    return $primes;
}

// 15. Array Sorting (Associative Array)

function sortProductsByPrice($products) {
    arsort($products);
    return $products;
}

// 16. Multi-Dimensional Array Manipulation

function findTopStudent($students) {
    $topStudent = '';
    $highestAverage = 0;
    
    foreach ($students as $student => $scores) {
        $average = array_sum($scores) / count($scores);
        if ($average > $highestAverage) {
            $highestAverage = $average;
            $topStudent = $student;
        }
    }
    
    return [$topStudent, $highestAverage];
}

// 17. Array Search with Conditions

function filterByThreshold($array, $threshold) {
    return array_filter($array, fn($num) => $num > $threshold);
}

// 18. Array Mapping and Filter Challenge

function filterAndReverseWords($words) {
    $noVowels = array_filter($words, fn($word) => !preg_match('/[aeiou]/i', $word));
    return array_map(fn($word) => strrev($word), $noVowels);
}

// 19. Associative Array Merge

function mergeScores($arr1, $arr2) {
    return array_merge_recursive($arr1, $arr2, function($a, $b) {
        return max($a, $b);
    });
}

// 20. Recursive Function for Palindrome

function isPalindrome($str) {
    if (strlen($str) <= 1) return true;
    return $str[0] === $str[strlen($str) - 1] && isPalindrome(substr($str, 1, -1));
}

// 21. Anonymous Function with Array Processing

$divisibleBy3And7 = array_filter($numbers, fn($num) => $num % 3 == 0 && $num % 7 == 0);

// 22. Closure and Callback Functions

function processArray($array, $callback) {
    return array_map($callback, $array);
}

$callback = function($num) {
    return $num * 2;
};

// 23. Function Chaining

class StringManipulator {
    private $str;

    public function __construct($str) {
        $this->str = $str;
    }

    public function toUpper() {
        $this->str = strtoupper($this->str);
        return $this;
    }

    public function reverse() {
        $this->str = strrev($this->str);
        return $this;
    }

    public function addPrefix($prefix) {
        $this->str = $prefix . $this->str;
        return $this;
    }

    public function get() {
        return $this->str;
    }
}

// Usage
$manipulator = (new StringManipulator('hello'))->toUpper()->reverse()->addPrefix('PREFIX_')->get();

// 24. Dynamic Function Creation

function createMathFunction($operation) {
    switch ($operation) {
        case 'add':
            return fn($a, $b) => $a + $b;
        case 'subtract':
            return fn($a, $b) => $a - $b;
        case 'multiply':
            return fn($a, $b) => $a * $b;
        case 'divide':
            return fn($a, $b) => $b != 0 ? $a / $b : 'Cannot divide by zero';
        default:
            return null;
    }
}

?>
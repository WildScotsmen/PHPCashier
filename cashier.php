<?php
/**
 * Basic cash register system.
 * @author: Amber
 * @version: 4/09/2017
 */

// Variables
$input = "";
$subtotal = 0;
$total = 0;
define("tax", .06);
$items = array();

// Loop for driving price entry
while(true) {
    $input = readline("Insert a value (type 'stop' to stop): ");
    if ($input == "stop") {
        echo "Entry halted.\n";
        break;
    }
    if (!is_numeric($input)) {
        echo "Invalid value. Try again.\n";
    }
    echo "Item added.\n";
    $input = round((float)$input, 2);
    array_push($items, $input);
}

// Calculates and prints receipt
$subtotal = array_sum($items);
$total = round(($subtotal + ($subtotal * tax)), 2);
echo "\nReceipt:\n";
foreach ($items as $num=>$item) {
    echo "Item #" . ($num + 1) . " Price: " . $item . "\n";
}
echo "\nSubtotal: " . $subtotal . "\n";
echo "Tax: " . round(($subtotal * tax), 2) . "\n";
echo "Total: " . $total . "\n\n";

// Loop for driving change entry
while(true) {
    if ($total < 0) {
        echo "\nYour change is " . round((-1 * $total), 2) . ". Have a nice day.\n";
        break;
    } else if ($total == 0) {
        echo "\nHave a nice day.\n";
    }
    $input = readline("Insert payment value: ");
    if (!is_numeric($input)) {
        echo "Invalid value. Try again.\n";
    }
    $total = round($total - (float)$input, 2);
    if ($total > 0) {
        echo "Remaining total is: " . $total . "\n";
    }
}
?>

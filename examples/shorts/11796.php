<?php
// Example 1: Using isset to check if a variable is set and not null
$var1 = "Hello";
if (isset($var1)) {
    echo "var1 is set and not null.\n";
} else {
    echo "var1 is not set.\n";
}

// Example 2: Using empty to check if a variable is empty
$var2 = "";
if (empty($var2)) {
    echo "var2 is empty.\n";
} else {
    echo "var2 has a value.\n";
}

// Example 3: Using isset and empty together
$var3 = null;
if (isset($var3)) {
    echo "var3 is set.\n";
} elseif (empty($var3)) {
    echo "var3 is empty.\n";
} else {
    echo "var3 is neither set nor empty.\n";
}
?>
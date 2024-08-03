<?php
// Function to demonstrate using get_defined_vars for debugging
function debugVariables() {
    $localVar1 = "local1";
    $localVar2 = "local2";
    
    // Define some more variables
    $globalVar1 = "global1";
    $globalVar2 = "global2";

    // Retrieve all defined variables in the current scope
    $definedVars = get_defined_vars();

    // Output the retrieved variables
    echo "Defined Variables in Local Scope:\n";
    print_r($definedVars);

    // Check for sensitive information and ensure it's handled safely
    foreach ($definedVars as $varName => $value) {
        if (strpos($varName, 'password') !== false) {
            unset($definedVars[$varName]); // Remove sensitive data
        }
    }

    echo "Filtered Variables:\n";
    print_r($definedVars);
}

// Call the function to see the output
debugVariables();
?>
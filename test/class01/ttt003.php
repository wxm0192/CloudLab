<?php
$my_var = 'Hello World';

test_global();

function test_global() {

    // Now in local scope

     // the $my_var variable doesn't exist

     // Produces error: "Undefined variable: my_var"

    echo $my_var;

    // Now let's important the variable

    global $my_var;

    // Works:

    echo $my_var;

}

?>

<?php

// Example: Using flock() for File Locking

$filename = 'data.txt';
$fp = fopen($filename, 'a+');

if (flock($fp, LOCK_EX)) {  // acquire an exclusive lock
    fwrite($fp, "Appending data to file\n");
    flock($fp, LOCK_UN);    // release the lock
} else {
    echo "Couldn't get the lock!";
}

fclose($fp);

?>
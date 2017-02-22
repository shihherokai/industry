<?php
foreach (glob("uploads/*.jpg") as $filename) {
    echo urldecode("$filename") ."</br>";
}
?>
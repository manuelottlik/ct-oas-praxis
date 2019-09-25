<?php

$data = json_decode(file_get_contents("http://server"), true);

foreach ($data as $item) {
    echo "<li>$item</li>";
}

<?php
$items = json_decode(file_get_contents('http://server'), true);

foreach ($items as $item) {
    echo "<li>$item</li>";
}

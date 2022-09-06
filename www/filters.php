<?php
// Include functions.inc.php for general purpose functions
include_once(__DIR__ . '\includes\functions.inc.php');

// Set variable products as the products list from products.db
$products = readProducts();
?>

<div class="search-filters">
    <form action="">
        Name: <input type="text" placeholder="Search product name.."><br>
        Min Price: <input type="number" name="min_price" placeholder="minimum price"><br>
        Max Price: <input type="number" name="max_price" placeholder="maximum price"><br>
    </form>
</div>
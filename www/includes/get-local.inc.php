<script type="text/javascript">
    for (var i = 0; i < localStorage.length; i++) {
        if (id == localStorage.key(i)) {
            const storedcart = JSON.parse(localStorage.getItem(id));
            var cart_id_list = [];
            var cart_quantity_list = [];
            for (var i in storedcart) {
                cart_id_list.push([i]);
                cart_quantity_list.push(storedcart[i]);
            }
            document.cookie = 'cart_id=' + cart_id_list;
            document.cookie = 'cart_quantity=' + cart_quantity_list;
            break;
        } else {
            document.cookie = 'cart_id=';
            document.cookie = 'cart_quantity=';
        }
    }
</script>
<?php
if (isset($_SESSION['ID'])) {
    if (!empty($_COOKIE['cart_id']) && !isset($_SESSION['cart'])) {
        $id_list = explode(',', $_COOKIE['cart_id']);
        echo print_r($id_list);
        $quantity_list = explode(',', $_COOKIE['cart_quantity']);
        echo print_r($quantity_list);
        $i = 0;
        foreach ($id_list as $id) {
            $_SESSION['cart'][$id] = $quantity_list[$i];
            $i++;
        }
    }
}
?>
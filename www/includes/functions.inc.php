<?php

// ----------------------------------------------------------------
// Account Related Functions
// ----------------------------------------------------------------

// Return if username is invalid
function invalidUsername($username)
{
  if (!preg_match("/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,15}$/", $username)) {
    $result = true;
  } else {
    $result = false;
  }
  return $result;
}

// Return if password is invalid
function invalidPassword($pwd)
{
  if (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,20}$/", $pwd)) {
    $result = true;
  } else {
    $result = false;
  }
  return $result;
}

// Returns if the input is invalid
function invalidInput($input)
{
  if (strlen(trim($input)) < 5) {
    $result = true;
  } else {
    $result = false;
  }
  return $result;
}

// Returns if password match
function pwdMatch($pwd, $pwdrp)
{
  if ($pwd !== $pwdrp) {
    $result = true;
  } else {
    $result = false;
  }
  return $result;
}

// Returns if username already exist
function usernameExist($username)
{
  $handle = fopen('..\..\database\accounts.db', 'r');
  while (!feof($handle)) {
    $line = fgetcsv($handle);
    if (is_array($line)) {
      if ($line[1] == $username) {
        return true;
      }
    }
  }
  return false;
}

// Returns if business name already exists
function bnameExist($bname)
{
  $handle = fopen('..\..\database\accounts.db', 'r');
  while (!feof($handle)) {
    $line = fgetcsv($handle);
    if (is_array($line)) {
      if ($line[8] == 'V') {
        if ($line[5] == $bname) {
          return true;
        }
      }
    }
  }
  return false;
}

// Returns if business address already exist
function baddressExist($baddress)
{
  $handle = fopen('..\..\database\accounts.db', 'r');
  while (!feof($handle)) {
    $line = fgetcsv($handle);
    if (is_array($line)) {
      if ($line[8] == 'V') {
        if ($line[6] == $baddress) {
          return true;
        }
      }
    }
  }
  return false;
}

// Upload image as profile picture
function uploadImage($profilepic, $id)
{
  $name = explode('.', $profilepic['name']);
  $extension = end($name);
  $profilepicName = strval($id) . '.' . $extension;
  $profilepicLink = '..\database\images\\' . $profilepicName;
  $absoluteLink = '..\..\database\images\\' . $profilepicName;
  move_uploaded_file($profilepic['tmp_name'], $absoluteLink);
  return $profilepicLink;
}

// Creates a customer account
function createCustomer($id, $username, $pwd, $profilepic, $address)
{
  $handle = fopen('..\..\database\accounts.db', 'a');

  $hashpwd = password_hash($pwd, PASSWORD_DEFAULT);

  if (empty($profilepic['name'])) {
    $profilepicLink = '..\database\images\default.png';
  } else {
    $profilepicLink = uploadImage($profilepic, $id);
  }

  $new_user = array($id, $username, $hashpwd, $profilepicLink, $address, null, null, null, 'C');
  fputcsv($handle, $new_user);
}

// Creates a vendor account
function createVendor($id, $username, $pwd, $profilepic, $bname, $baddress)
{
  $handle = fopen('..\..\database\accounts.db', 'a');

  $hashpwd = password_hash($pwd, PASSWORD_DEFAULT);

  if (empty($profilepic['name'])) {
    $profilepicLink = '..\database\images\default.png';
  } else {
    $profilepicLink = uploadImage($profilepic, $id);
  }

  $new_user = array($id, $username, $hashpwd, $profilepicLink, null, $bname, $baddress, null, 'V');
  fputcsv($handle, $new_user);
}

// Creates a shipper account
function createShipper($id, $username, $pwd, $profilepic, $hub)
{
  $handle = fopen('..\..\database\accounts.db', 'a');

  $hashpwd = password_hash($pwd, PASSWORD_DEFAULT);

  if (empty($profilepic['name'])) {
    $profilepicLink = '..\database\images\default.png';
  } else {
    $profilepicLink = uploadImage($profilepic, $id);
  }

  $new_user = array($id, $username, $hashpwd, $profilepicLink, null, null, null, $hub, 'S');
  fputcsv($handle, $new_user);
}

// ----------------------------------------------------------------
// Products Related functions
// ----------------------------------------------------------------

// Read the products from products database and select base on filters
function readProducts()
{
  $products = [];
  $handle = fopen('..\database\products.db', 'r');
  $header = fgetcsv($handle);
  while (!feof($handle)) {
    $product = fgetcsv($handle);
    if ($product != null) {
      if (isset($_GET['min_price']) && is_numeric($_GET['min_price'])) {
        if ($product[3] <= $_GET['min_price']) {
          continue;
        }
      };
      if (isset($_GET['max_price']) && is_numeric($_GET['max_price'])) {
        if ($product[3] >= $_GET['max_price']) {
          continue;
        }
      };
      if (isset($_GET['name']) && !empty($_GET['name'])) {
        $haystack = strtolower($product[2]);
        $needle = strtolower($_GET['name']);
        if (strpos($haystack, $needle) === false) {
          continue;
        }
      }
      $products[] = $product;
    }
  }
  fclose($handle);
  return $products;
}

// Display the products from given information by echoing the html
function displayProduct($pID, $ID, $name, $price, $image, $des)
{
  echo <<<HEREDOC
  <div class="product">

  <div class="product-image">
   <a href="productDetail.php?pID=$pID&ID=$ID&name=$name&price=$price&image=$image&des=$des"><img src=$image alt="product"></a>
  </div>

    <div class="product-info">

      <div class="product-name">
      <p>$name</p>
      </div>
<div class="price-btn">
      <div class="product-price">
        <p>$price$</p>
      </div>

</div>
<div class="add-to-cart-container">
<div class="quantity-input signupinput">
        <input type="number" name="quantity" value="1" placeholder="1" id = "quantity$pID">
        <input type="hidden" name="pID" value="$pID">
        <div class="product-addtocart ">
          <button class="btn-hover" onclick = "addToCart($pID,$ID,'$name',$price,'$image','$des',getQuantity($pID)) " ><i class="ti-shopping-cart" onclick="popUp()"></i></button>
        </div>
</div>

</div>
    </div>
  </div>

HEREDOC;
}

// Same as displayProduct but use for a different user type
function viewProduct($pID, $ID, $name, $price, $image, $des)
{
  echo <<<HEREDOC
  <div class="product">
  <div class="product-image">
   <a href="productDetail.php?pID=$pID&ID=$ID&name=$name&price=$price&image=$image&des=$des"><img src=$image alt="product"></a>
  </div>
    <div class="product-info">
      <div class="product-name">
      <p>$name</p>
      </div>
<div  class="price-btn">
      <div class="product-price">
        <p>$price$</p>
      </div>
</div>
    </div>
  </div>
HEREDOC;
}

// Use to empty the input field
function emptyInput($data)
{
  if (empty($data)) {
    return true;
  }
  return false;
}

// Get the list from the file base on given filepath
function get_list_from_file($filepath)
{
  $list = [];
  $handle = fopen($filepath, 'r');
  while (!feof($handle)) {
    $item = fgetcsv($handle);
    $list[] = $item;
  }
  fclose($handle);
  return $list;
}

//----------------------------------------------------------------
// Cart Related Functions
//----------------------------------------------------------------

// Add to Cart Function
function add_to_cart()
{
  if (isset($_POST['pID'], $_POST['quantity']) && is_numeric($_POST['pID']) && is_numeric($_POST['quantity'])) {
    $product_id = $_POST['pID'];
    $product_quantity = $_POST['quantity'];
    if (isset($_SESSION['cart'])) {
      if (array_key_exists($product_id, $_SESSION['cart'])) {
        $_SESSION['cart'][$product_id] += $product_quantity;
      } else {
        $_SESSION['cart'][$product_id] = $product_quantity;
      }
    } else {
      $_SESSION['cart'] = array($product_id => $product_quantity);
    }
  }
}

// Read from product list base on cart
function read_product_cart($cart)
{
  $products = [];
  $handle = fopen('..\database\products.db', 'r');
  $first = fgetcsv($handle);
  while ($row = fgetcsv($handle)) {
    $i = 0;
    $product = [];
    foreach ($first as $col_name) {
      $product[$col_name] = $row[$i];
      $i++;
    }
    if ($product != null) {
      if (array_key_exists(intval($product['pID']), $cart)) {
        $products[] = $product;
      }
    }
    if (count($products) === count($cart)) {
      break;
    }
  }
  fclose($handle);
  return $products;
}

// Display product for cart page
function display_product_cart($pID, $name, $price, $image, $quantity)
{
  echo <<<HEREDOC
  <div class="product-detail product-cart">

  <div class="product-detail-img">
    <img src="$image" alt="Product img">
  </div>

  <div class="product-detail-text">
    <h2>Name: </h2> <p> $name</p> <br>
    <h2>Price: </h2> <p> $price$</p><br>
    <h2>Quantity: </h2> <p>$quantity</p>
  </div>


  <div class = "delete-btn input-btn-container">
  <form method="post" action="cart.php" class="cart-btn">
  <input class ="btn-hover" onclick="removeFromCart($pID)" type="submit" value="Remove">
  <input type="hidden" name="pID" value="$pID">
  </form>
  </div>
    </div>



  HEREDOC;
}

function displayOrderDetail($pID, $name, $price, $image, $quantity)
{
  echo <<<HEREDOC
  <div class="product-detail product-cart">

  <div class="product-detail-img">
    <img src="$image" alt="Product img">
  </div>

  <div class="product-detail-text">
    <h2>Name: </h2> <p> $name</p> <br>
    <h2>Price: </h2> <p> $price$</p><br>
    <h2>Quantity: </h2> <p>$quantity</p>
  </div>



  </div>



  HEREDOC;
}

function displayOrders($oid)
{
  echo <<<HEREDOC
  <div class="product-detail order">

  <div class="orderID">
  <a href="orderDetail.php?oid=$oid">Order #$oid</a>
  </div>

  <div class="orderDetail">
  <a href="orderDetail.php?oid=$oid"> <button class="btn-hover" type="button" name="button"> Detail</button> </a>
  </div>
  </div>



HEREDOC;
}

function displayMyOrder($oid, $status)
{
  echo <<<HEREDOC
  <div class="product-detail order">

  <div class="orderID">
  <a href="#">Order #$oid</a>
  </div>

  <div class="orderDetail">
  <p>$status</p>
  </div>
  </div>



HEREDOC;
}

// Delete a product from the cart
function delete_cart()
{
  if (isset($_POST['pID'])) {
    if (!empty($_SESSION['cart'])) {
      unset($_SESSION['cart'][intval($_POST['pID'])]);
    }
  }
}

// Delete everything in cart
function clear_cart()
{
  if (isset($_POST['clear'])) {
    $_SESSION['cart'] = [];
  }
}

// Check if current page is a cart page
function if_in_cart()
{
  $haystack = $_SERVER['PHP_SELF'];
  $needle = "cart.php";
  if (!strpos($haystack, $needle)) {
    $_SESSION['count'] = 0;
  }
}

// Refresh cart
function refresh_cart()
{
  if ($_SESSION['count'] == 0) {
    $_SESSION['cart'] = [];
    if ($_GET['cartQuantityList'] == "" && $_GET['cartIdList'] == "") {
      return;
    }
    $cartQuantityList = explode(',', $_GET['cartQuantityList']);
    $cartIdList = explode(',', $_GET['cartIdList']);
    $i = 0;
    foreach ($cartIdList as $id) {
      $_SESSION['cart'][$id] = $cartQuantityList[$i];
      $i++;
    }
    $_SESSION['count'] = 1;
    header("Refresh:0");
  }
}


// Check out order
function check_out()
{
  if (isset($_POST['checkout'])) {

    $uid = $_SESSION['ID'];
    $name = $_SESSION['username'];
    $address = $_SESSION['address'];
    $orders = get_list_from_file('..\database\orders.db');
    $oid = count($orders) - 1;
    $hub = strval(random_int(1, 3));
    $order_file = fopen('..\database\orders.db', 'a');
    $order = array($oid, $uid, $name, $address, $hub, 'a');
    fputcsv($order_file, $order);
    fclose($order_file);

    $order_path = '..\database\distribution-hubs\\';
    if (!fopen($order_path, 'x')) {
      $order_path .= $hub . '\\' . strval($oid) . '.db';
      $handle = fopen($order_path, 'w');
    } else {
      $order_path .= $hub . '\\' . strval($oid) . '.db';
      $handle = fopen($order_path, 'w');
      $cart = array('pID', 'quantity');
      fputcsv($handle, $cart);
    }
    foreach ($_SESSION['cart'] as $id => $quantity) {
      $cart = array($id, $quantity);
      fputcsv($handle, $cart);
    }
    fclose($handle);
    $_SESSION['cart'] = [];
  }
}
//----------------------------------------------------------------
//----------------------------------------------------------------

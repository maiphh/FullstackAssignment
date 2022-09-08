<?php

function invalidUsername($username)
{
  if (!preg_match("/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,15}$/", $username)) {
    $result = true;
  } else {
    $result = false;
  }
  return $result;
}

function invalidPassword($pwd)
{
  if (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,20}$/", $pwd)) {
    $result = true;
  } else {
    $result = false;
  }
  return $result;
}

function invalidInput($input)
{
  if (strlen(trim($input)) < 5) {
    $result = true;
  } else {
    $result = false;
  }
  return $result;
}

function pwdMatch($pwd, $pwdrp)
{
  if ($pwd !== $pwdrp) {
    $result = true;
  } else {
    $result = false;
  }
  return $result;
}

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

function readUsers()
{
  $users = [];
  $handle = fopen('..\..\database\accounts.db', 'r');
  while (!feof($handle)) {
    $user = fgetcsv($handle);
    $users[] = $user;
  }
  fclose($handle);
  return $users;
}

function readProducts() {
  $products=[];
  $handle = fopen('..\database\products.db','r');
  $header = fgetcsv($handle);
  while(!feof($handle)) {
    $product = fgetcsv($handle);
    if($product!=null) {
    $products[] = $product;
  }
  }
  fclose($handle);
  return $products;
}

function read_filter_products()
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
      if (isset($_GET['min_price']) && is_numeric($_GET['min_price'])) {
        if ($product['price'] <= $_GET['min_price']) {
          continue;
        }
      };
      if (isset($_GET['max_price']) && is_numeric($_GET['max_price'])) {
        if ($product['price'] >= $_GET['max_price']) {
          continue;
        }
      };
      if (isset($_GET['name']) && !empty($_GET['name'])) {
        $haystack = strtolower($product['name']);
        $needle = strtolower($_GET['name']);
        if (strpos($haystack, $needle) === false) {
          continue;
        }
      };
      $products[] = $product;
    };
  }
  fclose($handle);
  return $products;
}



function displayProduct($pID, $name, $price, $image)
{
  echo <<<HEREDOC
  <div class="product">

  <div class="product-image">
    <img src=$image alt="">
  </div>

    <div class="product-info">

      <div class="product-name">
      <p>$name</p>
      </div>
  <div>
      <div class="product-price">
        <p>$price$</p>
      </div>

      <form action="index.php" method="post">
            <input type="number" name="quantity" value="1" placeholder="1">
            <input type="hidden" name="pID" value="$pID">
            <input type="submit" value="Add To Cart" class="ti-shopping-cart">
      </form>
  </div>
    </div>
  </div>
  HEREDOC;
}



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

function emptyInput($data)
{
  if (empty($data)) {
    return true;
  }
  return false;
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
  <div class="product-cart">

    <div class="product-image">
      <img src=$image alt="">
    </div>

    <div class="product-info">

        <div class="product-name">
        <p>$name</p>
        </div>

        <div class="product-price">
          <p>$price$</p>
        </div>

        <div class="product-quantity">
          <p>$quantity</p>
        </div>

    </div>

    <form method="post" action="cart.php" class="cart-btn">
    <input type="submit" value="Delete">
    <input type="hidden" name="pID" value="$pID">
    </form>
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
    echo print_r('wor');
    $_SESSION['cart'] = [];
  }
}

//----------------------------------------------------------------
//----------------------------------------------------------------

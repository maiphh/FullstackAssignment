<?php
session_start();
if(!isset($_POST['addproduct'])) {
  header('location:../addProducts.php');
  exit();
}

function readProducts() {
  $products=[];
  $handle = fopen('..\..\database\products.db','r');
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


function uploadProductImage($productpic,$pid) {
  $name = explode('.',$productpic['name']);
  $extension = end($name);
  $productpicName = strval($pid).'.'.$extension;
  $productpicLink = '..\database\product-images\\'.$productpicName;
  $absoluteLink = '..\..\database\product-images\\'.$productpicName;
  move_uploaded_file($productpic['tmp_name'],$absoluteLink);
  return $productpicLink;
}


    $error = array();
    $data = array();
    $msg = '';
    $error['name'] = $error['price'] = $error['description'] = '';
    $products = readProducts();
    $pID = count($products)+1;
    if(isset($_SESSION['ID'])) $ID = $_SESSION['ID'];
    $fp = fopen('..\..\database\products.db','a');
    if (isset($_POST['addproduct'])) {
        $data['pID'] = $pID;
        $data['ID'] = $ID;
        $name = $data['name'] = isset($_POST['name']) ? $_POST['name'] : '';
        $price = $data['price'] = isset($_POST['price']) ? $_POST['price'] : '';
        $data['productpic'] = uploadProductImage($_FILES['productpic'],$pID);
        $des = $data['description'] = isset($_POST['description']) ? $_POST['description'] : '';

        // var_dump($data)
        //validate name input
        if (strlen($name) == 0) {
            $error["name"] =  "Please enter name of product.";
        } else if (strlen($name) < 10 || strlen($name) > 20) {
            $error['name'] = "Name must contain 10-20 characters.";
        } else if (preg_match('/^[a-zA-Z ]*$/', $name) == 0) {
            $error['name'] = "Please name including text only.";
        }

        //validate price input
        if (strlen($price) == 0) {
            $error["price"] =  "Please enter price of product.";
        } else if (!preg_match("/^[0-9]*$/", $price)) {
            $error['price'] = "Price must be a positive integer.";
        }

        //validate description input
        if (strlen($des) == 0) {
            $error['description'] =  "Please enter the description for product.";
        } else if (!preg_match('/^[a-zA-Z ]*$/', $des)) {
            $error['description'] = "Description must include characters only.";
        } else if (strlen($des) > 500) {
            $error['description'] = "Description must have at most 500 characters.";
        }


        //save data
        if ($error['name'] == '' && $error['price'] == '' && $error['description'] =='') {
            $msg = 'Products successfully added.';
            fputcsv($fp, $data);
            fclose($fp);
            header('location:../addProducts.php?msg='.$msg);
}
        else {
        $msg = $error['name'].'<br>'. $error['price'].'<br>'.$error['description'].'<br>';
        header('location:../addproducts.php?msg='.$msg);
}
}
?>

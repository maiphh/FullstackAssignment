<!DOCTYPE html>
    <html>
    <head>
        <title>Add products form</title>
        <meta charset="UTF-8">
        <meta name= "viewport" content="width=device-width, initial-scale = 1">
    </head>
    <body>
        <?php

        //view products
        if (isset($_POST["act1"])) {
            echo "<html><body><table>\n\n<tr>
            \n\n<td>name</td><td>price</td><td>description</td>";
            $f = fopen("products.csv", "r");
            while (($line = fgetcsv($f)) !== false) {       
                echo "<tr>";
                foreach ($line as $cell) {
                    echo "<td>". htmlspecialchars($cell) . "</td>";        }
            }
            echo "</tr>\n";
            fclose($f);
            echo "\n</table></body></html>";
        }
        // validate form input
        $error = array();
        $data = array();
        if (isset($_POST["act2"])) {
            $name = $data['name'] = isset($_POST['name']) ? $_POST['name'] : '';
            $price = $data['price'] = isset($_POST['price']) ? $_POST['price'] : '';
            $des = $data['description'] = isset($_POST['description']) ? $_POST['description'] : '';
            
            var_dump($data);
            //validate name input
            if (strlen($name) == 0) {
                $error["name"] =  "Please enter name of product.";
            } else if (strlen($name) < 10 || strlen($name) > 20) {
                $error['name'] = "Please enter name with a length from 10-20 characters.";    
            } else if (preg_match('/^[a-zA-Z ]*$/', $name) == 0) {
                $error['name'] = "Please name including text only.";
            }

            //validate price input
            if (!preg_match("/^[0-9]*$/", $price)) {
                $error['price'] = "Please enter a positive numerical price only.";       
            }

            //validate description input
            if (!preg_match('/^[a-zA-Z ]*$/', $des)) {
                $error['des'] = "Please enter description including characters only.";
            } else if (strlen($des) > 500) {
                $error['des'] = "Please enter description with at most 500 characters.";
            } 

            //save data
            if ($error == []) {
                echo 'Products successfully added.';
                $fp = fopen('products.csv', 'a');
                fputcsv($fp, $data); 
            } else {
                foreach ($error as $errors) {
                    echo $errors.'<br>';
                };
            }
        }
        ?>
        <h1>Products</h1>

        <!-- //view products option -->
        <form method="post">
            <button id = "view_product" type="submit" name="act1" >View products</button>
        <!-- // add products option -->
        </form>
        <form method="post">
            <table cellspacing = "0" cellpadding = "5">
                <tr>
                    <td>Product name</td>
                    <td> 
                        <label for="name"></label>
                        <input id ="name" type="text" name="name" />
                        <?php echo isset($error['name']) ? $error['name'] : ''; ?>
                    </td>                    
                </tr>
                <tr>
                    <td>Product price</td>
                    <td>
                        <label for="price"></label>
                        <input id ="price" type="text" name = "price" /> 
                        <?php echo isset($error['price']) ? $error['price'] : ''; ?>
                    </td>
                </tr>
                <tr>
                    <td>Product description</td>
                    <td>
                        <label for="description"></label>
                        <input id = "description" type="text" name = "description" />
                        <?php echo isset($error['description']) ? $error['description'] : '';?>
                    </td>
                </tr>
                <tr>
                    <button id ="add_product" type="submit" name="act2" >Add new product</button>
                </tr>
            </table>            
        </form>
    </body>
</html>

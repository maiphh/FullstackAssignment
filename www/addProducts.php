    <?php
        include_once 'header.php';

    ?>
    <body>

        <div class="main-content addpd-content">


                              <h1>Add new product</h1>
            <div class="myAccount-form-container Addproduct-container">
                <form class="add-form" method = "post" enctype= "multipart/form-data" action="includes/addProducts.inc.php">

                  <div class="input-group mb-3 pd-files" >
                    <input type="file" class="form-control" id="inputGroupFile02" name='productpic' required />
                  </div>



                    <div class="signupinput">
                      <input type="text"  name="name" placeholder="Product Name" id="pname">
                    </div>

                    <div class="signupinput">
                      <input type="text"  name="price" placeholder="Product Price" id="price">
                    </div>

                    <textarea id="pdes" name="description" placeholder="Description"  maxlength="500"></textarea>



                        <div class = "form-button">
                            <!-- <button id='submit'type="submit" name="act2" >Add</button> -->
                              <button type="submit" name="addproduct">Add Product</button>
                        </div>
                            <p>
                                <?php
                                if(isset($_GET['msg'])) {echo $_GET['msg'];}
                                ?>
                            </p>

                </form>
            </div>
        </div>
    </div>
    <script src="validate.js"></script>
    </body>
</html>

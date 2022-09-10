    <?php
    include_once 'header.php';

    ?>

    <body>

      <div class="main-content addpd-content">


        <h1>Add new product</h1>
        <div class="myAccount-form-container Addproduct-container">
          <form class="add-form" method="post" enctype="multipart/form-data" action="includes/addProducts.inc.php">

            <div class="input-group mb-3 pd-files">
              <input type="file" class="form-control" id="inputGroupFile02" name='productpic' required />
            </div>



            <div class="signupinput">
              <input type="text" name="name" placeholder="Product Name" id="pname">
              <small></small>
            </div>

            <div class="signupinput">
              <input type="text" name="price" placeholder="Product Price" id="pprice">
            </div>

            <textarea id="pdes" name="description" placeholder="Description" maxlength="500"></textarea>



            <div class="form-button">
              <button class="btn-hover" type="submit" name="addproduct" id='submit'>Add Product</button>
            </div>
            <p>
              <?php
              if (isset($_GET['msg'])) {
                echo $_GET['msg'];
              }
              ?>
            </p>

          </form>
        </div>
      </div>
      </div>
      </div>
      <?php
      // Footer
      include_once 'footer.php';
      ?>
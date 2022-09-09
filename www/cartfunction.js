function addToCart(pID,ID,name,price,image,des,quantity) {
    var product = [pID,quantity];
    var uid = localStorage.getItem('id');
  if(localStorage.getItem(uid) == null) {
    var products = [];
    products.push(product)
    jsonProducts = JSON.stringify(products);
    localStorage.setItem(uid,jsonProducts);

  }
  else {
    products = JSON.parse(localStorage.getItem(uid));
    var duplicate = false;
    products.every(function(product) {
      if(product[0]==pID) {
        product[1] += quantity
        duplicate = true;
        return false;
      }
      else return true;
    })

    if(!duplicate){
        products.push(product);
    }

    jsonProducts = JSON.stringify(products);
    localStorage.setItem(uid,jsonProducts);
  }
  alert("Add Product Successfully!")
}


function removeFromCart(pID) {

}

function storeCart(ID){
  products = readLocalStorage();
  var userCarts =[]
  var userCart = [ID,products];
  userCarts.push(userCart)
  jsonUserCarts = JSON.stringify(userCarts)
  localStorage.setItem('userCart',jsonUserCarts);
  localStorage.removeItem('cart');
}


function getQuantity(pID) {
  var quantity = document.getElementById('quantity'+pID);
  return parseInt(quantity.value);
}

function readLocalStorage() {
  products = JSON.parse(localStorage.getItem('cart'));
  return products;
}

function pushToUrl() {
  for (var i = 0; i < localStorage.length; i++) {
      if ('4' == localStorage.key(i)) {
          const storedcart = JSON.parse(localStorage.getItem('4'));
          var cart_id_list = [];
          var cart_quantity_list = [];
          for (var i in storedcart) {
            cart_id_list.push(storedcart[i][0]);
            cart_quantity_list.push(storedcart[i][1]);
          }
          cart_id_list = JSON.stringify(cart_id_list).replace("[","").replace("]","");
          cart_quantity_list= JSON.stringify(cart_quantity_list).replace("[","").replace("]","");
        }
        window.location.href= "cart.php? cartIdList="+cart_id_list+"&cartQuantityList="+cart_quantity_list;
  }
}

// funtcion readUserCart() {
//   ID = localStorage.getItem("id");
//   if(localStorage.getItem('userCart')!=null){
//   userCarts = JSON.parse(localStorage.getItem('userCart'));
//   userCarts.every(function(userCart) {
//     if(userCart[0]==ID) {
//       products = userCart[1];
//       // products = JSON.parse(localStorage.getItem('cart'));
//       return products;
//     }})}
//   }
// }

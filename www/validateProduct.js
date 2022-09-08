const btn = document.getElementById('submit');
const inputEles = document.querySelectorAll('.prod-input');
btn.addEventListener('click',function() {
    Array.from(inputEles).map((ele) =>
        ele.classList.remove('success','error')
);
    let isValid = checkValidate();

    if(isValid==true) {
        window.location.href = "addProducts.php?msg=Products successfully added.";
    }
    else  {
      window.location.href = "addProducts.php?msg="+isValid;
    }
});

const pname = document.getElementById('pname');
const pprice = document.getElementById('pprice');
const pdes = document.getElementById('pdes');



function checkValidate() {
    let nameValue = pname.value;
    let priceValue = pprice.value;
    let desValue = pdes.value;

    let isCheck = true;

    var name;
    var price;
    var description;

    //validate Product name
    if (nameValue == '') {
      name = "Please enter name of product.";
    } else if (nameValue.length < 10|| nameValue.length > 20) {
      name = "Please enter name of product.";
    } else {
      name = '';
    };

    //validate price input

    if (priceValue =='') {
        price = "Please enter price of product.";
    } else if (!isPriceValid(priceValue)) {
        price = "Price must be a positive integer.";
    } else {
        price = '';
    };

    //validate Product description
    if (desValue=='') {
        description = 'Please enter the description for product.';
    } else if(!isDescriptionValid(desValue)) {
        description = 'Description must include characters only.';
    } else {
        description = ''
    };
    if(description=='' && name==' '&& price== '') {
      return isCheck;
    }
    else return name+'<br>'+price+'<br>'+description;
};
function isPriceValid(price) {
    return /^[0-9]*$/.test(price);
};
function isDescriptionValid(description) {
    return /^[a-zA-Z]*$/.test(description);
}
//
// function setError(ele,message) {
//     let parentEle = ele.parentNode;
//     parentEle.classList.add('error-input');
//     parentEle.querySelector('small').innerText = message;
// }

// function setSuccess(ele) {
//     ele.parentNode.classList.add('success');
// }

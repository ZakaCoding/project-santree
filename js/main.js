var cartIcon = document.querySelector("#cart");
var layer = document.querySelector(".layer-transparent");

cartIcon.addEventListener("mouseenter", showCart);
layer.addEventListener("mouseenter", hideCart);

function showCart() {
    var collapsed = document.getElementsByClassName('collapsed');
    for(var i = 0; i < collapsed.length; i++) {
        collapsed[i].hidden = false;
    }
}

function hideCart() {
    var collapsed = document.getElementsByClassName('collapsed');
    for(var i = 0; i < collapsed.length; i++) {
        collapsed[i].hidden = true;
    }
}

var plusBtn = document.querySelector("#plus");
var minBtn = document.querySelector("#minus");

plusBtn.addEventListener("click", function() {
    var val = document.querySelector("#qty");
    var valInt = parseInt(val.value);
    valInt += 1;

    val.value = valInt;
    return val.value;
});

minBtn.addEventListener("click", function() {
    var val = document.querySelector("#qty");
    var valInt = parseInt(val.value);

    valInt -= 1;
    val.value = valInt;

    checkItemValue();
    return val.value;
});

function checkItemValue() {
    var val = document.querySelector("#qty");

    if(val.value < 1)
    {
        // set val to 1
        val.value = 1;
    }
    return val.value;
}


// function add item to cart
const productName = document.getElementById("product-name").innerHTML;
var price = document.getElementById("product-price").innerHTML;
var qty = document.getElementById("qty").value;

var addBtn = document.getElementById("addCart");
var items = []; // object data
addBtn.addEventListener("click", function() {

    // check items data
    // if(localStorage.getItem("items").length)

    // items.push(
    //     {"id" : 2, "name" : "Kripik Singkong", "price" : 20000}
    // );
    // // store session browser
    // localStorage.setItem("items",JSON.stringify(items));
    
    // alert(JSON.parse(localStorage.getItem("items")).length);

    alert(productName);
    // check has items
    if(localStorage.getItem("items") !== null)
    {
        if(JSON.parse(localStorage.getItem("items")).length >= 1)
        {
            items.push(
                {"id" : 1, "name" : productName, "price" : price}
            );
            var dataCount = JSON.parse(localStorage.getItem("items")).length;
            localStorage.setItem("items",JSON.stringify(items));
        }
    } 
    else 
    {
        items.push(
            {"id" : 1, "name" : productName, "price" : price}
        );
        // store session browser
        localStorage.setItem("items",JSON.stringify(items));
    }
    
    
    // alert(JSON.parse(localStorage.getItem("items"))[3]["name"]);
});

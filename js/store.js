// generate checkout items
function generateMessage() {
    // get Data form input shipping address
    var userName = document.getElementById('firstName').value + ' ' + document.getElementById('lastName').value;
    var email = document.getElementById('email').value;
    var address = document.getElementById('address').value;
    var province = document.getElementById('province').value;
    var domisile = document.getElementById('state').value;
    var postalCode = document.getElementById('zip').value;
    // get data from input payment method
    /*
    * opsional
    */

    var subTotalItem = 0;
    var price = 0;
    for(var i = 0; i < JSON.parse(localStorage.getItem('items')).length; i++)
    {
        subTotalItem += parseInt(JSON.parse(localStorage.getItem('items'))[i]['qty']);

        var priceInRupiah = JSON.parse(localStorage.getItem('items'))[i]['price'];
        var priceInt =  priceInRupiah.substr(3, priceInRupiah.length) * parseInt(JSON.parse(localStorage.getItem('items'))[i]['qty']);
        
        price += priceInt;
    }
    var totalPrice = price.toFixed(3).toString();
    totalPrice = totalPrice.replace('.','');
    
    var totalPayment = new Intl.NumberFormat('id-ID',{style : 'currency', currency : 'IDR'}).format(totalPrice);

    // generate message
    var messageHeader = `
    Hallo admin santreeberdaya.com. Berikut pesanan saya
    Rincian barang :
    `;
    var messageDetailItems = "";
    for (let index = 0; index < JSON.parse(localStorage.getItem('items')).length; index++) {
        var itemsDataOnText = `
        Nama produk *${JSON.parse(localStorage.getItem('items'))[index]['name']}*, Total *${JSON.parse(localStorage.getItem('items'))[index]['qty']} barang*
        --------------------------------------------
        `;

        messageDetailItems += itemsDataOnText;
    }
    var shippingInfoText = `
    *Alamat Pengiriman*
    Nama : ${userName},
    email : ${email},
    Alamat : ${address},
    Provinsi : ${province},
    Kabupaten : ${domisile},
    Kode Pos : ${postalCode},

    *Total Pembayaran*
    ${totalPayment}
    `;

    var textMessage = encodeURI(messageHeader+messageDetailItems+shippingInfoText);
    var messageNumber = "+6281284535690";
    var uri = "https://api.whatsapp.com/send?text="+textMessage+"&phone="+messageNumber;

    document.querySelector('.loading').hidden = false;

    // remove items data from localstorage
    localStorage.removeItem('items');

    setInterval(() => {
        // sent message
        window.location.href = uri;
    }, 0);
};

var cartIcon = document.querySelector("#cart");
var layer = document.querySelector(".layer-transparent");

cartIcon.addEventListener("mouseenter", () => {showCart(false)});
layer.addEventListener("mouseenter", () => {showCart(true)});

function showCart(status) {
    var collapsed = document.getElementsByClassName('collapsed');
    for(var i = 0; i < collapsed.length; i++) {
        collapsed[i].hidden = status;
    }
}

window.addEventListener("DOMContentLoaded", () => {
    showCountCartItem();
    showCartItem();
});

var cartEmptyElement = document.querySelector(".cart-empty");
var cartAvailElement = document.querySelector(".cart-avail");
function showCartItem() {

    if(localStorage.getItem("items") !== null)
    {
        cartEmptyElement.hidden = true;
        cartAvailElement.hidden = false;

        var getTotalItemsStorage = JSON.parse(localStorage.getItem("items"));
        var totalItemsElement = document.querySelector(".cart-total-item");

        if(totalItemsElement !== null)
        {
            totalItemsElement.innerText = getTotalItemsStorage.length;
        }

        var number = document.getElementById("number");
        if(number !== null)
        {
            number.innerText = getTotalItemsStorage.length;
        }
        
        var cartRow = document.querySelector('.cart-item-list');
        var listItemElement = document.querySelector('.list-items');
        var listItemElementOnCheckout = document.querySelector('.list-items-checkout');
        
        var i = 0;
        while (i < getTotalItemsStorage.length) {
            var cartRowContent = `
            <div class="cart-item">
                <img src="${JSON.parse(localStorage.getItem('items'))[i]['image-path']}" alt="Item" style="margin:0px" id="item-image">
                <p class="info">
                    <strong class="title" id="item-name">${JSON.parse(localStorage.getItem('items'))[i]['name']}</strong><br>
                    <small class="text-muted">${JSON.parse(localStorage.getItem('items'))[i]['qty']} Barang (50gram)</small>
                </p>
            </div>
            `;

            var itemElement = `
            <div class="item d-flex text-muted pt-3">
                <img class="bd-placeholder-img flex-shrink-0 me-2 rounded" src="${JSON.parse(localStorage.getItem('items'))[i]['image-path']}" width=48 height=48>

                <div class="flex-2-col w-100 border-bottom">
                    <p class="pb-3 mb-0 lh-sm">
                        <strong class="d-block">${JSON.parse(localStorage.getItem('items'))[i]['name']}</strong>
                        <small>${JSON.parse(localStorage.getItem('items'))[i]['qty']} item</small>
                    </p>
                    <div class="flex-2-col">
                        <p class="c-green">
                            <strong>${JSON.parse(localStorage.getItem('items'))[i]['price']}</strong>
                        </p>
                        <img src="../asset/.icon/trash-icon.png" style="width: 22px; margin-bottom: 15px; margin-left: 50px;" alt="trash-icon" onclick="deleteItemOnCart(${i})">
                    </div>
                </div>
            </div>
            `;

            // for checkout page
            var itemElementCheckout = `
            <div class="item d-flex text-muted pt-3">
               <div class="flex-2-col w-100 border-bottom">
                    <p class="pb-3 mb-0 lh-sm">
                        <strong class="d-block">${JSON.parse(localStorage.getItem('items'))[i]['name']}</strong>
                        <small>${JSON.parse(localStorage.getItem('items'))[i]['qty']} item</small>
                    </p>
                    <p class="c-green">
                        <strong>${JSON.parse(localStorage.getItem('items'))[i]['price']}</strong>
                    </p>
                </div>
            </div>
            `;

            var itemOnPageCart = document.createElement('div.item');
            itemOnPageCart.innerHTML = itemElement;
            if(listItemElement !== null)
            {
                listItemElement.appendChild(itemOnPageCart);
            }

            var createElementOnCheckout = document.createElement('div.item');
            createElementOnCheckout.innerHTML = itemElementCheckout;
            if(listItemElementOnCheckout !== null)
            {
                listItemElementOnCheckout.appendChild(createElementOnCheckout);
            }

            var cartItem = document.createElement('div.cart-item');
            cartItem.innerHTML = cartRowContent;
            cartRow.appendChild(cartItem);  

            i++;
        }

        var subTotalItem = 0;
        var price = 0;
        for(var i = 0; i < getTotalItemsStorage.length; i++)
        {
            subTotalItem += parseInt(JSON.parse(localStorage.getItem('items'))[i]['qty']);

            var priceInRupiah = JSON.parse(localStorage.getItem('items'))[i]['price'];
            var priceInt =  priceInRupiah.substr(3, priceInRupiah.length) * parseInt(JSON.parse(localStorage.getItem('items'))[i]['qty']);
            
            price += priceInt;
        }
        var totalPrice = price.toFixed(3).toString();
        totalPrice = totalPrice.replace('.','');
        // console.log(totalPrice);

        // console.log(new Intl.NumberFormat('id-ID',{style : 'currency', currency : 'IDR'}).format(totalPrice));
        var totalPriceElement = document.querySelector('.total-price');
        if(totalPriceElement !== null)
        {
            totalPriceElement.innerText = new Intl.NumberFormat('id-ID',{style : 'currency', currency : 'IDR'}).format(totalPrice);
        }

        var total = document.querySelector('.total-item'); //on page cart.php
        if(total !== null)
        {
            total.innerText = subTotalItem;
        }
    }
    else
    {
        cartEmptyElement.hidden = false;
        cartAvailElement.hidden = true;
    }
}

function deleteItemOnCart(index)
{
    // get ID from data localStorage and minus 1 because of array inddexing
    var id = index;
    // parsing data from localStorage to variable
    var jsonData = JSON.parse(localStorage.getItem('items'));
    // delete data JSON by indexing
    // remember this only delete data JSON from variable was set before, not effect on localStorage Data
    delete jsonData[id];

    // after delete JSON data on variable, data will have undefined key. i.e
    /**
     * data before
     * [
     *  {'key' : 'value'},
     *  {'key' : 'value'},
     *  {'key' : 'value'}
     * ]
     * 
     * after delete JSON data with > delete JsonData[key]
     * >>>> data on JSON will be like this <<<<<<
     * [
     *  {'key' : 'value'},
     *  undefined,
     *  {'key' : 'value'}
     * ]
     * 
     * 
     */

    // set data without undefined key>value
    jsonData = jsonData.filter(function (e) {
        // data will be filtered
        return e != undefined
    });

    
    // parsing data was filtered to localStorage('items').
    localStorage.setItem('items', JSON.stringify(jsonData));

    // check data on localstorage
    // if already 0 then remove localstorage
    if(JSON.parse(localStorage.getItem('items')).length == 0)
    {
        localStorage.removeItem('items');
    }
    // reload page for get updated data
    window.location.reload();
}


var plusBtn = document.querySelector("#plus");
var minBtn = document.querySelector("#minus");


plusBtn.addEventListener("click", function() {
    var val = document.querySelector("#qty");
    var valInt = parseInt(val.value);
    valInt += 1;

    return val.value = valInt;
});

minBtn.addEventListener("click", function() {
    var val = document.querySelector("#qty");
    var valInt = parseInt(val.value);

    valInt -= 1;
    val.value = valInt;

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
var productId = document.getElementById("product-id").value;
var productName = document.getElementById("product-name").innerText;
var price = document.getElementById("product-price").innerText;
var qty = document.getElementById("qty");
var imagePath = document.getElementById("item-image").src;

var addBtn = document.getElementById("addCart");

// check items
function storeItems() {
    if(localStorage.getItem("items") !== null) {
        var items = JSON.parse(localStorage.getItem("items"));
        var itemId = JSON.parse(localStorage.getItem('items')).length;
    } else {
        var itemId = 0;
        var items = []; // object data
    }

    items.push(
        {"item-id" : parseInt(itemId)+1,"product-id" : productId, "name" : productName, "price" : price, "image-path" : imagePath ,"qty" : qty.value}
    );

    var alertElement = document.querySelector('.alert-success');
    alertElement.classList.add("show-up");

    setInterval(() => {
        alertElement.classList.remove('show-up');
    }, 3000);

    return localStorage.setItem("items",JSON.stringify(items));
}

addBtn.addEventListener("click", function() {
    storeItems();
    showCountCartItem();

    var getTotalItemsStorage = JSON.parse(localStorage.getItem("items"));
    var totalItemsElement = document.getElementById("number");
    totalItemsElement.innerText = getTotalItemsStorage.length;

    if(localStorage.getItem("items") !== null)
    {
        cartEmptyElement.hidden = true;
        cartAvailElement.hidden = false;
    }
    else
    {
        cartEmptyElement.hidden = false;
        cartAvailElement.hidden = true;
    }
    
    var totalItems = JSON.parse(localStorage.getItem("items")).length;
    
    if(totalItems == 1)
    {
        var itemPosition = 0;
    }
    else
    {
        var itemPosition = parseInt(totalItems) - 1;
    }
    
    var cartRow = document.querySelector('.cart-item-list');
    var cartRowContent = `
    <div class="cart-item">
        <img src="${JSON.parse(localStorage.getItem('items'))[itemPosition]['image-path']}" alt="Item" style="margin:0px" id="item-image">
        <p class="info">
            <strong class="title" id="item-name">${JSON.parse(localStorage.getItem('items'))[itemPosition]['name']}</strong><br>
            <small class="text-muted">${JSON.parse(localStorage.getItem('items'))[itemPosition]['qty']} Barang (50gram)</small>
        </p>
    </div>
    `;

    var cartItem = document.createElement('div.cart-item');
    cartItem.innerHTML = cartRowContent;
    cartRow.appendChild(cartItem);  
    
});

function showCountCartItem() {
    var cartIconNumber = document.querySelector(".cart-number");

    // check localstorage
    if(localStorage.getItem("items") !== null)
    {
        cartIconNumber.style.visibility = "visible";

        var itemCount = JSON.parse(localStorage.getItem("items")).length;    
        cartIconNumber.innerText = itemCount;
    } 
    else 
    {
        cartIconNumber.style.visibility = "hidden";
    }
}

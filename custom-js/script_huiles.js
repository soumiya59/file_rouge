let products;
function loadData(){
    $.ajax({
        url: 'include/Huiles.json',
        success: function(data){
            products = data;
            var categories = ""
            for(let i=0; i<data.length; i++){
                $('#alldata').append(`
                <div class=' col-xs-6 col-md-3 product ' data-categorie='${data[i].categorie}'   >
                    <div class='product-inner text-center'>
                        <a href="../fiche-produit.html">
                        <img class='card-img-top' src='${data[i].image}'  style='cursor: pointer;' onclick="addToLocal(${data[i].id})">
                        </a>
                        <div class='mt-2'>
                            ${data[i].name} <br>
                            ${data[i].price} DH<br>
                            ${data[i].rate}
                            <button onclick="addToCart(${data[i].id},this)" class='btn btn-style fw-bold mon mb-3'>Ajouter au panier</button>
                        </div>
                    </div>
                </div>          
                `);
                var categorie = data[i].categorie
                if (categories.indexOf("<option value='" + categorie + "'>" + categorie + "</option>") == -1) {
                    categories += "<option value='" + categorie + "'>" + categorie + "</option>";
                }
            }
            $(".filter-categorie").append(categories);
        },
    })
}
loadData();

let prod = []
function addToLocal(id){
    prod.push(id)
    localStorage.setItem('productInfo',JSON.stringify(prod));
    let item = JSON.parse(localStorage.getItem('productInfo'));
    // console.log(item)
}

function getProductInfo(){
    let item = JSON.parse(localStorage.getItem('productInfo'));
    for(let i=0;i<products.length;i++){
        let choosen_product = products.find((product)=>product.id == item[i]);
        console.log(choosen_product)
        addProductToDom(choosen_product)
    }    
}

function addProductToDom(choosen_product){
    $('#product_data').append(`

    <div class="col-md-6">
        <div class="text-center mt-3">
         <img src="${choosen_product.image}" class=" mx-auto img-fluid d-block " alt="prod img" style="max-width: 450px;">
        </div>
        <div class="container d-flex justify-content-center mt-3 justify-content-around">
           <img src="${choosen_product.image}" alt="" width="32%" class="img-fluid" >
           <img src="${choosen_product.image}" alt="" width="32%" class="img-fluid" >
           <img src="${choosen_product.image}" alt="" width="32%" class="img-fluid" >
        </div>
        </div>
        <div class="col-md-6 mt-4 mt-md-5 ">
           <h1 class="ban">${choosen_product.name}</h1>
           <p class="fw-light">100% Huile Thérapeutique Pure</p>
           <div class="rating d-flex">
               <i class="fas fa-star"> </i><i class="fas fa-star mx-3"></i><i class="fas fa-star"></i><i class="fas fa-star mx-3"></i><i class="fas fa-star-half"></i> <p class="mx-2">(11)</p> 
           </div>
           <div class="col-md-12 bottom-rule d-flex">
               <h4 class="fw-light py-2">PRIX:</h4>
               <h2 class="product-price mx-5 mon ">${choosen_product.price} DH</h2>
           </div> 

           <div>
               <p class="fw-light">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique illum consectetur numquam illo nemo! Minus beatae facilis sequi libero unde debitis in voluptatibus ta! Libero facere voluptatibus accusamus praesentium, magni beatae sunt </p>
           </div>
         
           <div class="product-qty d-flex mt-4 justify-content-sm-center justify-content-md-start">
            <span class="btn btn-default btn-lg btn-qty" onclick="incrementValue()">
             <span class="glyphicon glyphicon-plus" aria-hidden="true" >+</span>
            </span>
       
            <input class="btn btn-default btn-lg btn-qty" value="1" id="number"/>
       
            <span class="btn btn-default btn-lg btn-qty" onclick="decreaseValue()">
             <span class="glyphicon glyphicon-minus" aria-hidden="true">-</span>
            </span>
           </div>
            <a href="cart.html" class="btn fw-light text-light btn-lg fs-6 px-lg-5 mx-1 mt-4 w-100" style="background-color: brown;">
                <img class="px-1" width="32px" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAAgCAYAAABzenr0AAAABmJLR0QA/wD/AP+gvaeTAAACAklEQVRYheXWz4tNcRzG8efLFDPIThbEwgZZsVBsJD+awdKPrR1hTRa2dhZWyn+ADTMiiUaRhUlNk81Y+FF+FsmYZqSXhTu67tzDTPfeUTx1Ft/vec553n3O53POSf574R6e1o4bWDaX+QVrkiytrU8lGS2lnJxLiJ/CTozMZWZpAFiQ5H2S3UledTh7rJTypusXmlImcCvJ7SRfOgzQjYvTdnEYNzscHqzFp2YnlmEcSzoMcAiD8xpPlFLeJhlOsqOTAEn6kgxMA6hpoGboiDA/ya5aTlPDRrxBFWCrAFvwLEmqAoaSfE2yqRMA+VHd/kqAUook15Ps6RDAnlSVf0rYh6F2J2MlxtDzJ2N3zbiizQBHcG1qXdlkpZTxJHfT/mnoy5/KPyUcxdV2JddVddVML5jZ85o5QB8e1+/9ds5LKS+SjCbZ1g6ANCn/TF40/WlfH/Q2AnRVGBsBLuN8kokWwjckWZTk4awASikPamMzmGR+CwCfk5wopXxr4R5/UZiH03iO1ziHhRXe5biEj3iC/e0AOIFhbMI63MG5Cu8gLmA1evEOW1sFeIC+uvV6vG7iW4FP6KrbO1Nr4mmazfd+IsniuvXiNJ+Kyfxo7gUN3slZZE0XDuIlDmAvRnCqwnsF17Edx/EB61sCqIO4i/s4VvXHhB6cxSP0Y3PL4f+svgNleol9d6NmIgAAAABJRU5ErkJggg==">                           
                Add to cart     
            </a> <br>
          <a href="#" class="btn fw-light btn-lg fs-6 px-lg-5 mt-4 w-100" >
              <img src="https://img.icons8.com/external-dreamstale-lineal-dreamstale/32/000000/external-heart-gambling-dreamstale-lineal-dreamstale-2.png" width="31" class="px-1"/> 
              Ajouter au favouris 
          </a>
          <div class="col text-end mx-3">
            <span class="monospaced ">In Stock</span>
          </div>
   </div> 
    `);
}




let arr = []
function addToCart(id,ele){
    arr.push(id)
    localStorage.setItem('userCart',JSON.stringify(arr));
    let items = JSON.parse(localStorage.getItem('userCart'));
    $('#cart').html(items.length)
    $(ele).attr('disabled','disabled')
}


function getCartItems(){
    let choosen_products =[]
    let items = JSON.parse(localStorage.getItem('userCart'));
    if(items != null){
        for(let i=0;i<items.length;i++){
            choosen_products.push(products.find((product)=>product.id == items[i]));
        }
        // console.log(choosen_products)
        addCartItemsToDom(choosen_products)
        $('#cart').html(choosen_products.length)
    }
    else{
        $('#cart').html(choosen_products.length)
        $('.table-bordered').hide()
        $('.caisse_btn').hide()
        $('#cart_container').append(`
        <div>
        <p>Votre panier est vide. Magasinez et choisissez parmi plus de 1070 produits!</p>
        <a href="homepage2.html" class="btn btn-style fw-bold mon btn-plus"> SHOP NOW </a>
        <div class="mt-5"> 
            <p>Vous avez un compte? Connectez-vous pour voir où vous en étiez. </p>
            <a href="login.html" class="btn btn-style fw-bold mon ">OUVRIR UN SESSION</a>
        </div>
        </div>
        `)
    }

}

function addCartItemsToDom(items){
    let total = 0 ;
    for(let i=0; i<items.length; i++){
        $('#cart_data').append(`
        <div class="card mb-3" style="max-height: 200px;" id="card">
        <div class="row justify-content-between align-items-center">
            <div class="col">
              <img src="${items[i].image}" class="img-fluid rounded-start py-3" style="min-width: 20px;max-height: 200px;">
            </div>

            <div class="col ">
              <h5 class="card-title">${items[i].name}</h5>
              <p class="card-text"><small class="text-muted">ML : 20ML</small></p>
            </div>

            <div class="col d-flex h-25 justify-content-end pt-3">
                    <span class="btn btn-default btn-qty h-50 py-0" onclick="incrementValue()">
                     <span class="glyphicon glyphicon-plus  py-0" aria-hidden="true" >+</span>
                    </span>
                    <input class="btn btn-default btn-qty w-25 h-50 p-0 py-md-2 px-md-2 fs-6" value="1" id="number"/>
                    <span class="btn btn-default btn-qty h-50 py-0" onclick="decreaseValue()">
                     <span class="glyphicon glyphicon-minus  py-0" aria-hidden="true">-</span>
                    </span>
            </div>

            <div class="col">
                <p class="card-text text-center"><span id="prix_final">${items[i].price} </span>DH</p>
            </div>

            <div class="col text-center">
              <button onclick="deleteProduct(${items[i].id})" class="border-0 bg-light" id="deleteProduct">
                <img src="https://img.icons8.com/external-dreamstale-lineal-dreamstale/32/000000/external-delete-ui-dreamstale-lineal-dreamstale-2.png" height="20px" width="20px"/>
              </button>
            </div>
        </div>
       </div>         
        `);
        total += items[i].price;
    }
    $('#total').html(total +' DH')

}


function deleteProduct(id){
    // get the choosen products
    let choosen_products =[]
    let items = JSON.parse(localStorage.getItem('userCart'));
    for(let i=0;i<items.length;i++){
        choosen_products.push(products.find((product)=>product.id == items[i]));
    }
    // delete product from the list
    for(let i=0;i<choosen_products.length;i++){
       if(choosen_products[i].id == id ){
        console.log('deleted' +i);
        choosen_products.splice(i,1)
        break;
       }
    }
    // delete product from localstorage
    let arry = []
    for(let i=0;i<choosen_products.length;i++){
        arry.push(choosen_products[i].id)
    }
    localStorage.setItem('userCart',JSON.stringify(arry));
    // display the products left
    $('#cart_data').html('<p><p>')
    addCartItemsToDom(choosen_products)
}


var filtersObject = {};
//on filter change
$(".filter").on("change",function() {
    var filterName = $(this).data("filter"),
        filterVal = $(this).val();
    
    if (filterVal == "") {
        delete filtersObject[filterName];
    } else {
        filtersObject[filterName] = filterVal;
    }
    
    var filters = "";
    
    for (var key in filtersObject) {
          if (filtersObject.hasOwnProperty(key)) {
            filters += "[data-"+key+"='"+filtersObject[key]+"']";
         }
    }
    if (filters == "") {
        $(".product").show();

    }else{
        $(".product").hide();
        $(".product").hide().filter(filters).show();
    }
    
});


const prices = []
function sortprices(){
    for(let i=0; i<products.length; i++){
        prices.push(products[i].price)
    }
    prices.sort(function(a, b){return a - b});
    return prices
}
const prices2 = []
function sortpricesAsc(){
    for(let i=0; i<products.length; i++){
        prices2.push(products[i].price)
    }
    prices2.sort(function(a, b){return b - a});
    return prices2
}


$('.filter-price').on("change", function(){

    if($('.filter-price').val() == "des"){
        $('#alldata').html('')
        const arrayprices = sortprices()

        for(let j=0; j<products.length; j++){
            for(let i=0; i<products.length; i++){
                if(products[i].price == arrayprices[j]){
                   $('#alldata').append(`
                   <div class=' col-xs-6 col-md-3  product' data-categorie='${products[i].categorie}'   >
                   <div class='product-inner text-center'>
                       <a href="../fiche-produit.html">
                       <img class='card-img-top' src='${products[i].image}'  style='cursor: pointer;' onclick="addToLocal(${products[i].id})">
                       </a>
                       <div class='mt-2'>
                           ${products[i].name} <br>
                           ${products[i].price} DH<br>
                           ${products[i].rate}
                           <button onclick="addToCart(${products[i].id},this)" class='btn btn-style fw-bold mon mb-3'>Ajouter au panier</button>
                       </div>
                   </div>
                   </div>           
                   `);
                }
            }
        }
    }

    if($('.filter-price').val() == "asc"){
        $('#alldata').html('')
        const arraypricesAsc = sortpricesAsc()

        for(let x=0; x<products.length; x++){
            for(let y=0; y<products.length; y++){
                if(products[y].price == arraypricesAsc[x]){
                   $('#alldata').append(`
                   <div class=' col-xs-6 col-md-3  product' data-categorie='${products[y].categorie}'   >
                   <div class='product-inner text-center'>
                       <a href="../fiche-produit.html">
                       <img class='card-img-top' src='${products[y].image}'  style='cursor: pointer;' onclick="addToLocal(${products[y].id})">
                       </a>
                       <div class='mt-2'>
                           ${products[y].name} <br>
                           ${products[y].price} DH<br>
                           ${products[y].rate}
                           <button onclick="addToCart(${products[y].id},this)" class='btn btn-style fw-bold mon mb-3'>Ajouter au panier</button>
                       </div>
                   </div>
                   </div>           
                   `);
                }
            }
        }
    }
})

function incrementValue()
{
    let value = parseInt(document.getElementById('number').value, 10);
    value = isNaN(value) ? 0 : value;
    value++;
    document.getElementById('number').value = value;

    let prix_f = document.getElementById('prix_final').value;
    console.log(prix_f);
}
function decreaseValue()
{
    let value = parseInt(document.getElementById('number').value, 10);
    if(value>0){
      value--;
    }
    document.getElementById('number').value = value;
}


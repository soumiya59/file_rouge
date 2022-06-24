let products;
function loadData(){
    $.ajax({
        url: 'include/Huiles.json',
        success: function(data){
            products = data;
            var categories = ""
            for(let i=0; i<data.length; i++){
                $('#alldata').append(`
                <div class=' col-xs-6 col-md-3 product ' data-categorie='${data[i].categorie}'>
                    <div class='product-inner text-center'>
                        <img class='card-img-top' src='${data[i].image}'>
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
                <img class="" src="https://img.icons8.com/external-dreamstale-lineal-dreamstale/32/000000/external-delete-ui-dreamstale-lineal-dreamstale-2.png" height="20px" width="20px"/>
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
    let choosen_products =[]
    let items = JSON.parse(localStorage.getItem('userCart'));

    for(let i=0;i<items.length;i++){
        choosen_products.push(products.find((product)=>product.id == items[i]));
    }
    console.log(choosen_products)
    console.log(id)
    choosen_products.splice(id-1,1)
    console.log(choosen_products)
    $('#cart_data').html('<p><p>')
    addCartItemsToDom(choosen_products)
    console.log('deleted ' + (id-1))

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


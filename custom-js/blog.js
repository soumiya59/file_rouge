function loadData(){
    $.ajax({
        url: 'include/articles.json',
        success: function(data){
            for(let i=0; i<data.length; i++){
                $('#alldata').append(`
                <div class='col-12 col-md-4 mb-4 article' data-categorie='${data[i].categorie}'>
                        <div class="card border">
                          <div class="card-header text-center py-1">
                              <p><span class="fs-4 ">${data[i].categorie}</span> -  
                              <span class="fs-6">${data[i].date}</span></p>
                          </div>
                          <img src="${data[i].image}" class="card-img-top" style="max-height:300px"/>
                          <div class="card-body text-center" >
                            <h5 class="card-title fs-4 text-center">${data[i].title}</h5>
                            <p class="card-text">${data[i].article}</p>
                          </div>
                        </div>
                </div>          
                `);
            }
        },
    })
}
loadData();

$('#all').click(function(){
  $('#alldata').html("")
  loadData();
})

$('#sante').click(function(){
  $('.article').hide();
  $.ajax({
    url: 'include/articles.json',
    success: function(data){
        for(let i=0; i<data.length; i++){
          if(data[i].categorie == 'santé'){
            $('#alldata').append(`
            <div class='col-12 col-md-4 mb-4 article' data-categorie='${data[i].categorie}'>
                <div class="card border">
                  <div class="card-header text-center py-2">
                    <p class="fs-6">${data[i].date}</p>
                  </div>
                  <img src="${data[i].image}" class="card-img-top" style="max-height:300px"/>
                  <div class="card-body" >
                    <h5 class="card-title fs-4">${data[i].title}</h5>
                    <p class="card-text">${data[i].article}</p>
                  </div>
                </div>
            </div>          
            `);
          }
        }
    },
})
})

$('#conseils').click(function(){
  $('.article').hide();
  $.ajax({
    url: 'include/articles.json',
    success: function(data){
        for(let i=0; i<data.length; i++){
          if(data[i].categorie == 'Conseils'){
            $('#alldata').append(`
            <div class='col-12 col-md-4 mb-4 article' data-categorie='${data[i].categorie}'>
                <div class="card border">
                  <div class="card-header text-center py-2">
                    <p class="fs-6">${data[i].date}</p>
                  </div>
                  <img src="${data[i].image}" class="card-img-top" style="max-height:300px"/>
                  <div class="card-body" >
                    <h5 class="card-title fs-4">${data[i].title}</h5>
                    <p class="card-text">${data[i].article}</p>
                  </div>
                </div>
            </div>          
            `);
          }
        }
    },
})
})

$('#recettes').click(function(){
  $('.article').hide();
  $.ajax({
    url: 'include/articles.json',
    success: function(data){
        for(let i=0; i<data.length; i++){
          if(data[i].categorie == 'Recettes'){
            $('#alldata').append(`
            <div class='col-12 col-md-4 mb-4 article' data-categorie='${data[i].categorie}'>
                <div class="card border">
                  <div class="card-header text-center py-2">
                    <p class="fs-6">${data[i].date}</p>
                  </div>                  <img src="${data[i].image}" class="card-img-top" style="max-height:300px"/>
                  <div class="card-body" >
                    <h5 class="card-title fs-4">${data[i].title}</h5>
                    <p class="card-text">${data[i].article}</p>
                  </div>
                </div>
            </div>          
            `);
          }
        }
    },
})
})




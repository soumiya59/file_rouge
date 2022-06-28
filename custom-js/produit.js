// rating stars
$('.starIcon').on('mouseover', function(){
    var $this = $(this);
    $this.nextAll().removeClass('fa-star').addClass( "fa-star-o" );
    $this.prevAll().removeClass( "fa-star-o" ).addClass('fa-star');
    $this.removeClass( "fa-star-o" ).addClass('fa-star');
});
$('.starIcon').one('click',function(){
 var $this = $(this); $this.addClass('active').siblings().removeClass('active');
});
$('.starIcon').on('mouseleave', function(){
  var select = $('.active');
  select.nextAll().removeClass('fa-star').addClass('fa-star-o');
  select.prevAll().removeClass('fa-star-o').addClass('fa-star');
  select.removeClass('fa-star-o').addClass('fa-star');
});


// change nombre produit to order

function incrementValue()
{
    let value = parseInt(document.getElementById('number').value, 10);
    value = isNaN(value) ? 0 : value;
    value++;
    document.getElementById('number').value = value;
}
function decreaseValue()
{
    let value = parseInt(document.getElementById('number').value, 10);
    if(value>0){
      value--;
    }
    document.getElementById('number').value = value;
}

// ecrire un commentaire toggle button
$('#review_section').hide();
$('#insert_review').on('click',function(){
    $('#review_section').toggle();

})

// on submit message
function submit_msg(){
    $('#review_section').hide();
    $('#submit_msg').addClass('d-sm-block');
}
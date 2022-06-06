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
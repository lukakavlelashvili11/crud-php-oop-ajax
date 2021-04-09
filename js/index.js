window.onpageshow = function(evt) {
    if (evt.persisted) {
        document.body.style.display = "none";
        location.reload();
    }
};
window.onload=()=>{
    let quantity=0;
    let sum=0;
    $.post('ajax.php',{
            action:'getinfo'
        },
        (data)=>{
            console.log(data);
            for(let i=0;i<JSON.parse(data).length;i++){
                quantity=parseInt(quantity)+parseInt(JSON.parse(data)[i][0]);
                sum=parseInt(sum)+parseInt(JSON.parse(data)[i][1]);
            }
            $('.quan').html(quantity);
            $('#summ').html(sum);
        });
}
function closechoose(id){
    $('#choosen'+id).attr('style','display:none !important');
    $('#carticon'+id).show();
}
function choose(id){
    $('#carticon'+id).hide();
    $('#choosen'+id).removeAttr('style');
}
function addtocart(product_id,price){
    $('#choosen'+product_id).attr('style','display:none !important');
    $('#carticon'+product_id).show();
    $('#quantity'+product_id).show();
    let quantity=$('#quantity'+product_id).val();
    let sum=quantity*price;

    $.post('ajax.php',{
        id:product_id,
        quantity:quantity,
        sum:sum,
        action:'save'
    },
        (data)=>{
        $('.alert').show();
        setTimeout(()=>{
            $('.alert').hide();
        },3000);
        $('.quan').html(parseInt($('.quan').html())+parseInt(quantity));
        $('#summ').html(parseInt($('#summ').html())+parseInt(price));
    });
}
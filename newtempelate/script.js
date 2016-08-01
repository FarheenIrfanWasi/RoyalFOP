// JavaScript Document
/*function modify_qty(val) {
    var qty = document.getElementById('qty').value;
    var new_qty = parseInt(qty,10) + val;
    
    if (new_qty < 0) {
        new_qty = 0;
    }
    
    document.getElementById('qty').value = new_qty;
    return new_qty;
}
*/
function decreseQty(id){
    element = document.getElementById(id);
    val = element.value;
    if(val >= 1){
        val-= 1;
    }else return;
    element.value = val;
}

function increseQty(id){
    element = document.getElementById(id);
    val = element.value;

        val++;

    element.value = val;
}

function nameOnly(id){
    ele = document.getElementById(id);
    text = ele.value;
    if(!/[a-z]|[A-Z]/.test(text)){
        alert("Numbers are not allowed");
        ele.value = '';
    }
}
//document.readyState = $('#datetimepicker3').datetimepicker();
//window.onload = $('#datetimepicker3').datetimepicker();
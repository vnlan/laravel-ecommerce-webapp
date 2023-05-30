

function updateCart (rowId) { 
    var qty = $("#inputCartQty" + rowId).val();
    console.log(qty);
    console.log(rowId);
    $.ajax({
        type: "GET",
        url: "cart/update",
        data: {rowId : rowId, qty : qty },

        success: function (response) {
       
            location.reload();
        },
        error: function(error){
      
            console.log(error);
        },
    });
 }
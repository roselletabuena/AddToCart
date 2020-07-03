$(document).ready(function () {
    
// retriving data from database 

//declare a varialble so the ajax where to find the right function for this code;
    const action = "displayProducts"

    $.ajax({
   
        url: "php/product.php",
        method: "POST",
        data: {action: action},
        success: function (data) {
            $("#products").append(data)
        } 
    })

    //assumed user id
    var userID = "1"

    cartItemsNo(userID)

 
    $(document).on('click', '.add-cart', 
    function () {
        var id = $(this).attr("id")
        insertCart(id, userID)

        Swal.fire({
            title: 'Success',
            text: "New item is added to your cart",
            icon: 'success',
            confirmButtonText: 'Go to cart',
            showCloseButton: true,
        }).then((result) => {
            if (result.value) {
                alert("hello")
            }
            cartItemsNo(userID)
        })
    })

})

function insertCart(id, userID) {

    const action = "insertCart"
    $.ajax({
    
        url: "php/product.php",
        method: "POST",
        data: {
            productID: id,
            userID: userID,
            action: action},
        success: function (data) {
            console.log(data)
        } 
    })

}


function cartItemsNo(userID) {

    $.ajax({
        url: "php/product.php",
        method: "POST",
        data: {
            action: "noCartItem",
            userID: userID
            },
        success: function (data) {

            $("#noOfItems").text(data);
        } 
    })

    
}

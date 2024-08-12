<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/buy.css">
    <link rel="stylesheet" type="text/css" href="assets/bootstrap/css/bootstrap.min.css">
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/sweetAlert.js"></script>
    <title>Punchi theatre</title>
</head>

<body>
<div class="container" id="topic">
    
    <div class="form1">
        <div class="err" id="already_stock"></div>
        <form id="buyNewStockForm" name="buyNewStockForm" method="POST">
            <div class="form_title">Buy New Stock Item</div>

            <div class="form-group">
                <label for="product_code" class="form-label">Product Code</label>
                <input type="text" id="product_code"  name="product_code" placeholder="Enter product code">
            </div>
            <div class="err" id="product_code_error"></div>

            <div class="form-group">
                <label for="product_name" class="form-label">Product Name</label>
                <input type="text" id="product_name" name="product_name" placeholder="Enter product name">
            </div>
            <div class="err" id="product_name_error"></div>

            <div class="form-group">
                <label for="product_description" class="form-label">Product Description</label>
                <input type="text" id="product_description" name="product_description" placeholder="Enter product description">
            </div>
            <div class="err" id="product_description_error"></div>

            <div class="form-group">
                <label for="is_barcode" class="form-label">Is Barcode</label>
                <input type="text" id="is_barcode" name="is_barcode" placeholder="Enter is barcode">
            </div>
            <div class="err" id="is_barcode_error"></div>

            <div class="form-group">
                <label for="barcode" class="form-label">Barcode</label>
                <input type="text" id="barcode" name="barcode" placeholder="Enter barcode">
            </div>
            <div class="err" id="barcode_error"></div>

            <div class="form-group">
                <label for="maximum_price" class="form-label">Maximum Price</label>
                <input type="number" id="maximum_price" name="maximum_price" placeholder="Enter maximum price" min="0">
            </div>
            <div class="err" id="maximum_price_error"></div>

            <div class="form-group">
                <label for="discount" class="form-label">Discount</label>
                <input type="number" id="discount" name="discount" placeholder="Enter new discount"  min=0  max=100>
            </div>
            <div class="err" id="discount_error"></div>

            <div class="form-group">
                <label for="remaining_items" class="form-label">Remaining Items</label>
                <input type="number" id="remaining_items" name="remaining_items" placeholder="Remaining items"  min="0">
            </div>
            <div class="err" id="new_items_error" ></div>

            <div class="form-group">
                <label for="new_items" class="form-label">New Items count</label>
                <input type="number" id="new_items" name="new_items" placeholder="Enter New items count" min="0"  max="10000">
            </div>
            <div class="err" id="new_items_error" new_items_error></div>

            <div class="form-group">
                <label for="buy_date" class="form-label">Buy Date</label>
                <input type="date" id="buy_date" name="buy_date" placeholder="Enter Buy Date">
            </div>
            <div class="err" id="buy_date_error"></div>

            <div class="form-group">
                <label for="sell_price" class="form-label">Sell Price</label>
                <input type="number" id="sell_price" name="sell_price" placeholder="Enter Sell Price">
            </div>
            <div class="err" id="sell_price_error"></div>

            <div class="form-group">
                <label for="sell_discount" class="form-label">Sell Discount</label>
                <input type="number" id="sell_discount" name="sell_discount" placeholder="Enter Sell Discount">
            </div>
            <div class="err" id="sell_discount_error"></div>
 
            <input type="submit" class="btn btn-success btn-lg btn-block" id="btn-form" value="Submit  Now"></input>
        </form>
    </div>
 
</div>
</body>
</html>


<!-- _____________________________JS(delete popup)_____________________ -->
<script>
        jQuery('#buyNewStockForm').on('submit', function(e)
        {
            (async () =>
            {
                const {value: formValues} = await Swal.fire(
                {
                    title:'Are you sure want to buy this Item ?',
                    showCancelButton: true,
                });

                if(formValues)
                {
                    jQuery.ajax(
                    {
                        url: 'Temp_buy_new_form',
                        type:'POST',
                        data: jQuery('#buyNewStockForm').serialize(),
                        success:function(result)
                        {
                            let response =JSON.parse(result);
                            jQuery('.err').text('');
                            if(response.errors)
                            {
                                console.log(response.errors);

                                if(response.errors.product_code_error){
                                    $('#product_code_error').text(response.errors.product_code_error);                                    
                                }
                                if(response.errors.product_name_error){
                                    $('#product_name_error').text(response.errors.product_name_error);
                                }
                                if(response.errors.product_description_error){
                                    $('#product_description_error').text(response.errors.product_description_error);
                                }
                                if(response.errors.is_barcode_error){
                                    $('#is_barcode_error').text(response.errors.is_barcode_error);
                                }
                                if(response.errors.barcode_error) {
                                    $('#barcode_error').text(response.errors.barcode_error);
                                }
                                if(response.errors.maximum_price_error) {
                                    $('#maximum_price_error').text(response.errors.maximum_price_error);
                                }
                                if(response.errors.discount_error) {
                                    $('#discount_error').text(response.errors.discount_error);
                                }
                                if(response.errors.new_items_error) {
                                    $('#new_items_error').text(response.errors.new_items_error);
                                }
                                if(response.errors.buy_date_error) {
                                    $('#buy_date_error').text(response.errors.buy_date_error);
                                }
                                if(response.errors.sell_price_error) {
                                    $('#sell_price_error').text(response.errors.sell_price_error);
                                }
                                if(response.errors.sell_discount_error) {
                                    $('#sell_discount_error').text(response.errors.sell_discount_error);
                                }
                                if(response.errors.already_stock){
                                    $('#already_stock').text(response.errors.already_stock);
                                }

                                Swal.fire({
                                icon: 'error',
                                title: 'Buy Unsuccessful'
                                });
                            }
                            else
                            {
                                Swal.fire({
                                icon: 'success',
                                title: 'Buy Successful'
                                });
                                jQuery('.err').text('');
                                setTimeout(function() 
                                {
                                    location.reload();
                                }, 2000);
                            }
                        },
                        error:function()
                        {
                            alert('Error');
                        }
                    });
                };
                    
            })();
            e.preventDefault(); 
        })
</script>



<!-- ____________________________Send form data______________- -->
<!-- <script>
   jQuery('#buyNewStockForm').on('submit', function(e)
   {
    jQuery.ajax({
        url: 'Temp_buy_new_form',
        type:'POST',
        data: jQuery('#buyNewStockForm').serialize(),
        success:function(result)
        {
            alert(result);
        },
        error:function()
        {
            alert('Error');
        }
    });
    e.preventDefault();
   })
</script> -->
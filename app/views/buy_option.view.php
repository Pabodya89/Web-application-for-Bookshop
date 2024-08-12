<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/buy.css">
    <title>Book shop</title>
</head>

<body>
<div class="container" id="topic">
    
<?php if(isset($data['edit_id'])) {?>
    <div class="form1">
        <form method="POST">
            <div class="form_title">Edit Bought Details</div>
            <input type="hidden" name="edit_id" value="<?=$data['edit_id'];?>">
            <div class="form-group">
                <label for="product_code">Edit Product Code</label>
                <input type="text" id="product_code" name="product_code" placeholder="Enter product code" value="<?=$data['edit_product_code'];?>">
            </div>

            <div class="form-group">
                <label for="product_name">Edit Product Name</label>
                <input type="text" id="product_name" name="product_name" placeholder="Enter product name" value="<?=$data['edit_product_name'];?>">
            </div>

            <div class="form-group">
                <label for="product_description">Edit Product Description</label>
                <input type="text" id="product_description" name="product_description" placeholder="Enter product description" value="<?=$data['edit_product_description'];?>">
            </div>

            <div class="form-group">
                <label for="is_barcode">Edit Is Barcode</label>
                <input type="text" id="is_barcode" name="is_barcode" placeholder="Enter is barcode" value="<?=$data['edit_is_barcode'];?>">
            </div>

            <div class="form-group">
                <label for="barcode">Edit Barcode</label>
                <input type="text" id="barcode" name="barcode" placeholder="Enter barcode" value="<?=$data['edit_barcode'];?>">
            </div>

            <div class="form-group">
                <label for="maximum_price">Edit Maximum Price</label>
                <input type="number" id="maximum_price" name="maximum_price" placeholder="Enter maximum price" min="0" value="<?=$data['edit_max_price'];?>">
            </div>

            <div class="form-group">
                <label for="discount">Edit Discount</label>
                <input type="number" id="discount" name="discount" placeholder="Enter new discount" value="<?=$data['edit_discount'];?>" min=0  max=100>
            </div>

            <div class="form-group">
                <label for="remaining_items">Edit Buy Items Count</label>
                <input type="number" id="buy_items" name="buy_items" placeholder="Enter bought items" value="<?=$data['edit_buy_lot'];?>"  min="0">
            </div>

            <div class="form-group">
                <label for="buy_date">Edit Buy Date</label>
                <input type="date" id="buy_date" name="buy_date" placeholder="Enter Buy Date" value="<?=$data['edit_buy_date'];?>">
            </div>

            <div class="form-group">
                <label for="new_items">Edit Sell Price</label>
                <input type="number" id="sell_price" name="sell_price" placeholder="Edit Sell Price" value="<?=$data['edit_sell_price'];?>" min="0"  max="10000">
            </div>

            <div class="form-group">
                <label for="new_items">Edit Sell Discount</label>
                <input type="number" id="sell_discount" name="sell_discount" placeholder="Edit sell Discount" value="<?=$data['edit_sell_discount'];?>" min="0"  max="100">
            </div>

            <button id="btn" name="edit_btn">Confirm Edit</button>
        </form>
    </div>

 <?php } ?>

</div>
</body>
</html>
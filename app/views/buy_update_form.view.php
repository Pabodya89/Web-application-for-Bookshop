<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/buy.css">
    <title>Punchi theatre</title>
</head>

<body>
<div class="container" id="topic">
    <?php if(isset($data['table_id']))
    { ?>
    <div class="form1">
        <form method="POST">
            <div class="form_title">Update Stock Details</div>

            <div class="form-group">
                <label for="product_code">Product Code</label>
                <input type="text" id="product_code" name="product_code" placeholder="Enter product code" value="<?=$data['table_product_code'];?>" readonly>
            </div>

            <div class="form-group">
                <label for="product_name">Product Name</label>
                <input type="text" id="product_name" name="product_name" placeholder="Enter product name" value="<?=$data['table_product_name'];?>" readonly>
            </div>

            <div class="form-group">
                <label for="product_description">Product Description</label>
                <input type="text" id="product_description" name="product_description" placeholder="Enter product description" value="<?=$data['table_product_description'];?>" readonly>
            </div>

            <div class="form-group">
                <label for="is_barcode">Is Barcode</label>
                <input type="text" id="is_barcode" name="is_barcode" placeholder="Enter is barcode" value="<?=$data['table_is_barcode'];?>" readonly>
            </div>

            <div class="form-group">
                <label for="barcode">Barcode</label>
                <input type="text" id="barcode" name="barcode" placeholder="Enter barcode" value="<?=$data['table_barcode'];?>" readonly>
            </div>


            <div class="topics">Buying Details</div> 
            <div class="form-group">
                <label for="new_items">Buy Items Count </label>
                <input type="number" id="new_items" name="new_items"  placeholder="Enter New items count" min="0"  max="10000">
            </div>

            <div class="form-group">
                <label for="maximum_price">Buy Maximum Price</label>
                <input type="number" id="maximum_price" name="maximum_price" placeholder="Enter maximum price" value="<?=$data['table_max_price'];?>" min="0">
            </div>

            <div class="form-group">
                <label for="discount">Buy Discount</label>
                <input type="number" id="discount" name="discount" placeholder="Enter new discount" value="<?=$data['table_discount'];?>" min=0  max=100>
            </div>

            <div class="form-group">
                <label for="buy_date">Buy Date</label>
                <input type="date" id="buy_date" name="buy_date" placeholder="Enter Buy Date">
            </div>

            <div class="topics">Selling Details</div>
            <div class="form-group">
                <label for="sell_price">Sell Price</label>
                <input type="number" id="sell_price" name="sell_price" placeholder="Enter sell price" value="<?=$data['table_discount'];?>" min=0>
            </div>

            <div class="form-group">
                <label for="sell_discount">Sell Discount</label>
                <input type="number" id="sell_discount" name="sell_discount" placeholder="Enter selling Discount">
            </div>

            <button id="btn" name="insert_buy">Add</button>
        </form>
    </div>
    <?php } ?>
</div>
</body>
</html>
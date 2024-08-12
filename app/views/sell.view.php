<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/sell.css" >
    <link rel="stylesheet" href="assets/css/sell.css" >
    <link rel="stylesheet" href="assets/css/sweetalert2.min.css" >

    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/sell.js"></script>
    <script src="assets/js/sweetAlert.js"></script>

    <title>Document</title>
</head>
<body>
    <div class="bar_data">
        <div>
            <input type="text" name="barcode_check" id="barcode_check"  class="barcode" >
            <button id="btn1" onclick="find_barcode(event)">Find</button>
        </div> 
        <div class="error1"></div>
    </div>



<div class="container" id="topic">
    <div class="form1">
        <!-- <form method="POST"> -->
            <div class="form_title">Add New Stock Item</div>

                <input type="hidden" id="product_id" name="product_id">
            <div class="form-group">
                <label for="product_name">Product Name</label>
                <input type="text" id="product_name" name="product_name" placeholder="Enter product name" readonly >
                <div class="error" id="error1"></div>
            </div>

            <div class="form-group">
                <label for="product_description">Product Description</label>
                <input type="text" id="product_description" name="product_description" placeholder="Enter product description" value="" readonly>
                <div class="error" id="error2"></div>  
            </div>

            <div class="form-group">
                <label for="barcode">Barcode</label>
                <input type="text" id="barcode" name="barcode" placeholder="Enter barcode" value=""readonly>
                <div class="error" id="error3"></div>
            </div>

            <div class="form-group">
                <label for="maximum_price">Selling Price</label>
                <input type="number" id="maximum_price" name="maximum_price" placeholder="Enter maximum price" min="0" value=""readonly>
                <div class="error" id="error4"></div>
            </div>

            <div class="form-group">
                <label for="discount">Discount</label>
                <input type="number" id="discount" name="discount" placeholder="Enter new discount"  min=0  max=100 value="">
                <div class="error" id="error5"></div>
            </div>

            <div class="form-group">
                <label for="Quantity">Quantity</label>
                <input type="number" id="Quantity" name="Quantity" placeholder="Enter selling Quantity" min="1" >
                
                <label for="Reamining items">Remaining Items</label>
                <input type="number" id="remain_items" name="Quantity" readonly>
            </div>
            
            <!-- <div class="form-group"> -->
                <div class="error6" id="error6"></div>
            <!-- </div> -->
           
            <div class="form-group">
                <label for="sell_date">Sell Date</label>
                <input type="text" id="sell_date" name="sell_date" placeholder="Enter Sell Date" value=""readonly>
                <div class="error" id="error7"></div>
            </div>
            <div class="pay">
                <button id="btn" name="btn" onclick="addItem()">Add to Bill</button>
            </div>
        <!-- </form> -->
    </div>
    <!-- <html lang="en"> -->

    <!-- <body> -->
    <div class="page-flex"> 
		  <div class="invoice-box">
            <table>
                <thead>
                    <tr class="top">
                        <td style="width: 150px"></td>
                        <td>
                            Kelisura Book Shop<br>
                            kelisura@gmail.com<br>
                            077-6677889
                        </td>
                    </tr>
                    <tr class="heading">
                        <td colspan="2">Item</td>
                        <td colspan="2">Price</td>
                        <td>Qty</td>
                        <td>Discount (Rs.)</td>
                        <td>Last Price (Rs.)</td>
                        <!-- <td>Clear</td> -->
                    </tr>
                </thead>
                <tbody id="item_body">
                    <!-- Items will be dynamically added here -->
                </tbody>
                <tfoot>
                    <tr class="discount">
                        <!-- <td><b></b></td>
                        <td><b></b></td>
                        <td><b></b></td>
                        <td><b></b></td> -->
                    </tr>
                    <tr class="total" id="total">
                        <td colspan="3"><b>Total</b></td>
                        <td id="max_price"><b>0</b></td>
                        <td id="total_qty"><b>0</b></td>
                        <td id="total_discount"><b>0</b></td>
                        <td id="total_price"><b>0</b></td>
                    </tr>
                    <tr>
                        <td colspan="2">Due date:&nbsp;<b>Jan 7, 2022</b></td>
                        <td>
                            Bill for:&nbsp;<b>Jan 1 - 30, 2022</b>
                        </td>
                    </tr>
                </tfoot>
            </table>
		</div>
    </div>
</div>
<div class="pay1">
    <button class="confirm" id="confirm" disabled>Confirm</button>
</div>

<script>
    

</script>

<!-- <div class="container">
<form method="post">
<table>
    <thead>
        <tr>
            <th>ProductCode</th>
            <th>ProductName</th>
            <th>ProductDescription</th>
            <th>IsBarcorde</th>
            <th>BarcodeLength</th>
            <th>Barcode</th>
            <th>Selling Price</th>
            <th>DiscountType</th>
            <th>Quantity</th>
            <th>Date</th>
        </tr>
        </thead>
        <tbody>
            <?php foreach($data['table_data'] as $x)
            {?>
                <tr>
                <td><?= $x->productcode?></td>
                <td><?= $x->productname?></td>
                <td><?= $x->productdescription?></td>
                <td><?= $x->IsBarcorded?></td>
                <td><?= $x->barcodelength?></td>
                <td><?= $x->barcode?></td>
                <td><?= $x->price?></td>
                <td><?= $x->discount?></td>
                <td><?= $x->quantity?></td>
                <td><?= $x->date?></td>                
            </tr>

     <?php }
            
        ?>
            
        </tbody>
    </table>
</form>
</div> -->
</body>
</html>
























<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/buy.css">
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/sweetAlert.js"></script>
    <title>Book shop</title>
</head>

<body>
<div class="container" id="topic">
   <div class="topic">KELISURA BOOK SHOP</div>

   <div class="new_btn_container"><a href="<?=ROOT?>/buy_new_form"><button class="new_item">Add new item</button></a></div>

<div class="tbl1">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Product Code</th>
                    <th>Product Name</th>
                    <th>Product Description</th>
                    <th>Is Barcode</th>
                    <th>Barcode</th>
                    <th>Maximum Price</th>
                    <th>Discount(%)</th>
                    <th>New lot size</th>
                    <th>Buy Date</th>
                    <th>Estimate Sell Price</th>
                    <th>Estimate Sell discount</th>
                    <th colspan="3" id="option">Option</th>
                </tr>
            </thead>
            <tbody>
                
                    <?php if(isset($data['buy_data']))
                          {
                                foreach($data['buy_data'] as $row)
                                {
                                    ?>
                                    <tr>
                                        <td class="data"><?= $row->id?></td>
                                        <td class="data"><?= $row->product_code?></td>
                                        <td class="data"><?= $row->product_name?></td>
                                        <td class="data"><?= $row->product_description?></td>
                                        <td class="data"><?= $row->is_barcode?></td>
                                        <td class="data"><?= $row->barcode?></td>
                                        <td class="data"><?= $row->max_price?></td>
                                        <td class="data"><?= $row->discount?></td>
                                        <td class="data"><?= $row->buy_lot?></td>
                                        <td class="data"><?= $row->buy_date?></td>
                                        <td class="data"><?= $row->sell_price?></td>
                                        <td class="data"><?= $row->sell_discount?></td>
                                        <td class="option">
                                            <form action="<?=ROOT?>/buy_update_form" method="post">
                                                <input type="hidden" name="table_id" value="<?= $row->id ?>">
                                                <input type="hidden" name="table_product_code" value="<?= $row->product_code ?>">
                                                <input type="hidden" name="table_product_name" value="<?= $row->product_name ?>">
                                                <input type="hidden" name="table_product_description" value="<?= $row->product_description ?>">
                                                <input type="hidden" name="table_is_barcode" value="<?= $row->is_barcode ?>">
                                                <input type="hidden" name="table_barcode" value="<?= $row->barcode ?>">
                                                <input type="hidden" name="table_max_price" value="<?= $row->max_price ?>">
                                                <input type="hidden" name="table_discount" value="<?= $row->discount ?>">
                                                <input type="hidden" name="table_new_lot" value="<?= $row->buy_lot ?>">
                                                <input type="hidden" name="table_buy_date" value="<?= $row->buy_date ?>">
                                                <input type="hidden" name="table_sell_price" value="<?= $row->sell_price ?>">
                                                <input type="hidden" name="table_sell_discount" value="<?= $row->sell_discount ?>">
                                                <button type="submit" name="buy_one">Update Lot</button>
                                            </form>
                                        </td>
                                        <td class="option">
                                            <form action="<?=ROOT?>/buy_option" method="post">
                                                <input type="hidden" name="edit_id" value="<?= $row->id ?>">
                                                <input type="hidden" name="edit_product_code" value="<?= $row->product_code ?>">
                                                <input type="hidden" name="edit_product_name" value="<?= $row->product_name ?>">
                                                <input type="hidden" name="edit_product_description" value="<?= $row->product_description ?>">
                                                <input type="hidden" name="edit_is_barcode" value="<?= $row->is_barcode ?>">
                                                <input type="hidden" name="edit_barcode" value="<?= $row->barcode ?>">
                                                <input type="hidden" name="edit_max_price" value="<?= $row->max_price ?>">
                                                <input type="hidden" name="edit_discount" value="<?= $row->discount ?>">
                                                <input type="hidden" name="edit_buy_lot" value="<?= $row->buy_lot ?>">
                                                <input type="hidden" name="edit_buy_date" value="<?= $row->buy_date ?>">
                                                <input type="hidden" name="edit_sell_price" value="<?= $row->sell_price ?>">
                                                <input type="hidden" name="edit_sell_discount" value="<?= $row->sell_discount ?>">
                                                <button type="submit" name="edit" id="edit">Edit</button>
                                            </form>
                                        </td>
                                        <td class="delete">
                                                <input type="hidden" class="delete-id" name="id" id="id-<?= $row->id ?>" value="<?= $row->id ?>">
                                                <button class="delete-btn" name="delete" id="delete-<?= $row->id ?>" value="<?= $row->id ?>">Delete</button>
                                        </td>
                                    </tr>
                                    <?php
                                }
                          }
                     ?>
                
            </tbody>
        </table>
    </div>
    </div>
</body>
</html>

<!-- _____________________________JS(delete popup)_____________________ -->

<script>
    document.querySelectorAll('.delete-btn').forEach(button => 
    {
        button.addEventListener('click', function(event) 
        {
            event.preventDefault();
            const deleteId = this.value; // The value of the delete button is the row ID
            const deleteElement = document.getElementById(`id-${deleteId}`);

            console.log(deleteElement.value);
            (async () => {
                const {value: formValues} = await Swal.fire({
                    title: 'Confirm delete',
                    showCancelButton: true,
                });

                if (formValues) {
                    const details = {
                        Aemail: deleteElement.value,
                    };

                    jQuery.ajax({
                        url: 'buy_option',
                        data: details,
                        type: 'POST',
                        success: function(x) 
                        {
                            Swal.fire({
                            icon: 'success',
                            title: 'Delete successful!',
                        });
                            setTimeout(function() 
                            {
                                location.reload();
                            }, 2000);
                        },
                    });
                }
            })();
        });
    });
</script>
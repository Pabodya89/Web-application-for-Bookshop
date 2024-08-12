<?php
Class Temp_buy_new_form
{
    use Controller;

    public function index()
    {
        $data = [];
       
        if(isset($_POST['product_code'])) 
        {
            // Get form data and sanitize it
            $product_code = isset($_POST['product_code']) ? $_POST['product_code'] : '';
            $product_name = isset($_POST['product_name']) ? $_POST['product_name'] : '';
            $product_description = isset($_POST['product_description']) ? $_POST['product_description'] : '';
            $is_barcode = isset($_POST['is_barcode']) ? $_POST['is_barcode'] : '';
            $barcode = isset($_POST['barcode']) ? $_POST['barcode'] : '';
            $maximum_price = isset($_POST['maximum_price']) ? $_POST['maximum_price'] : '';
            $discount = isset($_POST['discount']) ? $_POST['discount'] : '';
            $remaining_items = isset($_POST['remaining_items']) ? $_POST['remaining_items'] : '';
            $new_items = isset($_POST['new_items']) ? $_POST['new_items'] : '';
            $buy_date = isset($_POST['buy_date']) ? $_POST['buy_date'] : '';
            $sell_price = isset($_POST['sell_price']) ? $_POST['sell_price'] : '';
            $sell_discount= isset($_POST['sell_discount']) ? $_POST['sell_discount'] : '';

            if($product_code == '')
            {
                $errors['product_code_error'] = 'Product code is required';
            }
            if($product_name == '')
            {
                $errors['product_name_error'] = 'Product name is required';
            }
            if($product_description == '')
            {
                $errors['product_description_error'] = 'Product description is required';
            }
            if($is_barcode == '')
            {
                $errors['is_barcode_error'] = 'Is barcode is required';
            }
            if($barcode == '')
            {
                $errors['barcode_error'] = 'Barcode is required';
            }
            if($maximum_price == '')
            {
                $errors['maximum_price_error'] = 'Maximum price is required';
            }
            if($discount == '')
            {
                $errors['discount_error'] = 'Discount is required';
            }
            if($new_items == '')
            {
                $errors['new_items_error'] = 'New items is required';
            }
            if($buy_date == '')
            {
                $errors['buy_date_error'] = 'Buy date is required';
            }
            if($sell_price == '')
            {
                $errors['sell_price_error'] = 'Sell Price is required';
            }
            if($sell_discount == '')
            {
                $errors['sell_discount_error'] = 'Sell discount is required';
            }



            if (!empty($errors)) 
            {
                echo json_encode(['errors' => $errors]);
            }
            else
            {
                $new_buy = new Buys();
                $new_item = new Sells();

                $arr['product_code'] = $product_code;
                $arr['product_name'] = $product_name;
                $arr['product_description'] = $product_description;
                $arr['is_barcode'] = $is_barcode;
                $arr['barcode'] = $barcode;
                $arr['max_price'] = $maximum_price;
                $arr['discount'] = $discount;
                $arr['buy_lot'] = $new_items;
                $arr['buy_date'] = $buy_date;
                $arr['sell_price'] = $sell_price;
                $arr['sell_discount'] = $sell_discount;

                $arr2['productcode'] = $product_code;
                $arr2['productname'] = $product_name;
                $arr2['productdescription'] = $product_description;
                $arr2['IsBarcorded'] = $is_barcode;
                $arr2['barcodelength'] = 13;
                $arr2['barcode'] = $barcode;    
                $arr2['price'] = $sell_price;
                $arr2['discount'] = $sell_discount;
                $arr2['max_quantity'] = $new_items;
                $arr2['date'] = $buy_date;

                // find is barcode already has or not
                // $arr1['product_code'] = $product_code;
                // $arr1['product_name'] = $product_name;
                // $arr1['product_description'] = $product_description;
                $arr1['barcode'] = $barcode;

                $already_item = $new_buy->first($arr1);

                if($already_item)
                {
                    $errors['already_stock'] = '*This item(barcode) already included';
                    echo json_encode(['errors' => $errors]);
                }
                else
                {
                    $new_buy->insert($arr);
                    $new_item->insert($arr2);
                    echo json_encode(['success' => 'Item bought successfully']);
                }
            }
        }

    }
}

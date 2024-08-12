<?php
Class Buy_update_form
{
    use Controller;

    public function index()
    {
        $data = [];
        if(isset($_POST['buy_one']))
        {
            $data['table_id'] = $_POST['table_id'];
            $data['table_product_code'] = $_POST['table_product_code'];
            $data['table_product_name'] = $_POST['table_product_name'];
            $data['table_product_description'] = $_POST['table_product_description'];
            $data['table_is_barcode'] = $_POST['table_is_barcode'];
            $data['table_barcode'] = $_POST['table_barcode'];
            $data['table_max_price'] = $_POST['table_max_price'];
            $data['table_discount'] = $_POST['table_discount'];
            $data['table_new_lot'] = $_POST['table_new_lot'];
            $data['table_buy_date'] = $_POST['table_buy_date'];
            $data['table_sell_price'] = $_POST['table_sell_price'];
            $data['table_sell_discount'] = $_POST['table_sell_discount'];
        }
        if(isset($_POST['insert_buy']))
        {
            $arr['product_code'] = $_POST['product_code'];
            $arr['product_name'] = $_POST['product_name'];
            $arr['product_description'] = $_POST['product_description'];
            $arr['is_barcode'] = $_POST['is_barcode'];
            $arr['barcode'] = $_POST['barcode'];
            $arr['max_price'] = $_POST['maximum_price'];
            $arr['discount'] = $_POST['discount'];
            $arr['buy_lot'] = $_POST['new_items'];
            $arr['buy_date'] = $_POST['buy_date'];
            $arr['sell_price'] = $_POST['sell_price'];
            $arr['sell_discount'] = $_POST['sell_discount'];

            $arr2['productcode'] = $_POST['product_code'];
            $arr2['productname'] = $_POST['product_name'];
            $arr2['productdescription'] = $_POST['product_description'];
            $arr2['IsBarcorded'] = $_POST['is_barcode'];
            $arr2['barcodelength'] = 13;
            $arr2['barcode'] = $_POST['barcode'];
            $arr2['price'] = $_POST['sell_price'];
            $arr2['discount'] = $_POST['sell_discount'];
            $arr2['max_quantity'] = $_POST['new_items'];
            $arr2['date'] = $_POST['buy_date'];

            $buy_data = new Buys;
            $buy_data->insert($arr);

            $sell_data = new Sells;
            $sell_data->insert($arr2);
            redirect('buy');
        }
        
        $this->view('buy_update_form', $data);
    }
}   

<?php
Class Buy_new_form
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


            print_r($_POST);
        }

        $this->view('buy_new_form', $data);
    }
}

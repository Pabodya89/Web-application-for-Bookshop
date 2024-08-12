<?php
Class Buy_option
{
    use Controller;

    public function index()
    {
        $data = [];

        if(isset($_POST['edit']))
        {
            $data['edit_id']=$_POST['edit_id'];
            $data['edit_product_code']=$_POST['edit_product_code'];
            $data['edit_product_name']=$_POST['edit_product_name'];
            $data['edit_product_description']=$_POST['edit_product_description'];
            $data['edit_is_barcode']=$_POST['edit_is_barcode'];
            $data['edit_barcode']=$_POST['edit_barcode'];
            $data['edit_max_price']=$_POST['edit_max_price'];
            $data['edit_discount']=$_POST['edit_discount'];
            $data['edit_buy_lot']=$_POST['edit_buy_lot'];
            $data['edit_buy_date']=$_POST['edit_buy_date'];
            $data['edit_sell_price']=$_POST['edit_sell_price'];
            $data['edit_sell_discount']=$_POST['edit_sell_discount'];

        }
        else if(isset($_POST['edit_btn']))
        {
            $id = $_POST['edit_id'];
            $arr['product_code'] = $_POST['product_code'];
            $arr['product_name'] = $_POST['product_name'];
            $arr['product_description'] = $_POST['product_description'];
            $arr['is_barcode'] = $_POST['is_barcode'];
            $arr['barcode'] = $_POST['barcode'];
            $arr['max_price'] = $_POST['maximum_price'];
            $arr['discount'] = $_POST['discount'];
            $arr['buy_lot'] = $_POST['buy_items'];
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
            $arr2['max_quantity'] = $_POST['buy_items'];
            $arr2['date'] = $_POST['buy_date'];

            $buy_data = new Buys;
            $buy_data->update($id ,$arr);

            $sell_data = new Sells;
            $sell_data->update($id ,$arr2);

            redirect('buy');
        }
        // else if(isset($_POST['delete']))
        // {
        //     $id = $_POST['id'];
        //     $buy_data = new Buys;
        //     $buy_data->delete($id);
        //     redirect('buy');
        // }

        if(isset($_POST['Aemail']))
        {
            $id = $_POST['Aemail'];
            $arr4['id'] = $_POST['Aemail'];

            $buy_datas = new Buys;
            $buy_row = $buy_datas->first($arr4);
            $buy_datas->delete($id);

            //____Delete item from selling table______
            $arr6['productcode'] = $buy_row->product_code;
            $arr6['productname'] = $buy_row->product_name;
            $arr6['productdescription'] = $buy_row->product_description;
            $arr6['IsBarcorded'] = $buy_row->is_barcode;
            $arr6['barcode'] = $buy_row->barcode;
            $arr6['price'] = $buy_row->sell_price;
            $arr6['discount'] = $buy_row->sell_discount;
            $arr6['date'] = $buy_row->buy_date;
            
            $sell_data3 = new Sells;
            $sell_row = $sell_data3->first($arr6);

            $id = $sell_row->id;
            $sell_data3->delete($id);

            echo json_encode($buy_row);
            exit;
        }
        
        $this->view('buy_option', $data);
    }
}

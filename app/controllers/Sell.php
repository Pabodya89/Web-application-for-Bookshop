<?php


class Sell
{
	use Controller;
	
	public function index()
	{
        $data = [];
        $item_table = new Sells;
        $rows = $item_table->findAll();

        $data['table_data'] = $rows;
        
        if(isset($_POST['name']))
        {
            $name = $_POST['name'];
            $description = $_POST['description'];
            $barcode = $_POST['barcode'];
            $price = $_POST['price'];
            $discount = $_POST['discount'];
            $quantity = $_POST['quantity'];
            $date = $_POST['date'];
            $productcode = $_POST['productcode'];
            $isbarcoded = $_POST['isbarcoded'];
            $barcodelength = $_POST['barcodelength'];
        }

        if(isset($_POST['data']))
        {
          $items = $data['items'];
          $total_discount = $data['total_discount'];
          $total_price = $data['total_price'];
        }

		$this->view('sell', $data);
	}
}
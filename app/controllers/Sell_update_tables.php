<?php


class Sell_update_tables
{
	use Controller;
	
	public function index()
	{
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Get the raw POST data
            $json = file_get_contents('php://input');
            
            // Decode the JSON data
            $postData = json_decode($json, true);

            // Check if data is decoded successfully
            if ($postData) 
            {     
                $items = $postData['items'];
                $total_discount = $postData['total_discount'];
                $total_price = $postData['total_price'];

                echo json_encode($items);

                // Process the data (e.g., save to database, perform calculations)
                $i =0;
                foreach ($items as $item) 
                {
                    $dta1[$i]['itemId'] = $item['pid'];
                    $dta1[$i]['itemDescription'] = $item['disc'];
                    $dta1[$i]['itemPrice'] = $item['price'];
                    $dta1[$i]['itemQuantity'] = $item['qty'];
                    $dta1[$i]['itemDiscount'] = $item['dcount'];
                    $dta1[$i]['itemSelldate']= $item['selldate'];
                    $dta1[$i]['itemBarcode'] = $item['barcode'];

                    $i =$i+1;
                }

                $i =0;
                foreach($total_discount as $discount)
                {
                    $dta2[$i]['totalDiscount'] = $discount['t_discount'];
                    $i=$i+1;
                }

                $i =0;
                foreach($total_price as $price)
                {
                    $dta3[$i]['totalPrice'] = $price['t_price'];
                    $i=$i+1;
                }


                $item_count  = count($dta1);
                $sold_data = new Sold_items;
                $sell_item = new Sells;

                for($j=0; $j<$item_count; $j++)
                {
                    $array['productname'] = 'AAA';
                    $array['productdescription'] = $dta1[$j]['itemDescription'];
                    $array['barcode'] = $dta1[$j]['itemBarcode'];
                    $array['price'] = $dta1[$j]['itemPrice'];
                    $array['discount'] = $dta1[$j]['itemDiscount'];
                    $array['sold_quantity'] = $dta1[$j]['itemQuantity'];
                    $array['sold_date'] = $dta1[$j]['itemSelldate'];

                    date_default_timezone_set('Asia/Colombo');
                    $current_time = date('g:i A');
                    $array['sold_time'] = $current_time;

                    $array['total_sold_discount'] = $dta2[$j]['totalDiscount'];
                    $array['total_sold_price'] = $dta3[$j]['totalPrice'];

                    $sold_data->insert($array);

                    //_____reduce item quatity from item table_____
                    $aryid['id'] = $dta1[$j]['itemId'];
                    $id= $dta1[$j]['itemId'];

                    $item = $sell_item->first($aryid);
                    $array_update_item['max_quantity'] = $item->max_quantity = $item->max_quantity - $dta1[$j]['itemQuantity'];
                    $sell_item->update($id ,$array_update_item);
                }
                exit;
            } 
            else 
            {
                // Handle error - invalid JSON
                echo json_encode(['status' => 'error', 'message' => 'Invalid JSON']);
                exit;
            }
        }
	}
}
<?php
class Sell_get_barcode
{
    use Controller;
    public function index()
    {
        if(isset($_POST['barcode']))
        {
            $item_table = new Sells;

            $arr2['barcode'] = $_POST['barcode'];
            $barcode_result = $item_table->where($arr2);

            if($barcode_result)
            {
                foreach($barcode_result as $x)
                {
                    if($x->max_quantity != 0)
                    {
                        $valid_row = $x;
                        echo json_encode($valid_row);
                        break;
                    }
                }

                $count = count($barcode_result);
                $empty_count=0;
                foreach($barcode_result as $y)
                {
                    if($y->max_quantity == 0)
                    {
                        $empty_count = $empty_count +1;
                    }
                }
                if($count == $empty_count)
                {
                    echo json_encode(['error'=>'Not stock available']);
                }
            }
            else
            {
                echo json_encode(['error'=>'Not this barcode available']);
            }
        }
        else
        {
            echo json_encode(['error'=> 'No barcode provided']);
        }
    }
}

?>
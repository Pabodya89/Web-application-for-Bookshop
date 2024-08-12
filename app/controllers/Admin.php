<?php 

class Admin
{
	use Controller;
	
	public function index()
	{
        if ($_SERVER['REQUEST_METHOD'] === 'POST') 
        {
            $year = isset($_POST['year']) ? $_POST['year'] : '';
            $month = isset($_POST['month']) ? $_POST['month'] : '';
        
            if(!empty($year) && !empty($month)) 
            {
                $sold_data = new Sold_items();
                $rows = $sold_data->findAll();

                if($rows)
                {
                    $count = 0;
                    $discount = 0;

                  foreach($rows as $x)
                  {
                    $sold_date = $x->sold_date;
                    $date = DateTime::createFromFormat('m/d/Y', $sold_date);
                    $formatted_date = $date->format('Y/m');
                    $year_month = $year . '/' . $month;

                    if($formatted_date == $year_month)
                    {
                        $count = $count + $x->total_sold_price;
                        $discount = $discount + $x->total_sold_discount;
                    }
                  }
                    $data['total_price'] = $count;
                    $data['total_discount'] = $discount;
                    echo json_encode($data);
                }
            } 
            else 
            {
                $data['error'] = "Invalid input";
                echo json_encode($data);
            }
        }
	}
}

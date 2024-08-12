<?php 

/**
 * home class
 */
class Home
{
	use Controller;

	public function index()
	{
        $data = [];

        $sold = new Sold_items();

		date_default_timezone_set('Asia/Colombo');
        $today = new DateTime();
        $arr['sold_date'] = $today->format('m/d/Y');
        $rows = $sold->where($arr);

        if($rows)
        {
           $count = 0;
		   $discount = 0;
           foreach($rows as $row)
           {
              $count = $count + $row->total_sold_price;
			  $discount = $discount + $row->total_sold_discount;
           }
           $data = 
		   [
			'today_income' => $count,
			'today_discount' => $discount
			];
        }
		$this->view('home', $data);
	}
}


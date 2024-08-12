<?php
Class Buy
{
    use Controller;

    public function index()
    {
        $data = [];
        $buy_data = new Buys;
        $rows = $buy_data->findAll();

        if($rows)
        {
            $data['buy_data'] = $rows;
        }

        $this->view('buy', $data);
    }
}

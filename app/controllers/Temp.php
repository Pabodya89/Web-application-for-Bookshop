<?php 

class Temp
{
	use Controller;
	
	public function index()
	{
        $data = [];

        if(isset($_POST['Aemail'], $_POST['Aphone'])) 
        {
            // $name1 = $_POST['Aname'];
            // $age = $_POST['Aage'];
            $email = $_POST['Aemail'];
            $phone = $_POST['Aphone'];

            $data['email'] = $_POST['Aemail'];
            $data['phone'] = $_POST['Aphone'];

            $user = new User_de();
            $rows = $user->first($data);
        
            if($rows)
            {
                echo json_encode($rows);
            }
            else
            {
                echo 'data Not Found';
            }
        } 
        else 
        {
            echo "Ajax Unsuccessful....!";
        }
        
	}
}

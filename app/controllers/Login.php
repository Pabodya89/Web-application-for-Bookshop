<?php

class Login
{
	use Controller;
	
	public function index()
	{
		$data = [];
		if(isset($_POST['name']))
		{
			$login_table = new Logins;

			$username = $_POST['name'];
			$password = $_POST['password'];

			$isError = $login_table->login_validate($username, $password);

			if($isError)
			{
				$data['error']=$isError;
			}
			else
			{
				$arr1['username']=$username;
				$row = $login_table->first($arr1);
	
				if(isset($row) && $row != null)
				{
					$hashed_password = $row->password;

					if(password_verify($password, $hashed_password)) 
					{
						redirect('sell');
					} 
					else
					{
						$data['error']  = 'Username and password is an invalid.';
					}
				}
				else
				{
					$data['error']  = 'Username and password is an invalid.';
				}
			}
		}

		$this->view('login',$data);
	}
}
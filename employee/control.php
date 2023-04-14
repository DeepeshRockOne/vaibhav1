<?php
include_once('model.php');
class control extends model
{
	function __construct()
	{
		model::__construct();
		$path=$_SERVER['PATH_INFO']; //http://localhost/Project/empolyee/control.php	
		switch($path)
		{
			case '/add_cat':
			include_once('add_cat.php');
			break;
	
			case '/add_emp':
			include_once('add_emp.php');
			break;
			
			case '/add_loc':
			include_once('add_loc.php');
			break;
			
			case '/dashboard':
			include_once('dashboard.php');
			break;
			

			case'/employee':
				if(isset($_REQUEST['submit']))
				{
					$username=$_REQUEST['username'];
					$pass=$_REQUEST['pass'];
					$arr=array("username"=>$username,"pass"=>$pass);

					$res=$this->select_where('employee',$arr);
					$chk=$res->num_rows;
					if($chk==1)
					{
						$fetch=$res->fetch_object();
						//session create

						$_SESSION['employee_id']=$fetch->employee_id;
						$_SESSION['username']=$fetch->username;
						$_SESSION['pass']=$fetch->pass;
						$_SESSION['name']=$fetch->name;


						echo"
						<script>
						alert('login sucess');
						window.location='dashboard';
						</script>
						";
					}else
					{
						echo"fail";
					}
				}
		    include_once('index.php');
			break;
			case'/employeelogout':
           unset($_SESSION['employee_id']);
		   unset($_SESSION['name']);
			
			case '/manage_cat':
			$cat_arr=$this->select('employee');
			include_once('manage_cat.php');
			break;

			case '/manage_contact':
			$contact_arr=$this->select('contact');
			include_once('manage_contact.php');
			break;

			// case '/manage_emp':
			// include_once('manage_emp.php');
			// break;

			case '/manage_loc':
			$loc_arr=$this->select('location');
		    include_once('manage_loc.php');
			break;

			case '/manage_user':
			$user_arr=$this->select('user1');
			include_once('manage_user.php');
			break;

			case '/manageCar_ Adv':
			$caradv_arr=$this->select('caradv');
			include_once('manageCar_ Adv.php');
			break;

			default:
			echo "<h1>Page Not Found</h1>";
			break;
		}
	}	
}
$obj=new control;
?>
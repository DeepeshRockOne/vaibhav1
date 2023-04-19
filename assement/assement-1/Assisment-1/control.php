<?php
include_once('model.php');
class control extends model
{
        function __construct()
		{
			session_start();
			model::__construct();

			$path=$_SERVER['PATH_INFO'];

			switch ($path)
			
		     
			 {
				case '/index':
					include_once('index.php');
					break;

				case '/add_book':
					
						include_once('add_book.php');
						break;

				case '/delete_book':
					
							include_once('delete_book.php');
							break;
						
				case '/serach_book':
							include_once('serach_book.php');
							break;

				case '/view':
					$user_arr=$this->select('useraccount');


					
				//   $where=array("user_id "=>$user_id);

				// 	 $res=$this->select_where('useraccount',$where);
				// 	 $fetch=$res->fetch_object();
					     include_once('view.php');
								break;

				case '/edit_book':

					$user_arr=$this->select('useraccount');
				

					include_once('edit_book.php');
					break;

				case '/change_pass':
					include_once('change_pass.php');
					break;
				
				case '/addcustomer':
					if(isset($_REQUEST['submit']))
					{
						$name=$_REQUEST['name'];
						$email=$_REQUEST['email'];
						$address=$_REQUEST['address'];
						$phone=$_REQUEST['phone'];
						$accounttype=$_REQUEST['accounttype'];
						$initialdeposit=$_REQUEST['initialdeposit'];
						$accountno=$_REQUEST['accountno'];

						date_default_timezone_set('asia/calcutta');
						$updated=date('Y-m-d H:i:s');
						$delated=date('Y-m-d H:i:s');
						$arr=array("name"=>$name,"email"=>$email,"address"=>$address,"phone"=>$phone,"accounttype"=>$accounttype,"initialdeposit"=>$initialdeposit,"accountno"=>$accountno,"updated"=>$updated,"delated"=>$delated);
						$res=$this->insert('useraccount',$arr);

						if($res)
						{
							echo"
							<script>
							alert('register sucess');
							window.location='addcustomer';
							</>
							";
						}else
						{
							echo"fail";
						}
                    }   
				
						include_once('addcustomer.php');
						break;
						case'/delete':
							if(isset($_REQUEST['del_user_id']))
					{
						$user_id=$_REQUEST['del_user_id'];
						$where=array("user_id"=>$user_id);
						$res=$this->delete_where('useraccount',$where);
						if($res)
						{
							echo"
							<script>
							alert('delete sucess');
							window.location='edit_book';
							</script>
							";
						}else
						{
							echo"fail";
						}
					}
					break;

					case'/tranction':
						if(isset($_REQUEST['submit']))
						{
							$accountno=$_REQUEST['accountno'];
							$amount=$_REQUEST['amount'];
							$type=$_REQUEST['type'];
							$user_id=$_REQUEST['user_id'];

							date_default_timezone_set('asia/calcutta');
							$create_dt=date('Y-m-d H:i:s');

							$arr=array("accountno"=>$accountno,"amount"=>$amount,"type"=>$type,"create_dt"=>$create_dt,"user_id"=>$user_id);
							$res=$this->insert('tranction',$arr);
							if($res)
							{
								echo"
								<script>
								alert('tranction sucess');
								window.location='tranction.php';
								</script>
								";
							}else
							{
								echo"fail";
							}
						}
						include_once('tranction.php');
						 break;

					
							default:
			echo "<h1>Page Not Found</h1>";
			break;
		}
	
		}
	}	

$obj=new control;
?>
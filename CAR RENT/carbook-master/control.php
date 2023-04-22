<?php
//  error_reporting(0);

// error_reporting(0);

include_once('model.php'); //step1 : load model page
class control extends model
{
    function __construct()
    {
        session_start();
        model::__construct();
        $path=$_SERVER['PATH_INFO']; //http://localhost/Project/admin/control.php
        switch($path)
        {
            case '/index':
                include_once('index.php');
                break;

             case'/car2':
               $cat_arr=$this->select('category');

               include_once('car2.php');
               break;

             case'/booking':

                if(isset($_REQUEST['submit']))
                {
                    $name=$_REQUEST['name'];
                    $email=$_REQUEST['email'];
                    $moblie=$_REQUEST['moblie'];
                    $PICKUPLOCATION=$_REQUEST['PICKUPLOCATION'];
                    $DESTINATION=$_REQUEST['DESTINATION'];
                    $STATE=$_REQUEST['STATE'];
                    $city=$_REQUEST['city'];
                    
                    date_default_timezone_set('asia/calcutta');
                    $updated=date('Y-m-d H:i:s');
                    $deleated_dt=date('Y-m-d H:i:s');
                    $arr=array("name"=>$name,"email"=>$email,"moblie"=>$moblie,"PICKUPLOCATION	"=>$PICKUPLOCATION,"DESTINATION"=>$DESTINATION,"STATE"=>$STATE,"city"=>$city,"updated"=>$updated,"deleated_dt"=>$deleated_dt);
                    $res=$this->insert('booking',$arr);
                    if($res)
                    {
                        echo"
                        <script>
                        alert('booking sucess');
                        window.location='booking.php';
                        </script>
                        ";
                    }
                    else{
                        echo"fail";
                    }
               
                }


                include_once('booking.php');
               break;  


            case '/about':
                include_once('about.php');
                break;

            case '/pricing':
                include_once('pricing.php');
                break;

            case '/car':
                include_once('car.php');
                break;
            case'/booking1':
                $loc_arr=$this->select('location');
                $caradv_arr=$this->select('caradv');

                
                include_once('booking1.php');
                break;

                
            case '/addcaradv':
                $loc_arr=$this->select('location');
                $cat_arr=$this->select('category');
                if(isset($_REQUEST['submit']))
                {
                    $owner_name=$_REQUEST['owner_name'];
                    $car_name=$_REQUEST['car_name'];
                    $vehical_number=$_REQUEST['vehical_number'];
                    $mobile=$_REQUEST['mobile'];
                    $charge=$_REQUEST['charge'];
                    $driver=$_REQUEST['driver'];
                    $address=$_REQUEST['address'];
                    $deposite=$_REQUEST['deposite'];
                    $terms_condition=$_REQUEST['terms_condition'];
                    $location_id=$_REQUEST['location_id'];
                    $category_id=$_REQUEST['category_id'];

                    date_default_timezone_set('asia/calcutta');
                    $updated=date('Y-m-d H:i:s');
                    $deleted=date('Y-m-d H:i:s');

                    $file=$_FILES['file']['name'];
                    $path='UPLOAD/CARADV/'.$file;
                    $tmp_file=$_FILES['file']['tmp_name'];
                    move_uploaded_file($tmp_file,$path);

                    $arr=array("owner_name"=>$owner_name,"car_name"=>$car_name,"vehical_number"=>$vehical_number,"mobile"=>$mobile,"charge"=>$charge,"driver"=>$driver,"address"=>$address,"deposite"=>$deposite,"terms_condition"=>$terms_condition,"location_id"=>$location_id,"category_id"=>$category_id,"file"=>$file,"updated"=>$updated,"deleted"=>$deleted);
                    $res=$this->insert('caradv',$arr);
                    if($res)
                    {
                        echo"
                         <script>
                         alert('car adv sucessful');
                         window.location='addcaradv';
                        </script>
                        ";
                    }else
                    {
                        echo"fail";
                    }



                }

                include_once('addcaradv.php');
                break;


            case '/blog':
                include_once('blog.php');
                break;

            case '/contact':
                if(isset($_REQUEST['submit']))
                {
                    $name=$_REQUEST['name'];
                    $email=$_REQUEST['email'];
                    $subject=$_REQUEST['subject'];
                     $msg=$_REQUEST['msg'];

                    
                    date_default_timezone_set('asia/calcutta');
                    $created_dt=date('Y-m-d H:i:s');
                    $updated_dt=date('Y-m-d H:i:s');

                    $arr=array("name"=>$name,"email"=>$email,"msg"=>$msg ,"subject"=>$subject,"created_dt"=>$created_dt,"updated_dt"=>$updated_dt);

                    $res=$this->insert('contact',$arr);
                    if($res)
                    {
                        echo"
                            <script>
                            alert('contact sucess');
                            window.location='contact';
                            </>
                            ";
                    }else
                    {
                        echo "not sucess";
                    }
                }
                include_once('contact.php');
                break;

            case '/login':
                if(isset($_REQUEST['submit']))
                {
                    $unm=$_REQUEST['unm'];
                    $pass=md5($_REQUEST['pass']);
                    
                    $arr=array("unm"=>$unm,"pass"=>md5($pass));
                    
                    $res=$this->select_where('user1',$arr);
                    $chk=$res->num_rows;
                    if($chk==1)
                    {
                        $fetch=$res->fetch_object();
                        //create the session
                        $_SESSION['user_id']=$fetch->user_id;
                        $_SESSION['unm']=$fetch->unm;
                        $_SESSION['pass']=$fetch->pass;
                        $_SESSION['name']=$fetch->name;
                        echo "
                        <script>
                        alert('login sucess');
                        window.location='index';
                        </script>
                        ";
                    }
                    else{
                        echo"
                        <script>
                        alert('not sucess');
                        </script>
                        ";
                    
                    }

                    
                }
                include_once('login.php');
                break;
                case'/logout':
                    unset($_SESSION['user_id']);
                    unset($_SESSION['unm']);
                    unset($_SESSION['pass']);
                    unset($_SESSION['name']);
                    echo"
                    <script>
                    alert('logut sucess');
                    window.location='index';
                    </script>
                    ";
                    break;

            case '/sign':
                $countries_arr=$this->select('country');
                if(isset($_REQUEST['submit']))
                {
                    $name=$_REQUEST['name'];
                    $unm=$_REQUEST['unm'];
                    $pass=md5($_REQUEST['pass']);
                    $gen=$_REQUEST['gen'];
                    $lag_arr=$_REQUEST['lag'];
                    $lag=implode(",",$lag_arr);

                    $cid=$_REQUEST['cid'];
                    date_default_timezone_set('asia/calcutta');
                    $created_at=date('Y-m-d H:i:s');
                    $updated_at=date('Y-m-d H:i:s');
                    
                     $file_upload=$_FILES['file_upload']['name'];
                     $path='UPLOAD/USER1/'.$file_upload;
                     $tmp_file=$_FILES['file_upload']['tmp_name'];
                     move_uploaded_file($tmp_file,$path);
                    $arr=array("name"=>$name,"unm"=>$unm,"pass"=>md5($pass),"gen"=>$gen,"lag"=>$lag,"cid"=>$cid,"created_at"=>$created_at,"file_upload"=>$file_upload,"updated_at"=>$updated_at);

                    $res=$this->insert('user1',$arr);
                    if($res)
                    {
                        echo"
                            <script>
                            alert('register sucess');
                            window.location='sign';
                            </script>
                            ";
                    }
                    else
                    {
                        echo"not sucess";
                    }

                }
                
                include_once('sign.php');
                break;
                case'/profile':
                    // $where=array("user_id"=>$user_id);
                     $where=array("user_id"=>$_SESSION['user_id']);
                    $res=$this->select_where('user1',$where);
                    
                    $fetch=$res->fetch_object();
                    include_once('profile.php');
                    break;

                    case'/edit':
                        if(isset($_REQUEST['edit_user_id']))
                        {
                            $user_id=$_REQUEST['edit_user_id'];
                            $where=array("user_id"=>$user_id);
                            $res=$this->select_where('user1',$where);
                            $fetch=$res->fetch_object();
                            // get old file for dekte
                              $old_img=$fetch->file_upload;
                            if(isset($_REQUEST['save']))
                            {
                                $name=$_REQUEST['name'];
                                $unm=$_REQUEST['unm'];
                                $gen=$_REQUEST['gen'];
                                $lag_arr=$_REQUEST['lag'];
                                $lag=implode(",",$lag_arr);
                                $cid=$_REQUEST['cid'];

                                date_default_timezone_set('asia/calcutta');
                                $updated_at=date('Y-m-d H:i:s');
                                if($_FILES['file_upload']['size']>0)
                                {
                                    $file_upload=$_FILES['file_upload']['name'];
                                    $path='UPLOAD/USER1/'.$file_upload;
                                    $tmp_file=$_FILES['file_upload']['tmp_name'];
                                    move_uploaded_file($tmp_file,$path);
                                    $arr=array("name"=>$name,"unm"=>$unm,"gen"=>$gen,"lag"=>$lag,"cid"=>$cid,"file_upload"=>$file_upload,"updated_at"=>$updated_at);
                                    $res=$this->update('user1',$arr,$where);
                                    if($res)
                                    {
                                        unlink('UPLOAD/USER1/'.$old_img);
                                        // echo"sucess";
                                        echo"<script>
                                         alert('Update sucess');
                                         window.location='profile';
                                         </script>
                                        ";
                                    }else{
                                        echo "fail";
                                    }
                                }
                                else
                                {

                                    $arr=array("name"=>$name,"unm"=>$unm,"gen"=>$gen,"lag"=>$lag,"cid"=>$cid,"updated_at"=>$updated_at);
						
                                    $res=$this->update('user1',$arr,$where);
                                    if($res)
                                    {
                                        // echo"sucesss";
                                        echo "
                                         <script>
                                         alert('Update Success');
                                         window.location='profile';
                                          </script>
                                         ";
                                    }
                                }
                                

                            }
                        }
                        $countries_arr=$this->select('country');
                        include_once('edit_profile.php');
                        break;

            default:
                echo "<h1>Page Not Found</h1>";
                break;

		}
	}	
}
$obj=new control();
?>
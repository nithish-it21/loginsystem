<?php
$server = "localhost";
$username = "root" ;
$password = "";
$dbname = "insert";

$conn = mysqli_connect($server,$username,$password,$dbname);

if(isset($_POST['submit']))
    {
        if(!empty($_POST['name']) && !empty($_POST['dob']) && !empty($_POST['gender']) && !empty($_POST['age']) && !empty($_POST['phoneCode']) && !empty($_POST['phone'])){

            $name = $_POST['name'];
            $dob = $_POST['dob'];
            $gender = $_POST['gender'];
            $age = $_POST['age'];
            $phoneCode = $_POST['phoneCode'];
            $phone=$_POST['phone'];

        $query = "insert into form(name,dob,gender,age,phoneCode,phone) values('$name','$dob','$gender','$age','$phoneCode','$phone')";

        $run = mysqli_query($conn,$query) or die(mysqli_error());

        if($run){
            header("Location:user_page.php");
            exit();

        }
        else{
            echo"form not submitted";
        }
        }
        else
        {
            echo"all fields are required";
        }
    }

?>

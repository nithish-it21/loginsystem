<?php
$server = "localhost";
$username = "root" ;
$password = "";
$dbname = "datas";

$conn = mysqli_connect($server,$username,$password,$dbname);

if(isset($_POST['submit']))
    {
        if(!empty($_POST['name']) && !empty($_POST['dob']) && !empty($_POST['age']) && !empty($_POST['country']) && !empty($_POST['gender']) && !empty($_POST['languages'])){

            $name = $_POST['name'];
            $dob = $_POST['dob'];
            $age = $_POST['age'];
            $country = $_POST['country'];
            $gender = $_POST['gender'];
            $languages=$_POST['languages'];

        $query = "insert into tb_data(name,dob,age,country,gender,languages) values('$name','$dob','$age','$country','$gender','$languages')";

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

<?php include 'Database.php'?>
<?php

//retrieving data from input fileds
$uname = $_POST['username'];
$pass = $_POST['password'];

$loginInfo = "SELECT * FROM logindetails;";
$result = $conn->query($loginInfo);
if($result->num_rows>0){
    while($row = $result->fetch_assoc()){
        if($row['id']===$uname and $row['pass']===$pass){
            header("Location:Home.html");
        }
        else {
            print("login failed. Invalid user.");
        }
    }
}
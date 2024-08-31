<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN FORM</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <form method="post">
        <br>
        <label>EMAIL</label>
        <input type="email" placeholder="Enter Your Email" name="email" id="" name="" class="form-control mt-3">
        <br>
        <label>PASSWORD</label>
        <input type="text" placeholder="Enter Your Password" name="password" id="" class="form-control">
        <br>
        <input type="submit" value="LOG-IN" name="sub" class="btn btn-primary">
        <br><br>
        <input type="submit" value="LOG-OUT" name="log" class="btn btn-warning">
    </form>
</body>
</html>

<?php
     $conn = mysqli_connect("localhost","root","","login_form");
     if(isset($_POST["sub"])){
         $email = $_POST["email"];
         $pass = $_POST["password"];

         $sql = "SELECT * FROM employee WHERE email ='$email' AND password='$pass'" ;
         $res = mysqli_query($conn,$sql);

         if(mysqli_num_rows($res) > 0){
             $row = mysqli_fetch_assoc($res);
             $v = $row["name"];
             
             if($row["emp_dep"] == 1){
                 header('Location:admin.php?name='.$v);
             }
             else if($row["emp_dep"] == 2){
                 header('Location:faculty.php?name='.$v);
             }
             
             if(isset($_POST["log"])){
                 header('Location:index.php');
             }
         }
     }

?>
<!-- alter table table ka naam rename to table naam -->
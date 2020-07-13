<?php
session_start();
if(!(isset($_SESSION['uname']) && isset($_SESSION['pass']))){
    require_once("database/conn.php");
    if(isset($_REQUEST['uname']) && isset($_REQUEST['pass'])){
        if(($_REQUEST['uname']=="") || ($_REQUEST['pass']=="")){
            $errmsg ="Please Fill All The Fields";
        }else{
            $sql="SELECT * FROM admin";
            $result=$conn->prepare($sql);
            $result->bind_result($id,$name,$pass);
            $result->execute();
            $result->fetch();
            if(($_REQUEST['uname'] ==$name) && ($_REQUEST['pass'] ==$pass)){
                $_SESSION['uname']=$name;
                $_SESSION['pass']=$pass;
                echo "<script>location.href='adminpage.php'</script>";
            }else{
                $errmsg ="Wrong Username or Password";
            }
            $result->close();
        }
    }
}else{
    echo "<script>location.href='adminpage.php'</script>";
}   


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
    <header class="header">
        <div class="name">MK College Of Engineering</div>
    </header>
    <div class="resultscheck">
        <form class="rform" action="" method="POST">
            <p style='color:red; font-weight:bold;'><?php if(isset($errmsg)){ echo $errmsg;} ?></p>
            <lable for="uname" id="luname">Name:</lable><br>
            <input type="text" name="uname" id="uname"  autocomplete="off" /><br>
            <br>
            <lable for="pass" id="lpass">Password:</lable><br>
            <input type="password" name="pass" id="pass" autocomplete="off" /><br>
            <br>
            <input type="submit" value="Login" name="login" id="login" />
        </form>
        <a href="index.php" style="margin:0 0 0 20px;">Go to Home Page</a>
    </div>
    <?php include_once('others/footer.php') ?>
</body>
</html>
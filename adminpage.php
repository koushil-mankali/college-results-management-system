<?php
session_start();
if(!(isset($_SESSION['uname']) && isset($_SESSION['pass']))){
    echo "<script>location.href='login.php'</script>";
}
if(isset($_REQUEST['logout'])){
    session_unset();
    session_destroy();
    echo "<script>location.href='login.php'</script>";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="css/adminpage.css">
</head>
<body>
    <header class="header">
        <form method="POST" action="">
            <input name="logout" type="submit" value="Logout" class="logout" />
        </form>
        
        <div class="name">Kshatriya College Of Engineering</div>
        
    </header>
    <div class="btndiv">
        <button class="add" onclick="location.href='addrecord.php'" >ADD STUDENT RECORD</button>
        <button class="change" onclick="location.href='changerecord.php'" >UPDATE/DELETE STUDENT RECORD</button>
    </div>
    <?php include_once('others/footer.php') ?>
</body>
</html>
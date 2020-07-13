<?php
require_once('database/conn.php');
if(isset($_REQUEST['addr'])){
    if(($_REQUEST['sname']=="")&&($_REQUEST['shtno']=="")&&($_REQUEST['stelugu']=="")&&($_REQUEST['shindi']=="")&&($_REQUEST['seng']=="")&&($_REQUEST['stgrade']=="")&&($_REQUEST['shgrade']=="")&&($_REQUEST['segrade']=="")&&($_REQUEST['spf'])){
        echo "Please Fill All The Fields";
    }else{
        $sid=$_REQUEST['sid'];
        $sql="UPDATE students SET hallticket=?,name=?,telugu=?,hindi=?,english=?,telugugrade=?,hindigrade=?,englishgrade=?,pf=? WHERE id=$sid";
        $result=$conn->prepare($sql);
        $result->bind_param('ssiiissss',$hall,$name,$telugu,$hindi,$english,$telgrade,$hingrade,$enggrade,$pf);
        if($result){
            $hall=strtoupper($_REQUEST['shtno']);
            $name=$_REQUEST['sname'];
            $telugu=$_REQUEST['stelugu'];
            $hindi=$_REQUEST['shindi'];
            $english=$_REQUEST['seng'];
            $telgrade=strtoupper($_REQUEST['stgrade']);
            $hingrade=strtoupper($_REQUEST['shgrade']);
            $enggrade=strtoupper($_REQUEST['segrade']);
            $pf=strtoupper($_REQUEST['spf']);
        }else{
            $success="<p style='float:right; margin:-25px 0 0 15px;'>Sorry Unable to Update Record Please Check the Values You Have Entered.</p>";
        }
        if($result->execute()){
            $success="<p style='float:right; margin:-25px 0 0 15px;'>Record Updated Sucessfully</p>";
        }else{
            $success="<p style='float:right; margin:-25px 0 0 15px;'>Sorry Unable to Update Record Please Check the Values You Have Entered.</p>";
        }
    }   
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/addrecord.css">
</head>
<body>
    <?php include_once('adminpage.php'); ?>
    <?php
        if(isset($_REQUEST['update'])){
            $hid=$_REQUEST['hid'];
            $sql="SELECT * FROM students WHERE id=$hid ";
            $result=$conn->prepare($sql);
            $result->bind_result($id,$hall,$name,$telugu,$hindi,$english,$telgrade,$hingrade,$enggrade,$pf);
            $result->execute();
            $result->fetch();
            $result->store_result();
        }
    ?>
    <div>
        <h1>Update Student Record</h1>
        <form class="form" action="" method="POST">
        <fieldset class="fs1">
        <legend>Personal Details</legend>
            <lable class="lable" for="sname">NAME:</lable>
            <input type="text" value="<?php if(isset($name)){ echo $name;} ?>" name="sname" id="sname"/><br>
            <br>
            <lable for="shtno">HALLTICKET NO.:</lable>
            <input type="text" value="<?php if(isset($hall)){ echo $hall;} ?>" name="shtno" id="shtno"/><br>
            <br>
        </fieldset>
        <fieldset class="fs2">
        <legend>Subject Details</legend>
            <lable for="stelugu">TELUGU:</lable>
            <input type="text" value="<?php if(isset($telugu)){ echo $telugu;} ?>" name="stelugu" id="stelugu"/><br>
            <br>
            <lable for="shindi">HINDI:</lable>
            <input type="text" value="<?php if(isset($hindi)){ echo $hindi;} ?>" name="shindi" id="shindi"/><br>
            <br>
            <lable for="seng">ENGLISH:</lable>
            <input type="text" value="<?php if(isset($english)){ echo $english;} ?>" name="seng" id="seng"/><br>
            <br>
        </fieldset>
        <fieldset class="fs3">
        <legend>Grades</legend>
            <lable for="stgrade">TELUGU GRADE:</lable>
            <input type="text" value="<?php if(isset($telgrade)){ echo $telgrade;} ?>" name="stgrade" id="stgrade"/><br>
            <br>
            <lable for="shgrade">HINDI GRADE:</lable>
            <input type="text" value="<?php if(isset($hingrade)){ echo $hingrade;} ?>" name="shgrade" id="shgrade"/><br>
            <br>
            <lable for="segrade">ENGLISH GRADE:</lable>
            <input type="text" value="<?php if(isset($enggrade)){ echo $enggrade;} ?>" name="segrade" id="segrade"/><br>
            <br>
            <lable for="spf">PASS/FAIL:</lable>
            <input type="text" value="<?php if(isset($pf)){ echo $pf;} ?>" name="spf" id="spf"/><br>
            <br>
        </fieldset>
        <input type="hidden" name="sid" value="<?php echo $id; ?>"/>
        <input type="submit" value="Update" name="addr" style="width:50px;height:30px;margin-top:20px;" /><br><br>
        <?php if(isset($success)){echo $success;} ?>
        </form>
    </div>
    <?php include_once('others/footer.php') ?>
</body>
</html>
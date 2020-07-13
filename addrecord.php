<?php
require_once('database/conn.php');
if(isset($_REQUEST['addr'])){
    if(($_REQUEST['sname']=="")&&($_REQUEST['shtno']=="")&&($_REQUEST['stelugu']=="")&&($_REQUEST['shindi']=="")&&($_REQUEST['seng']=="")&&($_REQUEST['stgrade']=="")&&($_REQUEST['shgrade']=="")&&($_REQUEST['segrade']=="")&&($_REQUEST['spf'])){
        echo "Please Fill All The Fields";
    }else{
        $sql="INSERT INTO students(hallticket,name,telugu,hindi,english,telugugrade,hindigrade,englishgrade,pf) VALUES(?,?,?,?,?,?,?,?,?)";
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
            $success="<p style='float:right; margin:-15px 0 0 15px;'>Sorry Unable to Insert Record Please Check the Values You Have Entered.</p>";
        }
        if($result->execute()){
            $success="<p style='float:right; margin:-15px 0 0 15px;'>Record Inserted Sucessfully</p>";
        }else{
            $success="<p style='float:right; margin:-15px 0 0 15px;'>Sorry Unable to Insert Record Please Check the Values You Have Entered.</p>";
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add</title>
    <link rel="stylesheet" href="css/addrecord.css">
</head>
<body>
    <?php include_once('adminpage.php'); ?>
    <hr>
    <div>
        <h1>Add Student Record</h1>
        <form class="form" action="" method="POST">
        <fieldset class="fs1">
        <legend>Personal Details</legend>
            <lable class="lable" for="sname">NAME:</lable>
            <input type="text" name="sname" required autocomplete="off" id="sname"/><br>
            <br>
            <lable for="shtno">HALLTICKET NO.:</lable>
            <input type="text" name="shtno" required autocomplete="off" id="shtno"/><br>
            <br>
        </fieldset>
        <fieldset class="fs2">
        <legend>Subject Details</legend>
            <lable for="stelugu">TELUGU:</lable>
            <input type="text" name="stelugu" autocomplete="off" id="stelugu"/><br>
            <br>
            <lable for="shindi">HINDI:</lable>
            <input type="text" name="shindi" autocomplete="off" id="shindi"/><br>
            <br>
            <lable for="seng">ENGLISH:</lable>
            <input type="text" name="seng" autocomplete="off" id="seng"/><br>
            <br>
        </fieldset>
        <fieldset class="fs3">
        <legend>Grades</legend>
            <lable for="stgrade">TELUGU GRADE:</lable>
            <input type="text" name="stgrade" autocomplete="off" id="stgrade"/><br>
            <br>
            <lable for="shgrade">HINDI GRADE:</lable>
            <input type="text" name="shgrade" autocomplete="off" id="shgrade"/><br>
            <br>
            <lable for="segrade">ENGLISH GRADE:</lable>
            <input type="text" name="segrade" autocomplete="off" id="segrade"/><br>
            <br>
            <lable for="spf">PASS/FAIL:</lable>
            <input type="text" name="spf" autocomplete="off" id="spf"/><br>
            <br>
        </fieldset>
            <input type="submit" value="Submit" name="addr" style="width:50px;height:30px;margin-top:20px;" /><br>
            <?php if(isset($success)){echo $success;} ?>
        </form>
    </div>
    <?php include_once('others/footer.php') ?>
</body>
</html>
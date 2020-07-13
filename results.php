<?php
require_once('database/conn.php');
if(isset($_REQUEST['ssubmit'])){
    if(($_REQUEST['uname']=="") && ($_REQUEST['htno']=="")){
        echo "NO DATA";
    }else{
        $htno=strtoupper($_REQUEST['htno']);
        $sql="SELECT * FROM students where hallticket='$htno'";
        $result=$conn->prepare($sql);
        $result->bind_result($id,$name,$hallticket,$telugu,$hindi,$english,$telgre,$hingre,$enggre,$pf);
        $result->execute();
        if(!($result->fetch())){
            $err="<b style='color:red;display:flex;justify-content:center;'>Please Check The Hallticket Number You Entered</b>";
        }
    }
}
else{
    echo "<script>location.href='index.php'</script>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Results</title>
    <link rel="stylesheet" href="css/results.css">
</head>
<body>
    <?php include_once('others/header.php') ?>
    <hr id="hr">
    <?php if(isset($err)){ echo $err; } ?>
    <div class="outer">
        <div class="inner">
            <p id="name">H.T.NO: <?php if(isset($name)){echo $name;} ?></p>
            <p id="htno">NAME: <?php if(isset($hallticket)){echo $hallticket;} ?></p>
            <p id="pf">PASS/FAIL: <?php if(isset($pf)){echo $pf;} ?></p>
        </div>
        <hr>
        <table>
            <thead>
                <tr>
                    <td><b>Sr.no:</b></td>
                    <td><b>Subject Name:</b></td>
                    <td><b>Marks:</b></td>
                    <td><b>Grades:</b></td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1.</td>
                    <td>TELUGU</td>
                    <td><?php if(isset($telugu)){echo $telugu;} ?></td>
                    <td><?php if(isset($telgre)){echo $telgre;} ?></td>
                </tr>
                <tr>
                    <td>2.</td>
                    <td>HINDI</td>
                    <td><?php if(isset($hindi)){echo $hindi;} ?></td>
                    <td><?php if(isset($hingre)){echo $hingre;} ?></td>
                </tr>
                <tr>
                    <td>3.</td>
                    <td>ENGLISH</td>
                    <td><?php if(isset($english)){echo $english;} ?></td>
                    <td><?php if(isset($enggre)){echo $enggre;} ?></td>
                </tr>
            </tbody>
        </table>
        <hr>
        <p id="total">TOTAL = <?php if(isset($telugu)&&isset($hindi)&&isset($english)){echo $telugu+$hindi+$english;} ?>/300 </p>
   </div>
   <div id="complaint">IF YOU HAVE ANY COMPLAINTS MAIL US @ KCEA@GMAIL.COM</div>
   <button id="print" style="float:right; position:relative; bottom:40px; right:50px; width:60px; height:30px;">Print</button>
   <?php include_once('others/footer.php') ?>
   <script>
        let pt=document.getElementById('print');
        pt.addEventListener('click',()=>{
            window.print();
        });
   </script>
</body>
</html>


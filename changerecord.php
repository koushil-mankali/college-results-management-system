<?php
require_once('database/conn.php');
if(isset($_REQUEST['delete'])){
 
    $sql="DELETE FROM students WHERE id=?";
    $result=$conn->prepare($sql);
    $result->bind_param('i',$sid);
    $sid=$_REQUEST['did'];
    if($result->execute()){
        $dsuccess="<b>Deleted Record Successfully</b>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
    <link rel="stylesheet" href="css/addrecord.css">
</head>
<body>
    <?php include_once('adminpage.php'); ?>
    <hr>
    <div>
        <?php
            $sql="SELECT * FROM students";
            $result=$conn->prepare($sql);
            $result->bind_result($id,$hallticket,$name,$telugu,$hindi,$english,$telugugrade,$hindigrade,$englishgrade,$pf);
            $result->execute();
            $result->store_result();            
        ?>
        <?php 
        if($result->num_rows()>0){
            echo "<table class='table'>";
                echo"<thead>";
                    echo"<tr class='tr'>";
                        echo"<td>HALLTICKET NO.:</td>";
                        echo"<td>NAME:</td>";
                        echo"<td>TELUGU:</td>";
                        echo"<td>HINDI:</td>";
                        echo"<td>ENGLISH:</td>";
                        echo"<td>TELUGUGRADE:</td>";
                        echo"<td>HINDI GRADE:</td>";
                        echo"<td>ENGLISHGRADE:</td>";
                        echo"<td>PF:</td>";
                        echo"<td>UPDATE:</td>";
                        echo"<td>DELETE:</td>";
                       
                    echo"</tr>";
                echo"</thead>";
                echo"<tbody>";
                    while($result->fetch()){
                        echo "<tr class='tr2'>";
                            echo"<td class='tdd'> $hallticket</td>";
                            echo"<td class='tdd'> $name</td>";
                            echo"<td class='tdd'> $telugu</td>";
                            echo"<td class='tdd'> $hindi</td>";
                            echo"<td class='tdd'> $english</td>";
                            echo"<td class='tdd'> $telugugrade</td>";
                            echo"<td class='tdd'> $hindigrade</td>";
                            echo"<td class='tdd'> $englishgrade</td>";
                            echo"<td class='tdd'>$pf</td>";
                            echo "<td><form action='update.php' method='POST'>
                            <input type='hidden' name='hid' id='hid' value='$id' />
                            <input type='submit' value='Update' name='update' id='update' />
                            </form></td>";
                            echo "<td><form action='' method='POST'>
                            <input type='hidden' name='did' id='did' value='$id' />
                            <input type='submit' value='Delete' name='delete' id='delete' />
                            </form></td>";
                        echo"</tr>";
                    } 
                echo"</tbody>";
            echo"</table>";
        }
        else{
            echo "<h2 style='text-align:center; margin-top:20vh;'>0 RECORDS FOUND</h2>";
        }
        ?>
    </div>
    <div style="position:absolute;left:10px; bottom:50px;">
        <?php if(isset($dsuccess)){echo $dsuccess;} ?>
    </div>
    <?php include_once('others/footer.php') ?>
</body>
</html>
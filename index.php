<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Results</title>
    <link rel="stylesheet" href="css/custom.css">
</head>
<body>
    <?php include_once('others/header.php') ?>
    <hr id="hr">
    <div class="resultscheck">
        <form class="rform" action="results.php" method="POST">
            <lable for="uname" id="luname">Name:</lable><br>
            <input type="text" name="uname" id="uname" placeholder="Enter You'r Name" autocomplete="off" required/><br>
            <br>
            <lable for="htno" id="lhtno">Hall Ticket Number:</lable><br>
            <input type="text" name="htno" id="htno" placeholder="Enter Hallticket Number" autocomplete="off" required /><br>
            <br>
            <input type="submit" disabled="disabled" value="Submit" name="ssubmit" id="ssubmit" />
        </form>
    </div>
    <?php include_once('others/footer.php') ?>
    <script>
            let ht=document.getElementById('htno');
            let bt=document.getElementById('ssubmit');
            ht.addEventListener('blur',()=>{
                let rg=/[a-zA-Z0-9]{10}$/;
                let str=ht.value;
                if(rg.test(str)){
                    bt.disabled="";
                }else{
                    alert("Please Enter a Valid Hallticket Number");
                    bt.disabled="disabled";
                }
            });
    </script>
</body>
</html>
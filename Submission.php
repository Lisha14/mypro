<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>
<body>
    <div class="container">
        <form  method="post" enctype="multipart/form-data">
            <!-- For animal name -->
        <label>Name of the animal</label><br>
        <input type="text" name="n" id="name" placeholder="Name of the animal" required><br>

        <!-- For category -->
        <label>Category</label><br>
        <select required name="c">
            <option value="">--select--</option>
                <option value="herbivores">herbivores</option>
                <option value="omnivores">omnivores</option>
                <option value="carnivores">carnivores</option>
            </select><br>

            <!-- For image -->
        <label for="">Image</label><br>
        <input type="file" name="uploadfile" required><br>

        <!-- For description area -->
        <label for="">Description</label><br>
        <textarea name="a" id="" cols="50" rows="5" required></textarea><br>

        <!-- For Life expectancy -->
        <label>Life expectancy</label><br>
        <select  required name="l">
            <option value="">--select--</option>
                <option value="0-1 years">0-1 years</option>
                <option value="1-5 years">1-5 years</option>
                <option value="5-10 years">5-10 years</option>
                <option value="10+ years">10+ years</option>
            </select><br><br>

            <!-- Google recaptcha -->
        <div class="g-recaptcha" data-sitekey="6LfHPOMdAAAAANxbgYnKzSBIso9ISuWM2pe7Xvb4" required></div><br>


        <input type="submit" name='submit' class="btn">

</form>
</div>
</body>
</html>
<?php
if(isset($_POST['submit']))
{
    date_default_timezone_set("Asia/Kolkata");
    $TIME=date("G:i A");
    $DATE=date("y/m/d");

    $da=$DATE;


$name=$_POST['n'];
$cat=$_POST['c'];
$filename=$_FILES['uploadfile']['name'];
$tname=$_FILES['uploadfile']['tmp_name'];
$folder="animal/".$filename;
move_uploaded_file($tname,$folder);
$area=$_POST['a'];
$life=$_POST['l'];


if($name!="" && $cat!="" && $filename!="" && $area!="" && $life!="")
{
    $con=mysqli_connect('localhost','root','','assign');
    $sql="insert into animal values('$name','$cat','$folder','$area','$life','$da')";
    if(mysqli_query($con,$sql))
    {
        echo"inserted data";
        header("Location:Animals.php");
        
}
else
{
    mysqli_error($con);
}
}
else
{
echo "you must fill all the fields....!!!!!!";
}
}
?>

<?php
include("connect.php");
if(isset($_POST['add'])){
    $Name = $_POST['Name'];
    
	$Num_page = $_POST['Num_page'];
	$Num_ed = $_POST['Num_ed'];
	$Dep_ID = $_POST['Dep_ID'];
    //$name1 = $_POST['name1'];
    //$Loc_ID = $_POST['Loc_ID'];
    $cloumn = $_POST['cloumn'];
    $Row_ = $_POST['Row_'];
    $AID = $_POST['AID'];
    //$name2 = $_POST['name2'];
    //$mail = $_POST['mail'];
    //$country = $_POST['country'];
    //$city = $_POST['city'];
    //$zipcode = $_POST['zipcode'];
    $query1="INSERT into book(Name,Num_page,Num_ed,Dep_ID) VALUES('$Name','$Num_page','$Num_ed','$Dep_ID')";
    //$query2="INSERT into department VALUES('$Dep_ID','$name1')";
     
    //$query4="INSERT into author VALUES('$AID','$name2','$mail','$country','$city','$zipcode')";
    
    mysqli_query($conn,$query1);
    //mysqli_query($conn,$query2);
    $query6="SELECT ID from book where Name = '$Name' ";
    //mysqli_query($conn,$query4);
    $sqldata = mysqli_query($conn,$query6);
    $row = $sqldata->fetch_assoc();
    $ID = (int)$row["ID"];
    $query5="INSERT into book_author VALUES('$ID','$AID')";
    $query3="INSERT into location(cloumn,Row_,Dep_ID,ID) VALUES('$cloumn','$Row_','$Dep_ID','$ID')";
    mysqli_query($conn,$query3);
    mysqli_query($conn,$query5);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="./style.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add book</title>
</head>
<body>
    <div class="imgb">
        <div class="back2">
            <div class="heading">
                
                <h1>Add Book</h1>
                
            </div>
            <div class="form-style-5">
                <form action="add.php" method="post">
                    <div>
                        <!-- <label for="ID">Book ID</label> 
                        <input type="text" id="ID" name="ID"> <br><br> -->
                        <label for="Name">Book Name</label>
                        <input type="text" id="Name" name="Name"><br><br>
                        <label for="Num_page">Number of Pages</label>
                        <input type="text" id="Num_page" name="Num_page"><br><br>
                        <label for="Num_ed">Edition Number</label>
                        <input type="text" id="Num_ed" name="Num_ed"><br><br>
                
                    </div>
                    <div>
                        <label for="Dep_ID"> Departmint ID</label>
                        <input type="number" id="Dep_ID" name="Dep_ID" VALUE = "1" min = "1" max = "10"><br><br>
                        <!-- <Label for="name1">Departmint Name : </Label>
                        <input type="text" id="name1" name="name1"> <br><br> -->
                    </div>
                    <div>
                        <!-- <Label for="Loc_ID">Location ID : </Label>
                        <input type="text" id="Loc_ID" name="Loc_ID"> -->
                        <Label for="cloumn">Column : </Label>
                        <input type="text" id="cloumn" name="cloumn">
                        <Label for="Row_">Row : </Label>
                        <input type="text" id="Row_" name="Row_"><br><br>
                    </div>
                    <div class ="author">
                
                        <Label for="AID">Author ID : </Label>
                        <input type="number" id="AID" name="AID" VALUE = "1" min = "1" max = "10"><br><br>
                        <!-- <Label for="name2">Author Name : </Label>
                        <input type="text" id="name2" name="name2"><br><br>
                        <Label for="mail">Author mail : </Label>
                        <input type="text" id="mail" name="mail"><br><br>
                        <Label for="country">Country : </Label>
                        <input type="text" id="country" name="country">
                        <Label for="city">City : </Label>
                        <input type="text" id="city" name="city">
                        <Label for="zipcode">Zip_code : </Label>
                        <input type="text" id="zipcode" name="zipcode">-->
                        <input type="submit" name ="add"> 
                    </div>
                </form>
            </div>
        </div>    
    </div> 
</body>
</html>
<style type="text/css">
.form-style-5{
	max-width: 500px;
	padding: 10px 20px;
	background: #f4f7f8;
	margin: 10px auto;
	padding: 20px;
	background: #f4f7f8;
	border-radius: 8px;
	font-family: Georgia, "Times New Roman", Times, serif;
}
.form-style-5 fieldset{
	border: none;
}
.form-style-5 legend {
	font-size: 1.4em;
	margin-bottom: 10px;
}
.form-style-5 label {
	display: block;
	margin-bottom: 8px;
}
.form-style-5 input[type="text"],
.form-style-5 input[type="date"],
.form-style-5 input[type="datetime"],
.form-style-5 input[type="email"],
.form-style-5 input[type="number"],
.form-style-5 input[type="search"],
.form-style-5 input[type="time"],
.form-style-5 input[type="url"],
.form-style-5 textarea,
.form-style-5 select {
	font-family: Georgia, "Times New Roman", Times, serif;
	background: rgba(255,255,255,.1);
	border: none;
	border-radius: 4px;
	font-size: 15px;
	margin: 0;
	outline: 0;
	padding: 10px;
	width: 100%;
	box-sizing: border-box; 
	-webkit-box-sizing: border-box;
	-moz-box-sizing: border-box; 
	background-color: #e8eeef;
	color:#8a97a0;
	-webkit-box-shadow: 0 1px 0 rgba(0,0,0,0.03) inset;
	box-shadow: 0 1px 0 rgba(0,0,0,0.03) inset;
	margin-bottom: 30px;
}
.form-style-5 input[type="text"]:focus,
.form-style-5 input[type="date"]:focus,
.form-style-5 input[type="datetime"]:focus,
.form-style-5 input[type="email"]:focus,
.form-style-5 input[type="number"]:focus,
.form-style-5 input[type="search"]:focus,
.form-style-5 input[type="time"]:focus,
.form-style-5 input[type="url"]:focus,
.form-style-5 textarea:focus,
.form-style-5 select:focus{
	background: #d2d9dd;
}
.form-style-5 select{
	-webkit-appearance: menulist-button;
	height:35px;
}
.form-style-5 .number {
	background: #1abc9c;
	color: #fff;
	height: 30px;
	width: 30px;
	display: inline-block;
	font-size: 0.8em;
	margin-right: 4px;
	line-height: 30px;
	text-align: center;
	text-shadow: 0 1px 0 rgba(255,255,255,0.2);
	border-radius: 15px 15px 15px 0px;
}

.form-style-5 input[type="submit"],
.form-style-5 input[type="button"]
{
	position: relative;
	display: block;
	padding: 19px 39px 18px 39px;
	color: #FFF;
	margin: 0 auto;
	background: #00B4CC;
	font-size: 18px;
	text-align: center;
	font-style: normal;
	width: 100%;
	border: 1px solid #037e8f;
	border-width: 1px 1px 3px;
	margin-bottom: 10px;
}
.form-style-5 input[type="submit"]:hover,
.form-style-5 input[type="button"]:hover
{
	background: #037e8f;
}
h1{
    
}
.heading{
    margin-left:auto;
    margin-right:auto;
    height:7%;
    border: 10px solid #00B4CC;
    background-color: #00B4CC;
    color:white;
    text-align: center;
    font-size: large;
    font-family:Verdana, Geneva, Tahoma, sans-serif;
    
}
.imgb{
    background-image: url(./assets/stock-photo-library-interior-design-with-massive-bookshelves-concrete-floor-and-city-view-d-rendering-404153935.jpg);
    background-size: cover;
    background-position: center;
    height: 120vh;
    position: relative;

  }

  .back2{
    background-color: #f1f6f8dc;
    position: absolute;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;

  }
</style>
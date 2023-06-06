<?php
	$ID = $_POST['ID'];
	$Name = $_POST['Name'];
	$Num_page = $_POST['Num_page'];
	$Num_ed = $_POST['Num_ed'];
	$Dep_ID = $_POST['Dep_ID'];
    $name1 = $_POST['name1'];
	// Database connection
	$conn = new mysqli('localhost','root','','library');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into book(ID, Name, Num_page, Num_ed,Dep_ID) values(?, ?, ?, ?,?)");
		$stmt->bind_param("isiii", $ID, $Name, $Num_page, $Num_ed,$Dep_ID);
        $stmt = $conn->prepare("insert into department(Dep_ID, Name) values(?, ?)");
		$stmt->bind_param("is", $Dep_ID, $name1);
		$execval = $stmt->execute();
		echo $execval;
		echo "Added successfully...";
		$stmt->close();
		$conn->close();
	}
?>
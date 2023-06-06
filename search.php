


<!DOCTYPE html>
<html lang="en">
  <head>
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./style.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>search</title>
    
  </head>
  <body>
    <div class="imgb">
      <div class="back2">
        <form action="search.php" method = "post">
          <div class="wrap">
            <div class="search">
            
              <input type="text" id="search1" name="search1" class="searchTerm" placeholder="Search...">
              <button type="submit" name ="search" class="searchButton">
                <i class="fa fa-search"></i>
              </button>
            
            </div>
          </div>
        </form>
      </div>
    </div>    
  </body>
</html>


<?php
include("connect.php");
if(isset($_POST['search'])){
    $seach = $_POST['search1'];
    $query="SELECT book.ID,book.Name,book.Num_page,book.Num_ed,department.Name as dn , location.cloumn,location.Row_,author.name
     FROM book,location,author,department,book_author WHERE book.Dep_ID = department.Dep_ID and
     location.Dep_ID = department.Dep_ID and book_author.AID = author.AID and book_author.ID= book.ID AND location.ID=book.ID AND book.name = '$seach';";
    $sqldata = mysqli_query($conn,$query);
    if ($sqldata->num_rows > 0) {
        // output data of each row
        while($row = $sqldata->fetch_assoc()) {
          echo "id: " . $row["ID"]. "  || - Name: " . $row["Name"]. "   || - Numper of pages: " . $row["Num_page"]."   || - edition number: " . $row["Num_ed"] .
           "   || - department: " . $row["dn"]."   || - cloumn: " . $row["cloumn"]."    || - Row: " . $row["Row_"]."   || - author name: " . $row["name"] ."<br>";
        //   echo `"<table>
        //   <tr>
        //     <th>id</th>
        //     <th>Name</th>
        //     <th> Numper of pages</th>
        //     <th> edition number</th>
        //     <th> department</th>
        //     <th> cloumn</th>
        //     <th> Row</th>
        //     <th> author name</th>
        //   </tr>
          
        //   <tr>
        //   <th> $row["ID"] </th>
        //   <th> $row["Name"]</th>
        //   <th> $row["Num_page"]</th>
        //   <th> $row["Num_ed"]</th>
        //   <th> $row["dn"] </th>
        //   <th> $row["cloumn"]</th>
        //   <th> $row["Row_"]</th>
        //   <th> $row["name"]</th>
        //   </tr>
        // </table>"` ;
        }
      } else {
        echo "0 results";
      }
}
?>
<style>
@import url(https://fonts.googleapis.com/css?family=Open+Sans);

body{
  background: #f2f2f2;
  font-family: 'Open Sans', sans-serif;
}

.search {
  width: 100%;
  position: relative;
  display: flex;
}

.searchTerm {
  width: 100%;
  border: 3px solid #00B4CC;
  border-right: none;
  padding: 5px;
  height: 20px;
  border-radius: 5px 0 0 5px;
  outline: none;
  color: #9DBFAF;
}

.searchTerm:focus{
  color: #00B4CC;
}

.searchButton {
  width: 40px;
  height: 36px;
  border: 1px solid #00B4CC;
  background: #00B4CC;
  text-align: center;
  color: #fff;
  border-radius: 0 5px 5px 0;
  cursor: pointer;
  font-size: 20px;
}

/*Resize the wrap to see the search bar change!*/
.wrap{
  width: 30%;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
}
  .imgb{
    background-image: url(./assets/stock-photo-library-interior-design-with-massive-bookshelves-concrete-floor-and-city-view-d-rendering-404153935.jpg);
    background-size: cover;
    background-position: center;
    height: 100vh;
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
<?php
/*https://www.11zon.com/zon/php/how-to-edit-data-in-php-using-form.php*/
include "db.php"; // Using database connection file here

$id = $_GET['id']; // get id through query string

$qry = mysqli_query($db,"select * from test where id='$id'"); // select query

$data = mysqli_fetch_array($qry); // fetch data

if(isset($_POST['update'])) // when click on Update button
{
    $name = $_POST['name'];
    $Email = $_POST['Email'];
	
    $edit = mysqli_query($db,"update test set name='$name', Email='$Email' where id='$id'");
	
    if($edit)
    {
        mysqli_close($db); // Close connection
        header("location:view.php"); // redirects to all records page
        exit;
    }
    else
    {
        echo mysqli_error();
    }    	
}
?>

<h3>Update Data</h3>

<form method="POST">
  <input type="text" name="name" value="<?php echo $data['name'] ?>" placeholder="Enter Full Name" Required>
  <input type="text" name="Email" value="<?php echo $data['Email'] ?>" placeholder="Enter Email" Required>
  <input type="submit" name="update" value="Update">
</form>

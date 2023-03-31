

<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="style.css">
		<title>New API In Progress</title>
		
		<link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap Icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic" rel="stylesheet" type="text/css" />
        <!-- SimpleLightbox plugin CSS-->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://kit.fontawesome.com/b0a28fe022.js" crossorigin="anonymous"></script> 
		<style>
		body {
			background-image: url('back.jpg');
			background-size: 40% auto;
			background-repeat:repeat;
			height: 100vh;

		}
	</style>
	</head>


	<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Current Employees</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Shipper <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Driver</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Admin</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Engineer</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Dealership</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">User</a>
      </li>
      
      
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav> 
<div class="container mt-5">
    <form class="db-form" method="POST" action="index.php">
    <h3>New Employee Form</h3>
  <label for="first-name">First Name:</label>
  <input type="text" id="first-name" name="first-name" class="form-control"><br>

  <label for="last-name">Last Name:</label>
  <input type="text" id="last-name" name="last-name" class="form-control"><br>

  <label for="id">ID:</label>
  <input type="text" id="id" name="id" class="form-control"><br>

  <label for="city">City:</label>
  <input type="text" id="city" name="city" class="form-control"><br>

  <input type="submit" value="Submit" name="submit" class="btn btn-primary">
  
</form>
</div>




<?php
    $dns="mysql:host=localhost;dbname=ayrotest;port=3306;charset=utf8mb4";
    $pdo;
    try{
        $pdo = new PDO($dns, 'admin', 'password', []);
        
    }
    catch(PDOException $e){
        throw new PDOException($e->getMessage(), $e->getCode());
    }

    // $statement = $pdo->query("SELECT * FROM Employees");
    // $value = $statement->fetch();
    // echo $value['FirstName'];

    // Check for errors
    // if ($mysqli->connect_errno) {
    //     echo 'Failed to connect to database: ' . $mysqli->connect_error;
    //     exit();
    // }else{
    //     echo 'Connection SUCCESS';
    // }
    // Check if the form has been submitted
    $hostname = "localhost";
    $username = "admin";
    $password = "password";
    $db = "ayrotest";
    $dbconnect=mysqli_connect($hostname,$username,$password,$db);
    if ($dbconnect->connect_error) {
        echo "Database connection failed: " . $dbconnect->connect_error;
      }

    if (isset($_POST['submit'])) {


    $first=$_POST['first-name'];
    $last=$_POST['last-name'];
    $ID=$_POST['id'];
    $city=$_POST['city'];

    $query = "INSERT INTO Employees (FirstName, LastName, ID, City)
    VALUES ('$first', '$last', '$ID', '$city')";

if (!mysqli_query($dbconnect, $query)) {
    echo "<p style='color:red; text-align:center;'>THERE HAS BEEN AN ERROR</p>";

} else {
  echo "<p style='color:green; text-align:center;'>THANKS FOR YOUR SUBMISSION</p>";
}

      // Create a prepared statement to insert the form data into the table
    //   $stmt = $mysqli->prepare("INSERT INTO 'employees' (first_name, last_name, id) VALUES (?, ?, ?)");
    //   $stmt->bind_param("ssi", $first_name, $last_name, $id);
  
      // Execute the prepared statement and check for errors
      if ($stmt->execute()) {
          echo 'Data inserted successfully';
      } else {
          echo 'Error inserting data: ' . $stmt->error;
      }
  
      // Close the prepared statement
      $stmt->close();
  }
  
  
  // Close the database connection
  // $mysqli->close();
?>

 

	</body>

	<footer id="copyright">
          <p>Copyright &copy; 2023 | Erik Hernandez</p>
  </footer>
</html>

<?php
		//create connection
$connect = mysqli_connect("localhost","root","","appinfo");

//create a empty array variable
$output = array();

//get all data from database into a variable
$query = "SELECT * FROM lists";

//check condition
$result = mysqli_query($connect,$query);

//fetch all the datas into array
if (mysqli_num_rows($result) > 0) {
	# code...
	while ($row = mysqli_fetch_array($result)) 
	{
		# code...
		$output[] = $row;
	}
		//encode into json object
	echo json_encode($output);
}


?>
<?php
//connect to the database
$connect = mysqli_connect("localhost","root","","appinfo");

// Takes raw data from the request
$data = json_decode(file_get_contents("php://input"));

if (count(array($data)) > 0) {
	$receive_name = mysqli_real_escape_string($connect, $data->output_name);
	$receive_phone = mysqli_real_escape_string($connect, $data->output_phone);
	$receive_btnname = mysqli_real_escape_string($connect, $data->output_btnname);

	if ($receive_btnname == 'ADD') {
		# code...
	

				$query = "INSERT INTO lists(name, phone) VALUES ('$receive_name','$receive_phone')";

				if(mysqli_query($connect, $query)) {
					# code...
					echo "Data inserted successfully";
				}
				else {
					# code...
					echo "Error";
				}
								  }




if ($receive_btnname == 'update') {

				$receive_id = mysqli_real_escape_string($connect, $data->output_id);
		# code...
	
				$query = "UPDATE lists SET name= '$receive_name',phone= '$receive_phone' WHERE id = '$receive_id'";
				//$query = "INSERT INTO lists(name, phone) VALUES ('$receive_name','$receive_phone')";

				if(mysqli_query($connect, $query)) {
					# code...
					echo "Data updated successfully";
				}
				else {
					# code...
					echo "Error";
				}
								  }

							
							}

?>
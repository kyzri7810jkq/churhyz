<!DOCTYPE html>
<html>
<head>
	
	<title>Vehicle Parking Calculator</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

</head>
<body>

<div class="container"><br>

	<h1>Vehicle Parking Calculator</h1>
	
	<form class="form-horizonal" action="" method="post">
		<div class="form-group">

			<label for="plate">Plate:</label>
			<input type="text" name="plate" class="form-control" placeholder="#"><br>

			<label for="vehicle">Vehicle Type:</label>
			<select name="vehicle" class="form-control">
				<option></option>
				<option name="type" value="Car">Car</option>
				<option name="type" value="Motorbike">Motorbike</option>
				<option name="type" value="Bike">Bike</option>
				<option name="type" value="Truck">Truck</option>
				</select><br>

			
			<label for="timein">Time In:</label>
			<input type="number" name="timeinhr" placeholder="hrs">
			<input type="number" name="timeinmins" placeholder="mins"><br>

			<label for="timeout">Time Out:</label>
			<input type="number" name="timeouthr" placeholder="hrs">
			<input type="number" name="timeoutmins" placeholder="mins"><br>


			
		</div>
<br>
				<button class="btn btn-default" name="reset" type="reset">
				Reset</button>
				<button class="btn btn-default" name="submit" type="submit">Calculate</button>

		
	</form>
		
</div>

</body>
</html>

<?php

echo "<div class='container'>";


	if (isset($_POST['submit'])) {

		$plate = $_POST['plate'];
		$vehicle = $_POST['vehicle'];
		$ih = $_POST['timeinhr'];
		$im = $_POST['timeinmins'];
		$oh = $_POST['timeouthr'];
		$om = $_POST['timeoutmins'];

		//invalid hour 0-23 | In > Out

		if ($ih > $oh) {
			echo "invalid (in > out)";
		}

		elseif ($ih >= 24 || $oh >= 24) {
			echo "Invalid (hour > 24)";
		}

		elseif ($ih < 0 || $oh < 0) {
			echo "Invalid (hour < 0)";
		}

		//invalid mins 0-59
		elseif ($im >= 60 || $om >= 60) {
			echo "Invalid (mins > 60)";
		}

		elseif ($im < 0 || $om < 0) {
			echo "Invalid (mins > 0)";
		}

		//Display information
		else{
			echo "<h1>Parking Bill</h1>";
			echo "Plate: $plate <br>";
			echo "Vehicle Type: $vehicle <br>";
			echo "Time In: $ih : $im <br>";
			echo "Time Out: $oh : $om <br>";

		}

			//Convert minutes to an hour

			if ($im > $om) {
				$mins = 0;
			}

			elseif ($im < $om) {
				$mins = 1;
			} 

			elseif ($im == $om){
				$mins = 0;
			}
			
				$hours = $oh - $ih;

				$total = $hours + $mins;

				echo "Total Hours: $total hours <br>";

			// Car
			if ($vehicle == 'Car') {
				//3 hours = 30
				$fixed = 30;
				//first 3 hours
				$first = 3;
				//after 3 hours = 5/hr
				$after = 5;

					if ($total <= 3) {
					echo "Amount to be paid: $fixed <br>";
					}

					elseif ($total > 3) {
					$actual = $total - $first;
					$amount = $fixed + ($after * $actual);
					echo "Amount to be paid: $amount <br>";
					}
		
			}

			// Motorbike
			elseif ($vehicle == 'Motorbike') {
				//2 hours = 20
				$fixed = 20;
				// first 2 hours
				$first = 2;
				//after 2 hours = 5/hr
				$after = 5;

					if ($total <= 2) {
					echo "Amount to be paid: $fixed <br>";
					}

					elseif ($total > 2) {
					$actual = $total - $first;
					$amount = $fixed + ($after * $actual);
					echo "Amount to be paid: $amount <br>";
					}
			}

			// // Bike
			elseif ($vehicle == 'Bike') {
				//Fixed
				$fixed = 20;
				//first = 0
				$first =0;
				//after = 0
				$after = 0;
				echo "Amount to be paid: $fixed";
			}

			// //Truck
			elseif ($vehicle ='Truck') {
				//3 hours = 40
				$fixed = 40;
				// first 3 hours
				$first = 3;
				//after 3 hours = 10/hr
				$after = 10;	

					if ($total <= 3) {
					echo "Amount to be paid: $fixed <br>";
					}

					elseif ($total > 3) {
					$actual = $total - $first;
					$amount = $fixed + ($after * $actual);
					echo "Amount to be paid: $amount <br>";
					}
			}



	}


echo "</div>";

?>
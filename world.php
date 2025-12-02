<?php
$host = 'localhost';
$username = 'lab5_user';
$password = 'password123';
$dbname = 'world';

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);

$s_entry ='';
$c_entry ='';

$stateSet= isset($_GET['country']);
$citySet = isset($_GET['lookup']);

if($stateSet && !$citySet){
	$s_entry = $_GET['country'];
	$stmt = $conn->query("SELECT * FROM countries WHERE name LIKE '%". $s_entry . "%'");
	$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
	
	echo '<table>';
		echo '<thead>';
			echo '<tr>';
				echo '<th>Country Name</th>';
				echo '<th>Continent</th>';
				echo '<th>Independence Year</th>';
				echo '<th>Head of State</th>';
			echo '</tr>';
		echo '</thead>';
	echo '<tbody>';
	foreach ($results as $state){
		echo '<tr>';
		echo '<td>'.$state['name'].'</td>';
		echo '<td>'.$state['continent'].'</td>';
		echo'<td>'.$state['independence_year'].'</td>';
		echo'<td>'.$state['head_of_state'].'</td>';
		echo '</tr>';
	}
	echo'</tbody></table>';
}else if($citySet){
	$s_entry = $_GET['country'];
	$c_entry = $_GET['lookup'];
	$stmt = $conn->query("SELECT cities.name, cities.district, cities.population FROM cities JOIN countries ON countries.code = cities.country_code WHERE countries.name LIKE '%". $s_entry . "%'");
	$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
	echo '<table>';
		echo '<thead>';
			echo '<tr>';
				echo '<th>Name</th>';
				echo '<th>District</th>';
				echo '<th>Population</th>';
			echo '</tr>';
		echo '</thead>';
	echo '<tbody>';
	foreach($results as $city){
		echo '<tr>';
		echo '<td>'.$city['name'].'</td>';
		echo '<td>'.$city['district'].'</td>';
		echo '<td>'.$city['population'].'</td>';
		echo '</tr>';
}
	echo '</tbody></table>';
}




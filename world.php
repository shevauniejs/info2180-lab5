<?php
$host = 'localhost';
$username = 'lab5_user';
$password = 'password123';
$dbname = 'world';

$entry ='';
if(isset($_GET['country'])){
	$entry = $_GET['country'];
}


$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
$stmt = $conn->query("SELECT * FROM countries WHERE name LIKE '%". $entry . "%'");

$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>


<table>
	<thead>
		<tr>
			<th>Country Name</th>
			<th>Continent</th>
			<th>Independence Year</th>
			<th>Head of State</th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($results as $state): ?>
	<tr>
  		<td><?=$state['name'];?></td>
		<td><?=$state['continent'];?></td>
		<td><?=$state['independence_year'];?></td>
		<td><?=$state['head_of_state'];?></td>
	</tr>
<?php endforeach; ?>
	</tbody>
</table>

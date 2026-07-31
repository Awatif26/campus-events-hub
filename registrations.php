<?php
include "includes/header.php";

$file = fopen("data/registrations.csv", "r");
?>

<main>

<h1>Registrations List</h1>
<table>
<tr>
    <th>Name</th>
    <th>Student ID</th>
    <th>Email</th>
    <th>Event</th>
</tr>

<?php

fgetcsv($file);

while (($row = fgetcsv($file)) !== false) {
?>
<tr>
<td><?= htmlspecialchars($row[0]); ?></td>
<td><?= htmlspecialchars($row[1]); ?></td>
<td><?= htmlspecialchars($row[2]); ?></td>
<td><?= htmlspecialchars($row[3]); ?></td>
</tr>

<?php

}

fclose($file);

?>
</table>
</main>

<?php include "includes/footer.php"; ?>
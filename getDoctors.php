<?php
    include "connection.php";
    include "doctor.php";
    $doctor = new Doctor();
    $id = $_POST['id'];
    $doctor->getDoctor($id, $link);
    echo "<table align='center' class='table table-light table-striped'>";
    echo "<th>ID</th><th>Name</th><th>Email</th><th>Phone</th><th>Salaire</th>";
    echo "<tr><td>$doctor->id</td><td>$doctor->name</td><td>$doctor->email</td><td>$doctor->phone</td><td>$doctor->salaire</td></tr>";
    echo "</table>";
?>
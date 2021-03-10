<?php
    include "connection.php";
    include "doctor.php";
    $Doctor = new Doctor();
    $salaire = $_POST['salaire'];
    $operation = $_POST['operation'];
    $res = $Doctor->getDoctorSalaire($salaire, $operation, $link);
    echo "<table align='center' class='table table-light table-striped'>";
    echo "<th scope='col'>ID</th><th scope='col'>Name</th><th scope='col'>Email</th><th scope='col'>Phone</th><th scope='col'>Salaire</th>";
    if(mysqli_num_rows($res)>0){
        while($row = mysqli_fetch_row($res))
            echo "<tr><td scope='row'>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td><td>$row[4]</td></tr>";
    }
    else{
        echo "<tr><td align='center' colspan='5'>Pas de Doctors.</td></tr>";
    }
    echo "</table>";
?>
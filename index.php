<html>
    <head>
        <title>Doctors Management System</title>
        <!-- Bootstrap 5 library -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">    
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
        <script src="jquery.min.js"></script>
        <script>
            $(document).ready(function(){
                $("#doctors").change(function(){
                $("#tableDoctor").html('');
                $("#tableDoctor").empty().append("<h3>Loading data...</h3>");
                $.ajax({
                    url:'getDoctors.php',
                    type:'post',
                    data:{id:$(this).val()},
                    dataType: 'html',
                    success: function(result){
                        $("#tableDoctor").empty().append(result);
                    }
                });
                }); 
                $("#getSalaire").click(function(){
                $("#tableDoctor").html('');
                $("#tableDoctor").empty().append("<h3>Loading data...</h3>");
                var salaire = document.getElementById("salaire").value;
                var operation = document.getElementById("operation").value;
                $.ajax({
                    url:'getDoctorSalaire.php',
                    type:'post',
                    dataType: 'HTML',
                    data:{salaire:salaire,operation:operation},
                    success: function(result){
                        $("#tableDoctor").html(result);
                    }
                });
                });
            });
            </script>
            <style>
                body{
                    text-align: center;
                    background: rgb(18,196,210);
                    background: linear-gradient(90deg, rgba(18,196,210,1) 6%, rgba(168,9,241,1) 81%);
                    color: #fff;
                }
            </style>
    </head>
    <body>
        <div align="center" class="col-lg-12">
        <div class="col-lg-4"></div>
        <div class="col-lg-4">
            <h1 align="center">Doctors Management System</h1>
            <p>
                <br><h3>Doctors:</h3>
                <?php
                    include "connection.php";
                    include "doctor.php";
                    $doctor = new Doctor();
                    $res = $doctor->getDoctors($link);
                ?>
                <select class="form-select form-select-lg mb-4" id="doctors">
                    <?php
                        while($row = mysqli_fetch_row($res)){
                            echo "<option value='$row[0]'>$row[1]</option>";
                        }
                    ?>
                </select>
                <br><br>
                <h3>Ecrire un Salaire:</h3>
                <input class="form-control col-lg-4" type="number" id="salaire">
                <select class="form-select form-select-lg mb-4" id="operation">
                    <option value="1">Plus petit</option>
                    <option value="2">Egal</option>
                    <option value="3">Plus grand</option>
                </select>
                <input type="button" class="btn btn-danger col-lg-4" id="getSalaire" value="Get Doctors">
            </p>
            <br>
            <div id="tableDoctor">
                
            </div>
        </div>
        <div class="col-lg-4"></div>
        </div>
    </body>
</html>
<?php

$host = 'localhost';
$dbname = 't7aaju00';
$username = 't7aaju00';
$password = 'salasana';

$con = myslqi_connect($host, $username, $password, $dbname)

if (myslqi_connect_errno())
{
    echo "Failed to connect MySQL! Error: " . myslqi_connect_error(); 
}

$etunimi = mysqli_real_escape_string($con, $_POST['etunimi']);
$sukunimi = mysqli_real_escape_string($con, $_POST['sukunimi']);;
$opintojaksonKoodi = mysqli_real_escape_string($con, $_POST['ojkoodi']);
$arvosana = mysqli_real_escape_string($con, $_POST['arvosana']);

$sql = "CALL PROCEDURE UusiSuoritus('$etunimi', '$sukunimi', '$opintojaksonKoodi', '$arvosana')";

if (!mysqli_query($con, $sql))
{
    die('Error: ' . mysqli_error($con));
}
    
echo "Merkintä tietokantaan suoritettu onnistuneesti!";
echo "<br>";
echo "Palaa selaimen edellinen-painikkeella takaisin!";

mysqli_close($con);

?>
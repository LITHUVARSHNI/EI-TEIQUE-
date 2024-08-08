<?php
function dbconnection(){
    $con=mysqli_connect("localhost","root","root123","events");
    return $con;
}
?>
<?php
include('db_pets.php');

$pets = get_pets();

foreach ($pets as $key => $value) {
    echo "<tr>";
    echo "<td>".$value['nombre']."</td>";
    echo "<td>".$value['tipo']."</td>";
    echo "<td>".$value['raza']."</td>";
    echo "<td>".$value['edad']."</td>";
    echo "</tr>";
}
?>
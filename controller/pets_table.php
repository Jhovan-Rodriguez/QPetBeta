<?php
include('db_pets.php');

$pets = get_pets();

foreach ($pets as $key => $value) {
    echo "<tr>";
    echo "<td>".$value['nombre']."</td>";
    echo "<td>".$value['especie']."</td>";
    echo "<td>".$value['raza']."</td>";
    echo "<td>".$value['descripcion']."</td>";
    echo "</tr>";
}
?>
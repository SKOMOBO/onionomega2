<?php include "omega.php";

$a1 = (int)OmegaPHP.ReadI2C("0x28", "0x28");
$a2 = (int)OmegaPHP.ReadI2C("0x28", "0x28");
$a3 = (int)OmegaPHP.ReadI2C("0x28", "0x28");
$a4 = (int)OmegaPHP.ReadI2C("0x28", "0x28");

echo($a1 + $a2 + $a3 + $a4);
?>
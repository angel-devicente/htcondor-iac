<?php 
//
// simple php script to send allowed IP to cdb, not-allowed IP will get the "restricted area" message 
//
include("../includes/ipfilter.php"); 
//
if (!checkIP($ip)) { 
header("Location: ../ErrorMessages/restricted.php");  /* Redirige al mensaje */
/* Asegurarse de que no se ejecute el codigo adicional cuando se redireccione. */
exit;
} else {
header("Location: http://nectarino/");  /* Va a la Web de Chimera */
exit;
}
?>

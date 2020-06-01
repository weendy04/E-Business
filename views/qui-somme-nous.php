<?php ob_start() ?>
Nous sommes trois étudiantes:<br>
&emsp; &emsp; - Wendy Lisieri<br>
&emsp; &emsp; - Mehmet Cambaz<br>
&emsp; &emsp; - Tristan Tislair<br>
<br>
Nous avns réalisé ce site pour le cours de e-business


<?php	
$title = 'Qui sommes-nous?';
$content = ob_get_clean();
include 'includes/layout.php';
?>

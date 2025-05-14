<?php 
session_start();

if (!isset($_SESSION['crmid']) && !isset($_GET['name'])) {
		?>
		<script>
		alert('Please login First !!');
		window.open('../index.php','_self');
		</script>
		<?php
}


 ?>
<?php
if(isset($_SESSION['Summary'])){
  $mensaje= "../myaccount/summary.php";
}else{
  $mensaje= "..";
}
?>
<div class="container-fluid bg-light py-2">
  <p class="text-center text-1 text-muted mb-0">Copyright © <?php echo date("Y")?> <a href="<?=$mensaje?>">PayPal</a>. All Rights Reserved.</p>
</div>

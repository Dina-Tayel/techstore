

<?php if($session->sessionHas("success")): ?>
<div class="alert alert-success">   
     <?= $session->getSession("success"); ?>
</div>
<?php endif;$session->remove("success"); ?>
<?php 


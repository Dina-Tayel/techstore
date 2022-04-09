
<?php if($session->sessionHas("errors")): ?>
    <div class="alert alert-danger text-center">
            <?php  foreach($session->getSession("errors") as $error):?>
                <p class="mb-0"> <?= $error; ?></p>
            <?php endforeach;$session->remove("errors"); ?>
    </div>
<?php endif; ?>


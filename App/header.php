<?php if(Session::getInstanceSession()->getHasFlashes()): ?>
    <?php foreach(Session::getInstanceSession()->getHasFlashes() as $type => $message): ?>
      <div class="alert alert-<?= $type; ?>">
            <?= $message; ?>
      </div>
     <?php endforeach; ?>
<?php endif; ?>
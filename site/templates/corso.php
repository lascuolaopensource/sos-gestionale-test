<?php snippet('header'); ?>

<?php foreach( $page->costi_persone()->toStructure() as $budgetItem ): ?>
  <div class="mb-24">
    <?php snippet('lettera_incarico', ["budgetItem" => $budgetItem]) ?>
  </div>
<?php endforeach; ?>

<?php snippet('footer'); ?>

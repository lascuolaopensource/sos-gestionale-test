<?php snippet('header'); ?>

<div>
  <?php foreach( $page->costi_persone()->toStructure() as $budgetItem ): ?>
    <div class="my-16">
      <?php snippet('lettera_incarico', $budgetItem) ?>
    </div>
  <?php endforeach; ?>
</div>

<div class="">
  <?php snippet('corso_budget'); ?>
</div>

<?php snippet('footer'); ?>

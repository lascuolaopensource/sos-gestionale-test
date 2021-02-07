<?php

Kirby::plugin('bbtgnn/alfred-corso-budget', [
  'blueprints' => [
    'tabs/corso_budget' => __DIR__ . '/blueprints/tabs/corso_budget.yml',
  ],
  'snippets' => [
    'corso_budget' => __DIR__ . '/snippets/corso_budget.php'
  ]
]);
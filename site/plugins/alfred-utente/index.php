<?php

Kirby::plugin('bbtgnn/alfred-utente', [
  'blueprints' => [
    'pages/utenti' => __DIR__ . '/blueprints/utenti.yml',
    'pages/utente' => __DIR__ . '/blueprints/utente.yml',
  ],
]);
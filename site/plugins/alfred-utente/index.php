<?php

Kirby::plugin('bbtgnn/alfred-utente', [
  'blueprints' => [
    'pages/utenti' => __DIR__ . '/blueprints/pages/utenti.yml',
    'pages/utente' => __DIR__ . '/blueprints/pages/utente.yml',
    'fields/utente_select' => __DIR__ . '/blueprints/fields/utente_select.yml',
  ],
]);
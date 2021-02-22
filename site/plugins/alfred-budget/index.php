<?php

Kirby::plugin('bbtgnn/alfred-budget', [
  'blueprints' => [
    'tabs/budget' => __DIR__ . '/blueprints/tabs/budget.yml',
  ],
  'snippets' => [
    'lettera_incarico' => __DIR__ . '/snippets/lettera_incarico.php'
    // 'budget' => __DIR__ . '/snippets/budget.php',
  ]
]);

// Calculation

function calc_persona_pagamento( $budget_item ) {
  return $budget_item->ore()->toInt() * $budget_item->costo_orario()->toInt();
}

// function calc_persona_giornaliero( $budget_item, $costo_giornaliero ) {
//   return $budget_item->numero_giorni()->toInt() * $costo_giornaliero->costo()->toInt();
// }

// function calc_persona_giornalieri( $budget_item, $costi_giornalieri ) {
//   $totale = 0;
//   foreach( $costi_giornalieri as $costo_giornaliero ) {
//     $totale += calc_persona_giornaliero( $budget_item, $costo_giornaliero );
//   }
//   return $totale;
// }

// function calc_persona_totale( $budget_item, $costi_giornalieri) {
//   $totale = calc_persona_pagamento( $budget_item ) +
//             $budget_item->viaggio_andata()->toInt() +
//             $budget_item->viaggio_ritorno()->toInt() +
//             calc_persona_giornalieri( $budget_item, $costi_giornalieri );
//   return $totale;
// }

// Display helpers

// // Table number
// function tn( $cost_field, $symbol = "€" ) {
//   if ( $cost_field != 0 ) {
//     return $cost_field . " " . $symbol;
//   }
//   else {
//     return "";
//   }
// }
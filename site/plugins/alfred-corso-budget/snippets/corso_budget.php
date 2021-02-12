<h1 class="mb-10">Budget</h1>
<table class="table-auto">

  <!-- Intestazione -->
  <tr>
    <th class="text-indigo-900">Persona</th>
    <th class="text-indigo-900">Ruolo</th>
    <th class="text-indigo-900">Costo totale</th>
    <th class="text-indigo-900">Ore</th>
    <th class="text-indigo-900">Costo orario</th>
    <th class="text-indigo-900">Costo orario totale</th>
    <th class="text-indigo-900">Viaggio andata</th>
    <th class="text-indigo-900">Viaggio ritorno</th>
    <th class="text-indigo-900">Numero giorni</th>
    <!-- Adding costi giornalieri (Alloggio, pranzo, cena) -->
    <?php foreach( $page->costi_giornalieri()->toStructure() as $costo ): ?>
      <th class="text-indigo-900"><?= ucfirst($costo->voce()) . "<br>(" . $costo->costo() . "€)" ?></th>
    <?php endforeach; ?>
  </tr>

  <!-- Costi persone -->
  <?php foreach( $page->costi_persone()->toStructure() as $item ): ?>
    <tr>
      <?php
        // Getting persona and ruolo index
        $index = $item->persona()->toInt();
        // Getting ruoli field
        $ruoli = $page->ruoli()->toStructure();
        // Getting item
        $persona_ruolo = $ruoli->get($index);
        // Nome persona
        $persona = $persona_ruolo->persona()->toPage()->title();
        // Ruolo
        $ruolo = $persona_ruolo->ruolo();
      ?>
      <td class="table__cell bg-indigo-100 text-indigo-900 text-left"><?= $persona?></td>
      <td class="table__cell bg-indigo-100 text-indigo-900 text-left"><?= ucfirst($ruolo) ?></td>
      <td class="table__cell bg-indigo-500 text-indigo-100 text-right"><?= tn(calc_persona_totale($item, $page->costi_giornalieri()->toStructure())) ?></td>
      <td class="table__cell bg-indigo-200 text-indigo-900 text-right"><?= $item->ore()->toInt() ?></td>
      <td class="table__cell bg-indigo-200 text-indigo-900 text-right"><?= tn($item->costo_orario()->toInt()) ?></td>
      <td class="table__cell bg-indigo-300 text-indigo-900 text-right"><?= tn(calc_persona_pagamento($item)) ?></td>
      <td class="table__cell bg-indigo-300 text-indigo-900 text-right"><?= tn($item->viaggio_andata()->toInt()) ?></td>
      <td class="table__cell bg-indigo-300 text-indigo-900 text-right"><?= tn($item->viaggio_ritorno()->toInt()) ?></td>
      <td class="table__cell bg-indigo-200 text-indigo-900 text-right"><?= tn($item->numero_giorni()->toInt(), "") ?></td>
      <!-- Adding costi giornalieri (Alloggio, pranzo, cena) -->
      <?php foreach( $page->costi_giornalieri()->toStructure() as $costo ): ?>
        <td class="table__cell bg-indigo-300 text-right"><?= tn(calc_persona_giornaliero( $item, $costo )) ?></td>
      <?php endforeach; ?>
    </tr>
  <?php endforeach ?>
</table>
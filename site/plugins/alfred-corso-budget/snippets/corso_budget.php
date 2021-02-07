<h1>Budget</h1>
<table>

  <!-- Intestazione -->
  <tr>
    <td>Persona</td>
    <td>Ore</td>
    <td>Costo orario</td>
    <td>Viaggio andata</td>
    <td>Viaggio ritorno</td>
    <td>Numero giorni</td>
  </tr>

  <!-- Costi persone -->
  <?php foreach( $page->costi_persone()->toStructure() as $item ): ?>
    <tr>
      <td><?= $item->persona() ?></td>
      <td><?= $item->ore() ?></td>
      <td><?= $item->costo_orario() ?> €</td>
      <td><?= $item->viaggio_andata() ?> €</td>
      <td><?= $item->viaggio_ritorno() ?> €</td>
      <td><?= $item->numero_giorni() ?></td>
    </tr>
  <?php endforeach ?>
</table>
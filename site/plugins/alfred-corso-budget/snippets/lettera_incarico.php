<?php
  // Getting persona and ruolo index
  $index = $item->persona()->toInt();
  // Getting ruoli field
  $ruoli = $page->ruoli()->toStructure();
  // Getting item
  $persona_ruolo = $ruoli->get($index);
  // Ruolo
  $ruolo = $persona_ruolo->ruolo();
  // Persona
  $persona = $persona_ruolo->persona()->toPage();
  // Socio
  $socio = $persona->socio()->toBool();
?>
<p><?= $persona . " " . $ruolo ?></p>

<h1>LETTERA DI INCARICO<h1>
<p>Con la seguente scrittura privata, valevole ad ogni effetto di legge:</p>

<h2>TRA</h2>
<p>
  LA SCUOLA OPEN SOURCE Soc. Coop. con sede legale in BARI alla via CARDASSI n.49, CAP 70121, C.F./P.I. 07880210724, E-Mail amministrazione@lascuolaopensource.xyz, PEC SOS@MYPEC.EU, in persona del legale rappresentante Sig. ALESSANDRO BALENA nato a BARI il 21/02/1986, domiciliato per la carica presso la Società;
</p>

<h2>E<?= r($socio, " IL SOCIO")?></h2>

<p>
  <span class="lettera__field"><?= $persona->title() ?></span>
  nato a <span class="lettera__field"><?= $persona->nascita_comune() . " (" . $persona->nascita_provincia() . ")" ?></span>
  il <span class="lettera__field"><?= $persona->nascita_data()->toDate('d/m/Y') ?></span>
  e residente in <span class="lettera__field"><?= $persona->residenza_comune() . " (" . $persona->residenza_provincia() . ")"?></span>
  alla via <span class="lettera__field"><?= $persona->residenza_via() ?></span>
  n. <span class="lettera__field"><?= $persona->residenza_numero() ?></span>,
  codice fiscale <span class="lettera__field"><?= $persona->cf() ?></span>,
  p. IVA <span class="lettera__field"><?= $persona->piva() ?></span>,
  email <span class="lettera__field"><?= $persona->email() ?></span>,
  PEC <span class="lettera__field"><?= $persona->pec() ?></span>
</p>

<h2>PREMESSO</h2>

<ul class="list-disc ml-5">
  <li>
    Che la società LA SCUOLA OPEN SOURCE Soc. Coop. (di seguito “SOS”) è un soggetto che svolge attività di formazione e ricerca nel settore della innovazione sociale e tecnologica.
  </li>

  <li>
    Che la SOS ha, fra gli altri, come scopo sociale “la creazione e gestione di una comunità (fisica e digitale) di persone interessate ai temi dell’innovazione sociale e tecnologica e ai valori dell’open source”;
  </li>

  <li>
    Che al fine di perseguire lo scopo sociale di cui sopra, è stato organizzato un corso didattico denominato <span class="lettera__field"></span>
  </li>
</ul>
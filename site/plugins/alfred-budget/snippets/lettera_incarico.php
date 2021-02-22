<?php
	// Getting persona and ruolo index
	$index = $budgetItem->persona()->toInt();
	// Getting ruoli field
	$ruoli = $page->ruoli()->toStructure();
	// Getting budgetItem
	$persona_ruolo = $ruoli->get($index);
	// Ruolo
	$ruolo = ucfirst($persona_ruolo->ruolo());
	$ruolo_attivita = $persona_ruolo->attivita();
	// Persona
	$persona = $persona_ruolo->persona()->toPage();
	// Socio
	$socio = $persona->socio()->toBool();

	// Corso / Laboratorio
	$attivita = "Corso";

	// Date corso
	$data_formato = "d/m/Y";
	$data_inizio_f = $page->date_orari()->toStructure()->first()->data();
	$data_inizio = $data_inizio_f->toDate($data_formato);
	$data_fine_f = $page->date_orari()->toStructure()->last()->data();
	$data_fine = $data_fine_f->toDate($data_formato);
	// Sono diverse le date?
	$date_different = $data_inizio != $data_fine;

	// Giorno prima dell'inizio
	$data_inizio_prima = date( $data_formato, strtotime( $data_inizio_f->toDate('y-m-d') . ' -1 day' ) );
	$data_fine_dopo    = date( $data_formato, strtotime( $data_fine_f->toDate('y-m-d') . ' +1 day' ) );

	// Pagamento
	$pagamento = calc_persona_pagamento( $budgetItem )
?>
<div class="lettera">

	<h1>LETTERA DI INCARICO<h1>
	<p>Con la seguente scrittura privata, valevole ad ogni effetto di legge:</p>

	<h2>TRA</h2>
	<p>
		LA SCUOLA OPEN SOURCE Soc. Coop. con sede legale in BARI alla via CARDASSI n.49, CAP 70121, C.F./P.I. 07880210724, E-Mail amministrazione@lascuolaopensource.xyz, PEC SOS@MYPEC.EU, in persona del legale rappresentante Sig. ALESSANDRO BALENA nato a BARI il 21/02/1986, domiciliato per la carica presso la Società;
	</p>

	<h2>E<?= r($socio, " IL SOCIO")?></h2>

	<p>
		<span class="lettera__field"><?= $persona->title() ?></span>
		nato a&nbsp;<span class="lettera__field"><?= $persona->nascita_comune() . " (" . $persona->nascita_provincia() . ")" ?></span>
		il&nbsp;<span class="lettera__field"><?= $persona->nascita_data()->toDate('d/m/Y') ?></span>
		e residente in&nbsp;<span class="lettera__field"><?= $persona->residenza_comune() . " (" . $persona->residenza_provincia() . ")"?></span>
		alla via&nbsp;<span class="lettera__field"><?= $persona->residenza_via() ?></span>
		n.&nbsp;<span class="lettera__field"><?= $persona->residenza_numero() ?></span>,
		codice fiscale&nbsp;<span class="lettera__field"><?= $persona->cf() ?></span>,
		p. IVA&nbsp;<span class="lettera__field"><?= $persona->piva() ?></span>,
		email&nbsp;<span class="lettera__field"><?= $persona->email() ?></span>,
		PEC&nbsp;<span class="lettera__field"><?= $persona->pec() ?></span>
	</p>

	<h2>PREMESSO</h2>

	<ul class="list-disc ml-10">
		<li>
			Che la società LA SCUOLA OPEN SOURCE Soc. Coop. (di seguito “SOS”) è un soggetto che svolge attività di formazione e ricerca nel settore della innovazione sociale e tecnologica.
		</li>

		<li>
			Che la SOS ha, fra gli altri, come scopo sociale “la creazione e gestione di una comunità (fisica e digitale) di persone interessate ai temi dell’innovazione sociale e tecnologica e ai valori dell’open source”;
		</li>

		<li>
			Che al fine di perseguire lo scopo sociale di cui sopra, è stato organizzato un <?= $attivita ?> didattico denominato&nbsp;<span class="lettera__field"><?= $page->title() ?></span> (di seguito "<?= $attivita ?>") nel seguente
			<?php if( $date_different ): ?>
				periodo <span class="lettera__field"><?= $data_inizio ?> – <?= $data_fine ?></span>
			<?php else: ?>
				giorno <span class="lettera__field"><?= $data_inizio ?></span>
			<?php endif; ?>
			per un totale di <span class="lettera__field"><?= $budgetItem->ore()->toInt() ?></span> ore;
		</li>

		<li>
			Che la SOS per propria politica di società cooperativa intende favorire il coinvolgimento dei soggetti con i quali è in essere un rapporto societario
			<?php if( $socio ): ?>
				ha verificato che al proprio interno non vi sono competenze qualificate per lo svolgimento delle attività;
			<?php else: ?>
				verificando pertanto prima di tutto al proprio interno che vi siano competenze qualificate per lo svolgimento delle attività;
			<?php endif; ?>
		</li>

		<li>
			Che, al fine di realizzare il suddetto <span class="lettera__field"><?= $attivita ?></span>, la SOS riconosce la competenza e la professionalità
			<?php if( $socio ): ?>
				del socio
			<?php else: ?>
				di <span class="lettera__field"><?= $persona->title() ?></span>
			<?php endif; ?>
			per poter svolgere l’incarico;
		</li>

		<li>
			Che <?= r($socio, " il socio")?> <span class="lettera__field"><?= $persona->title() ?></span> (di seguito "<span class="lettera__field"><?= $ruolo ?></span>"), condividendo le finalità societarie da perseguire, intende offrire la sua collaborazione e approva la formula adottata del <span class="lettera__field"><?= $attivita ?></span> da parte della SOS e si rende disponibile per la/e data/e/periodo prevista/e/o;
		</li>

	</ul>

	<h2>SI CONVIENE E SI STIPULA QUANTO SEGUE:</h2>

	<ol class="list-decimal ml-10">

		<li>
			Quanto premesso è parte integrante e sostanziale del presente accordo;
		</li>

		<li>
			Il <span class="lettera__field"><?= strtoupper($ruolo) ?></span> accetta di prestare la propria opera a favore della SOS, occupandosi, in particolare della attività di: <span class="lettera__field"><?= strtoupper($ruolo_attivita) ?></span>. Tale attività è funzionale o comunque connessa alla realizzazione dello scopo sociale di cui alle premesse;
		</li>

		<li>
			la prestazione indicata al punto 2 verrà resa personalmente dal <span class="lettera__field"><?= strtoupper($ruolo) ?></span> a fronte di una remunerazione diretta, ovvero con un compenso omnicomprensivo/lordo per l’attività resa, pari ad Euro <span class="lettera__field"><?= number_format ( $pagamento , 2 , ",", "") ?></span> da corrispondere a mezzo bonifico bancario a seguito dell’invio di regolare fattura o ricevuta, al conto corrente intestato a <span class="lettera__field"> </span> IBAN <span class="lettera__field"> </span>
		</li>

		<li>
			la SOS si impegna a valutare di sostenere eventuali costi di vitto e alloggio;
		</li>

		<li>
			l’attività del <span class="lettera__field"><?= strtoupper($ruolo) ?></span> si svolgerà in presenza/remoto e secondo le modalità determinate dalle parti in via paritaria e la SOS si impegna a fornire direttamente o indirettamente al <span class="lettera__field"><?= strtoupper($ruolo) ?></span> un supporto di affiancamento logistico e coordinamento didattico;
		</li>

		<li>
			la prestazione promessa dal DOCENTE sarà eseguita a partire dal <span class="lettera__field"><?= $data_inizio_prima ?></span> e fino massimo al <span class="lettera__field"><?= $data_fine_dopo ?></span>, data entro la quale si impegna a consegnare alla SOS il report finale del <span class="lettera__field"><?= $attivita ?></span>;
		</li>

		<li>
			il <span class="lettera__field"><?= strtoupper($ruolo) ?></span> rilascia con la presente la liberatoria per l'eventuale utilizzo di riprese e immagini inerenti al suddetto <span class="lettera__field"><?= $attivita ?></span>;
		</li>

		<li>
			il <span class="lettera__field"><?= strtoupper($ruolo) ?></span> concede nella formula “Open Source” ogni elaborato concettuale o materiale che sarà prodotto o condiviso o in generale reso durante il periodo dell’incarico;
		</li>

		<li>
			l’incarico è a titolo oneroso, si intende prestato occasionalmente e sporadicamente e sarà amministrativamente contabilizzato secondo le normative vigenti in materia;
		</li>

		<li>
			ciascuna delle parti del presente contratto potrà liberamente recedere dal rapporto professionale, anche senza giustificazione, con un adeguato preavviso di almeno 5 giorni, mediante comunicazione scritta con ricevimento dimostrabile;
		</li>

		<li>
			la SOS avrà quale obbligo quello di inserire il <span class="lettera__field"><?= strtoupper($ruolo) ?></span> all’interno degli eventuali locali o degli spazi ove deve essere svolta l’incarico, fornendo allo stesso ogni strumentazione ed assistenza utile allo scopo e garantendo altresì la sicurezza sul luogo di lavoro e ogni altra forma di protezione richiesta ai sensi del d.lgs. 81/2008 e successive modifiche;
		</li>

		<li>
			il <span class="lettera__field"><?= strtoupper($ruolo) ?></span> si impegna a prestare la propria opera con diligenza, buona fede e correttezza, prendendo atto dell’importanza dell’impegno assunto;
		</li>

		<li>
			tutte le controversie derivanti dal presente accordo o in relazione allo stesso, comprese quelle relative alla sua validità, interpretazione, esecuzione e risoluzione, saranno sottoposte ad un preliminare tentativo di mediazione presso le sedi che congiuntamente le parti riterranno più opportune. Qualora la mediazione abbia esito negativo, le parti pattuiscono di deferire le medesime controversie presso il Tribunale di Bari. Per ogni altra circostanza, non espressamente ricompresa nella presente scrittura privata, si intendono qui richiamate e trascritte le norme del codice civile in quanto compatibili.
		</li>

	</ol>

	<p>Bari, il&nbsp;<span class="lettera__field"> </span></p>

	<p>Letto, confermato e sottoscritto.</p>

	<p>Il <?= strtoupper($ruolo) ?></p>
	<span class="lettera__field"> </span>

	<p>La SOS</p>
	<span class="lettera__field"> </span>

	<p>
		Si approvano specificamente ai sensi e per gli effetti di cui agli artt. 1341 comma 2 c.c. le seguenti clausole: 13 (tentativo di mediazione e arbitrato irrituale secondo equità).
	</p>

	<p>Il <?= strtoupper($ruolo) ?></p>
	<span class="lettera__field"> </span>

	<p>La SOS</p>
	<span class="lettera__field"> </span>

</div>
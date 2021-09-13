<?php 
    session_start(); 
    require_once("dbcontroller.php");
    $db_handle = new DBController();
    if (!isset($_SESSION['username']) || $_SESSION['role']!="admin") {
        header("location:index.php");
    }

    $nume = "";
	$prenume = "";


	$query = "SELECT * FROM clientign WHERE id >0 "; 
	$result = $db_handle->runQuery($query);
	$numeAgent = "Asteapta Date";
	$pmian=0;
	$pmfeb = 0;
	$pmmar = 0;
	$pmapr = 0;
	$pmmai = 0;
	$pmiun = 0;
	$pmiul = 0;
	$pmaug = 0;
	$pmsep = 0;
	$pmoct = 0;
	$pmnoi = 0;
	$pmdec = 0;
	
	$expirat = "";
	$luna="";

	if(!empty($_POST["submit"])){


		$contor1 = 0;
		$contor2 = 0;
		$contor3 = 0;
		$contor4 = 0;
		$contor5 = 0;
		$contor6 = 0;
		$contor7 = 0;
		$contor8 = 0;
		$contor9 = 0;
		$contor10 = 0;
		$contor11 = 0;
		$contor12 = 0;
		$sumaPretIan = 0;
		$sumaPretFeb = 0;
		$sumaPretMar = 0;
		$sumaPretApr = 0;
		$sumaPretMai = 0;
		$sumaPretIun = 0;
		$sumaPretIul = 0;
		$sumaPretAug = 0;
		$sumaPretSep = 0;
		$sumaPretOct = 0;
		$sumaPretNoi = 0;
		$sumaPretDec = 0;
		
		if(!empty($result)) {
			foreach($result as $k=>$v) {
				if(is_numeric($k)) {
					if(($result[$k]["status_client"] == "Activ")) {
						$numeAgent = $_POST["nume_agent"];
						
						if((string)$result[$k]["agent_nova"] == (string)$numeAgent) {				
							if((!empty($result[$k]["pret_ianuarie20"]) || !($result[$k]["pret_ianuarie20"] == 0)) && (!empty($result[$k]["consum_estimatian21"]) || !($result[$k]["consum_estimatian21"] == 0))) {			
								
								(float)$sumaPretIan = (float)$sumaPretIan + ((float)$result[$k]["pret_ianuarie20"] * (float)$result[$k]["consum_estimatian21"]);	
								(float)$contor1 = (float)$contor1 + (float)$result[$k]["consum_estimatian21"];	
							} else {(float)$sumaPretIan1 = 0;}

							if((!empty($result[$k]["pret_februarie20"]) || !($result[$k]["pret_februarie20"] == 0)) && (!empty($result[$k]["consum_estimatfeb21"]) || !($result[$k]["consum_estimatfeb21"] == 0))) {
								(float)$sumaPretFeb = (float)$sumaPretFeb + ((float)$result[$k]["pret_februarie20"] * (float)$result[$k]["consum_estimatfeb21"]) ;
								(float)$contor2 = (float)$contor2 + (float)$result[$k]["consum_estimatfeb21"];
							} else {(float)$sumaPretFeb1 = 0;}

							if((!empty($result[$k]["pret_martie20"]) || !($result[$k]["pret_martie20"] == 0)) && (!empty($result[$k]["consum_estimatmar21"]) || !($result[$k]["consum_estimatmar21"] == 0))) {
								(float)$sumaPretMar = (float)$sumaPretMar + ((float)$result[$k]["pret_martie20"] * (float)$result[$k]["consum_estimatmar21"]) ;
								(float)$contor3 = (float)$contor3 + (float)$result[$k]["consum_estimatmar21"];
							} else {(float)$sumaPretMar1 = 0;}

							if((!empty($result[$k]["pret_aprilie20"]) || !($result[$k]["pret_aprilie20"] == 0)) && (!empty($result[$k]["consum_estimatapr21"]) || !($result[$k]["consum_estimatapr21"] == 0))) {
								(float)$sumaPretApr = (float)$sumaPretApr + ((float)$result[$k]["pret_aprilie20"] * (float)$result[$k]["consum_estimatapr21"]) ;
								(float)$contor4 = (float)$contor4 + (float)$result[$k]["consum_estimatapr21"];
							} else {(float)$sumaPretApr1 = 0;}

							if((!empty($result[$k]["pret_mai20"]) || !($result[$k]["pret_mai20"] == 0)) && (!empty($result[$k]["consum_estimatmai21"]) || !($result[$k]["consum_estimatmai21"] == 0))) {
								(float)$sumaPretMai = (float)$sumaPretMai + ((float)$result[$k]["pret_mai20"] * (float)$result[$k]["consum_estimatmai21"]) ;
								(float)$contor5 = (float)$contor5 + (float)$result[$k]["consum_estimatmai21"];
							} else {(float)$sumaPretMai1 = 0;}

							if((!empty($result[$k]["pret_iunie20"]) || !($result[$k]["pret_iunie20"] == 0)) && (!empty($result[$k]["consum_estimatiun21"]) || !($result[$k]["consum_estimatiun21"] == 0))) {
								(float)$sumaPretIun = (float)$sumaPretIun + ((float)$result[$k]["pret_iunie20"] * (float)$result[$k]["consum_estimatiun21"]) ;
								(float)$contor6 = (float)$contor6 + (float)$result[$k]["consum_estimatiun21"];
							} else {(float)$sumaPretIun1 = 0;} 

							if((!empty($result[$k]["pret_iulie20"]) || !($result[$k]["pret_iulie20"] == 0)) && (!empty($result[$k]["consum_estimatiul21"]) || !($result[$k]["consum_estimatiul21"] == 0))) {
								(float)$sumaPretIul = (float)$sumaPretIul + ((float)$result[$k]["pret_iulie20"] * (float)$result[$k]["consum_estimatiul21"]) ;
								(float)$contor7 = (float)$contor7 + (float)$result[$k]["consum_estimatiul21"];
							} else {(float)$sumaPretIul1 = 0;}

							if((!empty($result[$k]["pret_august20"]) || !($result[$k]["pret_august20"] == 0)) && (!empty($result[$k]["consum_estimataug21"]) || !($result[$k]["consum_estimataug21"] == 0))) {
								(float)$sumaPretAug = (float)$sumaPretAug + ((float)$result[$k]["pret_august20"] * (float)$result[$k]["consum_estimataug21"]) ;
								(float)$contor8 = (float)$contor8 + (float)$result[$k]["consum_estimataug21"];
							} else {(float)$sumaPretAug1 = 0;}

							if((!empty($result[$k]["pret_septembrie20"]) || !($result[$k]["pret_septembrie20"] == 0)) && (!empty($result[$k]["consum_estimatsep21"]) || !($result[$k]["consum_estimatsep21"] == 0))) {
								(float)$sumaPretSep = (float)$sumaPretSep + ((float)$result[$k]["pret_septembrie20"] * (float)$result[$k]["consum_estimatsep21"]) ;
								(float)$contor9 = (float)$contor9 + (float)$result[$k]["consum_estimatsep21"];
							} else {(float)$sumaPretSep1 = 0;}

							if((!empty($result[$k]["pret_octombrie20"]) || !($result[$k]["pret_octombrie20"] == 0)) && (!empty($result[$k]["consum_estimatoct21"]) || !($result[$k]["consum_estimatoct21"] == 0)))  {
								(float)$sumaPretOct = (float)$sumaPretOct + ((float)$result[$k]["pret_octombrie20"] * (float)$result[$k]["consum_estimatoct21"]) ;
								(float)$contor10 = (float)$contor10 + (float)$result[$k]["consum_estimatoct21"];
							} else {(float)$sumaPretOct1 = 0;}

							if((!empty($result[$k]["pret_noiembrie20"]) || !($result[$k]["pret_noiembrie20"] == 0)) && (!empty($result[$k]["consum_estimatnoi21"]) || !($result[$k]["consum_estimatnoi21"] == 0))) {
								(float)$sumaPretNoi = (float)$sumaPretNoi + ((float)$result[$k]["pret_noiembrie20"] * (float)$result[$k]["consum_estimatnoi21"]) ;
								(float)$contor11 = (float)$contor11 + (float)$result[$k]["consum_estimatnoi21"];
							} else {$sumaPretNoi1 = 0;}
							if((!empty($result[$k]["pret_decembrie20"]) || !($result[$k]["pret_decembrie20"] == 0)) && (!empty($result[$k]["consum_estimatdec21"]) || !($result[$k]["consum_estimatdec21"] == 0)))  {
								(float)$sumaPretDec = (float)$sumaPretDec + ((float)$result[$k]["pret_decembrie20"] * (float)$result[$k]["consum_estimatdec21"]) ;
								(float)$contor12 = (float)$contor12 + (float)$result[$k]["consum_estimatdec21"];
							} else {(float)$sumaPretDec1 = 0;}
						}
					} 
				} 
			} 
			if ($sumaPretIan <=1) { $pmian = 0; } else { $pmian = $sumaPretIan / $contor1; }
			if ($sumaPretFeb <=1) { $pmfeb = 0; } else { $pmfeb = $sumaPretFeb / $contor2; }
			if ($sumaPretMar <=1) { $pmmar = 0; } else { $pmmar = $sumaPretMar / $contor3; }
			if ($sumaPretApr <=1) { $pmapr = 0; } else { $pmapr = $sumaPretApr / $contor4; }
			if ($sumaPretMai <=1) { $pmmai = 0; } else { $pmmai = $sumaPretMai / $contor5; }
			if ($sumaPretIun <=1) { $pmiun = 0; } else { $pmiun = $sumaPretIun / $contor6; }
			if ($sumaPretIul <=1) { $pmiul = 0; } else { $pmiul = $sumaPretIul / $contor7; }
			if ($sumaPretAug <=1) { $pmaug = 0; } else { $pmaug = $sumaPretAug / $contor8; }
			if ($sumaPretSep <=1) { $pmsep = 0; } else { $pmsep = $sumaPretSep / $contor9; }
			if ($sumaPretOct <=1) { $pmoct = 0; } else { $pmoct = $sumaPretOct / $contor10; }
			if ($sumaPretNoi <=1) { $pmnoi = 0; } else { $pmnoi = $sumaPretNoi / $contor11; }
			if ($sumaPretDec <=1) { $pmdec = 0; } else { $pmdec = $sumaPretDec / $contor12; }
			
		}
		$sumaPretIan = 0 ;
		$sumaPretFeb = 0;
		$sumaPretMar = 0;
		$sumaPretApr = 0;
		$sumaPretMai = 0;
		$sumaPretIun = 0;
		$sumaPretIul = 0;
		$sumaPretAug = 0;
		$sumaPretSep = 0;
		$sumaPretOct = 0;
		$sumaPretNoi = 0;
		$sumaPretDec = 0;
		$contor1 = 0;
		$contor2 = 0;
		$contor3 = 0;
		$contor4 = 0;
		$contor5 = 0;
		$contor6 = 0;
		$contor7 = 0;
		$contor8 = 0;
		$contor9 = 0;
		$contor10 = 0;
		$contor11 = 0;
		$contor12 = 0;
	}
	?>
	

<?php include "header.php" ?>
<body>
<div class='dashboard'>
<div class="dashboard-nav">
        <header>
			<a href="" class="brand-logo"><span>Nova Power&Gas</span></a>
		</header>
		<nav class="dashboard-nav-list">
			<a href="admin.php" class="dashboard-nav-item">Panou principal</a>
			<a href="adauga_client.php" class="dashboard-nav-item ">Adauga client dual</a>
			<a href="adauga_clientEE.php" class="dashboard-nav-item">Adauga client EE</a>
			<a href="adauga_clientGN.php" class="dashboard-nav-item">Adauga client GN</a>
			<a href="veziee.php" class="dashboard-nav-item">Vezi clienti EE</a>
			<a href="vezign.php" class="dashboard-nav-item">Vezi clienti GN</a>
			<a href="profitagenti.php" class="dashboard-nav-item">Profit agenti EE</a>
			<a href="profitagentiGN.php" class="dashboard-nav-item active">Profit agenti GN</a>
          	<div class="nav-item-divider"></div>
         	<a href="logout.php" class="dashboard-nav-item"><i class="fas fa-sign-out-alt"></i> Logout </a>
        </nav>
    </div>
    <div class='dashboard-app'>
        <div class='dashboard-content'>
            <div class='container'>
                <div class='card'>
                    <div class='card-header'>
                        <h1>Profitabilitate / Agent Gaze Naturale</h1>
                    </div>
                    <div class='card-body'>                    
						<form name="" method="post" action="profitagentign.php">
						<div class="">
						<span>Agent</span>
									<select name="nume_agent" class="custom-select">
										<option selected>Alege</option>
										<option value="Dan Gornescu">Dan Gornescu</option>
										<option value="Nicoleta Vlaicu">Nicoleta Vlaicu</option>
										<option value="Dorina Tanase">Dorina Tanase</option>
										<option value="Ovidiu Ligotchi">Ovidiu Ligotchi</option>
										<option value="Marcel Oanta">Marcel Oanta</option>
										<option value="Georgiana Faurica">Georgiana Faurica</option>
										<option value="Elena Caratas">Elena Caratas</option>
										<option value="Tiberiu Ciobanu">Tiberiu Ciobanu</option>
										<option value="Albert Cainasimir">Albert Cainasimir</option>
										<option value="Catalin Dan Ioana">Catalin Dan Ioana</option>
										<option value="Ruxandra Avramita">Ruxandra Avramita</option>
										<option value="VIVO">VIVO</option>
										<option value="BRM EE">BRM EE</option>
										<option value="VIVO">VIVO</option>
									</select>
									<input type="submit" name="submit" class="btn btn-danger mb-1" value="Vezi" onclick='arataTabel();'/>
						</div>						
						<table class="table" id="afisazaTabel">
										<thead>
											<tr>
												<th scope="col"><strong>Nume</strong></th>          
												<th scope="col"><strong>Ianuarie</strong></th>
												<th scope="col"><strong>Februarie</strong></th>
												<th scope="col"><strong>Martie</strong></th>
												<th scope="col"><strong>Aprilie</strong></th>
												<th scope="col"><strong>Mai</strong></th>
												<th scope="col"><strong>Iunie</strong></th>
												<th scope="col"><strong>Iulie</strong></th>
												<th scope="col"><strong>August</strong></th>
												<th scope="col"><strong>Septembrie</strong></th>
												<th scope="col"><strong>Octombrie</strong></th>
												<th scope="col"><strong>Noiembrie</strong></th>
												<th scope="col"><strong>Decembrie</strong></th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td><?php echo $numeAgent; ?></td>
												<td><?php echo number_format($pmian, 2, '.',''); ?></td>
												<td><?php echo number_format($pmfeb, 2, '.',''); ?></td>
												<td><?php echo number_format($pmmar, 2, '.',''); ?></td>
												<td><?php echo number_format($pmapr, 2, '.',''); ?></td>
												<td><?php echo number_format($pmmai, 2, '.',''); ?></td>
												<td><?php echo number_format($pmiun, 2, '.',''); ?></td>
												<td><?php echo number_format($pmiul, 2, '.',''); ?></td>
												<td><?php echo number_format($pmaug, 2, '.',''); ?></td>
												<td><?php echo number_format($pmsep, 2, '.',''); ?></td>
												<td><?php echo number_format($pmoct, 2, '.',''); ?></td>
												<td><?php echo number_format($pmnoi, 2, '.',''); ?></td>
												<td><?php echo number_format($pmdec, 2, '.',''); ?></td>
											</tr>
										<tbody>
											
											<?php
												if(isset($result["perpage"])) {
											?>
											<?php echo $result["perpage"]; ?>			
											<?php } ?>			
						</table>
						</form>	
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


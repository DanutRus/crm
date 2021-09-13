<?php
session_start(); 
require_once("dbcontroller.php");
$db_handle = new DBController();
if (!isset($_SESSION['username'])) {
	header("location:index.php");
}
if(!empty($_POST["submit"])) {
    $query = "INSERT INTO clientienergie(denumire_client, tip_client, status_client, distributie, niveltensiune, agent_nova, email_agent, judet, nr_contract, data_semnare, data_intrare_ct, data_finalizare_ct, persoana_contact_companie, email_contact, telefon_contact, administrator_companie, localitate, strada_comuna, numar, cod_postal, consum_estimatian21, consum_estimatfeb21, consum_estimatmar21, consum_estimatapr21, consum_estimatmai21, consum_estimatiun21, consum_estimatiul21, consum_estimataug21, consum_estimatsep21, consum_estimatoct21, consum_estimatnoi21, consum_estimatdec21, nr_aa, tip_pret, data_garantare, pret_ianuarie20, pret_februarie20, pret_martie20, pret_aprilie20, pret_mai20, pret_iunie20, pret_iulie20, pret_august20, pret_septembrie20, pret_octombrie20, pret_noiembrie20, pret_decembrie20, clauza_penalitati_rez, cuantum_penalizare, clauza_pzu, clauza_circumstante, putere_instalata, termen_plata, observatii, reg_comert, cui, iban_cont, banca_cont) 
	VALUES('".$_POST["denumire_client"]."','".$_POST["tip_client"]."','".$_POST["status_client"]."','".$_POST["distributie"]."','".$_POST["nivel_tensiune"]."','".$_POST["agent_nova"]."','".$_POST["email_agent"]."','".$_POST["judet"]."','".$_POST["nr_contract"]."','".$_POST["data_semnare"]."','".$_POST["data_intrare_ct"]."','".$_POST["data_finalizare_ct"]."','".$_POST["persoana_contact_companie"]."','".$_POST["email_contact"]."','".$_POST["telefon_contact"]."','".$_POST["administrator_companie"]."','".$_POST['localitate']."','".$_POST["strada_comuna"]."','".$_POST["numar"]."','".$_POST["cod_postal"]."','".$_POST["consum_estimatian"]."','".$_POST["consum_estimatfeb"]."','".$_POST["consum_estimatmar"]."','".$_POST["consum_estimatapr"]."','".$_POST["consum_estimatmai"]."','".$_POST["consum_estimatiun"]."','".$_POST["consum_estimatiul"]."','".$_POST["consum_estimataug"]."','".$_POST["consum_estimatsep"]."','".$_POST["consum_estimatoct"]."','".$_POST["consum_estimatnoi"]."','".$_POST["consum_estimatdec"]."','".$_POST["nr_aa"]."','".$_POST["tip_pret"]."','".$_POST["data_garantare"]."','".$_POST["pret_ianuarie"]."','".$_POST["pret_februarie"]."','".$_POST["pret_martie"]."','".$_POST["pret_aprilie"]."','".$_POST["pret_mai"]."','".$_POST["pret_iunie"]."','".$_POST["pret_iulie"]."','".$_POST["pret_august"]."','".$_POST["pret_septembrie"]."','".$_POST["pret_octombrie"]."','".$_POST["pret_noiembrie"]."','".$_POST["pret_decembrie"]."','".$_POST["clauza_penalitati_rez"]."','".$_POST["cuantum_penalizare"]."','".$_POST["clauza_pzu"]."','".$_POST["clauza_circumstante"]."','".$_POST["putere_instalata"]."','".$_POST["termen_plata"]."','".$_POST["observatii"]."', '".$_POST["reg_comert"]."', '".$_POST["cui"]."', '".$_POST["iban_cont"]."', '".$_POST["banca_cont"]."')";


	$query2 = "INSERT INTO clientign(denumire_client, tip_client, status_client, agent_nova, judet, email_agent, nr_contract, data_semnare, data_intrare_ct, data_finalizare_ct, persoana_contact_companie, email_contact, telefon_contact, administrator_companie, localitate, strada_comuna, numar, cod_postal, consum_estimatian21, consum_estimatfeb21, consum_estimatmar21, consum_estimatapr21, consum_estimatmai21, consum_estimatiun21, consum_estimatiul21, consum_estimataug21, consum_estimatsep21, consum_estimatoct21, consum_estimatnoi21, consum_estimatdec21, nr_aa, tip_pret, data_garantare, pret_ianuarie20, pret_februarie20, pret_martie20, pret_aprilie20, pret_mai20, pret_iunie20, pret_iulie20, pret_august20, pret_septembrie20, pret_octombrie20, pret_noiembrie20, pret_decembrie20, clauza_penalitati_rez, cuantum_penalizare, clauza_circumstante, termen_plata, observatii, reg_comert, cui, iban_cont, banca_cont, distributiegn, srm) 
	VALUES('".$_POST["denumire_client"]."','".$_POST["tip_client"]."','".$_POST["status_clientGN"]."','".$_POST["agent_nova"]."','".$_POST["judet"]."','".$_POST["email_agent"]."','".$_POST["nr_contractGN"]."','".$_POST["data_semnareGN"]."','".$_POST["data_intrare_ctGN"]."','".$_POST["data_finalizare_ctGN"]."','".$_POST["persoana_contact_companie"]."','".$_POST["email_contact"]."','".$_POST["telefon_contact"]."','".$_POST["administrator_companie"]."','".$_POST['localitate']."','".$_POST["strada_comuna"]."','".$_POST["numar"]."','".$_POST["cod_postal"]."','".$_POST["consum_estimatian21"]."','".$_POST["consum_estimatfeb21"]."','".$_POST["consum_estimatmar21"]."','".$_POST["consum_estimatapr21"]."','".$_POST["consum_estimatmai21"]."','".$_POST["consum_estimatiun21"]."','".$_POST["consum_estimatiul21"]."','".$_POST["consum_estimataug21"]."','".$_POST["consum_estimatsep21"]."','".$_POST["consum_estimatoct21"]."','".$_POST["consum_estimatnoi21"]."','".$_POST["consum_estimatdec21"]."','".$_POST["nr_aaGN"]."','".$_POST["tip_pretGN"]."','".$_POST["data_garantareGN"]."','".$_POST["pret_ianuarieGN"]."','".$_POST["pret_februarieGN"]."','".$_POST["pret_martieGN"]."','".$_POST["pret_aprilieGN"]."','".$_POST["pret_maiGN"]."','".$_POST["pret_iunieGN"]."','".$_POST["pret_iulieGN"]."','".$_POST["pret_augustGN"]."','".$_POST["pret_septembrieGN"]."','".$_POST["pret_octombrieGN"]."','".$_POST["pret_noiembrieGN"]."','".$_POST["pret_decembrieGN"]."','".$_POST["clauza_penalitati_rezGN"]."','".$_POST["cuantum_penalizareGN"]."','".$_POST["clauza_circumstanteGN"]."','".$_POST["termen_plataGN"]."','".$_POST["observatii"]."', '".$_POST["reg_comert"]."', '".$_POST["cui"]."', '".$_POST["iban_cont"]."', '".$_POST["banca_cont"]."', '".$_POST["distributiegn"]."', '".$_POST["srm"]."')";



		$result = $db_handle->executeQuery($query);
		$result2 = $db_handle->executeQuery($query2);
		
    if(!$result && $result2){
			$message="A aparut o problema";
	} else {
		header("Location:adauga_client.php");
		
	}
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
			<a href="adauga_client.php" class="dashboard-nav-item active">Adauga client dual</a>
			<a href="adauga_clientEE.php" class="dashboard-nav-item">Adauga client EE</a>
			<a href="adauga_clientGN.php" class="dashboard-nav-item">Adauga client GN</a>
			<a href="veziee.php" class="dashboard-nav-item">Vezi clienti EE</a>
			<a href="vezign.php" class="dashboard-nav-item">Vezi clienti GN</a>
			<a href="profitagenti.php" class="dashboard-nav-item ">Profit agenti EE</a>
			<a href="profitagentiGN.php" class="dashboard-nav-item ">Profit agenti GN</a>
          	<div class="nav-item-divider"></div>
         	<a href="logout.php" class="dashboard-nav-item"><i class="fas fa-sign-out-alt"></i> Logout </a>
        </nav>
    </div>
    <div class='dashboard-app'>
        <div class='dashboard-content'>
            <div class='container'>
                <div class='card'>
                    <div class='card-header'>
                        <h1>Adauga client dual</h1>
                    </div>
                    <div class='card-body'>
										<form name="" method="post" action="">
						<h3 class="sub-subtitlu">Informatii client</h3>
						<div class="row">
							<div class="col">
									<span>Denumire client</span>
									<input type="text" name="denumire_client"class="form-control" required>
							</div>
							<div class="col">
									<span>Judet</span>
									<input type="text" name="judet" class="form-control" required>
							</div>
							<div class="col">
									<span>Numar contract EE</span>
									<input type="text" name="nr_contract" class="form-control" required>
							</div>
							<div class="col">
									<span>Numar contract GN</span>
									<input type="text" name="nr_contractGN" class="form-control" required>
							</div>
							<div class="col">
									<span>Email agent</span>
									<input type="email" name="email_agent" class="form-control" required>
							</div>
						</div>
						<br />
						<div class="row">
							<div class="col">
									<span>Status client EE</span><br />
									<select name="status_client" class="custom-select" >
										<option selected>Alege</option>
										<option value="Activ">Activ</option>
										<option value="Inactiv">Inactiv</option>
										<option value="Inactiv">Prospect</option>
									</select>
							</div>
							<div class="col">
									<span>Distributie</span><br />
									<select name="distributie" class="custom-select" >
										<option selected>Alege</option>
										<option value="Transilvania Nord">Transilvania Nord</option>
										<option value="Transilvania Sud">Transilvania Sud</option>
										<option value="Banat">Banat</option>
										<option value="Muntenia Nord">Muntenia Nord</option>
										<option value="Oltenia">Oltenia</option>
										<option value="Moldova">Moldova</option>
										<option value="Dobrogea">Dobrogea</option>
										<option value="Muntenia Sud">Muntenia Sud</option>
									</select>
							</div>
							<div class="col">
									<span>Nivel de tensiune</span><br />
									<select name="nivel_tensiune" class="custom-select" >
										<option selected>Alege</option>
										<option value="JT">JT</option>
										<option value="MT">MT</option>
										<option value="IT">IT</option>
									</select>
							</div>
						</div>
						<br />
						<div class="row">
							<div class="col">
									<span>Status client GN</span><br />
									<select name="status_clientGN" class="custom-select" >
										<option selected>Alege</option>
										<option value="Activ">Activ</option>
										<option value="Inactiv">Inactiv</option>
										<option value="Inactiv">Prospect</option>
									</select>
							</div>
							<div class="col">
									<span>Distributie GN</span>
									<input type="text" name="distributiegn" class="form-control">
								</div>
								<div class="col">
									<span>SRM</span>
									<input type="text" name="srm" class="form-control">
								</div>
						</div>
						<br />
						<div class="row">
							<div class="col">
									<span>Agent vanzari</span><br />
									<select name="agent_nova" class="custom-select" required>
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
							</div>
						</div>

							<br />
							<div class="row">
								<div class="col">
										<span>Data semnare contract EE</span>
										<input type="date" name="data_semnare" class="form-control" required>
								</div>
								<div class="col">
									<span>Data intrare in vigoare EE</span>
									<input type="date" name="data_intrare_ct" class="form-control" required>
								</div>
								<div class="col">
									<span>Data finalizare contract EE</span>
									<input type="date" name="data_finalizare_ct" class="form-control" required>
								</div>
							</div>
							<br />
							<div class="row">
								<div class="col">
										<span>Data semnare contract GN</span>
										<input type="date" name="data_semnareGN" class="form-control" required>
								</div>
								<div class="col">
										<span>Data intrare in vigoare GN</span>
										<input type="date" name="data_intrare_ctGN" class="form-control" required>
								</div>
								<div class="col">
										<span>Data finalizare contract GN</span>
										<input type="date" name="data_finalizare_ctGN" class="form-control" required>
								</div>
							</div>	
							<br />
							<h3 class="sub-subtitlu">Informatii contact</h3>
							<div class="row">
								<div class="col">
										<span>Persoana de contact</span>
										<input type="text" name="persoana_contact_companie" class="form-control" required>
								</div>
								<div class="col">
										<span>Email contact</span>
										<input type="email" name="email_contact" class="form-control" required>
								</div>
								<div class="col">
									<span>Telefon contact</span>
									<input type="tel" name="telefon_contact" class="form-control" required>
								</div>
								<div class="col">
									<span>Administrator</span>
									<input type="text" name="administrator_companie" class="form-control" required>
								</div>
							</div>
							<div class="row">
								<div class="col">
										<span>Localitate</span>
										<input type="text" name="localitate" class="form-control" required>
								</div>
								<div class="col">
										<span>Strada/Comuna</span>
										<input type="text" name="strada_comuna" class="form-control" required>
								</div>
								<div class="col">
										<span>Numar</span>
										<input type="text" name="numar" class="form-control" required>
								</div>
								<div class="col">
										<span>Cod Postal</span>
										<input type="text" name="cod_postal" class="form-control" required> 
								</div>
							</div>
							<br />
							<h3 class="sub-subtitlu">Informatii registrul comertului</h3>
							<div class="row">
								<div class="col">
										<span>Nr. inreg. registrul comertului</span>
										<input type="text" name="reg_comert" class="form-control" required>
								</div>
								<div class="col">
										<span>CUI</span>
										<input type="text" name="cui" class="form-control" required>
								</div>
								<div class="col">
										<span>Banca</span>
										<input type="text" name="banca_cont" class="form-control" required>
								</div>
								<div class="col">
										<span>IBAN</span>
										<input type="text" name="iban_cont" class="form-control" required>
								</div>
							</div>
							<br />
							<h3 class="sub-subtitlu">Informatii consum EE</h3>
							<div class="row">
								<div class="col">
										<span>Consum Ianuarie EE</span>
										<input type="text" name="consum_estimatian" class="form-control" required>
								</div>
								<div class="col">
										<span>Consum Februarie EE</span>
										<input type="text" name="consum_estimatfeb" class="form-control" required>
								</div>
								<div class="col">
										<span>Consum Martie EE</span>
										<input type="text" name="consum_estimatmar" class="form-control" required>
								</div>
								<div class="col">
										<span>Consum Aprilie EE</span>
										<input type="text" name="consum_estimatapr" class="form-control" required>
								</div>
								<div class="col">
										<span>Consum Mai EE</span>
										<input type="text" name="consum_estimatmai" class="form-control" required>
								</div>
								<div class="col">
										<span>Consum Iunie EE</span>
										<input type="text" name="consum_estimatiun" class="form-control" required>
								</div>
							</div>
							<div class="row">
								<div class="col">
										<span>Consum Iulie EE</span>
										<input type="text" name="consum_estimatiul" class="form-control" required>
								</div>
								<div class="col">
										<span>Consum August EE</span>
										<input type="text" name="consum_estimataug" class="form-control" required>
								</div>
								<div class="col">
										<span>Consum Septembrie EE</span>
										<input type="text" name="consum_estimatsep" class="form-control" required>
								</div>
								<div class="col">
										<span>Consum Octombrie EE</span>
										<input type="text" name="consum_estimatoct" class="form-control" required>
								</div>
								<div class="col">
										<span>Consum Noiembrie EE</span>
										<input type="text" name="consum_estimatnoi" class="form-control" required>
								</div>
								<div class="col">
										<span>Consum Decembrie EE</span>
										<input type="text" name="consum_estimatdec" class="form-control" required>
								</div>
							</div>
							<br />
							<h3 class="sub-subtitlu">Informatii consum GN</h3>
							<div class="row">
								<div class="col">
										<span>Consum Ianuarie GN</span>
										<input type="text" name="consum_estimatian21" class="form-control" required>
								</div>
								<div class="col">
										<span>Consum Februarie GN</span>
										<input type="text" name="consum_estimatfeb21" class="form-control" required>
								</div>
								<div class="col">
										<span>Consum Martie GN</span>
										<input type="text" name="consum_estimatmar21" class="form-control" required>
								</div>
								<div class="col">
										<span>Consum Aprilie GN</span>
										<input type="text" name="consum_estimatapr21" class="form-control" required>
								</div>
								<div class="col">
										<span>Consum Mai GN</span>
										<input type="text" name="consum_estimatmai21" class="form-control" required>
								</div>
								<div class="col">
										<span>Consum Iunie GN</span>
										<input type="text" name="consum_estimatiun21" class="form-control" required>
								</div>
							</div>
							<div class="row">
								<div class="col">
										<span>Consum Iulie GN</span>
										<input type="text" name="consum_estimatiul21" class="form-control" required>
								</div>
								<div class="col">
										<span>Consum August GN</span>
										<input type="text" name="consum_estimataug21" class="form-control" required>
								</div>
								<div class="col">
										<span>Consum Septembrie GN</span>
										<input type="text" name="consum_estimatsep21" class="form-control" required>
								</div>
								<div class="col">
										<span>Consum Octombrie GN</span>
										<input type="text" name="consum_estimatoct21" class="form-control" required>
								</div>
								<div class="col">
										<span>Consum Noiembrie GN</span>
										<input type="text" name="consum_estimatnoi21" class="form-control" required>
								</div>
								<div class="col">
										<span>Consum Decembrie GN</span>
										<input type="text" name="consum_estimatdec21" class="form-control" required>
								</div>
							</div>
							<br />
							<h3 class="sub-subtitlu">Informatii contract</h3>
							<div class="row">
								<div class="col">
										<span>Numar AA EE</span>
										<input type="text" name="nr_aa" class="form-control" required>
								</div>
								<div class="col">
										<span>Numar AA GN</span>
										<input type="text" name="nr_aaGN" class="form-control" required>
								</div>
							</div>
							<br />
							<div class="row">
								<div class="col">
										<span>Tip pret contract EE</span>
										<select name="tip_pret" class="custom-select">
											<option selected>Alege</option>
											<option value="Garantat">Garantat</option>
											<option value="Negarantat">Negarantat</option>
										</select>
								</div>
								<div class="col">
									<span>Data final garantare EE (daca e negarantat se selecteaza data intrarii in vigoare)</span>
									<input type="date" name="data_garantare" class="form-control" required>
								</div>
							</div>
							<br />
							<div class="row">
								<div class="col">
										<span>Tip pret contract GN</span>
										<select name="tip_pretGN" class="custom-select" required>
											<option selected>Alege</option>
											<option value="Garantat">Garantat</option>
											<option value="Negarantat">Negarantat</option>
										</select>
								</div>
								<div class="col">
									<span>Data final garantare GN (daca e negarantat se selecteaza data intrarii in vigoare)</span>
									<input type="date" name="data_garantareGN" class="form-control" required>
								</div>
							</div>
						<br />
						<h3 class="sub-subtitlu">Informatii facturare EE</h3>
						<div class="row">
							<div class="col">
									<span>Pret Ianuarie EE</span>
									<input type="text" name="pret_ianuarie" class="form-control" required>
							</div>
							<div class="col">
									<span>Pret Februarie EE</span>
									<input type="text" name="pret_februarie" class="form-control" required>
							</div>
							<div class="col">
									<span>Pret Martie EE</span>
									<input type="text" name="pret_martie" class="form-control" required>
							</div>
							<div class="col">
									<span>Pret Aprilie EE</span>
									<input type="text" name="pret_aprilie" class="form-control" required>
							</div>
							<div class="col">
									<span>Pret Mai EE</span>
									<input type="text" name="pret_mai" class="form-control" required>
							</div>
							<div class="col">
									<span>Pret Iunie EE</span>
									<input type="text" name="pret_iunie" class="form-control" required>
							</div>
						</div>
						<div class="row">
							<div class="col">
									<span>Pret Iulie EE</span>
									<input type="text" name="pret_iulie" class="form-control" required>
							</div>
							<div class="col">
									<span>Pret August EE</span>
									<input type="text" name="pret_august" class="form-control" required>
							</div>
							<div class="col">
									<span>Pret Septembrie EE</span>
									<input type="text" name="pret_septembrie" class="form-control" required>
							</div>
							<div class="col">
									<span>Pret Octombrie EE</span>
									<input type="text" name="pret_octombrie" class="form-control" required>
							</div>
							<div class="col">
									<span>Pret Noiembrie EE</span>
									<input type="text" name="pret_noiembrie" class="form-control" required>
							</div>
							<div class="col">
									<span>Pret Decembrie EE</span>
									<input type="text" name="pret_decembrie" class="form-control" required>
							</div>
						</div>
						<br />
						<h3 class="sub-subtitlu">Informatii facturare GN</h3>
						<div class="row">
							<div class="col">
									<span>Pret Ianuarie GN</span>
									<input type="text" name="pret_ianuarieGN" class="form-control" required>
							</div>
							<div class="col">
									<span>Pret Februarie GN</span>
									<input type="text" name="pret_februarieGN" class="form-control" required>
							</div>
							<div class="col">
									<span>Pret Martie GN</span>
									<input type="text" name="pret_martieGN" class="form-control" required>
							</div>
							<div class="col">
									<span>Pret Aprilie GN</span>
									<input type="text" name="pret_aprilieGN" class="form-control" required>
							</div>
							<div class="col">
									<span>Pret Mai GN</span>
									<input type="text" name="pret_maiGN" class="form-control"required>
							</div>
							<div class="col">
									<span>Pret Iunie GN</span>
									<input type="text" name="pret_iunieGN" class="form-control" required>
							</div>
						</div>
						<div class="row">
							<div class="col">
									<span>Pret Iulie GN</span>
									<input type="text" name="pret_iulieGN" class="form-control" required>
							</div>
							<div class="col">
									<span>Pret August GN</span>
									<input type="text" name="pret_augustGN" class="form-control" required>
							</div>
							<div class="col">
									<span>Pret Septembrie GN</span>
									<input type="text" name="pret_septembrieGN" class="form-control" required>
							</div>
							<div class="col">
									<span>Pret Octombrie GN</span>
									<input type="text" name="pret_octombrieGN" class="form-control" required>
							</div>
							<div class="col">
									<span>Pret Noiembrie GN</span>
									<input type="text" name="pret_noiembrieGN" class="form-control" required>
							</div>
							<div class="col">
									<span>Pret Decembrie GN</span>
									<input type="text" name="pret_decembrieGN" class="form-control" required>
							</div>
						</div>
						<h3 class="sub-subtitlu">Clauze si penalitati EE</h3>
						<div class="row">
							<div class="col">
									<span>Clauza penalitati reziliere EE</span><br />
									<select name="clauza_penalitati_rez" class="custom-select">
										<option selected>Alege</option>
										<option value="Da">Da</option>
										<option value="Nu">Nu</option>
									</select>
							</div>
							<div class="col">
									<span>Cuantum penalitati EE</span><br />
									<select name="cuantum_penalizare" class="custom-select">
										<option selected>Alege</option>
										<option value="0%">0%</option>
										<option value="10%">10%</option>
										<option value="20%">20%</option>
										<option value="30%">30%</option>
										<option value="40%">40%</option>
										<option value="50%">50%</option>
										<option value="60%">60%</option>
										<option value="70%">70%</option>
										<option value="80%">80%</option>
										<option value="90%">90%</option>
										<option value="100%">100%</option>
									</select>
							</div>
							<div class="col">
									<span>Clauza PZU EE</span><br />
									<select name="clauza_pzu" class="custom-select">
										<option selected>Alege</option>
										<option value="Da">Da</option>
										<option value="Nu">Nu</option>
									</select>
							</div>
							<div class="col">
									<span>Clauza circumstante EE</span><br />
									<select name="clauza_circumstante" class="custom-select">
										<option selected>Alege</option>
										<option value="Da">Da</option>
										<option value="Nu">Nu</option>
									</select>
							</div>
							<div class="col">
									<span>Putere instalata > 1MVA (EE)</span><br />
									<select name="putere_instalata" class="custom-select">
										<option selected>Alege</option>
										<option value="Da">Da</option>
										<option value="Nu">Nu</option>
									</select>
							</div>
						</div>
						<h3 class="sub-subtitlu">Clauze si penalitati GN</h3>
						<div class="row">
							<div class="col">
									<span>Clauza penalitati reziliere GN</span>
									<select name="clauza_penalitati_rezGN" class="custom-select">
										<option selected>Alege</option>
										<option value="Da">Da</option>
										<option value="Nu">Nu</option>
									</select>
							</div>

							<div class="col">
									<span>Cuantum penalitati GN</span>
									<select name="cuantum_penalizareGN" class="custom-select">
										<option selected>Alege</option>
										<option value="0%">0%</option>
										<option value="10%">10%</option>
										<option value="20%">20%</option>
										<option value="30%">30%</option>
										<option value="40%">40%</option>
										<option value="50%">50%</option>
										<option value="60%">60%</option>
										<option value="70%">70%</option>
										<option value="80%">80%</option>
										<option value="90%">90%</option>
										<option value="100%">100%</option>
									</select>
							</div>


							<div class="col">
									<span>Clauza circumstante GN</span>
									<select name="clauza_circumstanteGN" class="custom-select">
										<option selected>Alege</option>
										<option value="Da">Da</option>
										<option value="Nu">Nu</option>
									</select>
							</div>
						</div>
						<h3 class="sub-subtitlu">Termene de plata si observatii</h3>
						<div class="row">
							<div class="col">
									<span>Termen de plata (zile de la emitere la scadenta) EE</span>
									<input type="text" name="termen_plata" class="form-control" required>
							</div>
							<div class="col">
									<span>Termen de plata (zile de la emitere la scadenta) GN</span>
									<input type="text" name="termen_plataGN" class="form-control" required>
							</div>
							<div class="fcol">
									<span>Observatii client</span>
									<textarea name="observatii" class="form-control" rows="1"></textarea>
							</div>
						</div>
						<div class="row">
							<div class="col">
									<span>Tip client</span><br />
									<select name="tip_client" class="custom-select">
										<option selected>Alege</option>
										<option value="Partener">Partener</option>
										<option value="Oportunitate">Oportunist</option>
									</select>
							</div>
						</div>
						<br/>
						<input type="submit" name="submit" class="btn btn-danger mb-1" value="Adauga" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>





<?php
session_start(); 
require_once("dbcontroller.php");
$db_handle = new DBController();
if (!isset($_SESSION['username'])) {
	header("location:index.php");
}
if(!empty($_POST["submit"])) {
    $query = "INSERT INTO clientienergie(denumire_client, tip_client, status_client, agent_nova, email_agent, judet, nr_contract, data_semnare, data_intrare_ct, data_finalizare_ct, persoana_contact_companie, email_contact, telefon_contact, administrator_companie, localitate, strada_comuna, numar, cod_postal, consum_estimatian21, consum_estimatfeb21, consum_estimatmar21, consum_estimatapr21, consum_estimatmai21, consum_estimatiun21, consum_estimatiul21, consum_estimataug21, consum_estimatsep21, consum_estimatoct21, consum_estimatnoi21, consum_estimatdec21, nr_aa, tip_pret, data_garantare, pret_ianuarie20, pret_februarie20, pret_martie20, pret_aprilie20, pret_mai20, pret_iunie20, pret_iulie20, pret_august20, pret_septembrie20, pret_octombrie20, pret_noiembrie20, pret_decembrie20, clauza_penalitati_rez, cuantum_penalizare, clauza_pzu, clauza_circumstante, putere_instalata, termen_plata, observatii, reg_comert, cui, iban_cont, banca_cont, distributie, niveltensiune) 
	VALUES('".$_POST["denumire_client"]."','".$_POST["tip_client"]."','".$_POST["status_client"]."','".$_POST["agent_nova"]."','".$_POST["email_agent"]."','".$_POST["judet"]."','".$_POST["nr_contract"]."','".$_POST["data_semnare"]."','".$_POST["data_intrare_ct"]."','".$_POST["data_finalizare_ct"]."','".$_POST["persoana_contact_companie"]."','".$_POST["email_contact"]."','".$_POST["telefon_contact"]."','".$_POST["administrator_companie"]."','".$_POST['localitate']."','".$_POST["strada_comuna"]."','".$_POST["numar"]."','".$_POST["cod_postal"]."','".$_POST["consum_estimatian"]."','".$_POST["consum_estimatfeb"]."','".$_POST["consum_estimatmar"]."','".$_POST["consum_estimatapr"]."','".$_POST["consum_estimatmai"]."','".$_POST["consum_estimatiun"]."','".$_POST["consum_estimatiul"]."','".$_POST["consum_estimataug"]."','".$_POST["consum_estimatsep"]."','".$_POST["consum_estimatoct"]."','".$_POST["consum_estimatnoi"]."','".$_POST["consum_estimatdec"]."','".$_POST["nr_aa"]."','".$_POST["tip_pret"]."','".$_POST["data_garantare"]."','".$_POST["pret_ianuarie"]."','".$_POST["pret_februarie"]."','".$_POST["pret_martie"]."','".$_POST["pret_aprilie"]."','".$_POST["pret_mai"]."','".$_POST["pret_iunie"]."','".$_POST["pret_iulie"]."','".$_POST["pret_august"]."','".$_POST["pret_septembrie"]."','".$_POST["pret_octombrie"]."','".$_POST["pret_noiembrie"]."','".$_POST["pret_decembrie"]."','".$_POST["clauza_penalitati_rez"]."','".$_POST["cuantum_penalizare"]."','".$_POST["clauza_pzu"]."','".$_POST["clauza_circumstante"]."','".$_POST["putere_instalata"]."','".$_POST["termen_plata"]."','".$_POST["observatii"]."', '".$_POST["reg_comert"]."', '".$_POST["cui"]."', '".$_POST["iban_cont"]."', '".$_POST["banca_cont"]."', '".$_POST["distributie"]."', '".$_POST["nivel_tensiune"]."')";

		$result = $db_handle->executeQuery($query);
		
    if(!$result) {
			$message =  "A aparut o problema";
	} else {
		header("Location:adauga_clientEE.php");
		
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
			<a href="adauga_client.php" class="dashboard-nav-item ">Adauga client dual</a>
			<a href="adauga_clientEE.php" class="dashboard-nav-item active">Adauga client EE</a>
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
                        <h1>Adauga client Energie Electrica</h1>
                    </div>
                    <div class='card-body'>
					<form name="" method="post" action="">
							<h3 class="sub-subtitlu">Informatii client</h3>
							<div class="row">
								<div class="col">	
									<span>Denumire client</span>
									<input type="text" name="denumire_client"class="form-control">
								</div>	
								<div class="col">
									<span>Judet</span>
									<input type="text" name="judet" class="form-control">
								</div>
								<div class="col">
									<span>Numar contract</span>
									<input type="text" name="nr_contract" class="form-control">
								</div>
								<div class="col">	
									<span>Email agent</span>
									<input type="email" name="email_agent" class="form-control">
								</div>
							</div>
							<br />
							<div class="row">
								<div class="col">
									<span>Status client</span><br/>
									<select name="status_client" class="custom-select">
										<option selected>Alege</option>
										<option value="Activ">Activ</option>
										<option value="Inactiv">Inactiv</option>
										<option value="Inactiv">Prospect</option>
									</select>	
								</div>
							<div>
							<br />
							<div class="row">
								<div class="col">
									<span>Agent vanzari</span><br />
									<select name="agent_nova" class="custom-select">
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
										<option value="BRM EE">BRM EE</option>
										<option value="VIVO">VIVO</option>
									</select>	
								</div>
							</div>
							<br/>
							<div class="row">
								<div class="col">
									<span>Data semnare contract</span>
									<input type="date" name="data_semnare" class="form-control">
								</div>
								<div class="col">
									<span>Data intrare in vigoare</span>
									<input type="date" name="data_intrare_ct" class="form-control">
								</div>
								<div class="col">
									<span>Data finalizare contract</span>
									<input type="date" name="data_finalizare_ct" class="form-control">
								</div>
							</div>
							<h3 class="sub-subtitlu">Informatii contact</h3>
							<div class="row">
								<div class="col">
									<span>Persoana de contact</span>
									<input type="text" name="persoana_contact_companie" class="form-control">
								</div>
								
								<div class="col">
									<span>Email contact</span>
									<input type="email" name="email_contact" class="form-control">
								</div>
								<div class="col">
									<span>Telefon contact</span>
									<input type="tel" name="telefon_contact" class="form-control">
								</div>
								<div class="col">
									<span>Administrator</span>
									<input type="text" name="administrator_companie" class="form-control">
								</div>		
							</div>
							<div class="row">
								<div class="col">
									<span>Localitate</span>
									<input type="text" name="localitate" class="form-control">
								</div>	

								<div class="col">
									<span>Strada/Comuna</span>
									<input type="text" name="strada_comuna" class="form-control">
								</div>
								<div class="col">
									<span>Numar</span>
									<input type="text" name="numar" class="form-control">
								</div>
								<div class="col">
									<span>Cod Postal</span>
									<input type="text" name="cod_postal" class="form-control">
								</div>
							</div>
							<br />
							<h3 class="sub-subtitlu">Informatii registrul comertului</h3>
							<div class="row">
								<div class="col">
									<span>Nr. inreg. registrul comertului</span>
									<input type="text" name="reg_comert" class="form-control">
								</div>
								<div class="col">
									<span>CUI</span>
									<input type="text" name="cui" class="form-control">
								</div>

								<div class="col">
									<span>Banca</span>
									<input type="text" name="banca_cont" class="form-control">
								</div>
								<div class="col">
									<span>IBAN</span>
									<input type="text" name="iban_cont" class="form-control">
								</div>
							</div>
							<br />
							<h3 class="sub-subtitlu">Informatii consum</h3>
							<div class="row">
								<div class="col">
									<span>Consum Ianuarie</span>
									<input type="text" name="consum_estimatian" class="form-control">
								</div>
								<div class="col">
									<span>Consum Februarie</span>
									<input type="text" name="consum_estimatfeb" class="form-control">
								</div>
								<div class="col">
									<span>Consum Martie</span>
									<input type="text" name="consum_estimatmar" class="form-control">
								</div>
								<div class="col">
									<span>Consum Aprilie</span>
									<input type="text" name="consum_estimatapr" class="form-control">
								</div>
								<div class="col">
									<span>Consum Mai</span>
									<input type="text" name="consum_estimatmai" class="form-control">
								</div>
								<div class="col">
									<span>Consum Iunie</span>
									<input type="text" name="consum_estimatiun" class="form-control">
								</div>
							</div>
							<div class="row">
								<div class="col">
									<span>Consum Iulie</span>
									<input type="text" name="consum_estimatiul" class="form-control">
								</div>
								<div class="col">
									<span>Consum August</span>
									<input type="text" name="consum_estimataug" class="form-control">
								</div>
								<div class="col">	
									<span>Consum Septembrie</span>
									<input type="text" name="consum_estimatsep" class="form-control">
								</div>
								<div class="col">
									<span>Consum Octombrie</span>
									<input type="text" name="consum_estimatoct" class="form-control">
								</div>
								<div class="col">
									<span>Consum Noiembrie</span>
									<input type="text" name="consum_estimatnoi" class="form-control">
								</div>
								<div class="col">
									<span>Consum Decembrie</span>
									<input type="text" name="consum_estimatdec" class="form-control">
								</div>
							</div>
							<br />
							<h3 class="sub-subtitlu">Informatii facturare</h3>
							<div class="row">
								<div class="col">
									<span>Tip pret contract</span>
									<select name="tip_pret" class="custom-select">
										<option selected>Alege</option>
										<option value="Garantat">Garantat</option>
										<option value="Negarantat">Negarantat</option>
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
							</div>
							<br />
							<div class="row">
								<div class="col">
									<span>Data final garantare (daca e negarantat se selecteaza data intrarii in vigoare)</span>
									<input type="date" name="data_garantare" class="form-control">
								</div>
								<div class="col">
									<span>Termen de plata (zile de la emitere la scadenta)</span>
									<input type="text" name="termen_plata" class="form-control">
								</div>
							</div>
							<br />
							<div class="row">
								<div class="col">
										<span>Pret Ianuarie</span>
										<input type="text" name="pret_ianuarie" class="form-control">
								</div>
								<div class="col">
										<span>Pret Februarie</span>
										<input type="text" name="pret_februarie" class="form-control">
								</div>
								<div class="col">
										<span>Pret Martie</span>
										<input type="text" name="pret_martie" class="form-control">
								</div>
								<div class="col">
										<span>Pret Aprilie</span>
										<input type="text" name="pret_aprilie" class="form-control">
								</div>
								<div class="col">
										<span>Pret Mai</span>
										<input type="text" name="pret_mai" class="form-control">
								</div>
								<div class="col">
										<span>Pret Iunie</span>
										<input type="text" name="pret_iunie" class="form-control">
								</div>
							</div>
							<div class="row">
								<div class="col">
										<span>Pret Iulie</span>
										<input type="text" name="pret_iulie" class="form-control">
								</div>
								<div class="col">
										<span>Pret August</span>
										<input type="text" name="pret_august" class="form-control">
								</div>
								<div class="col">
										<span>Pret Septembrie</span>
										<input type="text" name="pret_septembrie" class="form-control">
								</div>
								<div class="col">
										<span>Pret Octombrie</span>
										<input type="text" name="pret_octombrie" class="form-control">
								</div>
								<div class="col">
										<span>Pret Noiembrie</span>
										<input type="text" name="pret_noiembrie" class="form-control">
								</div>
								<div class="col">
										<span>Pret Decembrie</span>
										<input type="text" name="pret_decembrie" class="form-control">
								</div>
							</div>
							<h3 class="sub-subtitlu">Observatii si clauze</h3>
							<div class="row">
								<div class="col">
										<span>Observatii client</span>
										<textarea name="observatii" class="form-control" rows="1"></textarea>
								</div>
								<div class="col">
									<span>Numar AA</span>
									<input type="text" name="nr_aa" class="form-control">
								</div>	
							</div>
							<br />
							<div class="row">
								<div class="col-2 sm-1">
										<span>Clauza penalitati reziliere</span>
								</div>
								<div class="col-1 sm-1">
										<select name="clauza_penalitati_rez" class="custom-select">
											<option selected>Alege</option>
											<option value="Da">Da</option>
											<option value="Nu">Nu</option>
										</select>
								</div>
							</div>
							<br/>
							<div class="row">
								<div class="col-2 sm-1">
										<span>Cuantum penalitati</span>
								</div>
								<div class="col-1 sm-1">
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
							</div>
								<br />
							<div class="row">
								<div class="col-2 sm-1">
									<span>Clauza PZU</span>
								</div>
								<div class="col-1 sm-1">
									<select name="clauza_pzu" class="custom-select">
										<option selected>Alege</option>
										<option value="Da">Da</option>
										<option value="Nu">Nu</option>
									</select>
								</div>
							</div>
							<br />
							<div class="row">
								<div class="col-2 sm-1">
										<span>Clauza circumstante</span>
								</div>
								<div class="col-1 sm-1">
										<select name="clauza_circumstante" class="custom-select">
											<option selected>Alege</option>
											<option value="Da">Da</option>
											<option value="Nu">Nu</option>
										</select>
								</div>	
							</div>
							<br />
							<div class="row">
								<div class="col-2 sm-1">
										<span>Putere instalata > 1MVA</span>
								</div>
								<div class="col-1 sm-1">
										<select name="putere_instalata" class="custom-select">
											<option selected>Alege</option>
											<option value="Da">Da</option>
											<option value="Nu">Nu</option>
										</select>
								</div>
							</div>
							<br />
							<div class="row">
								<div class="col-2 sm-1">
									<span>Tip client</span>
								</div>
								<div class="col-1 sm-1">
									<select name="tip_client" class="custom-select">
										<option selected>Alege</option>
										<option value="Partener">Partener</option>
										<option value="Oportunist">Oportunist</option>
									</select>
								</div>
							</div>
							<br />
							<input type="submit" name="submit" class="btn btn-danger mb-1" value="Adauga" />
						</div>
					<form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
<?php
session_start(); 
require_once("dbcontroller.php");
$db_handle = new DBController();
if (!isset($_SESSION['username'])) {
	header("location:index.php");
}
$testNume = $_SESSION['username'];
$azi = date("Y-m-d");
if(!empty($_POST["submit"])) {
    $query = "UPDATE clientienergie set denumire_client = '".$_POST["denumire_client"]."', tip_client = '".$_POST["tip_client"]."', status_client = '".$_POST["status_client"]."', agent_nova = '".$_POST["agent_nova"]."', email_agent = '".$_POST["email_agent"]."', nr_contract= '".$_POST["nr_contract"]."', data_semnare = '".$_POST["data_semnare"]."', data_intrare_ct = '".$_POST["data_intrare_ct"]."', data_finalizare_ct = '".$_POST["data_finalizare_ct"]."', persoana_contact_companie = '".$_POST["persoana_contact_companie"]."', email_contact = '".$_POST["email_contact"]."', telefon_contact = '".$_POST["telefon_contact"]."', administrator_companie = '".$_POST["administrator_companie"]."', consum_estimatian21 = '".$_POST["consum_estimatian21"]."', consum_estimatfeb21 = '".$_POST["consum_estimatfeb21"]."', consum_estimatmar21 = '".$_POST["consum_estimatmar21"]."', consum_estimatapr21 = '".$_POST["consum_estimatapr21"]."', consum_estimatmai21 = '".$_POST["consum_estimatmai21"]."', consum_estimatiun21 = '".$_POST["consum_estimatiun21"]."', consum_estimatiul21 = '".$_POST["consum_estimatiul21"]."', consum_estimataug21 = '".$_POST["consum_estimataug21"]."', consum_estimatsep21 = '".$_POST["consum_estimatsep21"]."', consum_estimatoct21 = '".$_POST["consum_estimatoct21"]."', consum_estimatnoi21 = '".$_POST["consum_estimatnoi21"]."', consum_estimatdec21 = '".$_POST["consum_estimatdec21"]."', nr_aa = '".$_POST["nr_aa"]."', tip_pret = '".$_POST["tip_pret"]."', data_garantare = '".$_POST["data_garantare"]."', pret_ianuarie20 = '".$_POST["pret_ianuarie20"]."', pret_februarie20 = '".$_POST["pret_februarie20"]."', pret_martie20 = '".$_POST["pret_martie20"]."', pret_aprilie20 = '".$_POST["pret_aprilie20"]."', pret_mai20 = '".$_POST["pret_mai20"]."', pret_iunie20 = '".$_POST["pret_iunie20"]."', pret_iulie20 = '".$_POST["pret_iulie20"]."', pret_august20 = '".$_POST["pret_august20"]."', pret_septembrie20 = '".$_POST["pret_septembrie20"]."', pret_octombrie20 = '".$_POST["pret_octombrie20"]."', pret_noiembrie20 = '".$_POST["pret_noiembrie20"]."', pret_decembrie20 = '".$_POST["pret_decembrie20"]."', clauza_penalitati_rez = '".$_POST["clauza_penalitati_rez"]."', cuantum_penalizare = '".$_POST["cuantum_penalizare"]."', clauza_pzu = '".$_POST["clauza_pzu"]."', clauza_circumstante = '".$_POST["clauza_circumstante"]."', putere_instalata = '".$_POST["putere_instalata"]."', termen_plata = '".$_POST["termen_plata"]."', observatii = '".$_POST["observatii"]."', reg_comert = '".$_POST["reg_comert"]."', cui = '".$_POST["cui"]."', banca_cont = '".$_POST["banca_cont"]."', iban_cont = '".$_POST["iban_cont"]."', niveltensiune = '".$_POST["nivel_tensiune"]."', distributie = '".$_POST["distributie"]."' WHERE  id=".$_GET["id"];
	$result = $db_handle->executeQuery($query);
	$query2 = "INSERT INTO users_log (username, data_modificare, client_modificat) VALUES ('".$_SESSION['username']."', '".$azi."','".$_GET["id"]."')";
	$result2 = $db_handle->executeQuery($query2);
	if(!$result){
		$message = "Eroare";
	} else {
		header("Location:veziee.php");
	}
}
$result = $db_handle->runQuery("SELECT * FROM clientienergie WHERE id='" . $_GET["id"] . "'");

?>
<?php include "header.php" ?>

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
			<a href="veziee.php" class="dashboard-nav-item active">Vezi clienti EE</a>
			<a href="vezign.php" class="dashboard-nav-item">Vezi clienti GN</a>
			<a href="profitagenti.php" class="dashboard-nav-item ">Profit agenti EE</a>
			<a href="profitagentign.php" class="dashboard-nav-item ">Profit agenti GN</a>
          	<div class="nav-item-divider"></div>
         	<a href="logout.php" class="dashboard-nav-item"><i class="fas fa-sign-out-alt"></i> Logout </a>
        </nav>
    </div>
    <div class='dashboard-app'>
        <div class='dashboard-content'>
            <div class='container'>
                <div class='card'>
                    <div class='card-header'>
                        <h1>Actualizeaza <?php echo $result[0]["denumire_client"];?></h1>
                    </div>
                    <div class='card-body'>
					<form name="" method="post" action="">
						<div class="formular-adaugare-client">
							<div class="form-group mb-3">
									<span>Nume client</span>
									<input type="text" name="denumire_client" class="form-control" value="<?php echo $result[0]["denumire_client"];?>">
							</div>
							<div class="form-group mb-3">
									<span>Status client</span>
									<select name="status_client" class="custom-select">
										<option value="Activ" <?php if($result[0]["status_client"] == "Activ") echo 'selected="selected"'; ?>>Activ</option>
										<option value="Inactiv" <?php if($result[0]["status_client"] == "Inactiv") echo 'selected="selected"'; ?>>Inactiv</option>
										<option value="Prospect" <?php if($result[0]["status_client"] == "Prospect") echo 'selected="selected"'; ?>>Prospect</option>
									</select>
							</div>
							<div class="form-group mb-3">
									<span>Judet</span>
									<input type="text" name="judet" class="form-control" value="<?php echo $result[0]["judet"];?>">
							</div>
							<div class="form-group mb-3">
									<span>Localitate</span>
									<input type="text" name="localitate" class="form-control" value="<?php echo $result[0]["localitate"];?>">
							</div>
							<div class="form-group mb-3">
									<span>Strada/Comuna</span>
									<input type="text" name="strada_comuna" class="form-control" value="<?php echo $result[0]["strada_comuna"];?>">
							</div>
							<div class="form-group mb-3">
									<span>Numar</span>
									<input type="text" name="numar" class="form-control" value="<?php echo $result[0]["numar"];?>">
							</div>
							<div class="form-group mb-3">
									<span>Cod Postal</span>
									<input type="text" name="cod_postal" class="form-control" value="<?php echo $result[0]["cod_postal"];?>">
							</div>
							<div class="form-group mb-3">
								<div class="col">
									<span>Agent vanzari</span><br />
									<select name="agent_nova" class="custom-select" required>
									<option selected>Alege</option>
										<option value="Dan Gornescu" <?php if($result[0]["agent_nova"] == "Dan Gornescu") echo 'selected="selected"';?>>Dan Gornescu</option>
										<option value="Nicoleta Vlaicu" <?php if($result[0]["agent_nova"] == "Nicoleta Vlaicu") echo 'selected="selected"';?>>Nicoleta Vlaicu</option>
										<option value="Dorina Tanase" <?php if($result[0]["agent_nova"] == "Dorina Tanase") echo 'selected="selected"';?>>Dorina Tanase</option>
										<option value="Ovidiu Ligotchi" <?php if($result[0]["agent_nova"] == "Ovidiu Ligotchi") echo 'selected="selected"';?>>Ovidiu Ligotchi</option>
										<option value="Marcel Oanta" <?php if($result[0]["agent_nova"] == "Marcel Oanta") echo 'selected="selected"';?>>Marcel Oanta</option>
										<option value="Georgiana Faurica" <?php if($result[0]["agent_nova"] == "Georgiana Faurica") echo 'selected="selected"';?>>Georgiana Faurica</option>
										<option value="Elena Caratas" <?php if($result[0]["agent_nova"] == "Elena Caratas") echo 'selected="selected"';?>>Elena Caratas</option>
										<option value="Tiberiu Ciobanu" <?php if($result[0]["agent_nova"] == "Tiberiu Ciobanu") echo 'selected="selected"';?>>Tiberiu Ciobanu</option>
										<option value="Albert Cainasimir" <?php if($result[0]["agent_nova"] == "Albert Cainasimir") echo 'selected="selected"';?>>Albert Cainasimir</option>
										<option value="Catalin Dan Ioana" <?php if($result[0]["agent_nova"] == "Catalin Dan Ioana") echo 'selected="selected"';?>>Catalin Dan Ioana</option>
										<option value="Ruxandra Avramita" <?php if($result[0]["agent_nova"] == "Ruxandra Avramita") echo 'selected="selected"';?>>Ruxandra Avramita</option>
										<option value="VIVO" <?php if($result[0]["agent_nova"] == "VIVO") echo 'selected="selected"';?>>VIVO</option>
										<option value="BRM EE" <?php if($result[0]["agent_nova"] == "BRM EE") echo 'selected="selected"';?>>BRM EE</option>
									</select>
								</div>
							</div>
							<div class="form-group mb-3">
									<span>Email agent</span>
									<input type="email" name="email_agent" class="form-control" value="<?php echo $result[0]["email_agent"];?>">
							</div>
							<div class="form-group mb-3">
									<span>Numar contract</span>
									<input type="text" name="nr_contract" class="form-control" value="<?php echo $result[0]["nr_contract"];?>">
							</div>
							<div class="form-group mb-3">
									<span>Data semnare contract</span>
									<input type="date" name="data_semnare" class="form-control" value="<?php echo $result[0]["data_semnare"];?>">
							</div>
							<div class="form-group mb-3">
									<span>Data intrare in vigoare</span>
									<input type="date" name="data_intrare_ct" class="form-control" value="<?php echo $result[0]["data_intrare_ct"];?>">
							</div>
							<div class="form-group mb-3">
									<span>Data finalizare contract</span>
									<input type="date" name="data_finalizare_ct" class="form-control" value="<?php echo $result[0]["data_finalizare_ct"];?>">
							</div>
							<div class="form-group mb-3">
									<span>Distributie</span>
									<select name="distributie" class="custom-select">
										<option value="Transilvania Nord" <?php if($result[0]["distributie"] == "Transilvania Nord") echo 'selected="selected"'; ?>>Transilvania Nord</option>
										<option value="Transilvania Sud" <?php if($result[0]["distributie"] == "Transilvania Sud") echo 'selected="selected"'; ?>>Transilvania Sud</option>
										<option value="Banat" <?php if($result[0]["distributie"] == "Banat") echo 'selected="selected"'; ?>>Banat</option>
										<option value="Muntenia Nord" <?php if($result[0]["distributie"] == "Muntenia Nord") echo 'selected="selected"'; ?>>Muntenia Nord</option>
										<option value="Oltenia" <?php if($result[0]["distributie"] == "Oltenia") echo 'selected="selected"'; ?>>Oltenia</option>
										<option value="Moldova" <?php if($result[0]["distributie"] == "Moldova") echo 'selected="selected"'; ?>>Moldova</option>
										<option value="Dobrogea" <?php if($result[0]["distributie"] == "Dobrogea") echo 'selected="selected"'; ?>>Dobrogea</option>
										<option value="Muntenia Sud" <?php if($result[0]["distributie"] == "Muntenia Sud") echo 'selected="selected"'; ?>>Muntenia Sud</option>
									</select>
							</div>
							<div class="form-group mb-3">
									<span>Nivel de tensiune</span>
									<select name="nivel_tensiune" class="custom-select">
										<option value="JT" <?php if($result[0]["niveltensiune"] == "JT") echo 'selected="selected"'; ?>>JT</option>
										<option value="MT" <?php if($result[0]["niveltensiune"] == "MT") echo 'selected="selected"'; ?>>MT</option>
										<option value="IT" <?php if($result[0]["niveltensiune"] == "IT") echo 'selected="selected"'; ?>>IT</option>
									</select>
							</div>
							<div class="form-group mb-3">
									<span>Persoana de contact</span>
									<input type="text" name="persoana_contact_companie" class="form-control" value="<?php echo $result[0]["persoana_contact_companie"];?>">
							</div>
							<div class="form-group mb-3">
									<span>Email contact</span>
									<input type="email" name="email_contact" class="form-control" value="<?php echo $result[0]["email_contact"];?>">
							</div>
							<div class="form-group mb-3">
									<span>Telefon contact</span>
									<input type="tel" name="telefon_contact" class="form-control" value="<?php echo $result[0]["telefon_contact"];?>">
							</div>
							<div class="form-group mb-3">
									<span>Nr. inreg. registrul comertului</span>
									<input type="text" name="reg_comert" class="form-control" value="<?php echo $result[0]["reg_comert"];?>">
							</div>
							<div class="form-group mb-3">
									<span>CUI</span>
									<input type="text" name="cui" class="form-control" value="<?php echo $result[0]["cui"];?>">
							</div>
							<div class="form-group mb-3">
									<span>Banca</span>
									<input type="text" name="banca_cont" class="form-control" value="<?php echo $result[0]["banca_cont"];?>">
							</div>
							<div class="form-group mb-3">
									<span>IBAN</span>
									<input type="text" name="iban_cont" class="form-control" value="<?php echo $result[0]["iban_cont"];?>">
							</div>
							<div class="form-group mb-3">
									<span>Administrator</span>
									<input type="text" name="administrator_companie" class="form-control" value="<?php echo $result[0]["administrator_companie"];?>">
							</div>
							<div class="form-group mb-3">
									<span>Consum Ianuarie</span>
									<input type="text" name="consum_estimatian21" class="form-control" value="<?php echo $result[0]["consum_estimatian21"];?>">
							</div>
							<div class="form-group mb-3">
									<span>Consum Februarie</span>
									<input type="text" name="consum_estimatfeb21" class="form-control" value="<?php echo $result[0]["consum_estimatfeb21"];?>">
							</div>
							<div class="form-group mb-3">
									<span>Consum Martie</span>
									<input type="text" name="consum_estimatmar21" class="form-control" value="<?php echo $result[0]["consum_estimatmar21"];?>">
							</div>
							<div class="form-group mb-3">
									<span>Consum Aprilie</span>
									<input type="text" name="consum_estimatapr21" class="form-control" value="<?php echo $result[0]["consum_estimatapr21"];?>">
							</div>
							<div class="form-group mb-3">
									<span>Consum Mai</span>
									<input type="text" name="consum_estimatmai21" class="form-control" value="<?php echo $result[0]["consum_estimatmai21"];?>">
							</div>
							<div class="form-group mb-3">
									<span>Consum Iunie</span>
									<input type="text" name="consum_estimatiun21" class="form-control" value="<?php echo $result[0]["consum_estimatiun21"];?>">
							</div>
							<div class="form-group mb-3">
									<span>Consum Iulie</span>
									<input type="text" name="consum_estimatiul21" class="form-control" value="<?php echo $result[0]["consum_estimatiul21"];?>">
							</div>
							<div class="form-group mb-3">
									<span>Consum August</span>
									<input type="text" name="consum_estimataug21" class="form-control" value="<?php echo $result[0]["consum_estimataug21"];?>">
							</div>
							<div class="form-group mb-3">
									<span>Consum Septembrie</span>
									<input type="text" name="consum_estimatsep21" class="form-control" value="<?php echo $result[0]["consum_estimatsep21"];?>">
							</div>
							<div class="form-group mb-3">
									<span>Consum Octombrie</span>
									<input type="text" name="consum_estimatoct21" class="form-control" value="<?php echo $result[0]["consum_estimatoct21"];?>">
							</div>
							<div class="form-group mb-3">
									<span>Consum Noiembrie</span>
									<input type="text" name="consum_estimatnoi21" class="form-control" value="<?php echo $result[0]["consum_estimatnoi21"];?>">
							</div>
							<div class="form-group mb-3">
									<span>Consum Decembrie</span>
									<input type="text" name="consum_estimatdec21" class="form-control" value="<?php echo $result[0]["consum_estimatdec21"];?>">
							</div>
							<div class="form-group mb-3">
									<span>Numar AA</span>
									<input type="text" name="nr_aa" class="form-control" value="<?php echo $result[0]["nr_aa"];?>">
							</div>
							<div class="form-group mb-3">
									<span>Tip pret contract</span>
									<select name="tip_pret" class="custom-select">
										<option selected>Alege</option>
										<option value="Garantat" <?php if($result[0]["tip_pret"] == "Garantat") echo 'selected="selected"'; ?>>Garantat</option>
										<option value="Negarantat" <?php if($result[0]["tip_pret"] == "Negarantat") echo 'selected="selected"'; ?>>Negarantat</option>
									</select>
							</div>
							<div class="form-group mb-3">
									<span>Data final garantare (daca e negarantat se selecteaza data intrarii in vigoare)</span>
									<input type="date" name="data_garantare" class="form-control" value="<?php echo $result[0]["data_garantare"];?>">
							</div>
							<div class="form-group mb-3">
									<span>Pret Ianuarie</span>
									<input type="text" name="pret_ianuarie20" class="form-control" value="<?php echo $result[0]["pret_ianuarie20"];?>">
							</div>
							<div class="form-group mb-3">
									<span>Pret Februarie</span>
									<input type="text" name="pret_februarie20" class="form-control" value="<?php echo $result[0]["pret_februarie20"];?>">
							</div>
							<div class="form-group mb-3">
									<span>Pret Martie</span>
									<input type="text" name="pret_martie20" class="form-control" value="<?php echo $result[0]["pret_martie20"];?>">
							</div>
							<div class="form-group mb-3">
									<span>Pret Aprilie</span>
									<input type="text" name="pret_aprilie20" class="form-control" value="<?php echo $result[0]["pret_aprilie20"];?>">
							</div>
							<div class="form-group mb-3">
									<span>Pret Mai</span>
									<input type="text" name="pret_mai20" class="form-control" value="<?php echo $result[0]["pret_mai20"];?>">
							</div>
							<div class="form-group mb-3">
									<span>Pret Iunie</span>
									<input type="text" name="pret_iunie20" class="form-control" value="<?php echo $result[0]["pret_iunie20"];?>">
							</div>
							<div class="form-group mb-3">
									<span>Pret Iulie</span>
									<input type="text" name="pret_iulie20" class="form-control" value="<?php echo $result[0]["pret_iulie20"];?>">
							</div>
							<div class="form-group mb-3">
									<span>Pret August</span>
									<input type="text" name="pret_august20" class="form-control" value="<?php echo $result[0]["pret_august20"];?>">
							</div>
							<div class="form-group mb-3">
									<span>Pret Septembrie</span>
									<input type="text" name="pret_septembrie20" class="form-control" value="<?php echo $result[0]["pret_septembrie20"];?>">
							</div>
							<div class="form-group mb-3">
									<span>Pret Octombrie</span>
									<input type="text" name="pret_octombrie20" class="form-control" value="<?php echo $result[0]["pret_octombrie20"];?>">
							</div>
							<div class="form-group mb-3">
									<span>Pret Noiembrie</span>
									<input type="text" name="pret_noiembrie20" class="form-control" value="<?php echo $result[0]["pret_noiembrie20"];?>">
							</div>
							<div class="form-group mb-3">
									<span>Pret Decembrie</span>
									<input type="text" name="pret_decembrie20" class="form-control" value="<?php echo $result[0]["pret_decembrie20"];?>">
							</div>
							<div class="form-group mb-3">
									<span>Clauza penalitati reziliere</span>
									<select name="clauza_penalitati_rez" class="custom-select">
									<option selected>Alege</option>
										<option value="Da" <?php if($result[0]["clauza_penalitati_rez"] == "Da") echo 'selected="selected"'; ?>>Da</option>
										<option value="Nu" <?php if($result[0]["clauza_penalitati_rez"] == "Nu") echo 'selected="selected"'; ?>>Nu</option>
									</select>
							</div>
							<div class="form-group mb-3">
									<span>Cuantum penalitati</span>
									<select name="cuantum_penalizare" class="custom-select">
									<option selected>Alege</option>
										<option value="0%" <?php if($result[0]["cuantum_penalizare"] == "0%") echo 'selected="selected"'; ?>>0%</option>
										<option value="10%" <?php if($result[0]["cuantum_penalizare"] == "10%") echo 'selected="selected"'; ?>>10%</option>
										<option value="20%" <?php if($result[0]["cuantum_penalizare"] == "20%") echo 'selected="selected"'; ?>>20%</option>
										<option value="30%" <?php if($result[0]["cuantum_penalizare"] == "30%") echo 'selected="selected"'; ?>>30%</option>
										<option value="40%" <?php if($result[0]["cuantum_penalizare"] == "40%") echo 'selected="selected"'; ?>>40%</option>
										<option value="50%" <?php if($result[0]["cuantum_penalizare"] == "50%") echo 'selected="selected"'; ?>>50%</option>
										<option value="60%" <?php if($result[0]["cuantum_penalizare"] == "60%") echo 'selected="selected"'; ?>>60%</option>
										<option value="70%" <?php if($result[0]["cuantum_penalizare"] == "70%") echo 'selected="selected"'; ?>>70%</option>
										<option value="80%" <?php if($result[0]["cuantum_penalizare"] == "80%") echo 'selected="selected"'; ?>>80%</option>
										<option value="90%" <?php if($result[0]["cuantum_penalizare"] == "90%") echo 'selected="selected"'; ?>>90%</option>
										<option value="100%" <?php if($result[0]["cuantum_penalizare"] == "100%") echo 'selected="selected"'; ?>>100%</option>
									</select>
							</div>
							<div class="form-group mb-3">
									<span>Clauza PZU</span>
									<select name="clauza_pzu" class="custom-select">
									<option selected>Alege</option>
										<option value="Da" <?php if($result[0]["clauza_pzu"] == "Da") echo 'selected="selected"'; ?>>Da</option>
										<option value="Nu" <?php if($result[0]["clauza_pzu"] == "Nu") echo 'selected="selected"'; ?>>Nu</option>
									</select>
							</div>
							<div class="form-group mb-3">
									<span>Clauza circumstante</span>
									<select name="clauza_circumstante" class="custom-select">
									<option selected>Alege</option>
										<option value="Da" <?php if($result[0]["clauza_circumstante"] == "Da") echo 'selected="selected"'; ?>>Da</option>
										<option value="Nu" <?php if($result[0]["clauza_circumstante"] == "Nu") echo 'selected="selected"'; ?>>Nu</option>
									</select>
							</div>
							<div class="form-group mb-3">
									<span>Putere instalata > 1MVA</span>
									<select name="putere_instalata" class="custom-select">
									<option selected>Alege</option>
										<option value="Da" <?php if($result[0]["putere_instalata"] == "Da") echo 'selected="selected"'; ?>>Da</option>
										<option value="Nu" <?php if($result[0]["putere_instalata"] == "Nu") echo 'selected="selected"'; ?>>Nu</option>
									</select>
							</div>
							<div class="form-group mb-3">
									<span>Termen de plata (zile de la emitere la scadenta)</span>
									<input type="text" name="termen_plata" class="form-control" value="<?php echo $result[0]["termen_plata"];?>">
							</div>
							<div class="form-group mb-3">
									<span>Observatii client</span>
									<input name="observatii" class="form-control" value="<?php echo $result[0]["observatii"];?>">
							</div>
							<div class="form-group mb-3">
									<span>Tip client</span>
									<select name="tip_client" class="custom-select">
										<option selected>Alege</option>
										<option value="Partener" <?php if($result[0]["tip_client"] == "Partener") echo 'selected="selected"'; ?>>Partener</option>
										<option value="Oportunist" <?php if($result[0]["tip_client"] == "Oportunist") echo 'selected="selected"'; ?>>Oportunist</option>
									</select>
							</div>
							<input type="submit" name="submit" class="btn btn-danger mb-1" value="Salveaza" />
						</div>


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>







<?php
require_once("dbcontroller.php");
$db_handle = new DBController();
$result = $db_handle->runQuery("SELECT * FROM clientign WHERE id='" . $_GET["id"] . "'");
if (!empty($_POST["submit"])) {
	$actAditional = $_POST["nr_aa"];
	$actAditional++;	
	$query = "UPDATE clientign set nr_aa = '".$actAditional."' WHERE  id=".$_GET["id"];
	$result2 = $db_handle->executeQuery($query); 
	require_once __DIR__ . '/vendor/autoload.php';

	$numeClient = $_POST['denumire_client'];
	$agent = $_POST['agent_nova'];
	$nraa = $_POST['nr_aa'];
	$nrContract = $_POST['nr_contract'];
	$localitate = $_POST['localitate'];

	$mpdf = new \Mpdf\Mpdf();
	$astazi = date("d.m.Y");
	$data = '';
	$data .='<h3 align="center" style="font-size:12px">Act aditional nr. ' . $actAditional . ' din ' . $astazi . '<br />' . 'la ' . ' <br /> ' . 'Contractul de furnizare a energiei electrice nr.' . $nrContract . ' din data '.$_POST["data_semnare"].'</h3>';

	$data .= '<br /><strong style="font-size:12px">Partile contractante </strong><br />';
	$data .= '<br /><p style="font-size:12px; word-spacing:2px; text-align: justify"><strong style="font-size:12px">NOVA POWER & GAS S.R.L., </strong> cu sediul in Cluj-Napoca, str. Calea Turzii, nr. 217, judetul Cluj, telefon/fax: 0264-450401, 0264-450399, email: office@novapg.ro, avand Cod Unic de Inregistrare 18680651 cu atribut fiscal RO, inregistrata la Oficiul Registrului
	Comertului sub numarul J12/4872/2007, Identificator Unic la Nivel European (EUID) ROONRCJ12/4872/2007, cont de virament RO02BTRL01301202H24402XX, deschis la
	Banca Transilvania Sucursala Cluj, detinatoare a Licentei pentru furnizarea electrica nr. 2089/13.06.2018 eliberata de A.N.R.E., reprezentata legal prin Mircea Bica, Director General, avand calitatea de
	<strong><italic>Vanzator/Furnizor</italic></strong>, pe de o parte,</p>
	<p style="font-size:12px; word-spacing:2px; text-align: justify">Si</p> 
	
	<p style="font-size:12px; word-spacing:2px; text-align: justify">  <strong style="font-size:12px">' .$numeClient. ', </strong>
	cu sediul in ' .$_POST['localitate']. ', strada ' .$_POST['strada_comuna']. ', nr. ' .$_POST['numar']. ', judetul ' .$_POST['judet']. ', cod postal ' .$_POST['cod_postal'].
	', telefon: ' .$_POST['telefon_contact']. ', email ' .$_POST['email_contact']. ', inregistrata la oficiul registrului comertului sub
	nr. '.$_POST["reg_comert"].' CUI '.$_POST["cui"].' avand cont '.$_POST["iban_cont"].' deschis la '.$_POST["banca_cont"].' <strong> adresa de corespondenta </strong>
	in '.$_POST["localitate"].', str. '.$_POST['strada_comuna'].', nr. '.$_POST["numar"].', judetul '.$_POST["judet"].', cod postal '.$_POST["cod_postal"].', telefon '.$_POST["telefon_contact"].',
	email '.$_POST["email_contact"].', reprezentata prin '.$_POST["administrator_companie"].', in calitate de <strong><i> Client/Consumator</i></strong>,
	pe de alta parte,
	<p style="font-size:12px; word-spacing:2px; text-align: justify">au convenit sa incheie prezentul Act Aditional, cu respectarea urmatoarelor clauze:</p>
	<p style="font-size:12px; word-spacing:2px; text-align: justify"><strong>Art 1.</strong> Incepand cu data de <strong>'.$_POST["data_pret"].'</strong>
		se va modifica <strong><i>"Pretul energiei electrice active (Pee)"</i></strong> la noua valoare de <strong>'.$_POST["pret_nou"].' lei/MWh + TVA</strong>.</p>
	<p style="font-size:12px; word-spacing:2px; text-align: justify"><strong>Art 2.</strong> Celelalte prevederi ale contractului raman nemodificate, in masura in care nu contravin prevederilor prezentului Act Aditional</p>
	<p style="font-size:12px; word-spacing:2px; text-align: justify"><strong>Art 3.</strong> Prezentul Act aditional s-a incheiat astazi, <strong>'.$astazi.'</strong>, in 
		doua exemplare, cate unul pentru fiecare parte si face parte integranta din Contractul de furnizare a energiei electrice nr. '.$nrContract.' din data '.$_POST["data_semnare"].'.</p>
	</p>
	<br/><br/><br/><br/><br/>
	<h2 style="font-size:12px; word-spacing:2px; text-align: justify">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	Furnizor,&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	Client,</h2>
	<h2 style="font-size:12px; word-spacing:2px; text-align: justify">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	NOVA POWER & GAS S.R.L.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	'.$numeClient.',</h2>
	<span style="font-size:12px; word-spacing:2px; text-align: justify">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	Director General&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	Administrator,</span>
	<h2 style="font-size:12px; word-spacing:2px; text-align: justify">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	Mircea Bica&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	'.$_POST["administrator_companie"].',</h2>

	' ;
	$mpdf->writeHTML($data);
	$mpdf->Output('AA nr. ' .$actAditional. ' ' . $numeClient .'.pdf', 'D');

}
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
			<a href="veziee.php" class="dashboard-nav-item">Vezi clienti EE</a>
			<a href="vezign.php" class="dashboard-nav-item active">Vezi clienti GN</a>
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
                        <h1>Act aditional Gaze Naturale</h1>
                    </div>
                    <div class='card-body'>
					<form name="" method="post">
						<div class="formular-adaugare-client">
							<div class="form-group mb-3">
									<span>Nume client</span>
									<input type="text" name="denumire_client" class="form-control" value="<?php echo $result[0]["denumire_client"];?>">
							</div>
							<div class="form-group mb-3">
									<span>Agent vanzari</span>
									<input type="text" name="agent_nova" class="form-control" value="<?php echo $result[0]["agent_nova"];?>">
							</div>
							<div class="form-group mb-3">
									<span>Email agent</span>
									<input type="email" name="email_agent" class="form-control" value="<?php echo $result[0]["email_agent"];?>">
							</div>
							<div class="form-group mb-3">
									<span>Judet</span>
									<input type="text" name="judet" class="form-control" value="<?php echo $result[0]["judet"];?>">
							</div>
							<div class="form-group mb-3">
									<span>Numar contract</span>
									<input type="text" name="nr_contract" class="form-control" value="<?php echo $result[0]["nr_contract"];?>">
							</div>
							<div class="form-group mb-3">
									<span>Data contract</span>
									<input type="date" name="data_semnare" class="form-control" value="<?php echo $result[0]["data_semnare"];?>">
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
									<span>Administrator</span>
									<input type="text" name="administrator_companie" class="form-control" value="<?php echo $result[0]["administrator_companie"];?>">
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
									<span>Numar AA</span>
									<input type="text" name="nr_aa" class="form-control" value="<?php echo $result[0]["nr_aa"];?>">
							</div>
							<div class="form-group mb-3">
									<span>Data de cand se modifica pretul</span>
									<input type="date" name="data_pret" class="form-control">
							</div>
							<div class="form-group mb-3">
									<span>Pretul nou</span>
									<input type="text" name="pret_nou" class="form-control">
							</div>
							<input type="submit" name="submit" class="btn btn-danger mb-1" value="Genereaza AA" />
						</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




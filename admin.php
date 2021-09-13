<?php 
    session_start(); 
    require_once("dbcontroller.php");
    $db_handle = new DBController();
    if (!isset($_SESSION['username'])) {
        header("location:index.php");
    }
    $query = "SELECT * FROM clientienergie";
    $result = $db_handle->executeQuery($query);
    $num_rows = mysqli_num_rows($result);



    $query2 = "SELECT SUM(consum_estimatiul21) from clientienergie";
    $result2 = $db_handle->executeQuery($query2);

  



    $query = "SELECT * FROM clientign";
    $result = $db_handle->executeQuery($query);
    $num_rows2 = mysqli_num_rows($result);
    $query3 = "SELECT SUM(consum_estimatiul21) from clientign";
    $result3 = $db_handle->executeQuery($query3);


?>

<body>
<?php include "header.php" ?>
<div class='dashboard'>
<div class="dashboard-nav">
        <header>
		    <a href="" class="brand-logo"><span>Nova Power&Gas</span></a>
		</header>
		<nav class="dashboard-nav-list">
			<a href="admin.php" class="dashboard-nav-item active">Panou principal</a>
			<a href="adauga_client.php" class="dashboard-nav-item ">Adauga client dual</a>
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
                        <h1>Salut <?php echo $_SESSION['username']; ?></h1>
                    </div>
                    <div class='card-body'>
                        <h4>Rolul tau este: <strong><?php echo $_SESSION['role']; ?></strong></h4>
                        <br/>
                        <div class="row">
                            <div class="col">
                                <div class="card">
                                    <div class="card-body">
                                    <div class="d-flex justify-content-between px-md-1">
                                        <div class="align-self-center">
                                            <i class="fas fa-charging-station text-info fa-3x"></i>
                                        </div>
                                        <div class="text-end">
                                            <h3><?php echo $num_rows;?></h3>
                                            <p class="mb-0">Consumatori de Energie Electrica</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between px-md-1">
                                        <div class="align-self-center">
                                            <div class="animated bounce infinite">
                                                <i class="fas fa-fire-alt text-danger fa-3x"></i>
                                            </div>
                                        </div>
                                            <div class="text-end">
                                                <h3><?php echo $num_rows2; 
                                                ?></h3>
                                                <p class="mb-0">Consumatori de Gaze Naturale</p>
                                            </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br/>
                        <div class="row">
                            <div class="col">
                                <div class="card">
                                    <div class="card-body">
                                    <div class="d-flex justify-content-between px-md-1">
                                        <div class="align-self-center">
                                            <i class="fas fa-chart-line text-success fa-3x"></i>
                                        </div>
                                        <div class="text-end">
                                            <h3>
                                                <?php 
                                                    foreach($result2 as $row) {
                                                    echo number_format($row['SUM(consum_estimatiul21)'], 2, '.','');
                                                    };?>
                                            </h3>
                                            <p class="mb-0">MWh de energie electrica vanduti in luna precedenta</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between px-md-1">
                                        <div class="align-self-center">
                                            <i class="fas fa-chart-line text-warning fa-3x"></i>
                                        </div>
                                            <div class="text-end">
                                                <h3><?php                                                     
                                                    foreach($result3 as $row) {
                                                    echo number_format($row['SUM(consum_estimatiul21)'], 2, '.','');
                                                    }; 
                                                ?></h3>
                                                <p class="mb-0">MW de gaze naturale vanduti in luna precedenta</p>
                                            </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
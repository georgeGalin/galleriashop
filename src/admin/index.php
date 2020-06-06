<?php include ('src/utils/connessione.php');  ?>
<?php include ('header.php'); ?>
<?php
//if(!isset($_SESSION['username'])){

    //header('Location: ../../public');
//}
?>

<!-- INIZIO INDEX -->
        <div id="page-wrapper">
            <div class="container-fluid">

                <!-- Page Heading -->
                        <h1 class="page-header">
                           Pannello di amministrazione
                        </h1>




                <?php
                if($_SERVER['REQUEST_URI'] == "/src/admin/" || $_SERVER['REQUEST_URI'] == "/src/admin/index.php" ){

                   include("content_admin.php");
                }
                if(isset($_GET['ordini'])){
                    include("ordini.php");
                }

                if(isset($_GET['prodotti-admin'])){
                    include("prodotti-admin.php");
                }

                if(isset($_GET['aggiungi-pdt'])){
                    include("aggiungi-pdt.php");
                }

                if(isset($_GET['aggiorna-pdt'])){
                    include("aggiorna-pdt.php");
                }


                if(isset($_GET['rapporti'])){
                    include("rapporti.php");
                }

                ?>


            </div>
          </div>

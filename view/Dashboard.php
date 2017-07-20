<?php
session_start();
?>
<!DOCTYPE html>
<html lang="it">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>IoT RED BAMBOO SOFTWARE</title>

    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.css" rel="stylesheet">
    
    <!-- Custom CSS -->
    <link href="../css/stilePersonalizzato.css" rel="stylesheet">
    <link href="../css/sb-admin-2.css" rel="stylesheet">
    
    <!-- Custom Fonts -->
    <link href="../css/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->


    </head>

    <body>

        <div id="wrapper" >

            <!-- Navigation -->
            <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">
                    <a class="navbar-brand">IoT RED BAMBOO SOFTWARE</a>
                </div>
                <!-- /.navbar-header -->
                <ul class="nav navbar-top-links navbar-right">

                    <!-- /.dropdown -->

                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                          <li>
                            <a><i class="fa fa-user fa-fw"></i> Ciao, Admin ! </a>
                         </li>
                    </li>
                      <li class="divider"></li>
                      <li><a href="../index.html"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                      </li>
                  </ul>
              </li>
          </ul>
      </nav>

      <div id="wrapper" class="ambienti">
        <div class="row ">
            <div class="col-lg-12 ">
                <h1 class="page-header">Dashboard</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <?php

        include '../model/visualizzaSensori.php';
        include '../model/decodificaStringaSensori.php';

        $ID = $_GET['idAmbiente'];
        $statoSensori = getStatoSensori($ID);
        $graph = '<div class="row">
        			<div class="col-lg-12">
        				<div id="sensorchart" style="height: 250px;"></div>
        			</div>
        			</div>';
        echo $graph;
        
    ?>

</div>

<!-- jQuery -->
<script src="../js/jquery/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="../js/bootstrap/bootstrap.min.js"></script>

<script src="../css/morris.css"></script>

<script src="../js/raphael-min.js"></script>

<script src="../js/morris.min.js"></script>

<script>new Morris.Bar({
  // ID of the element in which to draw the chart.
  element: 'sensorchart',
  // Chart data records -- each entry in this array corresponds to a point on
  // the chart.
  data: [
    { sensori: 'Attivi', value: '<?php echo $statoSensori['ok']; ?>' },
    { sensori: 'Non attivi', value: '<?php echo $statoSensori['attesa']; ?>' },
    { sensori: 'Errore', value: '<?php echo $statoSensori['errore']; ?>' },
  ],
  // The name of the data record attribute that contains x-values.
  xkey: 'sensori',
  // A list of names of data record attributes that contain y-values.
  ykeys: ['value'],
  // Labels for the ykeys -- will be displayed when you hover over the
  // chart.
  labels: ['Numero sensori'],

  resize: true
});</script>

</body>

</html>

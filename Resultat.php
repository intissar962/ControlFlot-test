<!DOCTYPE html>
<html>
<head>
	<title>Test ControlFlot</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<!--chart-->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


</head>
<body>
<?php 
include 'dao.php'; 
$format = 'Y/m/d';
   // Vérifier si le formulaire est soumis 
   if ( isset( $_GET['submit'] ) ) {
     /* récupérer les données du formulaire en utilisant 
        la valeur des attributs name comme clé 
       */
    if(isset($_GET['conducteur'])){
        $conducteur = $_GET['conducteur']; 
        $date_debut = $_GET['date_debut']; 
        $date_fin = $_GET['date_fin'];
    }
    
  }
?>
<div class="container">
    <h3>Détails événement : </h3>
    <h6>Conducteur : <?php echo $conducteur; ?></h6>
    <table class="table">
  <thead class="thead-light">
    <tr>
      <th scope="col">Véhicule</th>
      <th scope="col">Infraction</th>
      <th scope="col">Date début</th>
      <th scope="col">Date fin</th>
      <th scope="col">Pénalités</th>
    </tr>
  </thead>
  <tbody>
  <?php 
     $req1 = selectEvents($conducteur, $date_debut, $date_fin);
     foreach ($req1 as $lignes) { ?>
     
     <tr>
        <td>
            <?php echo $lignes['vehicule']; ?>
        </td>
        <td>
            <?php echo $lignes['infraction']; ?>
        </td>
        <td>
            <?php 
                
                echo date($format, $lignes['debut']); 
            ?>
        </td>
        <td>
            <?php 
                
                echo date($format, $lignes['fine']); 
            ?>
        </td>
        <td>
            <?php echo $lignes['penalite']; ?>
        </td>
     </tr>
     
     <?php } ?> 
  
  </tbody>
</table>
</div>
<?php 
     function displayDates($date_debut, $date_fin, $format = 'd-m-Y' ) {
        $dates = array();
        $current = strtotime($date_debut);
        $date_fin = strtotime($date_fin);
        $stepVal = '+1 day';
        while( $current <= $date_fin ) {
           $dates[] = date($format, $current);
           $current = strtotime($stepVal, $current);
        }
        return $dates;
     }
     $DateGraphe = displayDates($date_debut, $date_fin);

    $req1 = selectEvents($conducteur, $date_debut, $date_fin);
    foreach ($req1 as $lignes) { 
        $penalite[] = $lignes['penalite'];
        $infraction[] = $lignes['infraction'];
    }
?>

<div class="container">
<h3>Total de pénalité par type : </h3>
  <canvas id="myChart"></canvas>
</div>
<script>
  const ctx = document.getElementById('myChart');

  new Chart(ctx, {
    type: 'bar',
    data: {
      labels: <?php echo json_encode($DateGraphe) ?>,
      datasets: [{
        label: 'Penalité par date',
        data: <?php echo json_encode($penalite) ?>,
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });
</script>
 

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
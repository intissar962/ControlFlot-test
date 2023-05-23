<!DOCTYPE html>
<html>
<head>
	<title>Test ControlFlot</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
 	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
  	<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
  	<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
<?php 
include 'dao.php'; 
?>
<div>
<div class="container">	
<form method="get" class="p-5" action="Resultat.php">
	<div>
		<label class="form-label">Choisissez un conducteur</label>
		<select class="form-control" name='conducteur'>
			<?php
                      $req1 = selectConducteur();
                      foreach ($req1 as $lignes) { ?>
					  <?php if (!empty($lignes['conducteur'])): ?>
					  <option >
					  	<?php echo $lignes['conducteur']; ?>
					  </option>
					  <?php endif ?>
            		  <?php } ?> 
					  
			
		</select>
	<div>
		<label class="form-label">Choisissez une date de début</label>
		<input type="date" name="date_debut" class="form-control">
	</div>
	<div>
		<label class="form-label">Choisissez une date de fin</label>
		<input type="date" name="date_fin" class="form-control">
	</div>
	<div>
		<p>Merci de choisir une période inférieur à 8 jours</p>
	</div>
	<div>
		<input type="submit" name="submit" value="Chercher" class="btn btn-primary">
	</div>
	<div></div>
</form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
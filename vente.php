<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vente</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-
T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min
.js" integrity="sha384-
C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>

<body>
    <?php
$tab_prod=[

["nom"=>"ecran","prix"=>250],
["nom"=>"clavier","prix"=>50],
["nom"=>"souris","prix"=>25],
["nom"=>"pc asus","prix"=>2500]

];
?>
    <div class="container pt-5">
        <form action="" method="post">
            <h2 class="text-center">Ajouter une vente</h2>
            <div class="row">
                <div class="col">
                    <label class="form-label" for="produit">Produit</label>
                    <select class="form-control" name="produit" id="produit" required>
                        <option value="">--- choisir un produit ---</option>

                        <?php
                                foreach($tab_prod as $prod)
                                echo "<option

                                value='".$prod["nom"]."'>".$prod["nom"]."</option>";

                        ?>
                    </select>
                </div>
                <div class="col">
                    <label class="form-label" for="prix">Prix</label>
                    <input class="form-control" type="number" name="prix" id="prix" required>
                </div>
                <div class="col">
                    <label class="form-label" for="qte">Quantité</label>
                    <input class="form-control" type="number" name="qte" value="1" id="qte" required>
                </div>
                <div class="col">
                    <label class="form-label d-block">&nbsp;</label>

                    <button type="submit" name="submit" class="btn btn-success">Ajouter</button>

                    <button type="reset" class="btn btn-secondary">Annuler</button>

                </div>
            </div>
        </form>

        <?php session_start();
                $ventes=[];
                if(isset($_SESSION["ventes"]))
                    $ventes=$_SESSION["ventes"];
                //ajouter vente
                if(isset($_POST["submit"])){
                $produit=$_POST['produit'];
                $qte=$_POST['qte'];
                $prix=$_POST['prix'];
                //alimenter la variable $ventes
                $ventes[]=["nom"=>$produit,"prix"=>$prix,"qte"=>$qte,"total"=>$prix*$qte];
                //conserver le tableau $ventes dans une session
                $_SESSION['ventes']=$ventes;
                header("location:vente.php");
                }
        ?>

        <hr>
<h2>ticket de vente</h2>
<table class="table table-stripped table-bordered">
    <thead>
        <tr>
            <th>Produit</th>
            <th>Qté</th>
            <th>PU</th>
            <th>TOTAL</th>
        </tr>
    </thead>
    <tbody>
    <?php 
    $net=0;
            foreach($ventes as $vente){
            $net += $vente["total"];
            echo "<tr>
            <td>".$vente["nom"]."</td>
            <td>".$vente["prix"]."TND</td>
            <td>".$vente["qte"]."</td>
            <td>".$vente["total"]."TND</td>
            </tr>";
            }
    ?>
    </tbody>
 </div>
</body>

</html>
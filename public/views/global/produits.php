<section class="menu">
    <?php
    foreach ($produits as $produit) {
        $grams = 0;
        $calories = 0;
    ?>
        <div class="card">
            <img src="public/assets/images/<?= $produit->getImage() ?>" class="menuImg" alt="pizza_menu" style="width:100%">
            <h2><?= $produit->getNom() ?></h2>
            <div class="container description">
                <p><?= $produit->getDescription() ?></p>
            </div>
            <div class="valeurNutriContainer">
                <p class="valeurNutri">
                    Composition : <br>
                    <?php foreach ($produit->getIngredients() as $ingredient) {
                        if ($ingredient->getPoids() != 100) {
                            $nouvelleValeur = ($ingredient->getPoids() / 100) / $ingredient->getCalories();
                        } else {
                            $nouvelleValeur = $ingredient->getCalories();
                        }
                        echo $ingredient->getNom() . " - " . $ingredient->getPoids() . "g - " . $ingredient->getCalories() . " calories/100g <br>";
                        $grams += $ingredient->getPoids();
                        $calories += round($nouvelleValeur, 1, PHP_ROUND_HALF_UP);
                    }
                    echo "<br>Calories : " . $calories . " kcal. <br> Poids : " . $grams . "g.";
                    ?>
                </p>
            </div>
            <div class="container">
                <div class="divAcces">
                    <a href="" class="btnAcces" id="form" data-nom="<?= $produit->getNom() ?>" data-prix="<?= $produit->getPrix() ?>">Ajouter au panier - <?= $produit->getPrix()  ?> €</a>
                </div>
            </div>
        </div>
    <?php } ?>
</section>
<section class="menu">
    <?php
    foreach ($produits as $produit) {
        $grams = 0;
        $calories = 0;
    ?>
        <div class="card">
            <img src="assets/src/<?= $produit['pic_name'] ?>" class="menuImg" alt="pizza_menu" style="width:100%">
            <h2><?= $produit['nom'] ?></h2>
            <div class="container description">
                <p><?= $produit['description'] ?></p>
            </div>
            <div class="valeurNutriContainer">
                <p class="valeurNutri">
                    Composition : <?php foreach ($produit['ingredients'] as $ingredient) {
                                        echo $ingredient['nom'] . " - " . $ingredient['poids'] . "g - " . $ingredient['calories'] . "/100g <br>";
                                        $grams += $ingredient['poids'];
                                        $calories += $ingredient['calories'];
                                    }
                                    echo "Calories : " . $calories . "<br> Poids : " . $grams . "g.";
                                    ?>
                </p>
            </div>
            <div class="container">
                <div class="divAcces">
                    <a href="?page=produits" class="btnAcces" id="form">Ajouter au panier - <?= $produit['price'] ?> €</a>
                </div>
            </div>
        </div>
    <?php } ?>
</section>
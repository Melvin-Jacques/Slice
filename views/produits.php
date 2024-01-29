<section class="menu">
    <?php
    $grams = 0;
    $calories = 0;
    foreach ($produits as $produit) { ?>
        <div class="card">
            <img src="assets/src/<?= $produit['pic_name'] ?>" class="menuImg" alt="pizza_menu" style="width:100%">
            <h2><?= $produit['nom'] ?></h2>
            <div class="container description">
                <p><?= $produit['description'] ?></p>
            </div>
            <div class="container valueNutri">
                <p>Composition : <?php foreach ($produit['ingredients'] as $ingredient) {
                                    echo $ingredient['nom'] . " - " . $produit['ingredients']['poids'] ."g - ". $produit['ingredients']['calories'] . "/100g <br>";
                                    $grams += $produit['ingredients']['poids'];
                                    $calories += $produit['ingredients']['calories'];
                                    echo "Calories : " . $calories . "<br> Poids :" . $grams;
                }
                                    ?>
                </p>
                <!-- ça c'est faux ca sera pas dans la session mais dans les classes donc chercher les infos là -->
            </div>
            <div class="container">
                <div class="divAcces">
                    <a href="#" class="btnAcces">Ajouter au panier - <?= $produit['price'] ?> €</a>
                </div>
            </div>
        </div>
    <?php } ?>
</section>
<section class="menu">
    <?php 
    foreach ($produitdatas as $produitdata){ ?>
    <div class="card">
        <img src="assets/src/<?= $produitdata['pic_name'] ?>" class="menuImg" alt="pizza_menu" style="width:100%">
        <h2><?= $produitdata['name'] ?></h2>
        <div class="container description">
            <p><?= $produitdata['description'] ?></p>
        </div>
        <div class="container valueNutri">
            <p>Composition : </p>
            Ingredients <br>
            Grams :<br>
            Calories :</p> 
            <!-- ça c'est faux ca sera pas dans la session mais dans les classes donc chercher les infos là -->
        </div>
        <div class="container">
            <div class="divAcces">
                <a href="#" class="btnAcces">Ajouter au panier - <?= $produitdata['price'] ?> €</a>
            </div>
        </div>
    </div>
    <?php }?>
</section>
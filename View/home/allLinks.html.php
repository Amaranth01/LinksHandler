<?php

use App\Controller\AbstractController;

?>

<h1>Bienvenue sur votre link handler</h1>

<p id="addLink">
    <a href='/index.php?c=home&a=page-add-links'><span>+</span> Ajouter un lien</a>
</p>
<div id="container">
    <?php

    if (!AbstractController::userConnected()) {
        $this->render('forms/login');
    }
    foreach ($data['link'] as $link) { ?>
        <div class="content">
            <h3><?= $link->linkTitle ?></h3>
            <img src="/uploads/<?= $link->linkImage ?>" alt="Image du lien">
            <p>
                <span>votre lien :</span> <br>
                <a href="<?= $link->linkName ?>" target="_blank"><?= $link->linkName ?></a>
            </p>
        </div>
        <?php
    } ?>
</div>
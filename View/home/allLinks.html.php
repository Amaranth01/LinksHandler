<?php

use App\Controller\AbstractController;

?>

<h1>Bienvenue sur votre link handler</h1>

<a href='/index.php?c=home&a=page-add-links'><span>+</span> Ajouter un lien</a>

<?php

    if(!AbstractController::userConnected()) {
        $this->render('forms/login');
    }
    foreach ($data['link'] as $link) { ?>
        <div class="content">
            <h3><?=$link->linkTitle?></h3>
<!--            <img src="/assets/img/--><?php //=$link->linkImage?><!--" alt="Image du lien">-->
            <p><?=$link->linkName?></p>
        </div>
<?php
    } ?>
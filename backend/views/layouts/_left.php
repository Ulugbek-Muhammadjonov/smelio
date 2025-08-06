<?php

use soft\widget\adminlte3\Menu;
use yii\helpers\Url;


$menuItems = [
    [
        'label' => "Dashboard",
        'url' => ['/site/index'],
        'icon' => 'home',
    ],
    [
        'label' => "Sozlamalar",
        'icon' => 'cogs',
        'items' => [
            ['label' => 'Tarjimalar', 'url' => ['/translation-manager/default/index'], 'icon' => 'language'],
        ]
    ],
    [
        'label' => 'Keshni tozalash', 'url' => ['/site/cache-flush'], 'icon' => 'broom',

    ],
];

?>

<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="<?= to(['/site/index']) ?>" class="brand-link">
        <img src="<?= Url::base() ?>/template/adminlte3//img/AdminLTELogo.png" alt="AdminLTE Logo"
             class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light"><?= Yii::$app->name ?></span>
    </a>
    <div class="sidebar">
        <nav class="mt-2">
            <?= Menu::widget([
                'items' => $menuItems,
            ]) ?>
        </nav>
    </div>
</aside>

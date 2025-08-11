<?php

use soft\widget\adminlte3\Menu;
use yii\helpers\Url;
use yii\web\View;

/* @var $this View */


$menuItems = [
        [
                'label' => "Dashboard",
                'url' => ['/site/index'],
                'icon' => 'home',
        ],
        [
                'label' => "Bannerlar",
                'url' => ['/banner/index'],
                'icon' => 'images',
        ],
        [
                'label' => "Bizning jamoa",
                'url' => ['/our-team/index'],
                'icon' => 'users',
        ],
        [
                'label' => "Xizmat sozlamalari",
                'icon' => 'cogs',
                'items' => [
                        ['label' => 'Kategoriyalari', 'url' => ['/service-category/index'], 'icon' => 'circle'],
                        ['label' => 'Xizmatlar', 'url' => ['/service/index'], 'icon' => 'circle'],
                ]
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

<?php
/*
 *  @author Shukurullo Odilov <shukurullo0321@gmail.com>
 *  @link telegram: https://t.me/yii2_dasturchi
 *  @date 11.05.2022, 11:26
 */

use soft\widget\bs4\TabMenu;

/** @var \common\modules\user\models\User $model */

?>

<?= TabMenu::widget([

    'items' => [
        [
            'label' => "Um. ma'lumotlar",
            'url' => ['user/view', 'id' => $model->id],
            'icon' => 'info-circle'
        ],
        [
            'label' => "Qurilmalar",
            'url' => ['user/devices', 'id' => $model->id],
            'icon' => 'fas fa-laptop'
        ],
        [
            'label' => "To'lovlari",
            'url' => ['user/payments', 'id' => $model->id],
            'icon' => 'coins'
        ],
        [
            'label' => "Ta'riflari",
            'url' => ['user/tariffs', 'id' => $model->id],
            'icon' => 'list',
        ],
        [
            'label' => "Saqlanganlar",
            'url' => ['user/favorites', 'id' => $model->id],
            'icon' => 'heart',
        ],
        [
            'label' => "Yozgan fikrlari",
            'url' => ['user/comments', 'id' => $model->id],
            'icon' => 'comment',
        ],
        [
            'label' => "Sotib olganlari",
            'url' => ['user/order', 'id' => $model->id],
            'icon' => 'shopping-cart',
        ],
        [
            'label' => "Like",
            'url' => ['user/likes', 'id' => $model->id],
            'icon' => 'thumbs-up',
        ],
        [
            'label' => "Dislike",
            'url' => ['user/dislikes', 'id' => $model->id],
            'icon' => 'thumbs-down',
        ],
        [
            'label' => " ",
            'url' => ['user/views', 'id' => $model->id],
            'icon' => 'eye',
        ],

    ]

]) ?>

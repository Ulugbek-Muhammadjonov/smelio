<?php

use common\models\IncomingMessage;
use common\modules\post\models\Post;
use common\modules\post\models\PostCategory;
use soft\widget\adminlte3\InfoBoxWidget;

$this->title = Yii::$app->name;

$user = Yii::$app->user;

?>
<section class="content">
    <div class="container-fluid">
        <h1><?=$this->title?></h1>
    </div>
</section>
<?php

/* @var $this yii\web\View */
/* @var $products */

$this->title = 'Butterfly';
?>
<div class="site-index">

    <div class="body-content">

        <div class="row">

            <?php
            foreach ($products as $item) {
                ?>
                <div class="col-md-4 col-sm-6 col-xs-12 wow fadeInUp">
                    <div class="pricing_plan">

                        <div class="plan_title montserrat-text uppercase"><?= $item['location'] ?></div>
                        <div class="plan_title montserrat-text uppercase"><img src="/<?=$item['plan_picture']?>" alt="image"></div>
                        <div class="plan_price montserrat-text uppercase"><?= $item['price'] ?></div>

                        <a href="<?= \yii\helpers\Url::to(['cart/add', 'id' => $item['id']])?>" data-id="<?= $item['id']?>" class="btn green add-to-cart"><span>Купить</span></a>
                    </div>
                </div>
                <?php
            }
            ?>


        </div>

    </div>
</div>

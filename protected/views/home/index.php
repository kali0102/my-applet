<?php
/* @var $this Site2Controller */

$this->pageTitle = Yii::app()->name;
?>


<table>
    <?php if (!empty($items)): ?>
        <?php $i = 1; ?>
        <?php $count = count($items); ?>
        <?php foreach ($items as $item): ?>

            <?php if ($i == 1): ?>
                <tr>
            <?php endif; ?>
            <td>
                <h1>
                    <a href="<?= $this->createUrl('/item/view', ['id' => $item->id]) ?>">
                        <?= $item->name ?> <span style="font-size: 16px">(<?= $item->siteCount ?>)</span>
                    </a>
                </h1>
            </td>
            <?php if ($i % 5 == 0): ?>
                </tr>
                <tr>
            <?php endif; ?>

            <?php if ($i == $count): ?>
                </tr>
            <?php endif; ?>

            <?php $i++; ?>
        <?php endforeach; ?>
    <?php endif; ?>
</table>
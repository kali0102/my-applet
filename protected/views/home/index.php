<?php
/* @var $this Site2Controller */

$this->pageTitle = Yii::app()->name;
?>


<table>


    <?php if (!empty($items)): ?>
        <?php $i = 0; ?>

        <?php $count = count($items); ?>
        <?php foreach ($items as $item): ?>

            <?php if ($i == 0 || $i % 6 == 0): ?>
                <tr>
            <?php endif; ?>

            <td>
                <h1>
                    <a href="<?= $this->createUrl('/item/view', ['id' => $item->id]) ?>">
                        <?= $item->name ?>
                    </a>
                </h1>
            </td>

            <?php if ($i > 0 && ($i == $count || $i % 5 == 0)): ?>
                </tr>
            <?php endif; ?>

            <?php $i++; ?>
        <?php endforeach; ?>


    <?php endif; ?>


</table>
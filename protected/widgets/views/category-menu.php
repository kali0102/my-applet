<ul>
    <?php foreach ($categories as $ct): ?>
        <li><?php echo CHtml::link($ct->name, ['category/view']) . ' (' . $ct->archiveCount . ')'; ?></li>
    <?php endforeach; ?>
</ul>
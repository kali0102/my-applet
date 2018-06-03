<div class="post">
    <div class="title">
        <h3><?php echo CHtml::link(CHtml::encode($data->title), $data->url); ?></h3>
    </div>
<!--    <div class="author">-->
<!--        posted by --><?php ////'' . ' on ' . date('F j, Y', $data->created_at); ?>
<!--    </div>-->
    <div class="content">
        <?php
        $this->beginWidget('CMarkdown', array('purifyOutput' => true));
        echo $data->content;
        $this->endWidget();
        ?>
    </div>
    <div class="nav">
        <b>Tags:</b>
        <?php echo implode(', ', $data->tagLinks); ?>
        <br/>
        <?php echo CHtml::link('Permalink', $data->url); ?> |
        <?php echo CHtml::link("Comments ({$data->commentCount})", $data->url . '#comments'); ?> |
        Last updated on <?php echo date('F j, Y', $data->updated_at); ?>
    </div>
</div>
<br/>
<br/>
<br/>

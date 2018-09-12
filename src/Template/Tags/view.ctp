<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Tag $tag
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Tag'), ['action' => 'edit', $tag->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Tag'), ['action' => 'delete', $tag->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tag->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Tags'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Tag'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Pictures'), ['controller' => 'Pictures', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Picture'), ['controller' => 'Pictures', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="tags view large-9 medium-8 columns content">
    <h3><?= h($tag->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Title') ?></th>
            <td><?= h($tag->title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($tag->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($tag->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($tag->modified) ?></td>
        </tr>
    </table>


    <div class="related">
        <h4><?= __('Related Pictures') ?></h4>
        <?php if (!empty($tag->pictures)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Job Id') ?></th>
                <th scope="col"><?= __('Picture') ?></th>
                <th scope="col"><?= __('Picture Dir') ?></th>
                <th scope="col"><?= __('Picture Name') ?></th>
                <th scope="col"><?= __('Picture Size') ?></th>
                <th scope="col"><?= __('Picture Type') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($tag->pictures as $pictures): ?>
            <tr>
                <td><?= h($pictures->id) ?></td>
                <td><?= h($pictures->job_id) ?></td>
                <td><?= h($pictures->picture) ?></td>
                <td><?= h($pictures->picture_dir) ?></td>
                <td><?= h($pictures->picture_name) ?></td>
                <td><?= h($pictures->picture_size) ?></td>
                <td><?= h($pictures->picture_type) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Pictures', 'action' => 'view', $pictures->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Pictures', 'action' => 'edit', $pictures->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Pictures', 'action' => 'delete', $pictures->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pictures->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>

<?php 
    $columnClass = 4;
    if (!empty($tag->pictures)) {
        foreach ($tag->pictures as $pictures) {
            //echo '<img src="'. '../../' . $pictures->picture_dir . $pictures->picture_name . '">';



        ?>
        <div class="col-<?= $columnClass; ?>" style="margin-bottom: 20px;">
            <div class="accordion" id="accordion_<?= $pictures->id; ?>">
                <div class="card bg-dark text-white">

                    
                        <img class="card-img" src="../../<?= $pictures->picture_dir . $pictures->picture_name; ?>" alt="Card image" style="padding-bottom: 1px;">
                    
                    <div class="card-img-overlay" style="padding: 0px 0px 24px 0px;">
                        <div style="background-color: white; opacity: 0.75; padding: 0px 5px 0px 5px;">
                            <span>
                                <?= $pictures->has('job') ? $this->Html->link($pictures->job->job_number, ['controller' => 'Jobs', 'action' => 'view', $pictures->job->id]) : '' ?>
                            </span>
                            <span class="float-right">
                                <?php echo $this->Fa->link('cloud-download-alt', __(''), ['action'=>'download', $pictures->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $pictures->id]) ?>
                                <?= $this->Html->link(__('View'), ['action' => 'view', $pictures->id]) ?>
                                <?php echo $this->Fa->link('trash-alt', __(''), ['action'=>'delete', $pictures->id], ['confirm' => __('Are you sure you want to delete this picture?')]) ?>
                                <a href="#" data-toggle="collapse" data-target="#collapse_<?= $pictures->id; ?>" aria-expanded="false" aria-controls="collapse_<?= $pictures->id; ?>"><i class="fas fa-info-circle"></i></a>
                            </span>
                        </div>
                        <a data-toggle="modal" href="#enlargePicture" role="button" data-whatever="<?= $pictures->id; ?>">
                            <div style="height: 100%;"></div>
                        </a>
                    </div>
                    <div id="collapse_<?= $pictures->id; ?>" class="collapse" aria-labelledby="heading_<?= $pictures->id; ?>" data-parent="#accordion_<?= $pictures->id; ?>">
                      <p class="card-text"><?= $pictures->picture_name; ?></p>





                    </div>
                </div>
            </div>
        </div>
        <?php







        }
    }
?>





</div>

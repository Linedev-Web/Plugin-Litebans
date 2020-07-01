<?= $this->Html->css('Litebans.style.css') ?>
<div id="page--liteban" class="container-fluid plugin-liteban">
    <div class="row">
        <div class="col-md-12">

            <div class="container-background">
                <?= $this->Html->image('bg/wiki.jpeg', array('alt' => 'vote', 'classe' => 'img-responsive')); ?>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 text-center">
                        <h1 class="page--title">Sanctions</h1>
                    </div>
                    <div class="col-sm-12">
                        <table class="table" style="table-layout: fixed;word-wrap: break-word;">
                            <thead>
                            <tr>
                                <th><?= $Lang->get('USER__USERNAME') ?></th>
                                <th><?= $Lang->get('GLOBAL__ACTIONS') ?></th>
                                <th><?= $Lang->get('GLOBAL__CATEGORY') ?></th>
                                <th><?= $Lang->get('GLOBAL__CREATED') ?></th>
                            </tr>
                            </thead>
                            <tbody>
                        <?php foreach ($bans as $key => $value): ?>
                            <tr>
                                <td> <?=$value['Bans']['name'] ?></td>

                            </tr>
                        <?php endforeach; ?>

                            </tbody>
                        </table>
                        <?= $this->Paginator->prev('Précédents') ?>
                        <?= $this->Paginator->numbers() ?>
                        <?= $this->Paginator->next('Suivants') ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
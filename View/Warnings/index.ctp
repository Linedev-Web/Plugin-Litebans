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
                                <th>Pseudo</th>
                                <th>Banni par</th>
                                <th>Raison</th>
                                <th>Date</th>
                                <th>Ban jusqu'au</th>
                                <th>Active</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($warnings as $key => $value): ?>
                                <tr>
                                    <td>
                                        <div class="liteban--user">
                                            <img src="https://crafatar.com/avatars/<?= $value['Warnings']['uuid'] ?>?size=32"
                                                 alt="<?= $value['Warnings']['name'] ?>"
                                                 title="<?= $value['Warnings']['name'] ?>">
                                            <?= $value['Warnings']['name'] ?>
                                        </div>
                                    </td>
                                    <td>
                                        <?php if ($value['Warnings']['banned_by_name'] == 'Console'): ?>
                                            <img src="https://crafatar.com/avatars/f78a4d8d-d51b-4b39-98a3-230f2de0c670?size=32"
                                                 alt="<?= $value['Warnings']['banned_by_name'] ?>"
                                                 title="<?= $value['Warnings']['banned_by_name'] ?>">
                                        <?php else: ?>
                                            <div class="liteban--user">
                                                <img src="https://crafatar.com/avatars/<?= $value['Warnings']['uuid'] ?>?size=32"
                                                     alt="<?= $value['Warnings']['name'] ?>"
                                                     title="<?= $value['Warnings']['name'] ?>">
                                                <?= $value['Warnings']['banned_by_name'] ?>
                                            </div>
                                        <?php endif; ?>
                                    </td>
                                    <td> <?= $value['Warnings']['reason'] ?></td>
                                    <td> <?= $value['Warnings']['time'] ?></td>
                                    <td> <?= $value['Warnings']['until'] ?></td>
                                    <td>
                                        <?php if ($value['Warnings']['active']): ?>
                                            <i class="fa fa-check"></i>
                                        <?php else: ?>
                                            <i class="fa fa-times"></i>
                                        <?php endif; ?>
                                    </td>

                                </tr>
                            <?php endforeach; ?>

                            </tbody>
                        </table>
                        <?php if (count($warnings) >= 10): ?>
                            <?= $this->Paginator->prev('Précédents') ?>
                            <?= $this->Paginator->numbers() ?>
                            <?= $this->Paginator->next('Suivants') ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
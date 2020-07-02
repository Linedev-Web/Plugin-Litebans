<?= $this->Html->css('Litebans.style.css') ?>
<div id="page--litebans" class="container-fluid plugin-litebans">
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
                    <div class="col-md-12">

                        <ul class="nav nav-tabs" id="litebans--nav" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active">Bans</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link">Mutes</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link">Kicks</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link">Warnings</a>
                                </li>
                        </ul>
                    </div>
                    <div class="col-sm-12">
                        <form class="form-inline"
                              action="<?= $this->Html->url(array('controller' => 'profile', 'action' => 'index')) ?>"
                              method="get">

                            <div class="form-group mx-sm-3 mb-2">
                                <label for="search" class="sr-only">Pseudo</label>
                                <input type="search" class="form-control" id="search" name="search"
                                       placeholder="Pseudo">
                            </div>
                            <button type="submit" class="btn btn-primary">Rechercher</button>
                        </form>
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Pseudo</th>
                                <th>Banni par</th>
                                <th>Raison</th>
                                <th>Date de début</th>
                                <th>Date de fin</th>
                                <th>Active</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($bans as $key => $value): ?>
                                <tr>
                                    <td>
                                        <a href="/sanction/profile?search=<?= $value['Bans']['name'] ?>"
                                           class="liteban--user">
                                            <img src="https://crafatar.com/avatars/<?= $value['Bans']['uuid'] ?>?size=32"
                                                 alt="<?= $value['Bans']['name'] ?>"
                                                 title="<?= $value['Bans']['name'] ?>">
                                            <span><?= $value['Bans']['name'] ?></span>
                                        </a>
                                    </td>
                                    <td>
                                        <?php if ($value['Bans']['banned_by_name'] == 'Console'): ?>
                                            <img src="https://crafatar.com/avatars/f78a4d8d-d51b-4b39-98a3-230f2de0c670?size=32"
                                                 alt="<?= $value['Bans']['banned_by_name'] ?>"
                                                 title="<?= $value['Bans']['banned_by_name'] ?>">
                                        <?php else: ?>
                                            <div class="liteban--user">
                                                <img src="https://crafatar.com/avatars/<?= $value['Bans']['uuid'] ?>?size=32"
                                                     alt="<?= $value['Bans']['name'] ?>"
                                                     title="<?= $value['Bans']['name'] ?>">
                                                <span><?= $value['Bans']['banned_by_name'] ?></span>
                                            </div>
                                        <?php endif; ?>
                                    </td>
                                    <td> <?= $value['Bans']['reason'] ?></td>
                                    <td> <?= $value['Bans']['date_debut'] ?></td>
                                    <td> <?= $value['Bans']['date_fin'] ?>
                                        <?php if ($value['Bans']['date_reset']): ?>
                                            <small>
                                                Temps restant : <?= $value['Bans']['date_reset'] ?>
                                            </small>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <?php if ($value['Bans']['active']): ?>
                                            <i class="fa fa-check"></i>
                                        <?php else: ?>
                                            <i class="fa fa-times"></i>
                                        <?php endif; ?>
                                    </td>

                                </tr>
                            <?php endforeach; ?>

                            </tbody>
                        </table>
                        <?php if (count($bans) >= 10): ?>
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
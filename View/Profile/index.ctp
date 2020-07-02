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
                        <h1 class="page--title">Profile </h1>
                        <div class="liteBans--profile">
                            <img src="https://crafatar.com/renders/body/<?= $history['uuid'] ?>?size=4&default=MHF_Steve&overlay">
                            <h2><?= $history['name'] ?></h2>
                            <div>

                            </div>
                        </div>
                        <ul class="nav nav-tabs" id="litebans--nav-profile" role="tablist">
                            <?php if (count($listBans) >= 1): ?>
                                <li class="nav-item">
                                    <a class="nav-link active" id="bans-tab" data-toggle="tab" href="#bans" role="tab"
                                       aria-controls="bans" aria-selected="true">Bans</a>
                                </li>
                            <?php endif; ?>
                            <?php if (count($listBans) >= 1): ?>
                                <li class="nav-item">
                                    <a class="nav-link" id="mutes-tab" data-toggle="tab" href="#mutes" role="tab"
                                       aria-controls="mutes" aria-selected="false">Mutes</a>
                                </li>
                            <?php endif; ?>
                            <?php if (count($listKicks) >= 1): ?>
                                <li class="nav-item">
                                    <a class="nav-link" id="kicks-tab" data-toggle="tab" href="#kicks" role="tab"
                                       aria-controls="kicks" aria-selected="false">Kicks</a>
                                </li>
                            <?php endif; ?>
                            <?php if (count($listWarnings) >= 1): ?>
                                <li class="nav-item">
                                    <a class="nav-link" id="warnings-tab" data-toggle="tab" href="#warnings" role="tab"
                                       aria-controls="warnings" aria-selected="false">Warnings</a>
                                </li>
                            <?php endif; ?>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="bans" role="tabpanel" aria-labelledby="bans-tab">
                                <table class="table ">
                                    <thead>
                                    <tr>
                                        <th>Reason</th>
                                        <th>Banni par</th>
                                        <th>Date de début</th>
                                        <th>Date de fin</th>
                                        <th>Seveur</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($listBans as $key => $value): ?>
                                        <tr>
                                            <td><?= $value['reason'] ?></td>
                                            <td>
                                                <?php if ($value['banned_by_name'] == 'Console'): ?>
                                                    <img src="https://crafatar.com/avatars/f78a4d8d-d51b-4b39-98a3-230f2de0c670?size=32"
                                                         alt="<?= $value['banned_by_name'] ?>"
                                                         title="<?= $value['banned_by_name'] ?>">
                                                <?php else: ?>
                                                    <div class="liteban--user">
                                                        <img src="https://crafatar.com/avatars/<?= $value['banned_by_uuid'] ?>?size=32"
                                                             alt="<?= $value['banned_by_name'] ?>"
                                                             title="<?= $value['banned_by_name'] ?>">
                                                        <span><?= $value['banned_by_name'] ?></span>
                                                    </div>
                                                <?php endif; ?>
                                            </td>
                                            <td><?= $value['time'] ?></td>
                                            <td>
                                                <?= $value['until'] ?>
                                                <?php if ($value['date_reset']): ?>
                                                    <small>
                                                        Temps restant : <?= $value['date_reset'] ?>
                                                    </small>
                                                <?php endif; ?>
                                            </td>
                                            <td><?= $value['server_origin'] ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="tab-pane fade" id="mutes" role="tabpanel" aria-labelledby="mutes-tab">

                                <table class="table ">
                                    <thead>
                                    <tr>
                                        <th>Reason</th>
                                        <th>Banni par</th>
                                        <th>Date de début</th>
                                        <th>Date de fin</th>
                                        <th>Seveur</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($listMutes as $key => $value): ?>
                                        <tr>
                                            <td><?= $value['reason'] ?></td>
                                            <td>
                                                <?php if ($value['banned_by_name'] == 'Console'): ?>
                                                    <img src="https://crafatar.com/avatars/f78a4d8d-d51b-4b39-98a3-230f2de0c670?size=32"
                                                         alt="<?= $value['banned_by_name'] ?>"
                                                         title="<?= $value['banned_by_name'] ?>">
                                                <?php else: ?>
                                                    <div class="liteban--user">
                                                        <img src="https://crafatar.com/avatars/<?= $value['banned_by_uuid'] ?>?size=32"
                                                             alt="<?= $value['banned_by_name'] ?>"
                                                             title="<?= $value['banned_by_name'] ?>">
                                                        <span><?= $value['banned_by_name'] ?></span>
                                                    </div>
                                                <?php endif; ?>
                                            </td>
                                            <td><?= $value['time'] ?></td>
                                            <td>
                                                <?= $value['until'] ?>
                                                <?php if ($value['date_reset']): ?>
                                                    <small>
                                                        Temps restant : <?= $value['date_reset'] ?>
                                                    </small>
                                                <?php endif; ?>
                                            </td>
                                            <td><?= $value['server_origin'] ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="tab-pane fade" id="kicks" role="tabpanel" aria-labelledby="kicks-tab">

                                <table class="table ">
                                    <thead>
                                    <tr>
                                        <th>Reason</th>
                                        <th>Banni par</th>
                                        <th>Date</th>
                                        <th>Seveur</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($listKicks as $key => $value): ?>
                                        <tr>
                                            <td><?= $value['reason'] ?></td>
                                            <td>
                                                <?php if ($value['banned_by_name'] == 'Console'): ?>
                                                    <img src="https://crafatar.com/avatars/f78a4d8d-d51b-4b39-98a3-230f2de0c670?size=32"
                                                         alt="<?= $value['banned_by_name'] ?>"
                                                         title="<?= $value['banned_by_name'] ?>">
                                                <?php else: ?>
                                                    <div class="liteban--user">
                                                        <img src="https://crafatar.com/avatars/<?= $value['banned_by_uuid'] ?>?size=32"
                                                             alt="<?= $value['banned_by_name'] ?>"
                                                             title="<?= $value['banned_by_name'] ?>">
                                                        <span><?= $value['banned_by_name'] ?></span>
                                                    </div>
                                                <?php endif; ?>
                                            </td>
                                            <td><?= $value['time'] ?></td>
                                            <td><?= $value['server_origin'] ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="tab-pane fade" id="warnings" role="tabpanel" aria-labelledby="warnings-tab">

                                <table class="table ">
                                    <thead>
                                    <tr>
                                        <th>Reason</th>
                                        <th>Banni par</th>
                                        <th>Date</th>
                                        <th>Seveur</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($listWarnings as $key => $value): ?>
                                        <tr>
                                            <td><?= $value['reason'] ?></td>
                                            <td>
                                                <?php if ($value['banned_by_name'] == 'Console'): ?>
                                                    <img src="https://crafatar.com/avatars/f78a4d8d-d51b-4b39-98a3-230f2de0c670?size=32"
                                                         alt="<?= $value['banned_by_name'] ?>"
                                                         title="<?= $value['banned_by_name'] ?>">
                                                <?php else: ?>
                                                    <div class="liteban--user">
                                                        <img src="https://crafatar.com/avatars/<?= $value['banned_by_uuid'] ?>?size=32"
                                                             alt="<?= $value['banned_by_name'] ?>"
                                                             title="<?= $value['banned_by_name'] ?>">
                                                        <span><?= $value['banned_by_name'] ?></span>
                                                    </div>
                                                <?php endif; ?>
                                            </td>
                                            <td><?= $value['time'] ?></td>
                                            <td><?= $value['server_origin'] ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

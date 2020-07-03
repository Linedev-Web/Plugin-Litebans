<?= $this->Html->css('Litebans.style.css') ?>
<div id="page--litebans" class="container-fluid plugin-litebans">
    <div class="row">
        <div class="col-md-12">

            <div class="container-background">
                <?= $this->Html->image('bg/sanctions.jpg', array('alt' => 'vote', 'classe' => 'img-responsive')); ?>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <h1 class="page--title"><span class="sr-only">Profile</span></h1>
                        <div class="row mb-5 align-items-center">
                            <div class="col-md-2">
                                <img src="https://crafatar.com/renders/body/<?= $history['uuid'] ?>?size=4&default=MHF_Steve&overlay">
                            </div>
                            <div class="col-md-10">
                                <div class="liteBans--profile">
                                    <div class="row  justify-content-start">
                                        <div class="col-md-5 mb-3 ml-3">
                                            <h2>#<?= $history['name'] ?></h2>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <?php if (count($listBans) >= 1): ?>
                                            <div class="col-md-5 liteBans--profile-box">
                                                <dl>
                                                    <dt>
                                                        <span class="label">Banni:
                                                            <span class="value"><?= count($listBans) ?></span>
                                                        <?php if ($listBans[0]['active']): ?>
                                                            <span class="value">Permanent</span>
                                                        <?php endif; ?>
                                                        </span>
                                                    </dt>
                                                    <ul>
                                                            <?php if ($listBans[0]['date_reset']): ?>
                                                                <li>
                                                                    <span class="label">Temps restant:</span>
                                                                    <span class="value"> <?= $listBans[0]['date_reset'] ?></span>
                                                                </li>
                                                            <?php endif; ?>
                                                    </ul>
                                                </dl>
                                            </div>
                                        <?php endif; ?>
                                        <?php if (count($listMutes) >= 1): ?>
                                            <div class="col-md-5 liteBans--profile-box">
                                                <dl>
                                                    <dt>
                                                        <span class="label">Mute:
                                                            <span class="value"><?= count($listMutes) ?></span>
                                                        <?php if ($listMutes[0]['active']): ?>
                                                            <span class="value">Permanent</span>
                                                        <?php endif; ?>
                                                        </span>
                                                    </dt>
                                                    <ul>
                                                        <?php if ($listMutes[0]['active']): ?>
                                                            <?php if ($listMutes[0]['date_reset']): ?>
                                                                <li>
                                                                    <span class="label">Temps restant:</span>
                                                                    <span class="value"> <?= $listMutes[0]['date_reset'] ?></span>
                                                                </li>
                                                            <?php endif; ?>
                                                        <?php endif; ?>
                                                    </ul>
                                                </dl>
                                            </div>
                                        <?php endif; ?>
                                        <?php if (count($listKicks) >= 1): ?>
                                            <div class="col-md-5 liteBans--profile-box">
                                                <dl>
                                                    <dt>
                                                        <span class="label">Kicks:
                                                            <span class="value"><?= count($listKicks) ?></span>
                                                        </span>
                                                    </dt>
                                                </dl>
                                            </div>
                                        <?php endif; ?>
                                        <?php if (count($listWarnings) >= 1): ?>
                                            <div class="col-md-5 liteBans--profile-box">
                                                <dl>
                                                    <dt>
                                                        <span class="label">Warnings:
                                                            <span class="value"><?= count($listWarnings) ?></span>
                                                        <?php if ($listWarnings[0]['active']): ?>
                                                            <span class="value">Permanent</span>
                                                        <?php endif; ?>
                                                        </span>
                                                    </dt>
                                                    <ul>
                                                        <?php if ($listWarnings[0]['date_reset']): ?>
                                                            <li>
                                                                <span class="label">Temps restant:</span>
                                                                <span class="value"> <?= $listWarnings[0]['date_reset'] ?></span>
                                                            </li>
                                                        <?php endif; ?>
                                                    </ul>
                                                </dl>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <ul class="nav nav-tabs" id="litebans--nav-profile" role="tablist">
                            <?php if (count($listBans) >= 1): ?>
                                <li class="nav-item">
                                    <a class="nav-link active" id="bans-tab" data-toggle="tab" href="#bans" role="tab"
                                       aria-controls="bans" aria-selected="true">Bans</a>
                                </li>
                            <?php endif; ?>
                            <?php if (count($listMutes) >= 1): ?>
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
                        <?php if (count($listBans) >= 1): ?>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="bans" role="tabpanel" aria-labelledby="bans-tab">
                                <table class="table ">
                                    <thead>
                                    <tr>
                                        <th>Raison</th>
                                        <th>Banni par</th>
                                        <th>Dés Banni par</th>
                                        <th>Date de début</th>
                                        <th>Date de fin</th>
                                        <th>Seveur</th>
                                        <th>Actif</th>
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
                                            <td>
                                                <?php if ($value['banned_by_name'] == 'Console'): ?>
                                                    <img src="https://crafatar.com/avatars/f78a4d8d-d51b-4b39-98a3-230f2de0c670?size=32"
                                                         alt="<?= $value['banned_by_name'] ?>"
                                                         title="<?= $value['banned_by_name'] ?>">
                                                <?php else: ?>
                                                    <div class="liteban--user">
                                                        <img src="https://crafatar.com/avatars/<?= $value['removed_by_uuid'] ?>?size=32"
                                                             alt="<?= $value['removed_by_name'] ?>"
                                                             title="<?= $value['removed_by_name'] ?>">
                                                        <span><?= $value['removed_by_name'] ?></span>
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
                                            <td>
                                                <?php if ($value['active']): ?>
                                                    <i class="fa fa-check"></i>
                                                <?php else: ?>
                                                    <i class="fa fa-times"></i>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                            <?php endif; ?>
                            <?php if (count($listMutes) >= 1): ?>
                                <div class="tab-pane fade" id="mutes" role="tabpanel" aria-labelledby="mutes-tab">

                                    <table class="table ">
                                        <thead>
                                        <tr>
                                            <th>Raison</th>
                                            <th>Mute par</th>
                                            <th>Dés mute par</th>
                                            <th>Date de début</th>
                                            <th>Date de fin</th>
                                            <th>Seveur</th>
                                            <th>Actife</th>
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
                                                <td>
                                                    <?php if ($value['banned_by_name'] == 'Console'): ?>
                                                        <img src="https://crafatar.com/avatars/f78a4d8d-d51b-4b39-98a3-230f2de0c670?size=32"
                                                             alt="<?= $value['banned_by_name'] ?>"
                                                             title="<?= $value['banned_by_name'] ?>">
                                                    <?php else: ?>
                                                        <div class="liteban--user">
                                                            <img src="https://crafatar.com/avatars/<?= $value['removed_by_uuid'] ?>?size=32"
                                                                 alt="<?= $value['removed_by_name'] ?>"
                                                                 title="<?= $value['removed_by_name'] ?>">
                                                            <span><?= $value['removed_by_name'] ?></span>
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
                                                <td>
                                                    <?php if ($value['active']): ?>
                                                        <i class="fa fa-check"></i>
                                                    <?php else: ?>
                                                        <i class="fa fa-times"></i>
                                                    <?php endif; ?>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            <?php endif; ?>
                            <?php if (count($listKicks) >= 1): ?>
                                <div class="tab-pane fade" id="kicks" role="tabpanel" aria-labelledby="kicks-tab">

                                    <table class="table ">
                                        <thead>
                                        <tr>
                                            <th>Raison</th>
                                            <th>Kick par</th>
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
                            <?php endif; ?>
                            <?php if (count($listWarnings) >= 1): ?>
                                <div class="tab-pane fade" id="warnings" role="tabpanel" aria-labelledby="warnings-tab">

                                    <table class="table ">
                                        <thead>
                                        <tr>
                                            <th>Raison</th>
                                            <th>Warnings par</th>
                                            <th>Warnings retirée par</th>
                                            <th>Date</th>
                                            <th>Seveur</th>
                                            <th>Actif</th>
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
                                                <td>
                                                    <?php if ($value['banned_by_name'] == 'Console'): ?>
                                                        <img src="https://crafatar.com/avatars/f78a4d8d-d51b-4b39-98a3-230f2de0c670?size=32"
                                                             alt="<?= $value['banned_by_name'] ?>"
                                                             title="<?= $value['banned_by_name'] ?>">
                                                    <?php else: ?>
                                                        <div class="liteban--user">
                                                            <img src="https://crafatar.com/avatars/<?= $value['removed_by_uuid'] ?>?size=32"
                                                                 alt="<?= $value['removed_by_name'] ?>"
                                                                 title="<?= $value['removed_by_name'] ?>">
                                                            <span><?= $value['removed_by_name'] ?></span>
                                                        </div>
                                                    <?php endif; ?>
                                                </td>
                                                <td><?= $value['time'] ?></td>
                                                <td><?= $value['server_origin'] ?></td>
                                                <td>
                                                    <?php if ($value['active']): ?>
                                                        <i class="fa fa-check"></i>
                                                    <?php else: ?>
                                                        <i class="fa fa-times"></i>
                                                    <?php endif; ?>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

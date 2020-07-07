<?= $this->Html->css('Litebans.style.css') ?>
    <div id="page--litebans" class="container-fluid plugin-litebans">
        <div class="row">
            <div class="col-md-12">

                <div class="container-background">
                    <?= $this->Html->image('bg/sanctions.jpg', array('alt' => 'vote', 'classe' => 'img-responsive')); ?>
                </div>
                <div class="container" data-aos="fade-up">
                    <div class="row">
                        <div class="col-sm-12 text-center">
                            <h1 class="page--title"><?= $Lang->get('LITEBANS__TITLE') ?> / <?= $Lang->get('LITEBANS__BANSS') ?></h1>
                        </div>
                        <div class="col-md-12">

                            <ul class="nav nav-tabs" id="litebans--nav" role="tablist">
                                <li class="nav-item">
                                    <a href="<?= $this->Html->url(array('action' => 'index')) ?>"
                                       class="nav-link active"><?= $Lang->get('LITEBANS__BANSS') ?></a>
                                </li>
                                <li class="nav-item">
                                    <a href="/sanctions/mutes" class="nav-link"><?= $Lang->get('LITEBANS__MUTESS') ?></a>
                                </li>
                                <li class="nav-item">
                                    <a href="/sanctions/kicks" class="nav-link"><?= $Lang->get('LITEBANS__KICKSS') ?></a>
                                </li>
                                <li class="nav-item">
                                    <a href="/sanctions/warnings" class="nav-link"><?= $Lang->get('LITEBANS__WARNINGSS') ?></a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-sm-12">
                            <form class="form-inline litebans--form-search"
                                  action="<?= $this->Html->url(array('controller' => 'litebans', 'action' => 'getSearchPseudo', 'plugin' => 'litebans')) ?>"
                                  method="post" autocomplete="off" data-ajax="true">

                                <div class="form-group">
                                    <label for="search" class="sr-only"><?= $Lang->get('LITEBANS__PSEUDO') ?></label>
                                    <input type="text" class="form-control" id="search" name="search"
                                           placeholder="<?= $Lang->get('LITEBANS__SEARCH_PSEUDO') ?>">
                                </div>
                                <button type="submit"><i class="fa fa-search"></i></button>
                                <div class="litebans--infos-search">
                                    <div class="ajax-msg"></div>
                                    <div id="search-list" class="">
                                        <ul></ul>
                                    </div>
                                </div>
                            </form>
                            <div class="table-responsive ">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th><?= $Lang->get('LITEBANS__PSEUDO') ?></th>
                                        <th><?= $Lang->get('LITEBANS__BANSBY') ?></th>
                                        <th><?= $Lang->get('LITEBANS__REASON') ?></th>
                                        <th><?= $Lang->get('LITEBANS__DATESTART') ?></th>
                                        <th><?= $Lang->get('LITEBANS__DATEEND') ?></th>
                                        <th><?= $Lang->get('LITEBANS__ACTIF') ?></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $i=0; foreach ($bans as $key => $value): $i++ ?>
                                        <tr data-aos="fade-left" data-aos-delay="<?= $i * 100 ?>" data-aos-offset="0" data-aos-once="true">
                                            <td>
                                                <a href="/sanctions/profile?search=<?= $value['Bans']['name'] ?>"
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
                                                <?php elseif ($value['Bans']['removed_by_uuid'] != null || $value['Bans']['removed_by_name'] != null): ?>
                                                    <img src="https://crafatar.com/avatars/606e2ff0-ed77-4842-9d6c-e1d3321c7838?size=32"
                                                         alt="<?= $value['Bans']['removed_by_name'] ?>"
                                                         title="<?= $value['Bans']['removed_by_name'] ?>">
                                                <?php else: ?>
                                                    <div class="liteban--user">
                                                        <img src="https://crafatar.com/avatars/<?= $value['Bans']['banned_by_uuid'] ?>?size=32"
                                                             alt="<?= $value['Bans']['banned_by_name'] ?>"
                                                             title="<?= $value['Bans']['banned_by_name'] ?>">
                                                        <span><?= $value['Bans']['banned_by_name'] ?></span>
                                                    </div>
                                                <?php endif; ?>
                                            </td>
                                            <td> <?= $value['Bans']['reason'] ?></td>
                                            <td> <?= $value['Bans']['date_debut'] ?></td>
                                            <td> <?= $value['Bans']['date_fin'] ?>
                                                <?php if ($value['Bans']['date_reset']): ?>
                                                    <small>
                                                        <?= $Lang->get('LITEBANS__TIME_LEFT') ?> <?= $value['Bans']['date_reset'] ?>
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
                            </div>
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
<?= $this->Html->script('Litebans.script.js') ?>
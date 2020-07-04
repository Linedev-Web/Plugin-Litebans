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
                            <h1 class="page--title"><?= $Lang->get('LITEBANS__TITLE') ?> / <?= $Lang->get('LITEBANS__KICKSS') ?></h1>
                        </div>
                        <div class="col-md-12">

                            <ul class="nav nav-tabs" id="litebans--nav" role="tablist">
                                <li class="nav-item">
                                    <a href="/sanctions/bans"
                                       class="nav-link"><?= $Lang->get('LITEBANS__BANSS') ?></a>
                                </li>
                                <li class="nav-item">
                                    <a href="/sanctions/mutes" class="nav-link"><?= $Lang->get('LITEBANS__MUTESS') ?></a>
                                </li>
                                <li class="nav-item">
                                    <a href="/sanctions/kicks" class="nav-link active"><?= $Lang->get('LITEBANS__KICKSS') ?></a>
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
                                        <th><?= $Lang->get('LITEBANS__KICKSBY') ?></th>
                                        <th><?= $Lang->get('LITEBANS__REASON') ?></th>
                                        <th><?= $Lang->get('LITEBANS__DATESTART') ?></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $i = 0;
                                    foreach ($kicks as $key => $value): $i++ ?>
                                        <tr data-aos="fade-left" data-aos-delay="<?= $i * 100 ?>" data-aos-offset="0">
                                            <td>
                                                <a href="/sanctions/profile?search=<?= $value['Kicks']['name'] ?>"
                                                   class="liteban--user">
                                                    <img src="https://crafatar.com/avatars/<?= $value['Kicks']['uuid'] ?>?size=32"
                                                         alt="<?= $value['Kicks']['name'] ?>"
                                                         title="<?= $value['Kicks']['name'] ?>">
                                                    <span><?= $value['Kicks']['name'] ?></span>
                                                </a>
                                            </td>
                                            <td>
                                                <?php if ($value['Kicks']['banned_by_name'] == 'Console'): ?>
                                                    <img src="https://crafatar.com/avatars/f78a4d8d-d51b-4b39-98a3-230f2de0c670?size=32"
                                                         alt="<?= $value['Kicks']['banned_by_name'] ?>"
                                                         title="<?= $value['Kicks']['banned_by_name'] ?>">
                                                <?php else: ?>
                                                    <div class="liteban--user">
                                                        <img src="https://crafatar.com/avatars/<?= $value['Kicks']['uuid'] ?>?size=32"
                                                             alt="<?= $value['Kicks']['name'] ?>"
                                                             title="<?= $value['Kicks']['name'] ?>">
                                                        <span><?= $value['Kicks']['banned_by_name'] ?></span>
                                                    </div>
                                                <?php endif; ?>
                                            </td>
                                            <td> <?= $value['Kicks']['reason'] ?></td>
                                            <td> <?= $value['Kicks']['date_debut'] ?></td>
                                        </tr>
                                    <?php endforeach; ?>

                                    </tbody>
                                </table>
                            </div>
                            <?php if (count($kicks) >= 10): ?>
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
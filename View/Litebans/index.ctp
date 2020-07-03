<?= $this->Html->css('Litebans.style.css') ?>
<div id="page--litebans" class="container-fluid plugin-litebans">
    <div class="row">
        <div class="col-md-12">

            <div class="container-background">
                <?= $this->Html->image('bg/sanctions.jpg', array('alt' => 'vote', 'classe' => 'img-responsive')); ?>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 text-center">
                        <h1 class="page--title">Sanctions</h1>
                    </div>
                    <div class="col-md-12">

                        <ul class="nav nav-tabs" id="litebans--nav" role="tablist">
                            <li class="nav-item">
                                <a href="<?= $this->Html->url(array('action' => 'index')) ?>" class="nav-link active">Ban</a>
                            </li>
                            <li class="nav-item">
                                <a href="sanctions/mutes" class="nav-link">Mutes</a>
                            </li>
                            <li class="nav-item">
                                <a href="sanctions/mutes" class="nav-link">Kicks</a>
                            </li>
                            <li class="nav-item">
                                <a href="sanctions/mutes" class="nav-link">Warnings</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-sm-12">
                        <form class="form-inline litebans--form-search"
                              action="<?= $this->Html->url(array('controller' => 'litebans', 'action' => 'getSearchPseudo', 'plugin' => 'litebans')) ?>"
                              method="post" autocomplete="off" data-ajax="true">

                            <div class="form-group">
                                <label for="search" class="sr-only">Pseudo</label>
                                <input type="text" class="form-control" id="search" name="search"
                                       placeholder="Rechercher un pseudo">
                            </div>
                            <button type="submit"><i class="fa fa-search"></i></button>
                            <div class="litebans--infos-search">
                                <div class="ajax-msg"></div>
                                <div id="search-list" class="">
                                    <ul></ul>
                                </div>
                            </div>
                        </form>
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Pseudo</th>
                                <th>Banni par</th>
                                <th>Raison</th>
                                <th>Date de début</th>
                                <th>Date de fin</th>
                                <th>Actif</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($bans as $key => $value): ?>
                                <tr>
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
                                                Temps restants : <?= $value['Bans']['date_reset'] ?>
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
<script>
    $(document).ready(function () {
        $('#search').keyup(function () {
            event.preventDefault()
            let searchList = $('#search-list')
            let input = $(this).val()
            let element = {}
            element['search'] = input
            if (input.length >= 3) {
                $.post("<?= $this->Html->url(array('controller' => 'litebans', 'action' => 'getSearchPseudo', 'plugin' => 'litebans')) ?>", element, function (data) {
                    $('.litebans--form-search').find('.ajax-msg').removeClass('error').empty()
                    if (data.statut) {
                        searchList.find('ul').empty();
                        if (data.list) {
                            for (let i = 0; i <= data.list.length; i++) {
                                if (data.list[i] !== undefined) {
                                    searchList.find('ul').append('<li><a href="#" class="search-pseudo" data-pseudo=' + data.list[i].name + '><i class="fa fa-search"></i>' + data.list[i].name + '</a></li>')
                                }
                            }
                        }
                        if (data.slug) {
                            document.location.href = data.slug;
                        }
                        $('.search-pseudo').on('click', function () {
                            event.preventDefault()
                            let search = $(this).data('pseudo')
                            $('#search').val(search)
                            $('#search').attr('value', search)
                            document.location.href = '/sanctions/profile?search=' + search;
                        })
                    } else if (!data.statut && data.list) {
                        searchList.find('ul').empty();
                        $('.litebans--form-search').find('.ajax-msg').addClass('error').empty().html('<b>Erreur : </b>'+data.msg);
                    } else if (!data.statut) {
                        $('.litebans--form-search').find('.ajax-msg').addClass('error').empty().html('<b>Erreur : </b>'+data.msg);
                    } else {
                        $('.litebans--form-search').find('.ajax-msg').addClass('error').empty().html('<b>Erreur : </b>'+data.msg);
                    }
                });
            } else {
                $('.litebans--form-search').find('.ajax-msg').addClass('error').empty().html('<b>Erreur :</b> Minimum 3 caractère');
                searchList.find('ul').empty();
            }
        })
    })
</script>
<?= $this->Html->css('Litebans.style.css') ?>

<div id="page--liteban" class="container-fluid plugin-liteban">
    <div class="row">
        <div class="col-md-12">

            <div class="container-background">
                <?= $this->Html->image('bg/wiki.jpeg', array('alt' => 'vote', 'classe' => 'img-responsive')); ?>
            </div>
            <div class="row">
                <div class="col-sm-12 text-center">
                    <h1 class="page--title">Sanctions</h1>
                </div>
                <div class="col-sm-12">
                    <?= var_dump($datas) ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->Html->script('Litebans.script.js') ?>

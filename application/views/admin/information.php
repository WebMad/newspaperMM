<div class="mb-5 mt-3">
    <div class="row">
        <div class="col-lg-5">
            <h3>Информация</h3>
            <small><a href=<?= site_url('panel/editInformation/contacts')?>>Редактировать</a></small>
            <p>
                <?= $data['contacts']?>
            </p>
        </div>
        <!--<div class="col-lg-4">
            <h3>Редколлегия</h3>
            <p>
                <?= $data['editorial_board']?>
            </p>
        </div>-->
        <div class="col-lg-7">
            <h3>О нас</h3>
            <small><a href=<?= site_url('panel/editInformation/about-us')?>>Редактировать</a></small>
            <p>
                <?= $data['about_us']?>
            </p>
        </div>
    </div>
</div>
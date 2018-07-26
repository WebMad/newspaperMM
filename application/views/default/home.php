<main>
    <?if(isset($main_new)){?>
        <div class="jumbotron p-3 p-md-5 h-50 text-white rounded bg-dark mt-3" style="background: url(<?= base_url( IMG_PATH . 'slider.jpg')?>) no-repeat; background-size: 100% auto; background-position: center">
            <div class="col-lg-7">
                <h1 class="display-4 font-italic"><?= $main_new[0]['title']?></h1>
                <p class="lead my-3"><?= $main_new[0]['annotation']?></p>
                <a href=<?= site_url('pages/news/' . $main_new[0]['id'])?> class="text-white font-weight-bold">Читать больше!</a>
            </div>
        </div>
    <?}?>
    <?if(isset($news) and count($news)>=2){?>
        <h2 class="text-center mb-3">Новости</h2>
        <div class="row mb-2">
            <?foreach($news as $new){?>
                <div class="col pl-0 mr-3 card flex-md-row mb-4 box-shadow h-md-250 py-md-3 shadow-lg">
                    <div class="card-body d-flex flex-column align-items-start">
                      <h3>
                        <a class="text-dark" href="#"><?= $new['title']?></a>
                      </h3>
                      <div class="mb-3 text-muted"><?= strftime("%d %b %H:%M",strtotime($new['date']));?></div>
                      <p class="card-text mb-auto"><?= $new['annotation']?></p>
                      <a href=<?= site_url('pages/news/' . $new['id'])?> class="mt-3">Читать дальше</a>
                    </div>
                </div>
            <?}?>
        </div>
    <?}?>
    <?if(isset($newspapers) and count($newspapers)>=3){?>
        <h2 class="text-center mb-3">Газеты</h2>
        <div class="row mb-2">
            <?foreach($newspapers as $newspaper){?>
                <div class="col mr-3 card mb-4 box-shadow shadow-lg">
                    <img class="card-img-top"
                         src=<?= base_url(IMG_NEWSPAPER_PATH . $newspaper['img']); ?> data-holder-rendered="true"
                         style="width: 100%; display: block;">
                    <div class="card-body">
                        <p class="card-text"><?= $newspaper['text'] ?></p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <button type="button"
                                        onclick="window.open('<?= base_url(PDF_NEWSPAPER_PATH . $newspaper['filename']) ?>')"
                                        class="btn btn-sm btn-outline-secondary">Читать
                                </button>
                                <button type="button"
                                        onclick="window.open('<?= site_url('pages/archive/download/' . $newspaper['id']) ?>')"
                                        class="btn btn-sm btn-outline-secondary">Скачать
                                </button>
                            </div>
                            <span class="text-muted"><?= strftime("%b %Y", strtotime($newspaper['date'])); ?></span>
                        </div>
                    </div>
                </div>
            <?}?>
        </div>
    <?}?>
    <?if(isset($authors) and count($authors)>=2){?>
        <h2 class="text-center mb-3">Авторы</h2>
        <div class="row mb-2">
            <? foreach ($authors as $author){?>
                <div class="col card flex-md-row mb-4 mr-3 box-shadow h-md-250 shadow-lg">
                    <img class="card-img-left flex-auto d-none d-lg-block" src=<?= base_url( IMG_USER_PATH . $author['photo']);?> style="height:250px" data-holder-rendered="true">
                    <div class="card-body d-flex flex-column align-items-start">
                        <h3>
                            <a class="text-dark" href="#"><?=$author['name'] . " " . $author['surname']?></a>
                        </h3>
                        <p class="card-text mb-auto">Автор множества статей нашей газеты!</p>
                    </div>
                </div>
            <?}?>
        </div>
    <?}?>
</main>
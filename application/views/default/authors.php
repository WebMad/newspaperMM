<main>
    <? if(count($authors)>0){?>
        <h1>Авторы</h1>
        <div class="row mt-3">
            <? foreach ($authors as $author){?>
                <div class="col-md-6">
                    <div class="card flex-md-row mb-4 box-shadow h-md-250 shadow-lg">
                        <img class="card-img-left flex-auto d-none d-lg-block" src=<?= base_url( IMG_USER_PATH . $author['photo']);?> style="height:250px" data-holder-rendered="true">
                        <div class="card-body d-flex flex-column align-items-start">
                            <h3>
                                <a class="text-dark" href="#"><?=$author['name'] . " " . $author['surname']?></a>
                            </h3>
                            <p class="card-text mb-auto">Автор множества статей нашей газеты!</p>
                        </div>
                    </div>
                </div>
            <?}?>
            <!--<div class="col-md-6">
                <div class="card flex-md-row mb-4 box-shadow h-md-250 shadow-lg">
                    <img class="card-img-left flex-auto d-none d-lg-block" src=<?= base_url( IMG_PATH . 'Anshakova.jpg');?> style="height:250px" data-holder-rendered="true">
                    <div class="card-body d-flex flex-column align-items-start">
                        <h3>
                            <a class="text-dark" href="#">Анастасия Аншакова</a>
                        </h3>
                        <p class="card-text mb-auto">Автор множества статей нашей газеты!</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card flex-md-row mb-4 box-shadow h-md-250 shadow-lg">
                    <img class="card-img-left flex-auto d-none d-lg-block" src=<?= base_url( IMG_PATH . 'no-photo.png');?> style="height:250px" data-holder-rendered="true">
                    <div class="card-body d-flex flex-column align-items-start">
                        <h3>
                            <a class="text-dark" href="#">Ксения Крайнюкова</a>
                        </h3>
                        <p class="card-text mb-auto">"Работа над газетой очень вдохновляет, ведь всегда приятно осознавать, что твои старания читают и оценивают"</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card flex-md-row mb-4 box-shadow h-md-250 shadow-lg">
                    <img class="card-img-left flex-auto d-none d-lg-block" src=<?= base_url( IMG_PATH . 'no-photo.png');?> style="height:250px" data-holder-rendered="true">
                    <div class="card-body d-flex flex-column align-items-start">
                        <h3>
                            <a class="text-dark" href="#">Анастасия Ламакина</a>
                        </h3>
                        <p class="card-text mb-auto">"Хорошо, что есть такая газета, которая позволяет ребятам попробовать себя в журналистике или узнать что-то новое из жизни технопарка"</p>
                    </div>
                </div>
            </div>-->
        <?}else{?>
            <p class='text-muted text-center mt-3'>На данный момент нет ни одного автора.</p>
        <?}?>
	</div>
</main>
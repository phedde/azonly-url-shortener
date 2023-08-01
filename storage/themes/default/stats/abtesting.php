<?php view('stats.partial', ['url' => $url, 'top' => $top]) ?>
<section class="pt-7 bg-section-secondary">
    <div class="container">
        <div class="card card-body">
            <div class="row align-items-center">
                <div class="col">
                    <?php view('partials.stats_nav', ['url' => $url]) ?>
                </div>
            </div>
        </div>
        <div class="row">            
            <div class="col-md-12">
                <div class="card flex-fill w-100">
                    <div class="card-header d-flex d-block align-items-center">
                        <div>
                            <h5 class="card-title mb-0 fw-bold"><?php ee('URL Traffic Distribution') ?></h5>
                        </div>
                    </div>
                    <div class="card-body px-4">
                        <ul id="top-referrers" class="list-unstyled d-block">
                            <?php foreach($rotators as $rotator): ?>
                                <?php $percent = $rotator['count'] * 100 / ($url->click === 0 ? 1 : $url->click) ?>
                                <li class="d-block mb-2 w-100 border-bottom pb-2 fw-bold position-relative" style="min-height:38px">
                                    <div class="bg-primary d-block position-absolute h-100" style="z-index:0;opacity:0.1;width:<?php echo $percent ?>%"></div>
                                    <div class="position-absolute w-100 h-100 p-2">
                                        <strong><?php echo $rotator['link'] ?></strong></a>
                                        <small class="float-right"><?php echo $rotator['count'] ?> <?php ee('clicks') ?> - <?php echo round($percent) ?>% <?php ee('of traffic') ?></small>                                
                                    </div>
                                </li>
                            <?php endforeach ?>
                        </ul>
                    </div>
                </div>
            </div>           
        </div>
    </div>
</section>
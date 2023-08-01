<div class="container mt-5 mb-2" id="profile">
    <div class="row">
        <div class="col-md-6 offset-md-3 text-center mt-5">
            <?php echo message() ?>
            <?php if(!isset($profiledata['style']['layout']) || $profiledata['style']['layout'] == 'layout1'): ?>
                <?php if(!isset($profiledata['avatarenabled']) || $profiledata['avatarenabled']): ?>
                    <?php if(isset($profiledata['avatar']) && $profiledata['avatar']): ?>
                        <img src="<?php echo uploads($profiledata['avatar'], 'profile') ?>" class="rounded-circle mb-3 useravatar" width="120" height="120">
                    <?php else: ?>
                        <img src="<?php echo $user->avatar() ?>" class="rounded-circle mb-3 useravatar" width="120" height="120">
                    <?php endif ?>
                <?php endif ?>
                <h3>
                    <span><?php echo $profile->name ?></span>
                    <?php if($user->verified): ?>
                        <span class="text-success fw-bold ml-2 bg-white rounded-circle checkmark" data-toggle="tooltip" data-placement="top" title="<?php ee('Verified Account') ?>"><i data-feather="check-circle"></i></span>
                    <?php endif ?>
                </h3>
                <?php if(isset($profiledata['tagline'])): ?>
                    <p><?php echo $profiledata['tagline'] ?></p>
                <?php endif ?>
                <?php if(!isset($profiledata['style']['socialposition']) || $profiledata['style']['socialposition'] == 'top'): ?>
                    <?php if(isset($profiledata['social'])): ?>
                        <div id="social" class="text-center mt-3">
                            <?php foreach($profiledata['social'] as $key => $value): ?>
                                <?php if(empty($value)) continue ?>
                                <a href="<?php echo $value ?>" class="ml-3" target="_blank" data-toggle="tooltip" data-placement="top" title="<?php echo ucfirst($key) ?>" rel="nofollow"><i class="fab fa-<?php echo $key ?>"></i></a>
                            <?php endforeach ?>
                        </div>
                    <?php endif ?>
                <?php endif ?>
            <?php elseif($profiledata['style']['layout'] == 'layout2'): ?>
                <div class="layout2">
                    <div class="d-block p-3 rounded" style="background-color: <?php echo $profiledata['style']['bg'] ?>;<?php if(isset($profiledata['layoutbanner']) && $profiledata['layoutbanner']) echo 'background-image:url(\''.uploads($profiledata['layoutbanner'], 'profile').'\');background-size:cover;'; ?>">

                    </div>
                    <?php if(!isset($profiledata['avatarenabled']) || $profiledata['avatarenabled']): ?>
                        <?php if(isset($profiledata['avatar']) && $profiledata['avatar']): ?>
                            <img src="<?php echo uploads($profiledata['avatar'], 'profile') ?>" class="rounded-circle mb-3 useravatar" width="120" height="120">
                        <?php else: ?>
                            <img src="<?php echo $user->avatar() ?>" class="rounded-circle mb-3 useravatar" width="120" height="120">
                        <?php endif ?>
                    <?php endif ?>
                    <h3>
                        <span><?php echo $profile->name ?></span>
                        <?php if($user->verified): ?>
                            <span class="text-success fw-bold ml-2 bg-white rounded-circle checkmark" data-toggle="tooltip" data-placement="top" title="<?php ee('Verified Account') ?>"><i data-feather="check-circle"></i></span>
                        <?php endif ?>
                    </h3>
                    <?php if(isset($profiledata['tagline'])): ?>
                        <p><?php echo $profiledata['tagline'] ?></p>
                    <?php endif ?>
                    <?php if(!isset($profiledata['style']['socialposition']) || $profiledata['style']['socialposition'] == 'top'): ?>
                        <?php if(isset($profiledata['social'])): ?>
                            <div id="social" class="text-center mt-3">
                                <?php foreach($profiledata['social'] as $key => $value): ?>
                                    <?php if(empty($value)) continue ?>
                                    <a href="<?php echo $value ?>" class="ml-3" target="_blank" data-toggle="tooltip" data-placement="top" title="<?php echo ucfirst($key) ?>" rel="nofollow"><i class="fab fa-<?php echo $key ?>"></i></a>
                                <?php endforeach ?>
                            </div>
                        <?php endif ?>
                    <?php endif ?>
                </div>
            <?php elseif($profiledata['style']['layout'] == 'layout3'): ?>
                <div class="layout3">
                    <div class="d-block p-5 rounded" style="background-color: <?php echo $profiledata['style']['bg'] ?>;<?php if(isset($profiledata['layoutbanner']) && $profiledata['layoutbanner']) echo 'background-image:url(\''.uploads($profiledata['layoutbanner'], 'profile').'\');background-size:cover;'; ?>">
                        <div class="d-flex align-items-center">
                            <div>
                                <?php if(!isset($profiledata['avatarenabled']) || $profiledata['avatarenabled']): ?>
                                    <?php if(isset($profiledata['avatar']) && $profiledata['avatar']): ?>
                                        <img src="<?php echo uploads($profiledata['avatar'], 'profile') ?>" class="rounded-circle mb-3 useravatar" width="80" height="80">
                                    <?php else: ?>
                                        <img src="<?php echo $user->avatar() ?>" class="rounded-circle mb-3 useravatar" width="80" height="80">
                                    <?php endif ?>
                                <?php endif ?>
                            </div>
                            <div class="ml-4 text-left">
                                <h3>
                                    <span><?php echo $profile->name ?></span>
                                    <?php if($user->verified): ?>
                                        <span class="text-success fw-bold ml-2 bg-white rounded-circle checkmark text-center" data-toggle="tooltip" data-placement="top" title="<?php ee('Verified Account') ?>"><i data-feather="check-circle"></i></span>
                                    <?php endif ?>
                                </h3>
                                <?php if(isset($profiledata['tagline'])): ?>
                                    <p><?php echo $profiledata['tagline'] ?></p>
                                <?php endif ?>
                                <?php if(!isset($profiledata['style']['socialposition']) || $profiledata['style']['socialposition'] == 'top'): ?>
                                    <?php if(isset($profiledata['social'])): ?>
                                        <div id="social" class="mt-3">
                                            <?php foreach($profiledata['social'] as $key => $value): ?>
                                                <?php if(empty($value)) continue ?>
                                                <a href="<?php echo $value ?>" class="ml-3" target="_blank" data-toggle="tooltip" data-placement="top" title="<?php echo ucfirst($key) ?>" rel="nofollow"><i class="fab fa-<?php echo $key ?>"></i></a>
                                            <?php endforeach ?>
                                        </div>
                                    <?php endif ?>
                                <?php endif ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif ?>
        </div>
    </div>
     <div class="row">
        <div class="col-md-6 offset-md-3 text-center my-4">
            <div id="content">
                <?php foreach($profiledata['links'] as $id => $value): ?>
                    <div class="item mb-3">
                        <?php if($value['type'] == "heading"): ?>
                            <?php if(in_array($value['format'], ['h1','h2','h3','h4','h5','h6'])):?>
                                <<?php echo $value['format'] ?> style="color:<?php echo $value['color'] ?? '' ?> !important"><?php echo $value['text'] ?></<?php echo $value['format'] ?>>
                            <?php else: ?>
                                <h1><?php echo $value['text'] ?></h1>
                            <?php endif ?>
                        <?php endif ?>
                        <?php if($value['type'] == "divider"): ?>
                            <hr style="background:transparent;border-top-style:<?php echo $value['style'] ?? 'solid' ?> !important;border-top-width:<?php echo $value['height'] ?? '3' ?>px !important;border-top-color:<?php echo $value['color'] ?? '#000' ?> !important;border-radius: 5px;">
                        <?php endif ?>

                        <?php if($value['type'] == "image"): ?>
                            <?php if(isset($value['image2']) && $value['image2']): ?>
                                <div class="row">
                                    <div class="col-6">
                                        <?php if($value['link']): ?>
                                            <a href="<?php echo $value['link'] ?>" target="_blank" rel="nofollow"><img src="<?php echo uploads($value['image'], 'profile') ?>" class="img-fluid rounded w-100"></a>
                                        <?php else: ?>
                                            <img src="<?php echo uploads($value['image'], 'profile') ?>" class="img-fluid rounded w-100">
                                        <?php endif ?>
                                    </div>
                                    <div class="col-6">
                                        <?php if(isset($value['link2']) && $value['link2']): ?>
                                            <a href="<?php echo $value['link2'] ?>" target="_blank" rel="nofollow"><img src="<?php echo uploads($value['image2'], 'profile') ?>" class="img-fluid rounded w-100"></a>
                                        <?php else: ?>
                                            <img src="<?php echo uploads($value['image2'], 'profile') ?>" class="img-fluid rounded w-100">
                                        <?php endif ?>
                                    </div>
                                </div>
                            <?php else: ?>
                                <?php if($value['link']): ?>
                                    <a href="<?php echo $value['link'] ?>" target="_blank" rel="nofollow"><img src="<?php echo uploads($value['image'], 'profile') ?>" class="img-fluid rounded w-100"></a>
                                <?php else: ?>
                                    <img src="<?php echo uploads($value['image'], 'profile') ?>" class="img-fluid rounded w-100">
                                <?php endif ?>
                            <?php endif ?>
                        <?php endif ?>
                        <?php if($value['type'] == "rss"): ?>
                            <div class="rss card card-body overflow-auto">
                                <?php $items = \Helpers\App::rss($value['link']) ?>
                                <?php if(!is_array($items)): ?>
                                    <?php echo $items ?>
                                <?php else: ?>
                                    <?php foreach($items as $item): ?>
                                        <div class="media mb-3">
                                            <?php if($item['image']): ?>
                                                <img class="mr-3" src="<?php echo $item['image'] ?>" alt="<?php echo $item['title'] ?>">
                                            <?php endif ?>
                                            <div class="media-body">
                                                <h6 class="mt-3"><a href="<?php echo $item['link'] ?>" target="_blank"><?php echo $item['title'] ?></a></h6>
                                                <?php echo $item['description'] ?>
                                            </div>
                                        </div>
                                    <?php endforeach ?>
                                <?php endif ?>
                            </div>
                        <?php endif ?>

                        <?php if($value['type'] == "text"): ?>
                            <div><?php echo $value['text'] ?></div>
                        <?php endif ?>

                        <?php if($value['type'] == "whatsapp"): ?>
                            <a href="https://wa.me/<?php echo str_replace([' ', '-'], '', $value['phone']) ?>" class="btn btn-block d-block p-3 btn-custom position-relative"><img src="<?php echo assets('images/whatsapp.svg') ?>" height="26" class="ml-3 position-absolute left-0"> <?php echo isset($value['label']) && $value['label'] ? $value['label'] : $value['phone'] ?></a>
                        <?php endif ?>

                        <?php if($value['type'] == "whatsappmessage"): ?>
                            <a href="https://wa.me/<?php echo str_replace([' ', '-'], '', $value['phone']) ?>?text=<?php echo urlencode(clean($value['message'], 3)) ?>" class="btn btn-block d-block p-3 btn-custom position-relative"><img src="<?php echo assets('images/whatsapp.svg') ?>" height="26" class="ml-3 position-absolute left-0"> <?php echo isset($value['label']) && $value['label'] ? $value['label'] : $value['phone'] ?></a>
                        <?php endif ?>

                        <?php if($value['type'] == "phone"): ?>
                            <a href="tel:<?php echo str_replace([' ', '-'], '', $value['phone']) ?>" class="btn btn-block d-block p-3 btn-custom position-relative"><i class="fa fa-phone ml-3 position-absolute left-0"></i> <?php echo isset($value['label']) && $value['label'] ? $value['label'] : $value['phone'] ?></a>
                        <?php endif ?>

                        <?php if($value['type'] == "link"): ?>
                            <a href="<?php echo $value['link'] ?>" <?php echo isset($value['opennew']) && $value['opennew'] ? 'target="_blank"' : '' ?> rel="nofollow" data-blockid="<?php echo $value['urlid'] ?>" class="<?php echo (isset($value['animation']) && in_array($value['animation'], ['shake','wobble','vibrate','jello','scale']) ? 'animate_'.$value['animation'].' ':'') ?>btn btn-block p-3 btn-custom position-relative">
                                <?php echo ($value['icon'] ?? '' ? '<i class="'.$value['icon'].' position-absolute left-0 ml-3"></i>' : '') ?> <span class="align-top"><?php echo $value['text'] ?></span>
                            </a>
                        <?php endif ?>

                        <?php if($value['type'] == "youtube"): ?>
                            <iframe width="100%" height="315" src="<?php echo $value["link"] ?>" class="rounded"></iframe>
                        <?php endif ?>

                        <?php if($value['type'] == "itunes"): ?>
                            <iframe width="100%" height="450" src="<?php echo $value["link"] ?>" class="rounded"></iframe>
                        <?php endif ?>
                        <?php if($value['type'] == "paypal"): ?>

                            <form action="https://www.paypal.com/cgi-bin/webscr" method="post">

                                <input type="hidden" name="business" value="<?php echo $value['email'] ?>">

                                <input type="hidden" name="cmd" value="_xclick">

                                <input type="hidden" name="item_name" value="<?php echo $value['label'] ?>">
                                <input type="hidden" name="amount" value="<?php echo $value['amount'] ?>">
                                <input type="hidden" name="currency_code" value="<?php echo $value['currency'] ?>">

                                <button type="submit" name="submit" class="btn btn-block d-block p-3 btn-custom w-100"><?php echo $value['label'] ?></button>
                            </form>
                        <?php endif ?>
                        <?php if($value['type'] == "spotify"): ?>
                            <iframe width="100%" height="232" src="<?php echo $value["link"] ?>" class="rounded"></iframe>
                        <?php endif ?>
                        <?php if($value['type'] == "tiktok"): ?>
                            <blockquote class="tiktok-embed rounded" cite="<?php echo $value['link'] ?>" data-video-id="<?php echo $value['id'] ?>" style="max-width: 605px;min-width: 325px;" > <section> </section> </blockquote> <script async src="https://www.tiktok.com/embed.js"></script>
                        <?php endif ?>
                        <?php if($value['type'] == "html"): ?>
                            <?php echo $value['html'] ?>
                        <?php endif ?>
                        <?php if($value['type'] == "newsletter"): ?>
                            <a href="#" data-target="#N<?php echo $id ?>" data-toggle="collapse" role="button" class="btn btn-block p-3 btn-custom position-relative">
                                <span class="align-top"><?php echo $value['text'] ?></span>
                                <i class="fa fa-chevron-down position-absolute right-0 mr-3"></i>
                            </a>
                            <form method="post" action="" class="collapse" id="N<?php echo $id ?>">
                                <div class="d-flex align-items-center border rounded bg-white p-1 mt-4">
                                    <div class="flex-fill">
                                        <input type="text" class="form-control border-0 bg-white" name="email" placeholder="johnsmith@company.com">
                                    </div>
                                    <div class="ml-auto">
                                        <button type="submit" class="btn btn-custom"><?php echo $value['text'] ?></button>
                                    </div>
                                </div>
                                <input type="hidden" name="action" value="newsletter">
                                <input type="hidden" name="blockid" value="<?php echo $id ?>">
                            </form>
                        <?php endif ?>
                        <?php if($value['type'] == "contact"): ?>
                            <a href="#" data-target="#C<?php echo $id ?>" data-toggle="collapse" role="button" class="btn btn-block p-3 btn-custom position-relative">
                                <span class="align-top"><?php echo $value['text'] ?></span>
                                <i class="fa fa-chevron-down position-absolute right-0 mr-3"></i>
                            </a>
                            <form method="post" action="" id="C<?php echo $id ?>" class="collapse border rounded text-left p-3 mt-3">
                                <div class="form-group">
                                    <label for="email" class="form-label"><?php ee('Email') ?></label>
                                    <input type="text" class="form-control" name="email" placeholder="johnsmith@company.com">
                                </div>
                                <div class="form-group">
                                    <label for="email" class="form-label"><?php ee('Message') ?></label>
                                    <textarea class="form-control" name="message"></textarea>
                                </div>
                                <?php csrf() ?>
                                <input type="hidden" name="action" value="contact">
                                <input type="hidden" name="blockid" value="<?php echo $id ?>">
                                <?php echo \Helpers\Captcha::display(); ?>
                                <button type="submit" class="btn btn-custom"><?php echo ee('Send') ?></button>
                            </form>
                        <?php endif ?>
                        <?php if($value['type'] == "vcard"): ?>
                            <form method="post" action="?downloadvcard">
                                <?php csrf() ?>
                                <input type="hidden" name="action" value="vcard">
                                <input type="hidden" name="blockid" value="<?php echo $id ?>">
                                <button type="submit" class="btn btn-custom btn-block"><?php echo $value['button'] ?? e('Download vCard') ?></button>
                            </form>
                        <?php endif ?>
                        <?php if($value['type'] == "product"): ?>
                            <a href="<?php echo $value['link'] ?>" target="_blank" class="d-flex border p-1 rounded mt-2" rel="nofollow">
                            <?php if(isset($value['image']) && $value['image']): ?>
                                <div class="mr-3">
                                    <img src="<?php echo uploads($value['image'], 'profile') ?>" class="rounded" style="max-width: 130px">
                                </div>
                                <?php endif ?>
                                <div class="text-left">
                                    <h3 class="mb-1"><?php echo $value['name'] ?></h3>
                                    <strong><?php echo $value['amount'] ?></strong>
                                    <p><?php echo $value['description'] ?></p>
                                </div>
                            </a>
                        <?php endif ?>
                        <?php if($value['type'] == "twitter"): ?>
                            <div class="mb-1">
                                <a class="twitter-timeline" data-width="100%" data-tweet-limit="<?php echo $value['amount'] ?>" href="<?php echo $value['link'] ?>" data-chrome="nofooter">Tweets</a>
                                <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
                            </div>
                        <?php endif ?>
                        <?php if($value['type'] == "facebook"): ?>
                            <div id="fb-root"></div><script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v14.0" nonce="WaCixDC1"></script><div class="fb-post" data-href="<?php echo $value['link'] ?>" data-show-text="true"></div>
                        <?php endif ?>
                        <?php if($value['type'] == "instagram"): ?>
                            <blockquote class="instagram-media" data-instgrm-permalink="<?php echo $value['link'] ?>" data-instgrm-version="14" style=" background:#FFF; border:0; border-radius:3px; box-shadow:0 0 1px 0 rgba(0,0,0,0.5),0 1px 10px 0 rgba(0,0,0,0.15); margin: 1px; max-width:540px; min-width:326px; padding:0; width:99.375%; width:-webkit-calc(100% - 2px); width:calc(100% - 2px);"></blockquote><script async src="//www.instagram.com/embed.js"></script>
                        <?php endif ?>
                        <?php if($value['type'] == "soundcloud"): ?>
                            <div class="mb-1">
                                <iframe width="100%" height="166" scrolling="no" frameborder="no" allow="autoplay" src="https://w.soundcloud.com/player/?url=<?php echo urlencode($value['link']) ?>&color=%23ff5500&auto_play=false&hide_related=false&show_comments=true&show_user=true&show_reposts=false&show_teaser=true"></iframe>
                            </div>
                        <?php endif ?>
                        <?php if($value['type'] == "opensea"): ?>
                            <div class="mb-1">
                                <nft-card width="100%" contractAddress="<?php echo $value['ids'][4] ?>" tokenId="<?php echo $value['ids'][5] ?>"> </nft-card>
                                <script src="https://unpkg.com/embeddable-nfts/dist/nft-card.min.js"></script>
                            </div>
                        <?php endif ?>
                        <?php if($value['type'] == "faqs"): ?>
                            <?php foreach($value['question'] as $i => $question): ?>
                                <div class="card mb-1">
                                    <div class="card-body text-left">
                                        <a href="#faq-<?php echo $i ?>" data-toggle="collapse" data-target="#faq-<?php echo $i ?>">
                                            <h6 class="card-title mb-0"><small><i class="fa fa-plus mr-2"></i></small> <?php echo $question ?></h6>
                                        </a>
                                        <div class="collapse pt-3" id="faq-<?php echo $i ?>">
                                            <?php echo $value['answer'][$i] ?>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach ?>
                        <?php endif ?>
                    </div>
                <?php endforeach ?>
            </div>
            <?php if(isset($profiledata['style']['socialposition']) && $profiledata['style']['socialposition'] == 'bottom'): ?>
            <div id="social" class="text-center mt-5">
                <?php foreach($profiledata['social'] as $key => $value): ?>
                    <?php if(empty($value)) continue ?>
                    <a href="<?php echo $value ?>" class="ml-3" target="_blank" data-toggle="tooltip" data-placement="top" title="<?php echo ucfirst($key) ?>" rel="nofollow"><i class="fab fa-<?php echo $key ?>"></i></a>
                <?php endforeach ?>
            </div>
            <?php endif ?>
        </div>
    </div>
    <?php if(!isset($profiledata['settings']['branding']) || !$profiledata['settings']['branding']): ?>
    <div class="text-center mt-3 opacity-8">
        <a class="navbar-brand mr-0" href="<?php echo route('home') ?>">
            <?php if(config('logo')): ?>
                <img alt="<?php echo $sitetitle ?? ''?>" src="<?php echo uploads(config('logo')) ?>" width="80" id="navbar-logo">
            <?php else: ?>
                <h1 class="h5 mt-2"><?php echo $sitetitle ?? ''?></h1>
            <?php endif ?>
        </a>
    </div>
    <?php endif ?>
</div>
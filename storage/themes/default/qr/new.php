<h1 class="h3 mb-5"><?php ee('Create QR') ?></h1>
<form action="<?php echo route('qr.save') ?>" data-trigger="saveqr" method="post" enctype="multipart/form-data">
    <?php echo csrf() ?>
    <input type="hidden" name="type" value="text">
    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title fw-bold"><?php ee('Static QR') ?> - <?php ee('Non-Trackable') ?></h5>
                </div>
                <div class="list-group list-group-flush list-group-dynamic">
                    <a class="list-group-item list-group-item-action active" data-bs-toggle="collapse" data-bs-parent="#qrbuilder" href="#text"><i class="me-2" data-feather="type"></i> <?php ee('Text') ?></a>
                    <a class="list-group-item list-group-item-action" data-bs-toggle="collapse" data-bs-parent="#qrbuilder" href="#sms"><i class="me-2" data-feather="smartphone"></i><?php ee('SMS & Message') ?></a>
                    <a class="list-group-item list-group-item-action" data-bs-toggle="collapse" data-bs-parent="#qrbuilder" href="#wifi"><i class="me-2" data-feather="wifi"></i> <?php ee('WiFi') ?></a>
                    <a class="list-group-item list-group-item-action" data-bs-toggle="collapse" data-bs-parent="#qrbuilder" href="#staticvcard"><i class="me-2" data-feather="user"></i> <?php ee('Static vCard') ?></a>
                    <a class="list-group-item list-group-item-action" data-bs-toggle="collapse" data-bs-parent="#qrbuilder" href="#event"><i class="me-2" data-feather="calendar"></i> <?php ee('Event') ?></a>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title fw-bold"><?php ee('Dynamic QR') ?> - <?php ee('Trackable') ?></h5>
                </div>
                <div class="list-group list-group-flush list-group-dynamic">
                    <a class="list-group-item list-group-item-action" data-bs-toggle="collapse" data-bs-parent="#qrbuilder" href="#vcard"><i class="me-2" data-feather="user"></i> <?php ee('vCard') ?></a>
                    <a class="list-group-item list-group-item-action" data-bs-toggle="collapse" data-bs-parent="#qrbuilder" href="#link"><i class="me-2" data-feather="link"></i> <?php ee('Link') ?></a>
                    <a class="list-group-item list-group-item-action" data-bs-toggle="collapse" data-bs-parent="#qrbuilder" href="#email"><i class="me-2" data-feather="mail"></i> <?php ee('Email') ?></a>
                    <a class="list-group-item list-group-item-action" data-bs-toggle="collapse" data-bs-parent="#qrbuilder" href="#phone"><i class="me-2" data-feather="phone"></i> <?php ee('Phone') ?></a>
                    <a class="list-group-item list-group-item-action" data-bs-toggle="collapse" data-bs-parent="#qrbuilder" href="#smsonly"><i class="me-2" data-feather="smartphone"></i><?php ee('SMS') ?></a>
                    <a class="list-group-item list-group-item-action" data-bs-toggle="collapse" data-bs-parent="#qrbuilder" href="#file"><i class="me-2 fa fa-file fa-lg"></i> <?php ee('File') ?></a>
                    <a class="list-group-item list-group-item-action" data-bs-toggle="collapse" data-bs-parent="#qrbuilder" href="#whatsapp"><i class="me-2 fab fa-whatsapp fa-lg"></i> <?php ee('Whatsapp') ?></a>
                    <a class="list-group-item list-group-item-action" data-bs-toggle="collapse" data-bs-parent="#qrbuilder" href="#crypto"><i class="me-2 fab fa-bitcoin fa-lg"></i> <?php ee('Cryptocurrency') ?></a>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card card-body">
                <div class="form-group">
                    <label class="form-label"><?php ee('QR Code Name') ?></label>
                    <input type="text" class="form-control p-2" name="name" placeholder="e.g. For Instagram">
                </div>
                <div class="form-group input-select mt-4">
                    <label class="form-label"><?php ee('Domain') ?></label>
                    <div class="d-flex">
                        <div>
                            <select name="domain" id="domain" class="form-select p-2" data-toggle="select">
                                <?php foreach($domains as $domain): ?>
                                    <option value="<?php echo $domain ?>"><?php echo $domain ?></option>
                                <?php endforeach ?>
                            </select>
                            <p class="form-text"><?php ee('Choose domain to generate the link with when using dynamic QR codes. Not applicable for static QR codes.') ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card" id="qrbuilder">
                <div class="collapse show" id="text">
                    <div class="card-header">
                        <h5 class="card-title fw-bold"><i class="me-2" data-feather="type"></i> <?php ee('Text') ?></h5>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label class="form-label"><?php ee('Your Text') ?></label>
                            <textarea class="form-control" name="text" placeholder="<?php ee('Your Text') ?>"></textarea>
                        </div>
                    </div>
                </div>
                <div class="collapse" id="link">
                    <div class="card-header">
                        <h5 class="card-title fw-bold"><i class="me-2" data-feather="link"></i> <?php ee('Link') ?></h5>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label class="form-label"><?php ee('Your Link') ?></label>
                            <input type="text" class="form-control p-2" name="link" placeholder="https://">
                        </div>
                    </div>
                </div>
                <div class="collapse" id="email">
                    <div class="card-header">
                        <h5 class="card-title fw-bold"><i class="me-2" data-feather="mail"></i> <?php ee('Email') ?></h5>
                    </div>
                    <div class="card-body">
                        <div class="form-group mb-3">
                            <label class="form-label"><?php ee('Email') ?></label>
                            <input type="email" class="form-control" name="email[email]" placeholder="e.g. someone@domain.com">
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label"><?php ee('Subject') ?></label>
                            <input type="text" class="form-control p-2" name="email[subject]" placeholder="e.g. <?php ee('Job Application') ?>">
                        </div>
                        <div class="form-group">
                            <label class="form-label"><?php ee('Message') ?></label>
                            <textarea class="form-control" name="email[body]" placeholder="e.g. <?php ee('Your message here to be sent as email') ?>"></textarea>
                        </div>
                    </div>
                </div>
                <div class="collapse" id="phone">
                    <div class="card-header">
                        <h5 class="card-title fw-bold"><i class="me-2" data-feather="phone"></i> <?php ee('Phone') ?></h5>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label class="form-label"><?php ee('Phone Number') ?></label>
                            <input type="text" class="form-control p-2" name="phone" placeholder="e.g. 123456789">
                        </div>
                    </div>
                </div>
                <div class="collapse" id="sms">
                    <div class="card-header">
                        <h5 class="card-title fw-bold"><i class="me-2" data-feather="smartphone"></i> <?php ee('SMS & Message') ?></h5>
                    </div>
                    <div class="card-body">
                        <div class="form-group mb-3">
                            <label class="form-label"><?php ee('Phone Number') ?></label>
                            <input type="text" class="form-control p-2" name="sms[phone]" placeholder="e.g 123456789">
                        </div>
                        <div class="form-group">
                            <label class="form-label"><?php ee('Message') ?></label>
                            <input type="text" class="form-control p-2" name="sms[message]" placeholder="e.g. <?php ee('Job Application') ?>">
                        </div>
                    </div>
                </div>
                <div class="collapse" id="smsonly">
                    <div class="card-header">
                        <h5 class="card-title fw-bold"><i class="me-2" data-feather="smartphone"></i> <?php ee('SMS') ?></h5>
                    </div>
                    <div class="card-body">
                        <div class="form-group mb-3">
                            <label class="form-label"><?php ee('Phone Number') ?></label>
                            <input type="text" class="form-control p-2" name="smsonly[phone]" placeholder="e.g 123456789">
                        </div>
                    </div>
                </div>
                <div class="collapse" id="file">
                    <div class="card-header">
                        <h5 class="card-title fw-bold"><i class="me-2 fa fa-file"></i> <?php ee('File Upload (Image or PDF)') ?></h5>
                    </div>
                    <div class="card-body">
                        <p><?php ee('This can be used to upload an image or a PDF. Most common uses are restaurant menu, promotional poster and resume.') ?></p>
                        <div class="form-group mb-3">
                            <label for="file" class="form-label"><?php ee('File') ?></label>
                            <input type="file" class="form-control p-2" name="file" accept=".jpg, .jpeg, .png, .gif, .pdf">
                            <p class="form-text"><?php ee('Acceptable file: jpg, png, gif, pdf. Max 2MB.') ?></p>
                        </div>
                    </div>
                </div>
                <div class="collapse" id="whatsapp">
                    <div class="card-header">
                        <h5 class="card-title fw-bold"><i class="me-2 fab fa-whatsapp"></i> <?php ee('Whatsapp') ?></h5>
                    </div>
                    <div class="card-body">
                        <div class="form-group mb-3">
                            <label class="form-label"><?php ee('Phone Number') ?></label>
                            <input type="text" class="form-control p-2" name="whatsapp[phone]" placeholder="e.g +123456789">
                        </div>
                        <div class="form-group">
                            <label class="form-label"><?php ee('Message') ?></label>
                            <textarea class="form-control" name="whatsapp[body]" placeholder="e.g. <?php ee('Your message here to be sent as email') ?>"></textarea>
                        </div>
                    </div>
                </div>
                <div class="collapse" id="vcard">
                    <div class="card-header">
                        <h5 class="card-title fw-bold"><i class="me-2" data-feather="user"></i> <?php ee('vCard') ?></h5>
                    </div>
                    <div class="card-body">
                        <div class="form-group mb-3">
                            <label class="form-label"><?php ee('First Name') ?></label>
                            <input type="text" class="form-control p-2" name="vcard[fname]" placeholder="e.g. John">
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label"><?php ee('Last Name') ?></label>
                            <input type="text" class="form-control p-2" name="vcard[lname]" placeholder="e.g. Doe">
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label"><?php ee('Organization') ?></label>
                            <input type="text" class="form-control p-2" name="vcard[org]" placeholder="e.g. Internet Inc">
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label"><?php ee('Phone') ?></label>
                            <input type="text" class="form-control p-2" name="vcard[phone]" placeholder="e.g. +112345689">
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label"><?php ee('Cell') ?></label>
                            <input type="text" class="form-control p-2" name="vcard[cell]" placeholder="e.g. +112345689">
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label"><?php ee('Fax') ?></label>
                            <input type="text" class="form-control p-2" name="vcard[fax]" placeholder="e.g. +112345689">
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label"><?php ee('Email') ?></label>
                            <input type="email" class="form-control" name="vcard[email]" placeholder="e.g. someone@domain.com">
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label"><?php ee('Website') ?></label>
                            <input type="text" class="form-control p-2" name="vcard[site]" placeholder="e.g. https://domain.com">
                        </div>
                        <div class="btn-group ms-auto">
                            <button type="button" class="btn btn-primary btn-sm text-white" data-bs-toggle="collapse" data-bs-target="#vcard-address">+ <?php ee('Address') ?></button>
                            <button type="button" class="btn btn-primary btn-sm text-white" data-bs-toggle="collapse" data-bs-target="#vcard-social">+ <?php ee('Social') ?></button>
                        </div>
                        <div id="vcard-address" class="collapse">
                            <hr>
                            <div class="form-group mb-3">
                                <label class="form-label"><?php ee('Street') ?></label>
                                <input type="text" class="form-control p-2" name="vcard[street]" placeholder="e.g. 123 My Street">
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label"><?php ee('City') ?></label>
                                <input type="text" class="form-control p-2" name="vcard[city]" placeholder="e.g. My City">
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label"><?php ee('State') ?></label>
                                <input type="text" class="form-control p-2" name="vcard[state]" placeholder="e.g. My State">
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label"><?php ee('Zipcode') ?></label>
                                <input type="text" class="form-control p-2" name="vcard[zip]" placeholder="e.g. 123456">
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label"><?php ee('Country') ?></label>
                                <input type="text" class="form-control p-2" name="vcard[country]" placeholder="e.g. My Country">
                            </div>
                        </div>
                        <div id="vcard-social" class="collapse">
                            <hr>
                            <div class="form-group mb-3">
                                <label class="form-label"><?php ee('Facebook') ?></label>
                                <input type="text" class="form-control p-2" name="vcard[facebook]" placeholder="e.g. https://www.facebook.com/myprofile">
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label"><?php ee('Twitter') ?></label>
                                <input type="text" class="form-control p-2" name="vcard[twitter]" placeholder="e.g. https://www.twitter.com/myprofile">
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label"><?php ee('Instagram') ?></label>
                                <input type="text" class="form-control p-2" name="vcard[instagram]" placeholder="e.g. https://www.instagram.com/myprofile">
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label"><?php ee('Linekdin') ?></label>
                                <input type="text" class="form-control p-2" name="vcard[linkedin]" placeholder="e.g. https://www.linkedin.com/myprofile">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="collapse" id="staticvcard">
                    <div class="card-header">
                        <h5 class="card-title fw-bold"><i class="me-2" data-feather="user"></i> <?php ee('vCard') ?></h5>
                    </div>
                    <div class="card-body">
                        <div class="form-group mb-3">
                            <label class="form-label"><?php ee('First Name') ?></label>
                            <input type="text" class="form-control p-2" name="staticvcard[fname]" placeholder="e.g. John">
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label"><?php ee('Last Name') ?></label>
                            <input type="text" class="form-control p-2" name="staticvcard[lname]" placeholder="e.g. Doe">
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label"><?php ee('Organization') ?></label>
                            <input type="text" class="form-control p-2" name="staticvcard[org]" placeholder="e.g. Internet Inc">
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label"><?php ee('Phone') ?></label>
                            <input type="text" class="form-control p-2" name="staticvcard[phone]" placeholder="e.g. +112345689">
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label"><?php ee('Cell') ?></label>
                            <input type="text" class="form-control p-2" name="staticvcard[cell]" placeholder="e.g. +112345689">
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label"><?php ee('Fax') ?></label>
                            <input type="text" class="form-control p-2" name="staticvcard[fax]" placeholder="e.g. +112345689">
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label"><?php ee('Email') ?></label>
                            <input type="email" class="form-control" name="staticvcard[email]" placeholder="e.g. someone@domain.com">
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label"><?php ee('Website') ?></label>
                            <input type="text" class="form-control p-2" name="staticvcard[site]" placeholder="e.g. https://domain.com">
                        </div>
                        <div class="btn-group ms-auto">
                            <button type="button" class="btn btn-primary btn-sm text-white" data-bs-toggle="collapse" data-bs-target="#vcard-address">+ <?php ee('Address') ?></button>
                            <button type="button" class="btn btn-primary btn-sm text-white" data-bs-toggle="collapse" data-bs-target="#vcard-social">+ <?php ee('Social') ?></button>
                        </div>
                        <div id="vcard-address" class="collapse">
                            <hr>
                            <div class="form-group mb-3">
                                <label class="form-label"><?php ee('Street') ?></label>
                                <input type="text" class="form-control p-2" name="staticvcard[street]" placeholder="e.g. 123 My Street">
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label"><?php ee('City') ?></label>
                                <input type="text" class="form-control p-2" name="staticvcard[city]" placeholder="e.g. My City">
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label"><?php ee('State') ?></label>
                                <input type="text" class="form-control p-2" name="staticvcard[state]" placeholder="e.g. My State">
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label"><?php ee('Zipcode') ?></label>
                                <input type="text" class="form-control p-2" name="staticvcard[zip]" placeholder="e.g. 123456">
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label"><?php ee('Country') ?></label>
                                <input type="text" class="form-control p-2" name="staticvcard[country]" placeholder="e.g. My Country">
                            </div>
                        </div>
                        <div id="vcard-social" class="collapse">
                            <hr>
                            <div class="form-group mb-3">
                                <label class="form-label"><?php ee('Facebook') ?></label>
                                <input type="text" class="form-control p-2" name="staticvcard[facebook]" placeholder="e.g. https://www.facebook.com/myprofile">
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label"><?php ee('Twitter') ?></label>
                                <input type="text" class="form-control p-2" name="staticvcard[twitter]" placeholder="e.g. https://www.twitter.com/myprofile">
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label"><?php ee('Instagram') ?></label>
                                <input type="text" class="form-control p-2" name="staticvcard[instagram]" placeholder="e.g. https://www.instagram.com/myprofile">
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label"><?php ee('Linekdin') ?></label>
                                <input type="text" class="form-control p-2" name="staticvcard[linkedin]" placeholder="e.g. https://www.linkedin.com/myprofile">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="collapse" id="wifi">
                    <div class="card-header">
                        <h5 class="card-title fw-bold"><i class="me-2" data-feather="wifi"></i> <?php ee('WiFi') ?></h5>
                    </div>
                    <div class="card-body">
                        <div class="form-group mb-3">
                            <label class="form-label"><?php ee('Network SSID') ?></label>
                            <input type="text" class="form-control p-2" name="wifi[ssid]" placeholder="e.g 123456789">
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label"><?php ee('Password') ?></label>
                            <input type="text" class="form-control p-2" name="wifi[pass]" placeholder="Optional">
                        </div>
                        <div class="form-group">
                            <label class="form-label"><?php ee('Encryption') ?></label>
                            <select name="wifi[encryption]" class="form-control">
                                <option value="wep">WEP</option>
                                <option value="wpa">WPA/WPA2</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="collapse" id="event">
                    <div class="card-header">
                        <h5 class="card-title fw-bold"><i class="me-2" data-feather="calendar"></i> <?php ee('Event') ?></h5>
                    </div>
                    <div class="card-body">
                        <div class="form-group mb-3">
                            <label class="form-label"><?php ee('Title') ?></label>
                            <input type="text" class="form-control p-2" name="event[title]" placeholder="">
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label"><?php ee('Description') ?></label>
                            <textarea class="form-control p-2" name="event[description]"></textarea>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label"><?php ee('Location') ?></label>
                            <textarea class="form-control p-2" name="event[location]"></textarea>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label"><?php ee('URL') ?></label>
                            <input type="text" class="form-control p-2" name="event[url]" placeholder="">
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label class="form-label"><?php ee('Start') ?></label>
                                    <input type="datetime-local" class="form-control p-2" name="event[start]">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label class="form-label"><?php ee('End') ?></label>
                                    <input type="datetime-local" class="form-control p-2" name="event[end]">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="collapse" id="crypto">
                    <div class="card-header">
                        <h5 class="card-title fw-bold"><i class="me-2 fab fa-bitcoin"></i> <?php ee('Crypto') ?></h5>
                    </div>
                    <div class="card-body">
                        <div class="form-group mb-3">
                            <p><?php ee('Cryptocurrency') ?></p>
                            <label class="me-3">
                                <input type="radio" name="crypto[currency]" value="btc" checked> <?php ee('Bitcoin') ?>
                            </label>
                            <label class="me-3">
                                <input type="radio" name="crypto[currency]" value="eth"> <?php ee('Ethereum') ?>
                            </label>
                            <label class="me-3">
                                <input type="radio" name="crypto[currency]" value="bch"> <?php ee('Bitcoin Cash') ?>
                            </label>
                        </div>
                        <div class="form-group">
                            <label class="form-label"><?php ee('Wallet Address') ?></label>
                            <input class="form-control p-2" name="crypto[wallet]" placeholder="e.g. <?php ee('Enter your public wallet address') ?>">
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
				<div class="card-header mt-2">
                    <a href="" data-bs-toggle="collapse" class="text-decoration-none" role="button" data-bs-target="#colors"><h5 class="card-title fw-bold"><i class="fa fa-tint fa-lg me-3"></i> <span class="align-middle"><?php ee('Colors') ?></span></h5></a>
				</div>
				<div class="card-body collapse" id="colors">
                    <?php if(\Helpers\QR::hasImagick()): ?>
                    <div class="mb-3">
                        <div class="btn-group">
                            <a href="#singlecolor" class="btn btn-primary btn-sm active" data-bs-toggle="collapse" data-trigger="color" data-bs-parent="#colors"><?php ee('Single Color') ?></a>
                            <a href="#gradient" class="btn btn-primary btn-sm" data-bs-toggle="collapse" data-trigger="color" data-bs-parent="#colors"><?php ee('Gradient Color') ?></a>
                        </div>
                    </div>
                    <?php endif ?>
                    <div id="singlecolor" class="collapse show">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label class="form-label" for="bg"><?php ee("Background") ?></label><br>
                                    <input type="text" name="bg" id="bg" value="rgb(255,255,255)">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label class="form-label" for="fg"><?php ee("Foreground") ?></label><br>
                                    <input type="text" name="fg" id="fg" value="rgb(0,0,0)">
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php if(\Helpers\QR::hasImagick()): ?>
                        <div id="gradient" class="collapse">
                            <input type="hidden" name="mode" value="simple">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group mb-3">
                                        <label class="form-label" for="bg"><?php ee("Background") ?></label><br>
                                        <input type="text" name="gradient[bg]" id="gbg" value="rgb(255,255,255)">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col form-group mb-3">
                                            <label class="form-label" for="fg"><?php ee("Gradient Start") ?></label><br>
                                            <input type="text" name="gradient[start]" id="gfg" value="rgb(0,0,0)">
                                        </div>
                                        <div class="col form-group mb-3">
                                            <label class="form-label" for="fgs"><?php ee("Gradient Stop") ?></label><br>
                                            <input type="text" name="gradient[stop]" id="gfgs" value="rgb(0,0,0)">
                                        </div>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label class="form-label" for="fgd"><?php ee("Gradient Direction") ?></label><br>
                                        <select name="gradient[direction]" id="gfgd" class="form-select">
                                            <option value="vertical"><?php ee('Vertical') ?></option>
                                            <option value="horizontal"><?php ee('Horizontal') ?></option>
                                            <option value="radial"><?php ee('Radial') ?></option>
                                            <option value="diagonal"><?php ee('Diagonal') ?></option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col form-group mb-3">
                            <label class="form-label"><?php ee("Eye Frame Color") ?></label><br>
                            <input type="text" name="eyeframecolor" id="eyeframecolor" value="">
                        </div>
                        <div class="col form-group mb-3">
                            <label class="form-label"><?php ee("Eye Color") ?></label><br>
                            <input type="text" name="eyecolor" id="eyecolor" value="">
                        </div>
                    <?php endif ?>
				</div>
			</div>
            <div class="card">
				<div class="card-header mt-2">
                    <a href="" data-bs-toggle="collapse" class="text-decoration-none" role="button" data-bs-target="#design"><h5 class="card-title fw-bold"><i class="fa fa-magic fa-lg me-3"></i> <span class="align-middle"><?php ee('Design') ?></span></h5></a>
				</div>
				<div class="card-body collapse" id="design">
                    <div class="mb-3" data-toggle="buttons">
                        <label class="btn text-center border border-secondary rounded p-3 me-1" style="height:58px">
                            <input type="radio" name="selectlogo" value="none" class="d-none" checked>
                            <i data-feather="x"></i>
                        </label>
                        <label class="btn text-center border rounded p-2 h-100 me-1">
                            <input type="radio" name="selectlogo" value="instagram" class="d-none">
                            <img src="<?php echo assets('images/instagram.png') ?>" class="img-fluid" width="40">
                        </label>
                        <label class="btn text-center border rounded p-2 h-100 me-1">
                            <input type="radio" name="selectlogo" value="facebook" class="d-none">
                            <img src="<?php echo assets('images/facebook.png') ?>" class="img-fluid" width="40">
                        </label>
                        <label class="btn text-center border rounded p-2 h-100 me-1">
                            <input type="radio" name="selectlogo" value="youtube" class="d-none">
                            <img src="<?php echo assets('images/youtube.png') ?>" class="img-fluid" width="40">
                        </label>
                        <label class="btn text-center border rounded p-2 h-100 me-1">
                            <input type="radio" name="selectlogo" value="twitter" class="d-none">
                            <img src="<?php echo assets('images/twitter.png') ?>" class="img-fluid" width="40">
                        </label>
                        <label class="btn text-center border rounded p-2 h-100 me-1">
                            <input type="radio" name="selectlogo" value="tiktok" class="d-none">
                            <img src="<?php echo assets('images/tiktok.png') ?>" class="img-fluid" width="40">
                        </label>
                        <label class="btn text-center border rounded p-2 h-100 me-1">
                            <input type="radio" name="selectlogo" value="linkedin" class="d-none">
                            <img src="<?php echo assets('images/linkedin.png') ?>" class="img-fluid" width="40">
                        </label>
                    </div>					
                    <div class="form-group mb-3">
                        <label class="form-label" for="logo"><?php ee("Custom Logo") ?></label>
                        <input type="file" class="form-control" name="logo" id="logo">
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label d-block mb-3"><?php ee("Size") ?> (px)</label>
                        <input type="number" value="" name="logosize" placeholder="e.g. 50" class="form-control p-2">
                    </div>
                    <?php if(\Helpers\QR::hasImagick()): ?>
                        <hr>
                        <div class="form-group mb-3">
                            <label class="form-label d-block mb-3" for="fgd"><?php ee("Matrix Style") ?></label>
                            <div data-toggle="buttons">
                                <label class="btn text-center border bg-light rounded p-2 border-secondary h-100 me-1">
                                    <svg width="30" height="15"><rect x="20" y="0" height="5" width="5" style="fill:rgb(0,0,0);"></rect><rect x="25" y="0" height="5" width="5" style="fill:rgb(0,0,0);"></rect><rect y="0" height="5" width="15" style="fill:rgb(0,0,0);"></rect><rect y="5" x="10" height="5" width="20" style="fill:rgb(0,0,0);"></rect></svg>
                                    <input type="radio" name="matrix" value="square" class="d-none" checked>
                                </label>
                                <label class="btn text-center border bg-light rounded p-2 h-100 me-1">
                                    <svg width="30" height="15"><rect x="19" y="0" rx="1" ry="1" height="5" width="5" style="fill:rgb(0,0,0);"></rect><rect x="25" y="0" rx="1" ry="1" height="5" width="5" style="fill:rgb(0,0,0);"></rect><rect y="0" rx="2" ry="2" height="5" width="15" style="fill:rgb(0,0,0);"></rect><rect y="3" x="10" rx="2" ry="2" height="5" width="20" style="fill:rgb(0,0,0);"></rect></svg>
                                    <input type="radio" name="matrix" value="circle" class="d-none">
                                </label>
                                <label class="btn text-center border bg-light rounded p-2 h-100 me-1">
                                    <svg width="30" height="15"><circle cx="2" cy="2" r="2" fill="black"></circle><circle cx="7" cy="2" r="2" fill="black"></circle><circle cx="12" cy="2" r="2" fill="black"></circle><circle cx="12" cy="7" r="2" fill="black"></circle><circle cx="17" cy="7" r="2" fill="black"></circle><circle cx="22" cy="7" r="2" fill="black"></circle><circle cx="22" cy="2" r="2" fill="black"></circle><circle cx="27" cy="2" r="2" fill="black"></circle><circle cx="27" cy="7" r="2" fill="black"></circle></svg>
                                    <input type="radio" name="matrix" value="dot" class="d-none">
                                </label>
                                <label class="btn text-center border bg-light rounded p-2 h-100 me-1">
                                    <svg width="30" height="15"><rect x="0" y="0" width="3" height="3" transform="translate(3,0) rotate(45)" /><rect x="0" y="0" width="3" height="3" transform="translate(8,0) rotate(45)" /><rect x="0" y="0" width="3" height="3" transform="translate(13,0) rotate(45)" /><rect x="0" y="0" width="3" height="3" transform="translate(13,5) rotate(45)" /><rect x="0" y="0" width="3" height="3" transform="translate(18,5) rotate(45)" /><rect x="0" y="0" width="3" height="3" transform="translate(23,5) rotate(45)" /><rect x="0" y="0" width="3" height="3" transform="translate(23,0) rotate(45)" /><rect x="0" y="0" width="3" height="3" transform="translate(28,5) rotate(45)" /><rect x="0" y="0" width="3" height="3" transform="translate(28,0) rotate(45)" /></svg>
                                    <input type="radio" name="matrix" value="diamond" class="d-none">
                                </label>
                                <label class="btn text-center border bg-light rounded p-2 h-100 me-1">
                                    <svg version="1.0" xmlns="http://www.w3.org/2000/svg"width="30" height="15" viewBox="0 0 191 97"preserveAspectRatio="xMidYMid meet"><g transform="translate(0.000000,97.000000) scale(0.100000,-0.100000)"fill="#000000" stroke="none"><path d="M549 897 c-41 -27 -59 -60 -59 -108 0 -44 30 -87 134 -189 l76 -75 106 106 c91 91 106 111 111 146 13 101 -96 177 -182 125 -29 -18 -31 -18 -60 0 -40 24 -85 23 -126 -5z"/><path d="M1503 900 c-44 -26 -67 -73 -60 -123 5 -35 20 -55 111 -146 l106 -106 76 75 c104 102 134 145 134 189 0 48 -18 81 -59 108 -41 28 -86 29 -126 5 -29 -18 -31 -18 -60 0 -39 23 -82 23 -122 -2z"/><path d="M61 415 c-16 -14 -35 -42 -42 -62 -20 -61 -1 -96 109 -206 l98 -97 107 108 c102 104 107 111 107 151 0 81 -48 131 -127 131 -21 0 -48 -7 -61 -15 -19 -14 -24 -14 -51 0 -46 24 -104 19 -140 -10z"/><path d="M548 423 c-41 -26 -62 -72 -55 -123 5 -38 17 -55 109 -147 l103 -103 97 97 c59 59 102 111 109 131 16 50 4 96 -37 131 -40 36 -95 41 -145 16 -27 -14 -32 -14 -51 0 -29 20 -96 19 -130 -2z"/><path d="M1019 417 c-23 -15 -38 -37 -47 -65 -13 -38 -12 -46 7 -84 11 -24 61 -83 111 -133 l90 -90 90 90 c50 50 100 109 111 133 19 38 20 46 7 84 -23 75 -125 115 -186 72 -20 -14 -24 -14 -44 0 -33 24 -99 20 -139 -7z"/><path d="M1486 409 c-41 -35 -53 -81 -37 -131 7 -20 50 -72 109 -131 l97 -97 103 103 c92 92 104 109 109 147 11 78 -44 140 -124 140 -21 0 -48 -7 -61 -15 -19 -14 -24 -14 -51 0 -50 25 -105 20 -145 -16z"/></g></svg>
                                    <input type="radio" name="matrix" value="heart" class="d-none">
                                </label>
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label d-block mb-3"><?php ee("Eye Frame") ?></label>
                            <div data-toggle="buttons">
                                <label class="btn text-center border bg-light rounded p-2 border-secondary h-100 me-1">
                                    <svg width="30" height="30"><rect height="30" width="30" style="fill:rgb(255,255,255);stroke-width:8;stroke:rgb(0,0,0)"></svg>
                                    <input type="radio" name="eyeframe" value="square" class="d-none" checked>
                                </label>
                                <label class="btn text-center border bg-light rounded p-2 h-100 me-1">
                                    <svg width="30" height="30"><rect height="30" width="30" rx="8" ry="8" style="fill:rgb(0,0,0);"></rect><rect x="4" y="4" height="22" width="22" rx="5" ry="5" style="fill:rgb(255,255,255);"></rect></svg>
                                    <input type="radio" name="eyeframe" value="rounded" class="d-none">
                                </label>

                                <label class="btn text-center border bg-light rounded p-2 h-100 me-1">
                                    <svg width="30" height="30"><circle cx="15" cy="15" r="12" fill="white" stroke="black" stroke-width="4"></circle></svg>
                                    <input type="radio" name="eyeframe" value="circle" class="d-none">
                                </label>
                                <label class="btn text-center border bg-light rounded p-2 h-100 me-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" width="30" height="30" viewBox="0 0 30 30"><rect x="5" y="5" width="20" height="20" fill="#ffffff"></rect><g transform="scale(4.2)"><g transform="translate(0,-14)"><path fill-rule="evenodd" d="M10 5M0 21C0 14 0 14 7 14M7 14C7 21 7 21 0 21ZM1 20C1 15 1 15 6 15M6 15C6 20 6 20 1 20M2 5z" fill="#000000"/></g></g><circle cx="15" cy="15" r="9" fill="white"></circle></svg>
                                    <input type="radio" name="eyeframe" value="eye" class="d-none">
                                </label>
                                <label class="btn text-center border bg-light rounded p-2 h-100 me-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" width="30" height="30" viewBox="0 0 30 30"><rect x="5" y="5" width="20" height="20" fill="#ffffff"></rect><g transform="translate(-4 -8) scale(4.2)"><g transform="rotate(90 10 12)"><path fill-rule="evenodd" d="M10 5M0 21C0 14 0 14 7 14M7 14C7 21 7 21 0 21ZM1 20C1 15 1 15 6 15M6 15C6 20 6 20 1 20M2 5z" fill="#000000"/></g></g><circle cx="15" cy="15" r="9" fill="white"></circle></svg>
                                    <input type="radio" name="eyeframe" value="eyeinverted" class="d-none">
                                </label>
                                <label class="btn text-center border bg-light rounded p-2 h-100 me-1">
                                    <svg width="30" height="30"><rect height="30" width="30" rx="8" ry="8" style="fill:rgb(0,0,0);"></rect><rect x="20" y="20" height="10" width="10" style="fill:rgb(0,0,0);"></rect><rect x="4" y="4" height="22" width="22" rx="5" ry="5" style="fill:rgb(255,255,255);"></rect><rect x="21" y="21" height="5" width="5" style="fill:rgb(255,255,255);"></rect></svg>
                                    <input type="radio" name="eyeframe" value="bubble" class="d-none">
                                </label>
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label d-block mb-3"><?php ee("Eye Style") ?></label>
                            <div data-toggle="buttons">
                                <label class="btn text-center border bg-light rounded p-2 border-secondary h-100 me-1">
                                    <svg width="30" height="30"><rect x="5" y="5" height="20" width="20" style="fill:rgb(0,0,0);"></rect></svg>
                                    <input type="radio" name="eye" value="square" class="d-none" checked>
                                </label>
                                <label class="btn text-center border bg-light rounded p-2 h-100 me-1">
                                    <svg width="30" height="30"><rect x="5" y="5" height="20" width="20" rx="6" ry="6" style="fill:rgb(0,0,0);"></rect></svg>
                                    <input type="radio" name="eye" value="rounded" class="d-none">
                                </label>
                                <label class="btn text-center border bg-light rounded p-2 h-100 me-1">
                                    <svg width="30" height="30"><circle cx="15" cy="15" r="10" fill="black"></circle></svg>
                                    <input type="radio" name="eye" value="circle" class="d-none">
                                </label>
                                <label class="btn text-center border bg-light rounded p-2 h-100 me-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" width="30" height="30" viewBox="0 0 30 30"><rect x="5" y="5" width="20" height="20" fill="#ffffff"></rect><g transform="scale(6)"><g transform="translate(-1,-15)"><path fill-rule="evenodd" d="M10 20M2 19C2 16 2 16 5 16M5 16C5 19 5 19 2 19" fill="#000000"/></g></g></svg>
                                    <input type="radio" name="eye" value="eye" class="d-none">
                                </label>
                                <label class="btn text-center border bg-light rounded p-2 h-100 me-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" width="30" height="30" viewBox="0 0 30 30"><rect x="5" y="5" width="20" height="20" fill="#ffffff"></rect><g transform="translate(-10 -17) scale(6)"><g transform="rotate(90 10 12)"><path fill-rule="evenodd" d="M10 20M2 19C2 16 2 16 5 16M5 16C5 19 5 19 2 19" fill="#000000"/></g></g></svg>
                                    <input type="radio" name="eye" value="eyeinverted" class="d-none">
                                </label>
                                <label class="btn text-center border bg-light rounded p-2 h-100 me-1">
                                    <svg width="30" height="30"><circle cx="12" cy="12" r="5" fill="black"></circle><circle cx="19" cy="12" r="5" fill="black"></circle><circle cx="12" cy="18" r="5" fill="black"></circle><circle cx="19" cy="18" r="5" fill="black"></circle></svg>
                                    <input type="radio" name="eye" value="butterfly" class="d-none">
                                </label>
                                <label class="btn text-center border bg-light rounded p-2 h-100 me-1">
                                    <svg width="30" height="30"><rect x="5" y="5" height="20" width="20" rx="6" ry="6" style="fill:rgb(0,0,0);"></rect><rect x="17" y="17" height="8" width="8" style="fill:rgb(0,0,0);"></rect></svg>
                                    <input type="radio" name="eye" value="bubble" class="d-none">
                                </label>
                                <label class="btn text-center border bg-light rounded p-2 h-100 me-1">
                                    <svg width="30" height="30"><g transform="translate(15 -10) rotate(45)"><rect x="10" y="10" height="15" width="15" style="fill:rgb(0,0,0);"></rect></g></svg>
                                    <input type="radio" name="eye" value="diamond" class="d-none">
                                </label>
                            </div>
                        </div>
                    <?php endif ?>
                    <hr>
                    <div class="form-group mb-3">
                        <label class="form-label d-block mb-3"><?php ee("Margin") ?></label>
                        <input type="number" value="" name="margin" placeholder="e.g. 10" class="form-control p-2">
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label d-block mb-2"><?php ee("Error Correction") ?></label>
                        <div class="form-text mb-3"><?php ee('Error correction allows better readability when code is damaged or dirty but increase QR data') ?></div>
                        <select name="error" class="form-select p-2">
                            <option value="l">L (7%)</option>
                            <option value="m" selected>M (15%)</option>
                            <option value="q">Q (25%)</option>
                            <option value="h">H (30%)</option>
                        </select>
                    </div>
				</div>
			</div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title fw-bold"><?php ee('QR Code') ?></h5>
                </div>
                <div class="card-body">
                    <div id="return-ajax">
                        <img src="<?php echo \Helpers\QR::factory('Sample QR', 400, 0)->format('svg')->create('uri') ?>" class="img-responsive w-100 mw-50">
                    </div>                    
                </div>
            </div>
            <div class="card card-body">
                <div class="d-flex">
                    <button type="button" data-trigger="preview" data-url="<?php echo route("qr.preview") ?>" class="flex-fill btn btn-primary me-1"><?php ee('Preview') ?></button>
                    <button type="submit" class="flex-fill btn btn-success ms-1"><?php ee('Generate QR') ?></button>
                </div>                
            </div>
            <div class="card card-body">
                <div class="form-text">
                    <?php ee("You will be able to download the QR code in PDF or SVG after it has been generated.") ?>
                </div>
            </div>
        </div>
    </div>
</form>
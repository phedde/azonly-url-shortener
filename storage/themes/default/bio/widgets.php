<div class="modal fade" id="contentModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-fullscreen p-2 p-md-5">
    <div class="modal-content rounded-lg shadow-lg">
      <div class="modal-header">
        <h5 class="modal-title fw-bolder"><?php ee('Add Link or Content') ?></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div id="modalcontent">
            <div class="collapse show" id="options">
                <h4 class="mb-3 fw-bold"><?php ee('Content') ?></h4>
                <div class="row" id="content-content">
                    <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
                        <a href="#modal-tagline" class="d-block text-decoration-none border rounded p-3 h-100" data-trigger="insertcontent" data-type="tagline">
                            <div class="d-flex">
                                <div>
                                    <h1><i class="fa fa-info-circle"></i></h1>
                                </div>
                                <div class="ms-3">
                                    <h5 class="fw-bold"><?php ee('Tagline') ?></h5>
                                    <p class="text-muted"><?php ee('Add a tagline under your profile name') ?></p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
                        <a href="#modal-heading" class="d-block text-decoration-none border rounded p-3 h-100" data-trigger="insertcontent" data-type="heading">
                            <div class="d-flex">
                                <div>
                                    <h1><i class="fa fa-heading"></i></h1>
                                </div>
                                <div class="ms-3">
                                    <h5 class="fw-bold"><?php ee('Heading') ?></h5>
                                    <p class="text-muted"><?php ee('Add a heading with different sizes') ?></p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
                        <a href="#modal-text" class="d-block text-decoration-none border rounded p-3 h-100" data-trigger="insertcontent" data-type="text">
                            <div class="d-flex">
                                <div>
                                    <h1><i class="fa fa-align-center"></i></h1>
                                </div>
                                <div class="ms-3">
                                    <h5 class="fw-bold"><?php ee('Text') ?></h5>
                                    <p class="text-muted"><?php ee('Add a text body to your page') ?></p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
                        <a href="#modal-divider" class="d-block text-decoration-none border rounded p-3 h-100" data-trigger="insertcontent" data-type="divider">
                            <div class="d-flex">
                                <div>
                                    <h1><i class="fa fa-grip-lines"></i></h1>
                                </div>
                                <div class="ms-3">
                                    <h5 class="fw-bold"><?php ee('Divider') ?></h5>
                                    <p class="text-muted"><?php ee('Separate your content with a line') ?></p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
                        <a href="#modal-links" class="d-block text-decoration-none border rounded p-3 h-100" data-trigger="insertcontent" data-type="link">
                            <div class="d-flex">
                                <div>
                                    <h1><i class="fa fa-link"></i></h1>
                                </div>
                                <div class="ms-3">
                                    <h5 class="fw-bold"><?php ee('Link') ?></h5>
                                    <p class="text-muted"><?php ee('Add a trackable button to a link') ?></p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
                        <a href="#modal-html" class="d-block text-decoration-none border rounded p-3 h-100" data-trigger="insertcontent" data-type="html">
                            <div class="d-flex">
                                <div>
                                    <h1><i class="fa fa-code"></i></h1>
                                </div>
                                <div class="ms-3">
                                    <h5 class="fw-bold"><?php ee('HTML') ?></h5>
                                    <p class="text-muted"><?php ee('Add custom HTML code. Script codes are not accepted') ?></p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
                        <a href="#modal-image" class="d-block text-decoration-none border rounded p-3 h-100" data-trigger="insertcontent" data-type="image">
                            <div class="d-flex">
                                <div>
                                    <h1><i class="fa fa-image"></i></h1>
                                </div>
                                <div class="ms-3">
                                    <h5 class="fw-bold"><?php ee('Image') ?></h5>
                                    <p class="text-muted"><?php ee('Upload an image or 2 images in a row') ?></p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
                        <a href="#modal-phone" class="d-block text-decoration-none border rounded p-3 h-100" data-trigger="insertcontent" data-type="phone">
                            <div class="d-flex">
                                <div>
                                    <h1><i class="fa fa-phone"></i></h1>
                                </div>
                                <div class="ms-3">
                                    <h5 class="fw-bold"><?php ee('Phone Call') ?></h5>
                                    <p class="text-muted"><?php ee('Set your phone number to call directly') ?></p>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
                        <a href="#modal-vcard" class="d-block text-decoration-none border rounded py-3 px-2 h-100" data-trigger="insertcontent" data-type="vcard">
                            <div class="d-flex">
                                <div>
                                    <h1><i class="fa fa-address-card"></i></h1>
                                </div>
                                <div class="ms-3">
                                    <h5 class="fw-bold"><?php ee('vCard') ?></h5>
                                    <p class="text-muted"><?php ee('Add a downloadable vCard') ?></p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
                        <a href="#modal-paypal" class="d-block text-decoration-none border rounded py-3 px-2 h-100" data-trigger="insertcontent" data-type="paypal">
                            <div class="d-flex">
                                <div>
                                    <img src="<?php echo assets('images/paypal.svg') ?>" width="30">
                                </div>
                                <div class="ms-3">
                                    <h5 class="fw-bold"><?php ee('PayPal Button') ?></h5>
                                    <p class="text-muted"><?php ee('Generate a PayPal button to accept payments') ?></p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
                        <a href="#modal-whatsapp" class="d-block text-decoration-none border rounded py-3 px-2 h-100" data-trigger="insertcontent" data-type="whatsapp">
                            <div class="d-flex">
                                <div>
                                    <img src="<?php echo assets('images/whatsapp.svg') ?>" width="30">
                                </div>
                                <div class="ms-3">
                                    <h5 class="fw-bold"><?php ee('WhatsApp Call') ?></h5>
                                    <p class="text-muted"><?php ee('Add button to initiate a Whatsapp call') ?></p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
                        <a href="#modal-whatsapp" class="d-block text-decoration-none border rounded py-3 px-2 h-100" data-trigger="insertcontent" data-type="whatsappmessage">
                            <div class="d-flex">
                                <div>
                                    <img src="<?php echo assets('images/whatsapp.svg') ?>" width="30">
                                </div>
                                <div class="ms-3">
                                    <h5 class="fw-bold"><?php ee('WhatsApp Message') ?></h5>
                                    <p class="text-muted"><?php ee('Add button to send a Whatsapp message') ?></p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <h4 class="my-3 fw-bold"><?php ee('Widgets') ?></h4>
                <div class="row" id="content-widgets">
                    <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
                        <a href="#modal-rss" class="d-block text-decoration-none border rounded p-3 h-100" data-trigger="insertcontent" data-type="rss">
                            <div class="d-flex">
                                <div>
                                    <h1><i class="text-danger fa fa-rss"></i></h1>
                                </div>
                                <div class="ms-3">
                                    <h5 class="fw-bold"><?php ee('RSS Feed') ?></h5>
                                    <p class="text-muted"><?php ee('Add a dynamic RSS feed widget') ?></p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
                        <a href="#modal-newsletter" class="d-block text-decoration-none border rounded py-3 px-2 h-100" data-trigger="insertcontent" data-type="newsletter">
                            <div class="d-flex">
                                <div>
                                    <h1><i class="text-primary fa fa-envelope-open"></i></h1>
                                </div>
                                <div class="ms-3">
                                    <h5 class="fw-bold"><?php ee('Newsletter') ?></h5>
                                    <p class="text-muted"><?php ee('Add a newsletter form to store emails') ?></p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
                        <a href="#modal-contact" class="d-block text-decoration-none border rounded py-3 px-2 h-100" data-trigger="insertcontent" data-type="contact">
                            <div class="d-flex">
                                <div>
                                    <h1><i class="text-success fa fa-envelope-square "></i></h1>
                                </div>
                                <div class="ms-3">
                                    <h5 class="fw-bold"><?php ee('Contact Form') ?></h5>
                                    <p class="text-muted"><?php ee('Add a contact form to receive emails') ?></p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
                        <a href="#modal-contact" class="d-block text-decoration-none border rounded py-3 px-2 h-100" data-trigger="insertcontent" data-type="faqs">
                            <div class="d-flex">
                                <div>
                                    <h1><i class="text-info fa fa-question-circle "></i></h1>
                                </div>
                                <div class="ms-3">
                                    <h5 class="fw-bold"><?php ee('FAQs') ?></h5>
                                    <p class="text-muted"><?php ee('Add a widget of questions and answers') ?></p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
                        <a href="#modal-product" class="d-block text-decoration-none border rounded py-3 px-2 h-100" data-trigger="insertcontent" data-type="product">
                            <div class="d-flex">
                                <div>
                                    <h1><i class="text-warning fa fa-store"></i></h1>
                                </div>
                                <div class="ms-3">
                                    <h5 class="fw-bold"><?php ee('Product') ?></h5>
                                    <p class="text-muted"><?php ee('Add a widget to a product on your site') ?></p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
                        <a href="#modal-youtube" class="d-block text-decoration-none border rounded py-3 px-2 h-100" data-trigger="insertcontent" data-type="youtube">
                            <div class="d-flex">
                                <div>
                                    <img src="<?php echo assets('images/youtube.svg') ?>" width="30">
                                </div>
                                <div class="ms-3">
                                    <h5 class="fw-bold"><?php ee('Youtube Video or Playlist') ?></h5>
                                    <p class="text-muted"><?php ee('Embed a Youtube video or a playlist') ?></p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
                        <a href="#modal-spotify" class="d-block text-decoration-none border rounded py-3 px-2 h-100" data-trigger="insertcontent" data-type="spotify">
                            <div class="d-flex">
                                <div>
                                    <img src="<?php echo assets('images/spotify.svg') ?>" width="30">
                                </div>
                                <div class="ms-3">
                                    <h5 class="fw-bold"><?php ee('Spotify Embed') ?></h5>
                                    <p class="text-muted"><?php ee('Embed a Spotify music or playlist widget') ?></p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
                        <a href="#modal-itunes" class="d-block text-decoration-none border rounded py-3 px-2 h-100" data-trigger="insertcontent" data-type="itunes">
                            <div class="d-flex">
                                <div>
                                    <img src="<?php echo assets('images/itunes.svg') ?>" width="30">
                                </div>
                                <div class="ms-3">
                                    <h5 class="fw-bold"><?php ee('Apple Music Embed') ?></h5>
                                    <p class="text-muted"><?php ee('Embed an Apple music widget') ?></p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
                        <a href="#modal-tiktok" class="d-block text-decoration-none border rounded py-3 px-2 h-100" data-trigger="insertcontent" data-type="tiktok">
                            <div class="d-flex">
                                <div>
                                    <img src="<?php echo assets('images/tiktok.svg') ?>" width="30">
                                </div>
                                <div class="ms-3">
                                    <h5 class="fw-bold"><?php ee('TikTok Embed') ?></h5>
                                    <p class="text-muted"><?php ee('Embed a tiktok video') ?></p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
                        <a href="#modal-opensea" class="d-block text-decoration-none border rounded py-3 px-2 h-100" data-trigger="insertcontent" data-type="opensea">
                            <div class="d-flex">
                                <div>
                                    <img src="<?php echo assets('images/opensea.svg') ?>" width="30">
                                </div>
                                <div class="ms-3">
                                    <h5 class="fw-bold"><?php ee('OpenSea NFT') ?></h5>
                                    <p class="text-muted"><?php ee('Embed your NFT from OpenSea') ?></p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
                        <a href="#modal-twitter" class="d-block text-decoration-none border rounded py-3 px-2 h-100" data-trigger="insertcontent" data-type="twitter">
                            <div class="d-flex">
                                <div>
                                    <img src="<?php echo assets('images/twitter.svg') ?>" width="30">
                                </div>
                                <div class="ms-3">
                                    <h5 class="fw-bold"><?php ee('Embed Tweets') ?></h5>
                                    <p class="text-muted"><?php ee('Embed your latest tweets') ?></p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
                        <a href="#modal-soundcloud" class="d-block text-decoration-none border rounded py-3 px-2 h-100" data-trigger="insertcontent" data-type="soundcloud">
                            <div class="d-flex">
                                <div>
                                    <img src="<?php echo assets('images/soundcloud.svg') ?>" width="30">
                                </div>
                                <div class="ms-3">
                                    <h5 class="fw-bold"><?php ee('SoundCloud') ?></h5>
                                    <p class="text-muted"><?php ee('Embed a SoundCloud track') ?></p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
                        <a href="#modal-facebook" class="d-block text-decoration-none border rounded py-3 px-2 h-100" data-trigger="insertcontent" data-type="facebook">
                            <div class="d-flex">
                                <div>
                                    <img src="<?php echo assets('images/facebook.svg') ?>" width="30">
                                </div>
                                <div class="ms-3">
                                    <h5 class="fw-bold"><?php ee('Facebook Post') ?></h5>
                                    <p class="text-muted"><?php ee('Embed a Facebook post') ?></p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
                        <a href="#modal-instagram" class="d-block text-decoration-none border rounded py-3 px-2 h-100" data-trigger="insertcontent" data-type="instagram">
                            <div class="d-flex">
                                <div>
                                    <img src="<?php echo assets('images/instagram.svg') ?>" width="30">
                                </div>
                                <div class="ms-3">
                                    <h5 class="fw-bold"><?php ee('Instagram Post') ?></h5>
                                    <p class="text-muted"><?php ee('Embed an Instagram post') ?></p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>            
        </div>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="removecard" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><?php ee('Are you sure you want to delete this?') ?></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p><?php ee('You are trying to delete a block. Please changes only take effect when you update the bio page.') ?></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><?php ee('Cancel') ?></button>
        <a href="#" class="btn btn-danger" data-trigger="confirmremove"><?php ee('Confirm') ?></a>
      </div>
    </div>
  </div>
</div>
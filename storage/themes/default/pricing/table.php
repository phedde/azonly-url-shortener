<div class="pricing row no-gutters">
    <?php foreach($plans as $id => $plan): ?>
        <div class="<?php echo $class ?>">
            <div class="card bg-section-primary card-pricing text-center mx-1">
                <div class="card-header py-5 border-0">
                    <?php if($plan['icon']): ?>
                        <span class="icon icon-lg bg-primary text-white rounded-circle icon-shape mb-3"><i class="<?php echo $plan['icon'] ?>"></i></span>
                    <?php endif ?>
                    <span class="d-block h5 mb-4"><?php ee($plan['name']) ?></span>
                    <div class="h1 text-center mb-0" data-pricing-monthly="<?php echo $plan['free'] ? e('Free') : \Helpers\App::currency(config('currency'), $plan["price_monthly"]) ?>" data-pricing-yearly="<?php echo $plan['free'] ? e('Free') : \Helpers\App::currency(config('currency'), $plan["price_yearly"]) ?>" data-pricing-lifetime="<?php echo  $plan['free'] ? e('Free') : \Helpers\App::currency(config('currency'), $plan["price_lifetime"]) ?>"><span class="price"><?php echo $plan['free'] ? e('Free') : \Helpers\App::currency(config('currency'), $plan["price_".$default]) ?></span></div>
                    <?php echo $plan['description'] ? '<span class="d-block text-muted mt-3">'.$plan['description'].'</span>': '' ?>
                    <?php if($plan['planurl'] == "#"):?>
                        <span class="btn bg-secondary text-dark mt-3 d-block"><strong><?php echo $plan['plantext'] ?></strong></span>
                    <?php else: ?>
                        <a href="<?php echo $plan['planurl'] ?>" class="btn btn-primary mt-3 shadow checkout d-block"><?php echo $plan['plantext'] ?></a>
                    <?php endif?>
                </div>
                <div class="card-body border-top rounded-bottom p-4 position-relative">
                    <ul class="list-unstyled mb-4 text-left">
                        <li><span data-toggle="tooltip" title="<?php ee('Number of short links allowed.') ?>"><?php ee("Short links") ?></span><span class="float-right font-weight-700"><?php echo $plan["urls"] == "0" ? '<i class="fa fa-infinity"></i>' : number_format($plan["urls"]) ?></span></li>
                        <li><span data-toggle="tooltip" title="<?php ee('Total clicks allowed over a period') ?>"><?php ee("Link Clicks") ?></span><span class="float-right font-weight-700"><?php echo $plan["clicks"] == "0" ? '<i class="fa fa-infinity"></i>' : number_format($plan["clicks"]).'/'.e('mo') ?></span></li>
                        <li><span data-toggle="tooltip" title="<?php ee('Amount of time statistics are kept for each short link.') ?>"><?php ee("Data Retention") ?></span><span class="float-right font-weight-700"><?php echo $plan["retention"] == "0" ? '<i class="fa fa-infinity"></i>' : $plan["retention"].' '.e('days') ?></span></li>
                        <li><span data-toggle="tooltip" title="<?php ee("Choose a custom alias instead of a randomly generated one.") ?>"><?php ee("Custom Aliases") ?></span><span class="float-right"><?php echo $plan["permission"]->alias->enabled ? '<i class="fa fa-check text-success"></i>' : '<i class="fa fa-times text-danger"></i>'  ?></span></li>
                        <li><span data-toggle="tooltip" title="<?php ee("Target and redirect visitors based on their country or state.") ?>"><?php ee("Geo Targeting") ?></span><span class="float-right"><?php echo $plan["permission"]->geo->enabled ? '<i class="fa fa-check text-success"></i>' : '<i class="fa fa-times text-danger"></i>'  ?></span></li>
                        <li><span data-toggle="tooltip" title="<?php ee("Target and redirect visitors based on their device.") ?>"><?php ee("Device Targeting") ?></span><span class="float-right"><?php echo $plan["permission"]->device->enabled ? '<i class="fa fa-check text-success"></i>' : '<i class="fa fa-times text-danger"></i>'  ?></span></li>
                        <li><span data-toggle="tooltip" title="<?php ee("Target and redirect visitors based on their language.") ?>"><?php ee("Language Targeting") ?></span><span class="float-right"><?php echo isset($plan["permission"]->language) && $plan["permission"]->language->enabled ? '<i class="fa fa-check text-success"></i>' : '<i class="fa fa-times text-danger"></i>'  ?></span></li>
                        <li>
                            <span data-toggle="tooltip" title="<?php ee('Convert your followers by creating beautiful pages that group all of your important links on the single page.') ?>"><?php ee("Bio Profiles") ?></span>
                            <span class="float-right font-weight-700">
                                <?php if(isset($plan["permission"]->bio) && $plan["permission"]->bio->enabled): ?>
                                    <?php echo ($plan["permission"]->bio->count == "0" ? '<i class="fa fa-infinity"></i>' : $plan["permission"]->bio->count) ?>
                                <?php else: ?>
                                    <i class="fa fa-times text-danger"></i>
                                <?php endif ?>
                            </span>
                        </li>
                        <li>
                            <span data-toggle="tooltip" title="<?php ee('Easy to use, dynamic and customizable QR codes for your marketing campaigns. Analyze statistics and optimize your marketing strategy and increase engagement.') ?>"><?php ee("QR Codes") ?></span>
                            <span class="float-right font-weight-700">
                                <?php if(isset($plan["permission"]->qr) && $plan["permission"]->qr->enabled): ?>
                                    <?php echo ($plan["permission"]->qr->count == "0" ? '<i class="fa fa-infinity"></i>' : $plan["permission"]->qr->count) ?>
                                <?php else: ?>
                                    <i class="fa fa-times text-danger"></i>
                                <?php endif ?>
                            </span>
                        </li>
                        <li>
                            <span data-toggle="tooltip" title="<?php ee('Create a custom landing page to promote your product or service on forefront and engage the user in your marketing campaign.') ?>"><?php ee("Custom Landing Page") ?></span>
                            <span class="float-right font-weight-700">
                            <?php if(isset($plan["permission"]->splash) && $plan["permission"]->splash->enabled): ?>
                                <?php echo ($plan["permission"]->splash->count == "0" ? '<i class="fa fa-infinity"></i>' : $plan["permission"]->splash->count) ?>
                            <?php else: ?>
                                <i class="fa fa-times text-danger"></i>
                            <?php endif ?>
                            </span>
                        </li>
                        <li>
                            <span data-toggle="tooltip" title="<?php ee('Use our overlay tool to display unobtrusive notifications, polls or even a contact on the target website. Great for campaigns.') ?>"><?php ee("CTA Overlays") ?></span>
                            <span class="float-right font-weight-700">
                            <?php if(isset($plan["permission"]->overlay) && $plan["permission"]->overlay->enabled): ?>
                                <?php echo ($plan["permission"]->overlay->count == "0" ? '<i class="fa fa-infinity"></i>' : $plan["permission"]->overlay->count) ?>
                            <?php else: ?>
                                <i class="fa fa-times text-danger"></i>
                            <?php endif ?>
                            </span>
                        </li>
                        <li>
                            <span data-toggle="tooltip" title="<?php ee('Add your custom pixel from providers such as Facebook and track events right when they are happening.') ?>"><?php ee("Event Tracking") ?></span>
                            <span class="float-right font-weight-700">
                            <?php if(isset($plan["permission"]->pixels) && $plan["permission"]->pixels->enabled): ?>
                                <?php echo ($plan["permission"]->pixels->count == "0" ? '<i class="fa fa-infinity"></i>' : $plan["permission"]->pixels->count) ?>
                            <?php else: ?>
                                <i class="fa fa-times text-danger"></i>
                            <?php endif ?>
                            </span>
                        </li>
                        <li>
                            <span data-toggle="tooltip" title="<?php ee('Invite your team members and assign them specific privileges to manage links, bundles, pages and other features.') ?>"><?php ee("Team Members") ?></span>
                            <span class="float-right font-weight-700">
                            <?php if(isset($plan["permission"]->team) && $plan["permission"]->team->enabled): ?>
                                <?php echo ($plan["permission"]->team->count == "0" ? '<i class="fa fa-infinity"></i>' : $plan["permission"]->team->count) ?>
                            <?php else: ?>
                                <i class="fa fa-times text-danger"></i>
                            <?php endif ?>
                            </span>
                        </li>
                        <li>
                            <span data-toggle="tooltip" title="<?php ee("Easily add your own domain name for short your links and take control of your brand name and your users' trust.") ?>"><?php ee("Branded Domains") ?></span>
                            <span class="float-right font-weight-700">
                            <?php if(isset($plan["permission"]->domain) && $plan["permission"]->domain->enabled): ?>
                                <?php echo ($plan["permission"]->domain->count == "0" ? '<i class="fa fa-infinity"></i>' : $plan["permission"]->domain->count) ?>
                            <?php else: ?>
                                <i class="fa fa-times text-danger"></i>
                            <?php endif ?>
                            </span>
                        </li>
                        <li>
                            <span data-toggle="tooltip" title="<?php ee("Group & organize your links.") ?>"><?php ee("Channels") ?></span>
                            <span class="float-right font-weight-700">
                            <?php if(isset($plan["permission"]->channels) && $plan["permission"]->channels->enabled): ?>
                                <?php echo ($plan["permission"]->channels->count == "0" ? '<i class="fa fa-infinity"></i>' : $plan["permission"]->channels->count) ?>
                            <?php else: ?>
                                <i class="fa fa-times text-danger"></i>
                            <?php endif ?>
                            </span>
                        </li>
                        <?php if($features = plug('feature')): ?>
                            <?php foreach($features as $feature): ?>
                                <?php if(isset($plan["permission"]->{$feature['slug']}) && $plan["permission"]->{$feature['slug']}->enabled): ?>
                                    <?php if($feature['count'] != false): ?>
                                        <li><span data-toggle="tooltip" title="<?php echo $feature['description'] ?>"><?php echo $feature['name'] ?></span>
                                            <span class="float-right font-weight-700"><?php echo $plan["permission"]->{$feature['slug']}->count == '0' ? '<i class="fa fa-infinity"></i>' : $plan["permission"]->{$feature['slug']}->count ?></span>
                                        </li>
                                    <?php else: ?>
                                        <li><span data-toggle="tooltip" title="<?php echo $feature['description'] ?>"><?php echo $feature['name'] ?></span><span class="float-right"><i class="fa fa-check text-success"></i></span></li>
                                    <?php endif ?>
                                <?php else: ?>
                                    <li><span data-toggle="tooltip" title="<?php echo $feature['description'] ?>"><?php echo $feature['name'] ?></span><span class="float-right"><i class="fa fa-times text-danger"></i></span></li>
                                <?php endif ?>
                            <?php endforeach ?>
                        <?php endif ?>                        
                        <li><span data-toggle="tooltip" title="<?php ee("Group your links and visualize aggregate data.") ?>"><?php ee("Campaigns & Link Rotator") ?></span><span class="float-right"><?php echo $plan["permission"]->bundle->enabled ? '<i class="fa fa-check text-success"></i>' : '<i class="fa fa-times text-danger"></i>'  ?></span></li>
                        <li><span data-toggle="tooltip" title="<?php ee("Use our various domains to generate short links.") ?>"><?php ee("Multiple Domains") ?></span><span class="float-right"><?php echo $plan["permission"]->multiple->enabled ? '<i class="fa fa-check text-success"></i>' : '<i class="fa fa-times text-danger"></i>'  ?></span></li>
                        <li><span data-toggle="tooltip" title="<?php ee("Add parameters such as UTM to the short link.") ?>"><?php ee("Custom Parameters") ?></span><span class="float-right"><?php echo $plan["permission"]->parameters->enabled ? '<i class="fa fa-check text-success"></i>' : '<i class="fa fa-times text-danger"></i>'  ?></span></li>
                        <li><span data-toggle="tooltip" title="<?php ee("Rotate links using the same short link. Great for A/B testing.") ?>"><?php ee("A/B Testing & Rotator") ?></span><span class="float-right"><?php echo isset($plan["permission"]->abtesting) && $plan["permission"]->abtesting->enabled ? '<i class="fa fa-check text-success"></i>' : '<i class="fa fa-times text-danger"></i>'  ?></span></li>
                        <li><span data-toggle="tooltip" title="<?php ee("Set a date or number to clicks to expire short links") ?>"><?php ee("Expiration") ?></span><span class="float-right"><?php echo isset($plan["permission"]->expiration) && $plan["permission"]->expiration->enabled ? '<i class="fa fa-check text-success"></i>' : '<i class="fa fa-times text-danger"></i>'  ?></span></li>   
                        <li><span data-toggle="tooltip" title="<?php ee("Limit number of clicks per short link") ?>"><?php ee("Click Limitation") ?></span><span class="float-right"><?php echo isset($plan["permission"]->clicklimit) && $plan["permission"]->clicklimit->enabled ? '<i class="fa fa-check text-success"></i>' : '<i class="fa fa-times text-danger"></i>'  ?></span></li>
                        <li><span data-toggle="tooltip" title="<?php ee("Remove branding on Bio Pages and Custom Splash Pages") ?>"><?php ee("Remove Branding") ?></span><span class="float-right"><?php echo isset($plan["permission"]->poweredby) && $plan["permission"]->poweredby->enabled ? '<i class="fa fa-check text-success"></i>' : '<i class="fa fa-times text-danger"></i>'  ?></span></li>  
                        <li><span data-toggle="tooltip" title="<?php ee("Imports link via CSV.") ?>"><?php ee("Import Links") ?></span><span class="float-right"><?php echo isset($plan["permission"]->import->enabled) && $plan["permission"]->import->enabled ? '<i class="fa fa-check text-success"></i>' : '<i class="fa fa-times text-danger"></i>' ?>  </span></li>
                        <li><span data-toggle="tooltip" title="<?php ee("Export clicks & visits.") ?>"><?php ee("Export Data") ?></span><span class="float-right"><?php echo $plan["permission"]->export->enabled ? '<i class="fa fa-check text-success"></i>' : '<i class="fa fa-times text-danger"></i>' ?>  </span></li>
                        <li><span data-toggle="tooltip" title="<?php ee('Use our powerful API to build custom applications or extend your own application with our powerful tools.') ?>"><?php ee("Developer API"); ?></span><span class="float-right"><?php echo $plan["permission"]->api->enabled ? '<i class="fa fa-check text-success"></i>' : '<i class="fa fa-times text-danger"></i>'  ?></span></li>
                        <li><span data-toggle="tooltip" title="<?php ee("No advertisement will be shown when logged or in your links.") ?>"><?php ee("Advertisement-Free") ?></span><span class="float-right"><?php echo !$plan["free"]  ? '<i class="fa fa-check text-success"></i>' : '<i class="fa fa-times text-danger"></i>' ?></span></li>
                        <?php echo $plan["permission"]->custom  ? '<li>'.$plan["permission"]->custom.'<span class="float-right"><i class="fa fa-check text-success"></i></span></li>' : '' ?>
                    </ul>                    
                </div>
            </div>
        </div>
    <?php endforeach ?>
</div>
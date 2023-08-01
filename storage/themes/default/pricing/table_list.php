<div class="card bg-section-primary card-pricing text-center p-2 table-responsive">
    <table class="table border-0">
        <tbody>
            <tr>
                <td class="border-top-0">&nbsp;</td>
                <?php foreach($plans as $plan): ?>
                    <td class="border-top-0">
                        <span class="d-block h5 mb-4"><?php ee($plan['name']) ?></span>
                        <div class="h3 text-center mb-0" data-pricing-monthly="<?php echo $plan['free'] ? e('Free') : \Helpers\App::currency(config('currency'), $plan["price_monthly"]) ?>" data-pricing-yearly="<?php echo $plan['free'] ? e('Free') : \Helpers\App::currency(config('currency'), $plan["price_yearly"]) ?>" data-pricing-lifetime="<?php echo  $plan['free'] ? e('Free') : \Helpers\App::currency(config('currency'), $plan["price_lifetime"]) ?>"><span class="price"><?php echo $plan['free'] ? e('Free') : \Helpers\App::currency(config('currency'), $plan["price_".$default]) ?></span></div>
                        <?php echo $plan['description'] ? '<span class="d-block text-muted mt-3">'.$plan['description'].'</span>': '' ?>
                        <?php if($plan['planurl'] == "#"):?>
                            <span class="btn bg-secondary text-dark mt-3 btn-sm"><strong><?php echo $plan['plantext'] ?></strong></span>
                        <?php else: ?>
                            <a href="<?php echo $plan['planurl'] ?>" class="btn btn-primary my-3 shadow checkout btn-sm"><?php echo $plan['plantext'] ?></a>
                        <?php endif?>
                    </td>
                <?php endforeach ?>
            </tr>
            <tr>
                <td class="text-left"><?php ee('Short links') ?> <i class="fa fa-question-circle ml-2" data-toggle="tooltip" title="<?php ee('Number of short links allowed.') ?>"></i></td>
                <?php foreach($plans as $plan): ?>
                <td>
                    <?php echo $plan['urls'] == '0' ? '<i class="fa fa-lg fa-infinity"></i>' : number_format($plan['urls']) ?>
                </td>
                <?php endforeach ?>
            </tr>
            <tr>
                <td class="text-left"><?php ee('Link Clicks') ?> <i class="fa fa-question-circle ml-2" data-toggle="tooltip" title="<?php ee('Total clicks allowed over a period') ?>"></i></td>
                <?php foreach($plans as $plan): ?>
                <td>
                    <?php echo $plan['clicks'] == '0' ? '<i class="fa fa-lg fa-infinity"></i>' : number_format($plan['clicks']).' / '.e('month') ?>
                </td>
                <?php endforeach ?>
            </tr>
            <tr>
                <td class="text-left"><?php ee('Data Retention') ?> <i class="fa fa-question-circle ml-2" data-toggle="tooltip" title="<?php ee('Amount of time statistics are kept for each short link.') ?>"></i></td>
                <?php foreach($plans as $plan): ?>
                <td>
                    <?php echo $plan['retention'] == '0' ? e('Forever') : $plan['retention'].' '.e('days') ?>
                </td>
                <?php endforeach ?>
            </tr>
            <tr>
                <td class="text-left"><?php ee('Bio Pages') ?> <i class="fa fa-question-circle ml-2" data-toggle="tooltip" title="<?php ee('Convert your followers by creating beautiful pages that group all of your important links on the single page.') ?>"></i></td>
                <?php foreach($plans as $plan): ?>
                    <td>
                        <?php if(isset($plan["permission"]->bio) && $plan["permission"]->bio->enabled): ?>
                            <?php echo !isset($plan["permission"]->bio->count) || $plan["permission"]->bio->count == '0' ? '<i class="fa fa-lg fa-infinity"></i>' : $plan["permission"]->bio->count ?>
                        <?php else: ?>
                            <i class="fa fa-lg fa-times text-danger"></i>
                        <?php endif ?>
                    </td>
                <?php endforeach ?>
            </tr>
            <tr>
                <td class="text-left"><?php ee('QR Codes') ?> <i class="fa fa-question-circle ml-2" data-toggle="tooltip" title="<?php ee('Easy to use, dynamic and customizable QR codes for your marketing campaigns. Analyze statistics and optimize your marketing strategy and increase engagement.') ?>"></i></td>
                <?php foreach($plans as $plan): ?>
                    <td>
                        <?php if(isset($plan["permission"]->qr) && $plan["permission"]->qr->enabled): ?>
                            <?php echo !isset($plan["permission"]->qr->count) || $plan["permission"]->qr->count == '0' ? '<i class="fa fa-lg fa-infinity"></i>' : $plan["permission"]->qr->count ?>
                        <?php else: ?>
                            <i class="fa fa-lg fa-check text-success"></i>
                        <?php endif ?>
                    </td>
                <?php endforeach ?>
            </tr>
            <?php if($features = plug('feature')): ?>
                <?php foreach($features as $feature): ?>
                    <tr>
                        <td class="text-left"><?php echo $feature['name'] ?> <i class="fa fa-question-circle ml-2" data-toggle="tooltip" title="<?php echo $feature['description'] ?>"></i></td>
                        <?php foreach($plans as $plan): ?>
                            <td>
                                <?php if(isset($plan["permission"]->{$feature['slug']}) && $plan["permission"]->{$feature['slug']}->enabled): ?>
                                    <?php if($feature['count'] != false): ?>
                                        <?php echo $plan["permission"]->{$feature['slug']}->count == '0' ? '<i class="fa fa-lg fa-infinity"></i>' : $plan["permission"]->{$feature['slug']}->count ?>
                                    <?php else: ?>
                                        <i class="fa fa-lg fa-times text-danger"></i>
                                    <?php endif ?>    
                                <?php else: ?>
                                    <i class="fa fa-lg fa-times text-danger"></i>
                                <?php endif ?>
                            </td>
                        <?php endforeach ?>
                    </tr>
                <?php endforeach ?>
            <?php endif ?>
            <tr>
                <td class="text-left"><?php ee('Custom Landing Page') ?> <i class="fa fa-question-circle ml-2" data-toggle="tooltip" title="<?php ee('Create a custom landing page to promote your product or service on forefront and engage the user in your marketing campaign.') ?>"></i></td>
                <?php foreach($plans as $plan): ?>
                    <td>
                        <?php if(isset($plan["permission"]->splash) && $plan["permission"]->splash->enabled): ?>
                            <?php echo !isset($plan["permission"]->splash->count) || $plan["permission"]->splash->count == '0' ? '<i class="fa fa-lg fa-infinity"></i>' : $plan["permission"]->splash->count ?>
                        <?php else: ?>
                            <i class="fa fa-lg fa-times text-danger"></i>
                        <?php endif ?>
                    </td>
                <?php endforeach ?>
            </tr>
            <tr>
                <td class="text-left"><?php ee('CTA Overlays') ?> <i class="fa fa-question-circle ml-2" data-toggle="tooltip" title="<?php ee('Use our overlay tool to display unobtrusive notifications, polls or even a contact on the target website. Great for campaigns.') ?>"></i></td>
                <?php foreach($plans as $plan): ?>
                    <td>
                        <?php if(isset($plan["permission"]->overlay) && $plan["permission"]->overlay->enabled): ?>
                            <?php echo !isset($plan["permission"]->overlay->count) || $plan["permission"]->overlay->count == '0' ? '<i class="fa fa-lg fa-infinity"></i>' : $plan["permission"]->overlay->count ?>
                        <?php else: ?>
                            <i class="fa fa-lg fa-times text-danger"></i>
                        <?php endif ?>
                    </td>
                <?php endforeach ?>
            </tr>
            <tr>
                <td class="text-left"><?php ee('Event Tracking') ?> <i class="fa fa-question-circle ml-2" data-toggle="tooltip" title="<?php ee('Add your custom pixel from providers such as Facebook and track events right when they are happening.') ?>"></i></td>
                <?php foreach($plans as $plan): ?>
                    <td>
                        <?php if(isset($plan["permission"]->pixels) && $plan["permission"]->pixels->enabled): ?>
                            <?php echo !isset($plan["permission"]->pixels->count) || $plan["permission"]->pixels->count == '0' ? '<i class="fa fa-lg fa-infinity"></i>' : $plan["permission"]->pixels->count ?>
                        <?php else: ?>
                            <i class="fa fa-lg fa-times text-danger"></i>
                        <?php endif ?>
                    </td>
                <?php endforeach ?>
            </tr>
            <tr>
                <td class="text-left"><?php ee('Branded Domains') ?> <i class="fa fa-question-circle ml-2" data-toggle="tooltip" title="<?php ee("Easily add your own domain name for short your links and take control of your brand name and your users' trust.") ?>"></i></td>
                <?php foreach($plans as $plan): ?>
                    <td>
                        <?php if(isset($plan["permission"]->domain) && $plan["permission"]->domain->enabled): ?>
                            <?php echo !isset($plan["permission"]->domain->count) || $plan["permission"]->domain->count == '0' ? '<i class="fa fa-lg fa-infinity"></i>' : $plan["permission"]->domain->count ?>
                        <?php else: ?>
                            <i class="fa fa-lg fa-times text-danger"></i>
                        <?php endif ?>
                    </td>
                <?php endforeach ?>
            </tr>
            <tr>
                <td class="text-left"><?php ee('Team Members') ?> <i class="fa fa-question-circle ml-2" data-toggle="tooltip" title="<?php ee('Invite your team members and assign them specific privileges to manage links, bundles, pages and other features.') ?>"></i></td>
                <?php foreach($plans as $plan): ?>
                    <td>
                        <?php if(isset($plan["permission"]->team) && $plan["permission"]->team->enabled): ?>
                            <?php echo !isset($plan["permission"]->team->count) || $plan["permission"]->team->count == '0' ? '<i class="fa fa-lg fa-infinity"></i>' : $plan["permission"]->team->count ?>
                        <?php else: ?>
                            <i class="fa fa-lg fa-times text-danger"></i>
                        <?php endif ?>
                    </td>
                <?php endforeach ?>
            </tr>         
            <tr>
                <td class="text-left"><?php ee('Multiple Domains') ?> <i class="fa fa-question-circle ml-2" data-toggle="tooltip" title="<?php ee("Use our various domains to generate short links.") ?>"></i></td>
                <?php foreach($plans as $plan): ?>
                    <td>
                        <?php if(isset($plan["permission"]->multiple) && $plan["permission"]->multiple->enabled): ?>
                            <i class="fa fa-lg fa-check text-success"></i>
                        <?php else: ?>
                            <i class="fa fa-lg fa-times text-danger"></i>
                        <?php endif ?>
                    </td>
                <?php endforeach ?>
            </tr>   
            <tr>
                <td class="text-left"><?php ee('Developer API') ?> <i class="fa fa-question-circle ml-2" data-toggle="tooltip" title="<?php ee("Use our powerful API to build custom applications or extend your own application with our powerful tools.") ?>"></i></td>
                <?php foreach($plans as $plan): ?>
                    <td>
                        <?php if(isset($plan["permission"]->api) && $plan["permission"]->api->enabled): ?>
                            <i class="fa fa-lg fa-check text-success"></i>
                        <?php else: ?>
                            <i class="fa fa-lg fa-times text-danger"></i>
                        <?php endif ?>
                    </td>
                <?php endforeach ?>
            </tr> 
            <tr>
                <td class="text-left"><?php ee('Advertisement-Free') ?> <i class="fa fa-question-circle ml-2" data-toggle="tooltip" title="<?php ee("No advertisement will be shown when logged or in your links.") ?>"></i></td>
                <?php foreach($plans as $plan): ?>
                    <td>
                        <?php if(!$plan['free']): ?>
                            <i class="fa fa-lg fa-check text-success"></i>
                        <?php else: ?>
                            <i class="fa fa-lg fa-times text-danger"></i>
                        <?php endif ?>
                    </td>
                <?php endforeach ?>
            </tr> 
            <tr>
                <td class="text-left border-0 pb-2"><h6 class="mb-0"><?php ee('Customization') ?></h6></td>
            </tr>
            <tr>
                <td class="border-dark border-width-1 text-left"><?php ee('Custom Aliases') ?> <i class="fa fa-question-circle ml-2" data-toggle="tooltip" title="<?php ee("Choose a custom alias instead of a randomly generated one.") ?>"></i></td>
                <?php foreach($plans as $plan): ?>
                    <td class="border-dark">
                        <?php if(isset($plan["permission"]->alias) && $plan["permission"]->alias->enabled): ?>
                            <i class="fa fa-lg fa-check text-success"></i>
                        <?php else: ?>
                            <i class="fa fa-lg fa-times text-danger"></i>
                        <?php endif ?>
                    </td>
                <?php endforeach ?>
            </tr>            
            <tr>
                <td class="text-left"><?php ee('Geo Targeting') ?> <i class="fa fa-question-circle ml-2" data-toggle="tooltip" title="<?php ee("Target and redirect visitors based on their country or state.") ?>"></i></td>
                <?php foreach($plans as $plan): ?>
                    <td>
                        <?php if(isset($plan["permission"]->geo) && $plan["permission"]->geo->enabled): ?>
                            <i class="fa fa-lg fa-check text-success"></i>
                        <?php else: ?>
                            <i class="fa fa-lg fa-times text-danger"></i>
                        <?php endif ?>
                    </td>
                <?php endforeach ?>
            </tr>
            <tr>
                <td class="text-left"><?php ee('Device Targeting') ?> <i class="fa fa-question-circle ml-2" data-toggle="tooltip" title="<?php ee("Target and redirect visitors based on their device.") ?>"></i></td>
                <?php foreach($plans as $plan): ?>
                    <td>
                        <?php if(isset($plan["permission"]->device) && $plan["permission"]->device->enabled): ?>
                            <i class="fa fa-lg fa-check text-success"></i>
                        <?php else: ?>
                            <i class="fa fa-lg fa-times text-danger"></i>
                        <?php endif ?>
                    </td>
                <?php endforeach ?>
            </tr>
            <tr>
                <td class="text-left"><?php ee('Language Targeting') ?> <i class="fa fa-question-circle ml-2" data-toggle="tooltip" title="<?php ee("Target and redirect visitors based on their language.") ?>"></i></td>
                <?php foreach($plans as $plan): ?>
                    <td>
                        <?php if(isset($plan["permission"]->language) && $plan["permission"]->language->enabled): ?>
                            <i class="fa fa-lg fa-check text-success"></i>
                        <?php else: ?>
                            <i class="fa fa-lg fa-times text-danger"></i>
                        <?php endif ?>
                    </td>
                <?php endforeach ?>
            </tr>
            <tr>
                <td class="text-left"><?php ee('Parameters') ?> <i class="fa fa-question-circle ml-2" data-toggle="tooltip" title="<?php ee("Add parameters such as UTM to the short link.") ?>"></i></td>
                <?php foreach($plans as $plan): ?>
                    <td>
                        <?php if(isset($plan["permission"]->alias) && $plan["permission"]->alias->enabled): ?>
                            <i class="fa fa-lg fa-check text-success"></i>
                        <?php else: ?>
                            <i class="fa fa-lg fa-times text-danger"></i>
                        <?php endif ?>
                    </td>
                <?php endforeach ?>
            </tr>
            <tr>
                <td class="text-left"><?php ee("A/B Testing & Rotator") ?> <i class="fa fa-question-circle ml-2" data-toggle="tooltip" title="<?php ee("Rotate links using the same short link. Great for A/B testing.") ?>"></i></td>
                <?php foreach($plans as $plan): ?>
                    <td>
                        <?php if(isset($plan["permission"]->abtesting) && $plan["permission"]->abtesting->enabled): ?>
                            <i class="fa fa-lg fa-check text-success"></i>
                        <?php else: ?>
                            <i class="fa fa-lg fa-times text-danger"></i>
                        <?php endif ?>
                    </td>
                <?php endforeach ?>
            </tr>
            <tr>
                <td class="text-left"><?php ee("Expiration") ?> <i class="fa fa-question-circle ml-2" data-toggle="tooltip" title="<?php ee("Set a date or number to clicks to expire short links") ?>"></i></td>
                <?php foreach($plans as $plan): ?>
                    <td>
                        <?php if(isset($plan["permission"]->expiration) && $plan["permission"]->expiration->enabled): ?>
                            <i class="fa fa-lg fa-check text-success"></i>
                        <?php else: ?>
                            <i class="fa fa-lg fa-times text-danger"></i>
                        <?php endif ?>
                    </td>
                <?php endforeach ?>
            </tr>
            <tr>
                <td class="text-left"><?php ee("Click Limitation") ?> <i class="fa fa-question-circle ml-2" data-toggle="tooltip" title="<?php ee("Limit number of clicks per short link") ?>"></i></td>
                <?php foreach($plans as $plan): ?>
                    <td>
                        <?php if(isset($plan["permission"]->clicklimit) && $plan["permission"]->clicklimit->enabled): ?>
                            <i class="fa fa-lg fa-check text-success"></i>
                        <?php else: ?>
                            <i class="fa fa-lg fa-times text-danger"></i>
                        <?php endif ?>
                    </td>
                <?php endforeach ?>
            </tr>            
            <tr>
                <td class="text-left border-0 pb-2"><h6 class="mb-0"><?php ee('Management') ?></h6></td>
            </tr>
            <tr>
                <td class="border-dark text-left"><?php ee('Campaigns') ?> <i class="fa fa-question-circle ml-2" data-toggle="tooltip" title="<?php ee("Group your links and visualize aggregate data.") ?>"></i></td>
                <?php foreach($plans as $plan): ?>
                    <td class="border-dark">
                        <?php if(isset($plan["permission"]->bundle) && $plan["permission"]->bundle->enabled): ?>
                            <?php echo !isset($plan["permission"]->bundle->count) || $plan["permission"]->bundle->count == '0' ? '<i class="fa fa-lg fa-infinity"></i>' : $plan["permission"]->bundle->count ?>
                        <?php else: ?>
                            <i class="fa fa-lg fa-times text-danger"></i>
                        <?php endif ?>
                    </td>
                <?php endforeach ?>
            </tr>
            <tr>
                <td class="text-left"><?php ee('Channels') ?> <i class="fa fa-question-circle ml-2" data-toggle="tooltip" title="<?php ee("Group & organize your links.") ?>"></i></td>
                <?php foreach($plans as $plan): ?>
                    <td>
                        <?php if(isset($plan["permission"]->channels) && $plan["permission"]->channels->enabled): ?>
                            <?php echo !isset($plan["permission"]->channels->count) || $plan["permission"]->channels->count == '0' ? '<i class="fa fa-lg fa-infinity"></i>' : $plan["permission"]->channels->count ?>
                        <?php else: ?>
                            <i class="fa fa-lg fa-times text-danger"></i>
                        <?php endif ?>
                    </td>
                <?php endforeach ?>
            </tr>
            <tr>
                <td class="text-left"><?php ee('Import Links') ?> <i class="fa fa-question-circle ml-2" data-toggle="tooltip" title="<?php ee("Imports link via CSV.") ?>"></i></td>
                <?php foreach($plans as $plan): ?>
                    <td>
                        <?php if(isset($plan["permission"]->import) && $plan["permission"]->import->enabled): ?>
                            <i class="fa fa-lg fa-check text-success"></i>
                        <?php else: ?>
                            <i class="fa fa-lg fa-times text-danger"></i>
                        <?php endif ?>
                    </td>
                <?php endforeach ?>
            </tr>
            <tr>
                <td class="text-left"><?php ee('Export') ?> <i class="fa fa-question-circle ml-2" data-toggle="tooltip" title="<?php ee("Export clicks & visits.") ?>"></i></td>
                <?php foreach($plans as $plan): ?>
                    <td>
                        <?php if(isset($plan["permission"]->export) && $plan["permission"]->export->enabled): ?>
                            <i class="fa fa-lg fa-check text-success"></i>
                        <?php else: ?>
                            <i class="fa fa-lg fa-times text-danger"></i>
                        <?php endif ?>
                    </td>
                <?php endforeach ?>
            </tr>
            <tr>
                <td class="text-left"><?php ee("Remove Branding") ?><i class="fa fa-question-circle ml-2" data-toggle="tooltip" title="<?php ee("Remove branding on Bio Pages and Custom Splash Pages") ?>"></i></td>
                <?php foreach($plans as $plan): ?>
                    <td>
                        <?php if(isset($plan["permission"]->poweredby) && $plan["permission"]->poweredby->enabled): ?>
                            <i class="fa fa-lg fa-check text-success"></i>
                        <?php else: ?>
                            <i class="fa fa-lg fa-times text-danger"></i>
                        <?php endif ?>
                    </td>
                <?php endforeach ?>
            </tr>
            <tr>
                <td class="text-left">&nbsp;</td>
                <?php foreach($plans as $plan): ?>
                    <td>
                        <?php if(isset($plan["permission"]->custom)): ?>
                            <?php echo $plan["permission"]->custom ?>
                        <?php endif ?>
                    </td>
                <?php endforeach ?>
            </tr>
            <tr>
                <td class="border-top-0">&nbsp;</td>
                <?php foreach($plans as $plan): ?>
                    <td class="border-top-0">
                        <?php if($plan['planurl'] == "#"):?>
                            <span class="btn bg-secondary text-dark mt-3"><strong><?php echo $plan['plantext'] ?></strong></span>
                        <?php else: ?>
                            <a href="<?php echo $plan['planurl'] ?>" class="btn btn-primary my-3 shadow checkout"><?php echo $plan['plantext'] ?></a>
                        <?php endif?>
                    </td>
                <?php endforeach ?>
            </tr>
        </tbody>
    </table>
</div>
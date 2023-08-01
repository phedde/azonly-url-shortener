<nav aria-label="breadcrumb" class="mb-3">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?php echo route('admin') ?>"><?php ee('Dashboard') ?></a></li>
    <li class="breadcrumb-item"><a href="<?php echo route('admin.plans') ?>"><?php ee('Plans') ?></a></li>
  </ol>
</nav>

<h1 class="h3 mb-5"><?php ee('New Plan') ?></h1>
<div class="card">
    <div class="card-body">
        <form method="post" action="<?php echo route('admin.plans.save') ?>" enctype="multipart/form-data">
            <?php echo csrf() ?>
            <h5><?php ee('Plan Information') ?></h5>
            <div class="row">
                <div class="form-group">
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" data-binary="true" id="status" name="status" value="1" data-toggle="togglefield" checked>
                        <label class="form-check-label" for="status"><?php ee('Enabled') ?></label>
                    </div>
                    <p class="form-text"><?php ee("You can choose to disable this plan from showing in pricing table. Current users of this plan will not be affected.") ?></p>
                </div>
                <div class="col-md-4">
                    <div class="form-group mb-4">
                        <label for="name" class="form-label"><?php ee('Name') ?></label>
                        <input type="text" class="form-control" name="name" id="name" value="<?php echo old('name') ?>" placeholder="My Sample Plan">
                        <p class="form-text"><?php ee('The name of the package.') ?></p>
                    </div>	
                </div>
                <div class="col-md-4">
                    <div class="form-group mb-4">
                        <label for="description" class="form-label"><?php ee('Description') ?>  <span class="text-muted"><?php ee('optional') ?></span></label>
                        <input type="text" class="form-control" name="description" id="description" value="<?php echo old('description') ?>" placeholder="Plan description">
                        <p class="form-text"><?php ee('This field allows you to describe the package.') ?></p>
                    </div>	
                </div>
                <div class="col-md-4">
                    <div class="form-group mb-4">
                        <label for="icon" class="form-label"><?php ee('Plan Icon Class') ?> <span class="text-muted"><?php ee('optional') ?></span></label>
                        <input type="text" class="form-control" name="icon" id="icon" value="<?php echo old('icon') ?>" placeholder="Icon class" autocomplete="off">
                        <p class="form-text"><?php ee('This field allows you to set a class for the icons. For example if you want to use fontawesome, add the library in the theme file and use the class name here e.g. fa fa-plus') ?></p>
                    </div>
                </div>
            </div>                        	
            <hr>
            <h5 class="mb-4"><?php ee('Pricing') ?> (<?php echo config('currency') ?>)</h5>
            <div class="form-group">
                <div class="form-check form-switch">
                    <input type="hidden" name="free" value="1">
                    <input class="form-check-input" type="checkbox" id="free" name="free" value="0" data-toggle="togglefield" data-toggle-for="trial,price_monthly,price_yearly,price_lifetime" checked>
                    <label class="form-check-label" for="free"><?php ee('Paid Plan') ?></label>
                </div>
                <p class="form-text"><?php ee("If you want to make this plan free, turn this off. If you don't have a free plan, users will be forced to upgrade. You need at least one pricing plan for each plan. It can be either monthly, yearly or lifetime. To remove a payment plan, leave the field empty.") ?></p>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group mb-4">
                        <label for="trial" class="form-label"><?php ee('Trial Days') ?></label>
                        <input type="text" class="form-control" name="trial" id="trial" value="<?php echo old('trial') ?>" placeholder="e.g. 7">
                        <p class="form-text"><?php ee('Trial period for this plan in number of days. For example 14. Note this only applies to paid plans and trials do not require a credit card. Close to expiration users will receive an email to remind them that the trial will expire and they need to upgrade. ') ?></p>
                    </div>	
                </div>
                <div class="col-md-3">
                    <div class="form-group mb-4">
                        <label for="price_monthly" class="form-label"><?php ee('Price Monthly') ?></label>
                        <input type="text" class="form-control" name="price_monthly" id="price_monthly" value="<?php echo old('price_monthly') ?>" placeholder="e.g. 9.99">
                        <p class="form-text"><?php ee('To change your currency, you need to change it in the settings page.') ?></p>
                    </div>	
                </div>
                <div class="col-md-3">
                    <div class="form-group mb-4">
                        <label for="price_yearly" class="form-label"><?php ee('Price Yearly') ?></label>
                        <input type="text" class="form-control" name="price_yearly" id="price_yearly" value="<?php echo old('price_yearly') ?>" placeholder="e.g. 99.99">
                        <p class="form-text"><?php ee('To change your currency, you need to change it in the settings page.') ?></p>
                    </div>		
                </div>
                <div class="col-md-3">
                    <div class="form-group mb-4">
                        <label for="price_lifetime" class="form-label"><?php ee('Price Lifetime') ?></label>
                        <input type="text" class="form-control" name="price_lifetime" id="price_lifetime" value="<?php echo old('price_lifetime') ?>" placeholder="e.g. 999.99">
                        <p class="form-text"><?php ee('To change your currency, you need to change it in the settings page.') ?></p>
                    </div>                
                </div>
            </div> 
            <hr>
            <h5 class="mb-4"><?php ee('Plan Features') ?></h5>
            <div class="row mb-4">
                <div class="col-md-3">
                    <div class="form-group mb-4">
                        <label for="numurls" class="form-label"><?php ee('Number of links') ?></label>
                        <input type="text" class="form-control" name="numurls" id="numurls" value="<?php echo old('numurls') ?>" placeholder="e.g. 10">
                        <p class="form-text"><?php ee("This will limit the number of URLs a user can have. '0' for unlimited.") ?></p>
                    </div>	
                </div>
                <div class="col-md-3">
                    <div class="form-group mb-4">
                        <label for="numclicks" class="form-label"><?php ee('Number of clicks') ?></label>
                        <input type="text" class="form-control" name="numclicks" id="numclicks" value="<?php echo old('numclicks') ?>" placeholder="e.g. 1000">
                        <p class="form-text"><?php ee("This will limit the number of clicks for each account. After this amount, clicks will not be counted anymore. URLs will still work however. '0' for unlimited.") ?></p>
                    </div>	
                </div>
                <div class="col-md-3">
                    <div class="form-group mb-4">
                        <label for="retention" class="form-label"><?php ee('Stats Retention (days)') ?></label>
                        <input type="text" class="form-control" name="retention" id="retention" value="<?php echo old('retention') ?>" placeholder="e.g. 15">
                        <p class="form-text"><?php ee("Number of days to keep stats for urls in this plan. Older stats will be deleted automatically. '0' for unlimited.") ?></p>
                    </div>	
                </div>
                <div class="col-md-3">
                    <div class="form-group mb-4">
                        <label for="permission-custom" class="form-label"><?php ee('Custom Text') ?></label>
                        <input type="text" class="form-control" name="permission[custom]" id="permission-custom" value="<?php echo old('permission-custom') ?>" placeholder="e.g. Phone Support">
                        <p class="form-text"><?php ee("You can use this field to add a custom feature e.g. Phone Support. This does not have an effect on the script.") ?></p>
                    </div>	
                </div>
            </div>  
            <hr>
            <div class="row mb-4">
                <div class="col-md-4">
                    <div class="form-group">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" data-binary="true" id="permission-team-enabled" name="permission[team][enabled]" value="1" data-toggle="togglefield" data-toggle-for="permission-team-count">
                            <label class="form-check-label" for="permission-team-enabled"><?php ee('Team Feature') ?></label>
                        </div>                   
                        <p class="form-text"><?php ee("Allow users to create teams.") ?></p>             
                    </div>            
                    <div class="form-group mb-4 d-none">
                        <label for="permission-team-count" class="form-label"><?php ee('Number of Members') ?></label>
                        <input type="text" class="form-control" name="permission[team][count]" id="permission-team-count" value="<?php echo old('permission-team') ?>" placeholder="e.g. 10">
                        <p class="form-text"><?php ee("Use '0' for unlimited.") ?></p>
                    </div>                
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" data-binary="true" id="permission-splash-enabled" name="permission[splash][enabled]" value="1" data-toggle="togglefield" data-toggle-for="permission-splash-count">
                            <label class="form-check-label" for="permission-splash-enabled"><?php ee('Splash Pages') ?></label>
                        </div>                   
                        <p class="form-text"><?php ee("Allow users to create custom splash pages.") ?></p>             
                    </div>            
                    <div class="form-group mb-4 d-none">
                        <label for="permission-splash-count" class="form-label"><?php ee('Number of Splash Pages') ?></label>
                        <input type="text" class="form-control" name="permission[splash][count]" id="permission-splash-count" value="<?php echo old('permission-splash') ?>" placeholder="e.g. 10">
                        <p class="form-text"><?php ee("Use '0' for unlimited.") ?></p>
                    </div>                
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" data-binary="true" id="permission-overlay-enabled" name="permission[overlay][enabled]" value="1" data-toggle="togglefield" data-toggle-for="permission-overlay-count">
                            <label class="form-check-label" for="permission-overlay-enabled"><?php ee('CTA Overlay') ?></label>
                        </div>                   
                        <p class="form-text"><?php ee("Allow users to create custom overlay pages.") ?></p>             
                    </div>            
                    <div class="form-group mb-4 d-none">
                        <label for="permission-overlay-count" class="form-label"><?php ee('Number of CTA Overlay') ?></label>
                        <input type="text" class="form-control" name="permission[overlay][count]" id="permission-overlay-count" value="<?php echo old('permission-overlay') ?>" placeholder="e.g. 10">
                        <p class="form-text"><?php ee("Use '0' for unlimited.") ?></p>
                    </div>                
                </div>
            </div>             
            <hr>
            <div class="row mb-4">
                <div class="col-md-4">
                    <div class="form-group">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" data-binary="true" id="permission-pixels-enabled" name="permission[pixels][enabled]" value="1" data-toggle="togglefield" data-toggle-for="permission-pixels-count">
                            <label class="form-check-label" for="permission-pixels-enabled"><?php ee('Event Tracking') ?></label>
                        </div>                   
                        <p class="form-text"><?php ee("Allow users to create pixels.") ?></p>             
                    </div>            
                    <div class="form-group mb-4 d-none">
                        <label for="permission-pixels-count" class="form-label"><?php ee('Number of Pixels') ?></label>
                        <input type="text" class="form-control" name="permission[pixels][count]" id="permission-pixels-count" value="<?php echo old('permission-pixels') ?>" placeholder="e.g. 10">
                        <p class="form-text"><?php ee("Use '0' for unlimited.") ?></p>
                    </div>                
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" data-binary="true" id="permission-domain-enabled" name="permission[domain][enabled]" value="1" data-toggle="togglefield" data-toggle-for="permission-domain-count">
                            <label class="form-check-label" for="permission-domain-enabled"><?php ee('Custom Domains') ?></label>
                        </div>                   
                        <p class="form-text"><?php ee("Allow users to create custom domains.") ?></p>             
                    </div>            
                    <div class="form-group mb-4 d-none">
                        <label for="permission-domain-count" class="form-label"><?php ee('Number of Domains') ?></label>
                        <input type="text" class="form-control" name="permission[domain][count]" id="permission-domain-count" value="<?php echo old('permission-domain') ?>" placeholder="e.g. 10">
                        <p class="form-text"><?php ee("Use '0' for unlimited.") ?></p>
                    </div>                
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" data-binary="true" id="permission-qr-enabled" name="permission[qr][enabled]" value="1" data-toggle="togglefield" data-toggle-for="permission-qr-count">
                            <label class="form-check-label" for="permission-qr-enabled"><?php ee('Custom QRs') ?></label>
                        </div>                   
                        <p class="form-text"><?php ee("Allow users to create custom QRs.") ?></p>             
                    </div>            
                    <div class="form-group mb-4 d-none">
                        <label for="permission-qr-count" class="form-label"><?php ee('Number of QRs') ?></label>
                        <input type="text" class="form-control" name="permission[qr][count]" id="permission-qr-count" value="<?php echo old('permission-qr') ?>" placeholder="e.g. 10">
                        <p class="form-text"><?php ee("Use '0' for unlimited.") ?></p>
                    </div>                
                </div>                                               
            </div>
            <hr>
            <div class="row mb-4">
                <div class="col-md-4">
                    <div class="form-group">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" data-binary="true" id="permission-bio-enabled" name="permission[bio][enabled]" value="1" data-toggle="togglefield" data-toggle-for="permission-bio-count">
                            <label class="form-check-label" for="permission-bio-enabled"><?php ee('Custom Profiles/Bio') ?></label>
                        </div>                   
                        <p class="form-text"><?php ee("Allow users to create custom profiles.") ?></p>
                    </div> 
                    <div class="form-group mb-4 d-none">
                        <label for="permission-bio-count" class="form-label"><?php ee('Number of Profiles') ?></label>
                        <input type="text" class="form-control" name="permission[bio][count]" id="permission-bio-count" placeholder="e.g. 10">
                        <p class="form-text"><?php ee("Use '0' for unlimited.") ?></p>
                    </div>                
                </div> 
                <div class="col-md-4">
                    <div class="form-group">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" data-binary="true" id="permission-channels-enabled" name="permission[channels][enabled]" value="1" data-toggle="togglefield" data-toggle-for="permission-channels-count">
                            <label class="form-check-label" for="permission-channels-enabled"><?php ee('Channels') ?></label>
                        </div>                   
                        <p class="form-text"><?php ee("Allow users to create channels.") ?></p>
                    </div> 
                    <div class="form-group mb-4 d-none">
                        <label for="permission-channels-count" class="form-label"><?php ee('Number of Channels') ?></label>
                        <input type="text" class="form-control" name="permission[channels][count]" id="permission-channels-count" placeholder="e.g. 10">
                        <p class="form-text"><?php ee("Use '0' for unlimited.") ?></p>
                    </div>                
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" data-binary="true" id="permission-multiple-enabled" name="permission[multiple][enabled]" value="1">
                            <label class="form-check-label" for="permission-multiple-enabled"><?php ee('Multiple Domains') ?></label>
                        </div>                   
                        <p class="form-text"><?php ee("Allow users to use multiple domains that you set in the admin panel settings (not user custom domains).") ?></p>             
                    </div>  
                </div>
            </div> 
            <hr>
            <div class="row mb-4">
                <div class="col-md-4">
                    <div class="form-group">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" data-binary="true" id="permission-alias-enabled" name="permission[alias][enabled]" value="1">
                            <label class="form-check-label" for="permission-alias-enabled"><?php ee('Custom Alias') ?></label>
                        </div>                   
                        <p class="form-text"><?php ee("Allow users to use custom aliases.") ?></p>             
                    </div>                                 
                </div>                  
                <div class="col-md-4">
                    <div class="form-group">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" data-binary="true" id="permission-device-enabled" name="permission[device][enabled]" value="1">
                            <label class="form-check-label" for="permission-device-enabled"><?php ee('Device Targeting Access') ?></label>
                        </div>                   
                        <p class="form-text"><?php ee("Allow users to use device targeting.") ?></p>             
                    </div>                         
                </div> 
                <div class="col-md-4">
                    <div class="form-group">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" data-binary="true" id="permission-geo-enabled" name="permission[geo][enabled]" value="1">
                            <label class="form-check-label" for="permission-geo-enabled"><?php ee('Geo Targeting Access') ?></label>
                        </div>                   
                        <p class="form-text"><?php ee("Allow users to use geo targeting.") ?></p>             
                    </div>  
                </div>                                                            
            </div>      
            <hr>
            <div class="row mb-4">
                <div class="col-md-4">
                    <div class="form-group">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" data-binary="true" id="permission-language-enabled" name="permission[language][enabled]" value="1">
                            <label class="form-check-label" for="permission-language-enabled"><?php ee('Language Targeting Access') ?></label>
                        </div>                   
                        <p class="form-text"><?php ee("Allow users to use language targeting.") ?></p>             
                    </div>  
                </div> 
                <div class="col-md-4">
                    <div class="form-group">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" data-binary="true" id="permission-bundle-enabled" name="permission[bundle][enabled]" value="1">
                            <label class="form-check-label" for="permission-bundle-enabled"><?php ee('Campaigns') ?></label>
                        </div>                   
                        <p class="form-text"><?php ee("Allow users to use campaigns.") ?></p>             
                    </div>                                 
                </div> 
                <div class="col-md-4">
                    <div class="form-group">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" data-binary="true" id="permission-parameters-enabled" name="permission[parameters][enabled]" value="1">
                            <label class="form-check-label" for="permission-parameters-enabled"><?php ee('Custom Parameters') ?></label>
                        </div>                   
                        <p class="form-text"><?php ee("Allow users to add custom parameters using builder.") ?></p>             
                    </div>                         
                </div>                                   
            </div>
            <hr>
            <div class="row mb-4">
                <div class="col-md-4">
                    <div class="form-group">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" data-binary="true" id="permission-import-enabled" name="permission[import][enabled]" value="1" data-toggle="togglefield" data-toggle-for="permission-import-count">
                            <label class="form-check-label" for="permission-import-enabled"><?php ee('Import via CSV') ?></label>
                        </div>                   
                        <p class="form-text"><?php ee("Allow users to import links via CSV. The limit is defined by the Number of Links above.") ?></p>             
                    </div>               
                </div>  
                <div class="col-md-4">
                    <div class="form-group">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" data-binary="true" id="permission-export-enabled" name="permission[export][enabled]" value="1">
                            <label class="form-check-label" for="permission-export-enabled"><?php ee('Export Data') ?></label>
                        </div>                   
                        <p class="form-text"><?php ee("Allow users to export data.") ?></p>             
                    </div>  
                </div>
                <div class="col-md-4">
                    <div class="form-group mb-4">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" data-binary="true" id="permission-api-enabled" name="permission[api][enabled]" value="1">
                            <label class="form-check-label" for="permission-api-enabled"><?php ee('Developer API') ?></label>
                        </div>                   
                        <p class="form-text"><?php ee("Allow users to access API and other tools.") ?></p>             
                    </div>  
                </div>
            </div>
            <hr>
            <div class="row mb-4">                                
                <div class="col-md-4">
                    <div class="form-group">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" data-binary="true" id="permission-abtesting-enabled" name="permission[abtesting][enabled]" value="1" data-toggle="togglefield" data-toggle-for="permission-abtesting-count">
                            <label class="form-check-label" for="permission-abtesting-enabled"><?php ee('A/B Testing') ?></label>
                        </div>                   
                        <p class="form-text"><?php ee("Allow users to rotate links.") ?></p>             
                    </div>               
                </div> 
                <div class="col-md-4">
                    <div class="form-group">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" data-binary="true" id="permission-expiration-enabled" name="permission[expiration][enabled]" value="1" data-toggle="togglefield" data-toggle-for="permission-expiration-count">
                            <label class="form-check-label" for="permission-expiration-enabled"><?php ee('Expiration') ?></label>
                        </div>                   
                        <p class="form-text"><?php ee("Allow users set expirations.") ?></p>             
                    </div>               
                </div>                 
                <div class="col-md-4">
                    <div class="form-group">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" data-binary="true" id="permission-clicklimit-enabled" name="permission[clicklimit][enabled]" value="1" data-toggle="togglefield" data-toggle-for="permission-clicklimit-count">
                            <label class="form-check-label" for="permission-clicklimit-enabled"><?php ee('Expiration by Clicks') ?></label>
                        </div>                   
                        <p class="form-text"><?php ee("Allow users to set a limit the number of clicks.") ?></p>             
                    </div>               
                </div>                  
            </div>
            <hr>
            <div class="row mb-4">                                
                <div class="col-md-4">
                    <div class="form-group">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" data-binary="true" id="permission-poweredby-enabled" name="permission[poweredby][enabled]" value="1" data-toggle="togglefield" data-toggle-for="permission-poweredby-count">
                            <label class="form-check-label" for="permission-poweredby-enabled"><?php ee('Remove Branding') ?></label>
                        </div>                   
                        <p class="form-text"><?php ee("Remove Powered By from custom splash pages and bio pages.") ?></p>             
                    </div>               
                </div>                                  
            </div>
            <?php if($features = plug('feature')): ?>
                <?php foreach($features as $feature): ?>
                    <hr>
                    <div class="form-group mb-4">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" data-binary="true" id="permission-<?php echo $feature['slug'] ?>-enabled" name="permission[<?php echo $feature['slug'] ?>][enabled]" value="1" <?php echo ($feature['count'] ? 'data-toggle="togglefield" data-toggle-for="permission-'.$feature['slug'].'-count"' : '') ?>>
                            <label class="form-check-label" for="permission-<?php echo $feature['slug'] ?>-enabled"><?php ee($feature['name']) ?></label>
                        </div>                   
                        <p class="form-text"><?php ee($feature['description']) ?></p>             
                    </div>
                    <?php if($feature['count']): ?>
                        <div class="form-group mb-4 d-none">
                            <label for="permission-<?php echo $feature['slug'] ?>-count" class="form-label"><?php ee($feature['name']) ?></label>
                            <input type="text" class="form-control" name="permission[<?php echo $feature['slug'] ?>][count]" id="permission-<?php echo $feature['slug'] ?>-count" placeholder="e.g. 10">
                            <p class="form-text"><?php ee("Use '0' for unlimited.") ?></p>
                        </div>                         
                    <?php endif ?>
                <?php endforeach ?>
            <?php endif ?>
            <button type="submit" class="btn btn-primary"><i data-feather="plus"></i> <?php ee('Add Plan') ?></button>
        </form>
    </div>
</div>
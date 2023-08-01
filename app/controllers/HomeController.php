<?php
/**
 * =======================================================================================
 *                           GemFramework (c) GemPixel                                     
 * ---------------------------------------------------------------------------------------
 *  This software is packaged with an exclusive framework as such distribution
 *  or modification of this framework is not allowed before prior consent from
 *  GemPixel. If you find that this framework is packaged in a software not distributed 
 *  by GemPixel or authorized parties, you must not use this software and contact GemPixel
 *  at https://gempixel.com/contact to inform them of this misuse.
 * =======================================================================================
 *
 * @package GemPixel\Premium-URL-Shortener
 * @author GemPixel (https://gempixel.com) 
 * @license https://gempixel.com/licenses
 * @link https://gempixel.com  
 */

use Core\View;
use Core\File;
use Core\Helper;
use Core\Request;
use Core\Response;
use Core\Localization;
use Core\DB;
use Core\Plugin;

class Home {

    use \Traits\Links;
    /**
     * Home Page
     *
     * @author GemPixel <https://gempixel.com> 
     * @version 6.7
     * @return void
     */
    public function index(Request $request){    

        $request->ref ? $request->cookie('urid', clean($request->ref), 60 * 24 * 30) : '';

        // @group plugin
        Plugin::dispatch('home.pre');

        if(config('home_redir')){
            return Helper::redirect(null, 301)->to(config('home_redir'));
        }
        
        $count = new \stdClass;
        if(config("homepage_stats")){
            $count->users = \Core\DB::user()->count();
            $count->links = \Core\DB::url()->count();
            $count->clicks = \Core\DB::url()->selectExpr('SUM(click) as click')->first()->click;
        }

        View::push(assets('frontend/libs/clipboard/dist/clipboard.min.js'), 'js')->toFooter();

        $themeconfig = config('theme_config');        

        // @group plugin
        Plugin::dispatch('home');
        
        return View::with('index', compact('count', 'themeconfig'))->extend('layouts.main');
    }
    /**
     * Bundle & Serve Static Assets
     *  
     * @author GemPixel <https://gempixel.com> 
     * @version 6.7.4
     * @param \Core\Request $request
     * @return void
     */
    public function packed(Request $request, $ext = 'css'){
        
        $ext = in_array($ext, ['css', 'js']) ? $ext : 'css';
        $names = explode(',', $request->name);
        $cdn = appConfig('cdn');
        $content = '';
        foreach($names as $name){
            if(isset($cdn[$name])){
                if(is_array($cdn[$name][$ext])){
                    foreach($cdn[$name][$ext] as $file){
                        $content .= file_get_contents($file)."\n";
                    }
                }else {
                    $content .= file_get_contents($cdn[$name][$ext])."\n";
                }
            }
        }

        return Response::factory($content)->setHeader(['content-type', $ext == 'js' ? 'text/javascript' : 'text/css'])->send();
    }
}
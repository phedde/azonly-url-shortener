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

namespace Admin;

use Core\DB;
use Core\View;
use Core\Request;
use Core\Helper;
Use Helpers\CDN;

class Vouchers {

    use \Traits\Payments;
    
    /**
     * Check License
     *
     * @author GemPixel <https://gempixel.com> 
     * @version 6.7
     */
    public function __construct(){
        if(!\Helpers\App::possible()){
            return Helper::redirect()->to(route('admin.settings.config', ['payments']))->with('danger', 'Please enter your extended purchase code to unlock vouchers.');
        }
    }
    /**
     * Vouchers
     *
     * @author GemPixel <https://gempixel.com> 
     * @version 6.8.2
     * @return void
     */
    public function index(){

        View::set('title', e('Vouchers Manager'));

        View::push(assets('frontend/libs/clipboard/dist/clipboard.min.js'), 'js')->toFooter();
        
        CDN::load('datetimepicker');

        View::push("<script>
                    $('[data-toggle=updateFormContent]').click(function(){                        
                        let content = $(this).data('content');
                        $('[data-datepicker]').daterangepicker({
                            startDate: content['newvaliduntil'],
                            singleDatePicker: true,
                            showDropdowns: true,
                            autoApply: true,
                            autoUpdateInput: false,
                            timePicker: true,
                            locale: {
                                format: 'YYYY-MM-DD'
                            }
                        }, function(s){
                            el.val(s.format('YYYY-MM-DD'));
                        });
                        
                    });
                    </script>", 'custom')->toFooter();        

        $vouchers = [];

        foreach(DB::vouchers()->orderByDesc('id')->paginate(15) as $voucher){
            if(!$plan = DB::plans()->where('id', $voucher->planid)->first()) continue;        
            $voucher->plan = $plan;
            $voucher->period = str_replace(['-d', '-m', '-y'], [' day', ' month', ' year'], $voucher->period);
            $vouchers[] = $voucher;
        }

        $plans =  DB::plans()->where('free', 0)->find();

        return View::with('admin.vouchers.index', compact('vouchers', 'plans'))->extend('admin.layouts.main');
    }   
    /**
     * Save coupon
     *
     * @author GemPixel <https://gempixel.com> 
     * @version 6.7
     * @param \Core\Request $request
     * @return void
     */
    public function save(Request $request){
        
        \Gem::addMiddleware('DemoProtect');
        
        if(!$request->name || !$request->plan) return Helper::redirect()->back()->with('danger', e('The name, the code and plan are required.'));
        
        if(DB::vouchers()->where('code', strtoupper($request->code))->first()){
            return Helper::redirect()->back()->with('danger', e('The voucher code already exists.'));
        }
        

        if(!$request->code) $request->code = Helper::rand(4).'-'.Helper::rand(4);
        
        $voucher = DB::vouchers()->create();
        $voucher->name = Helper::clean($request->name, 3, true);
        $voucher->code = strtoupper(clean($request->code));
        $voucher->description = clean($request->description);
        $voucher->validuntil = Helper::dtime($request->validuntil);
        $voucher->maxuse = !is_numeric($request->maxuse) || $request->maxuse < 0 ? 0 : $request->maxuse;
        $voucher->created_at = Helper::dtime();
        $voucher->planid = (int) $request->plan;

        if($request->period == 'year'){
            $voucher->period = (is_numeric($request->amount) && $request->amount > 1 ? $request->amount : 1).'-y';
        }elseif($request->period == 'month'){
            $voucher->period = (is_numeric($request->amount) && $request->amount > 1 ? $request->amount : 1).'-m';
        }else{
            $voucher->period = (is_numeric($request->amount) && $request->amount > 1 ? $request->amount : 1).'-d';
        }

        $voucher->save();

        \Core\Plugin::dispatch('admin.vouchers.add', [$voucher]);

        return Helper::redirect()->to(route('admin.vouchers'))->with('success', e('Voucher has been added successfully'));
    }    
    /**
     * Update Voucher
     *
     * @author GemPixel <https://gempixel.com> 
     * @version 6.7
     * @param \Core\Request $request
     * @param integer $id
     * @return void
     */
    public function update(Request $request, int $id){
        
        \Gem::addMiddleware('DemoProtect');
        
        if(!$request->newname) return Helper::redirect()->back()->with('danger', e('The name is required.'));
        
        if(!$voucher = DB::vouchers()->where('id', $id)->first()){
            return Helper::redirect()->back()->with('danger', e('The voucher does not exist.'));
        }
        
        $voucher->name = Helper::clean($request->newname, 3, true);
        $voucher->description = clean($request->newdescription);
        $voucher->validuntil = Helper::dtime($request->newvaliduntil);
        $voucher->maxuse = !is_numeric($request->newmaxuse) || $request->newmaxuse < 0 ? 0 : $request->newmaxuse;
        $voucher->save();

        \Core\Plugin::dispatch('admin.vouchers.update', [$voucher]);

        return Helper::redirect()->back()->with('success', e('Voucher has been updated successfully.'));
    }
    /**
     * Delete Voucher
     *
     * @author GemPixel <https://gempixel.com> 
     * @version 6.7
     * @param \Core\Request $request
     * @param integer $id
     * @param string $nonce
     * @return void
     */
    public function delete(Request $request, int $id, string $nonce){
        
        \Gem::addMiddleware('DemoProtect');

        if(!Helper::validateNonce($nonce, 'voucher.delete')){
            return Helper::redirect()->back()->with('danger', e('An unexpected error occurred. Please try again.'));
        }

        if(!$voucher = DB::vouchers()->where('id', $id)->first()){
            return Helper::redirect()->back()->with('danger', e('Voucher not found. Please try again.'));
        }
        
        \Core\Plugin::dispatch('admin.vouchers.delete', [$voucher]);
        
        $voucher->delete();

        return Helper::redirect()->back()->with('success', e('Voucher has been deleted.'));
    }
}
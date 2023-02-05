<?php

namespace App\Http\Controllers;

use App\Models\Auction;
use App\Models\AuctionProduct;
use App\Models\AuctionBidProduct;
use App\Models\Brand;
use App\Models\Catalogue;
use App\Models\Category;
use App\Models\Subscription;
use App\Models\Neighbourhood;
use App\Models\Ticket;
use App\Models\Status;
use App\Models\Priority;
use App\Models\Severity;
use App\Models\Division;
use App\Models\District;
use App\Models\AgricultureAdvice;
use App\Models\Unit;
use App\Models\MadeIn;
use App\Models\Favorite;
use App\Models\UserProfile;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDF;


class PagesController extends Controller
{

    public function home()
    {
        return view('frontend.home');
    }

    public function phoneVerify()
    {
        return view('auth.verify-phone')
            ->with(['phone' => session('phone')]);
    }

    public function dashboard()
    {
        return view('frontend.dashboard');
    }


    public function profile()
    {
        return view('frontend.profile');
    }

    public function viewProfile()
    {
        $profile = UserProfile::with('company')
            ->select('user_profiles.*', 'countries.id', 'countries.name as country_name', 'cities.id', 'cities.name as city_name')
            ->join('countries', 'countries.id', '=', 'user_profiles.country')
            ->join('cities', 'cities.id', '=', 'user_profiles.city')
            ->where('user_profiles.user_id', auth()->user()->id)
            ->first();
        
        $categories = explode(',',  $profile->parent_category_id);
        $neighbour = Neighbourhood::where('id', $profile->neighbourhood)->first();
        $cat = Category::whereIn('id', $categories)->get();
        return view('frontend.view-profile', compact('profile', 'cat','neighbour'));
    }

    public function newAdvice()
    {
        $district_list = Division::get();
        $division_list = District::get();
        return view('frontend.new-advice', [

            'district_list' => $district_list,
            'division_list' => $division_list,
            
        ]);
    }    

    public function agroAdvicelIst()
    {
        $all_advice_list = AgricultureAdvice::select('agriculture_advice.*', 'divisions.bn_name as division_name', 'districts.bn_name as district_name', 'users.name as username')
            ->join('divisions', 'divisions.id', '=', 'agriculture_advice.division_id')
            ->join('districts', 'districts.id', '=', 'agriculture_advice.district_id')
            ->join('users', 'users.id', '=', 'agriculture_advice.created_by')
            // ->where('auctions.end_time', '>', Carbon::now())
            // ->where('auction_target_suppliers.supplier_id', '=', Auth::user()->id)
            ->orderBy('id', 'DESC')
            ->get()->toArray(); 

        return view('frontend.all-agroadvice-list', ['all_advice_list' => $all_advice_list]);
    }    


    public function pdfAdviceData(){
            // $pdf = Pdf::loadView('frontend.pdf-advice-data');
            // return $pdf->stream('brri-agro-advice.pdf');

        $one_step = "বশিষে কৃষি পরার্মশঃ";

        $data = [
            'one_step' => $one_step,
        ];
        $pdf = PDF::loadView('frontend.pdf-advice-data', compact('data'));

        return $pdf->stream('document.pdf');
    }

    public function newAuction()
    {
        if (!profileStatusCompleted()) {
            session()->flash('error', __('You must complete your profile before creating auctions'));
            return redirect()->route('frontend.profile');
        }

        return view('frontend.new-auction');
    }

    public function catalogue()
    {
        return view('frontend.catalogue');
    }


    public function pricingPlan(Request $request)
    {
        $subscription_plan = Subscription::orderBy('id', 'asc')->get()->toArray();
        return view('frontend.pricing-plan', ['subscription_plan' => $subscription_plan]);
    }

    public function wallet()
    {
        return view('frontend.wallet');
    }


    public function aboutUs()
    {
        return view('frontend.about_us');
    }

    public function contact()
    {
        return view('frontend.contact');
    }


    public function faq()
    {
        return view('frontend.faqs');
    }




}

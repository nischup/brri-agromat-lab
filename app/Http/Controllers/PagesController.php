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
        $my_all_ticket = Ticket::where('created_by', auth()->user()->id)->count();
        $my_inprogress_ticket = Ticket::where('status', '3')->where('created_by', auth()->user()->id)->count();
        $my_open_ticket = Ticket::where('status', '1')->where('created_by', auth()->user()->id)->count();
        $my_close_ticket = Ticket::where('status', '2')->where('created_by', auth()->user()->id)->count();

        $recent_tickets = Ticket::select('tickets.id as ticket_id', 'tickets.subject as subject', 'tickets.status as status','tickets.severity as severity', 'tickets.priority as priority', 'tickets.created_at', 'users.id as user_id', 'users.name as username')->join('users', 'users.id', '=', 'tickets.created_by')
            // ->where('auctions.end_time', '>', Carbon::now())
            ->where('tickets.created_by', '=', Auth::user()->id)
            ->orderBy('ticket_id', 'DESC')
            ->take(30)
            ->get()->toArray();        

            $high_priority_tickets = Ticket::select('tickets.id as ticket_id', 'tickets.subject as subject', 'tickets.status as status','tickets.priority as priority', 'tickets.severity as severity','tickets.created_at', 'users.id as user_id', 'users.name as username')->join('users', 'users.id', '=', 'tickets.created_by')
            ->where('tickets.priority', '1')
            ->where('tickets.created_by', '=', Auth::user()->id)
            ->orderBy('ticket_id', 'DESC')
            ->take(30)
            ->get()->toArray();


        return view('frontend.dashboard', [
            'my_all_ticket' => $my_all_ticket,
            'my_inprogress_ticket' => $my_inprogress_ticket,
            'my_close_ticket' => $my_close_ticket,
            'my_open_ticket' => $my_open_ticket,
            'recent_tickets' => $recent_tickets,
            'high_priority_tickets' => $high_priority_tickets,
        ]);
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

        $one_step = "গনপ্রজাতন্ত্রী বাংলাদেশ সরকার";

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

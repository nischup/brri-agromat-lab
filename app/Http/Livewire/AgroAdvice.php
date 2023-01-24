<?php

namespace App\Http\Livewire;

use App\Models\CatalogueImage;
use App\Models\Category;
use App\Models\Status;
use App\Models\User;
use App\Models\Division;
use App\Models\District;
use App\Models\AgricultureAdvice;
use App\Models\Catalogue;
use App\Services\AuctionService;
use App\Services\ImageService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;

class AgroAdvice extends Component
{

    use WithFileUploads;

    public $category_column;
    public $district_list;
    public $subject, $brand;
    public $catalogues = [];
    public $thumbnail;

    public $district_id, $division_id, $agriculture_advice, $sarok_potro_no, $sarok_date;
    public $purbavaser_somoykal, $purbavaser_sarsongkhep, $table_data, $sms_krishi_poramorsho, $dhan_gacher_briddhi_porjay, $dhan_gacher_briddhi_porjay_details;    
    public $krishi_tattik_bebosthapona, $sesh_pani_bebosthapona, $rog_balai_bebosthapona, $poka_makor_bebosthapona, $sorirtattik_bebosthapona, $mrittika_bebosthapona;

    public $newTicket = [
        'district_id' => '',
        'division_id' => '',
        'agriculture_advice' => '',
        'sarok_potro_no' => '',
        'sarok_date' => '',
        'purbavaser_somoykal' => '',
        'purbavaser_sarsongkhep' => '',
        'table_data' => '',
        'sms_krishi_poramorsho' => '',
        'dhan_gacher_briddhi_porjay' => '',
        'dhan_gacher_briddhi_porjay_details' => '',
        'krishi_tattik_bebosthapona' => '',
        'sesh_pani_bebosthapona' => '',
        'rog_balai_bebosthapona' => '',
        'poka_makor_bebosthapona' => '',
        'sorirtattik_bebosthapona' => '',
        'mrittika_bebosthapona' => '',
    ];

    public function resetForm()
    {
        $this->newTicket = [
            'division_id' => '',
            'district_id' => '',
            'agriculture_advice' => '',
            'sarok_potro_no' => '',
            'sarok_date' => '',
            'purbavaser_somoykal' => '',
            'purbavaser_sarsongkhep' => '',
            'table_data' => '',
            'sms_krishi_poramorsho' => '',
            'dhan_gacher_briddhi_porjay' => '',
            'dhan_gacher_briddhi_porjay_details' => '',
            'krishi_tattik_bebosthapona' => '',
            'sesh_pani_bebosthapona' => '',
            'rog_balai_bebosthapona' => '',
            'poka_makor_bebosthapona' => '',
            'sorirtattik_bebosthapona' => '',
            'mrittika_bebosthapona' => '',
        ];
    }

    public function render()
    {
        return view('frontend.livewire.agro-advice');
    }

    public function storeTicket(){
        $this->validate([
            'agriculture_advice' => 'required',
        ]);

        DB::beginTransaction();

        try {
            $auction = AgricultureAdvice::create([
                'agriculture_advice' => $this->agriculture_advice,
                'division_id' => $this->division_id,
                'district_id' => $this->district_id,
                'sarok_potro_no' => $this->sarok_potro_no,
                'sarok_date' => $this->sarok_date,
                'purbavaser_somoykal' => $this->purbavaser_somoykal,
                'purbavaser_sarsongkhep' => $this->purbavaser_sarsongkhep,
                'table_data' => $this->table_data,
                'sms_krishi_poramorsho' => $this->sms_krishi_poramorsho,
                'dhan_gacher_briddhi_porjay' => $this->dhan_gacher_briddhi_porjay,
                'dhan_gacher_briddhi_porjay_details' => $this->dhan_gacher_briddhi_porjay_details,
                'krishi_tattik_bebosthapona' => $this->krishi_tattik_bebosthapona,
                'sesh_pani_bebosthapona' => $this->sesh_pani_bebosthapona,
                'rog_balai_bebosthapona' => $this->rog_balai_bebosthapona,
                'poka_makor_bebosthapona' => $this->poka_makor_bebosthapona,
                'sorirtattik_bebosthapona' => $this->sorirtattik_bebosthapona,
                'mrittika_bebosthapona' => $this->mrittika_bebosthapona,
                'created_by' => auth()->user()->id,
            ]);;

            session()->flash('message', __('New Data Created successfully.'));
            DB::commit();
        } catch (\Exception $e) {
            session()->flash('error', __('Something went wrong! please try again'));
            DB::rollback();
            throw $e;
        } catch (\Throwable $e) {
            session()->flash('error', __('Something went wrong! please try again'));
            DB::rollback();
            throw $e;
        }

        return redirect()->route('frontend.new-advice');
    }


    public function divisionToDistrict($value)
    {
        // dd($value);
        if (!$value) {
            return;
        }

       $this->district_list = District::select('id', 'name', 'bn_name')->where('division_id', $value)->get()->toArray();
    }    



    public function mount()
    {
        $this->category_column = 'name_' . app()->getLocale();
        if (!Schema::hasColumn('categories', $this->category_column))
        {
            $this->category_column = 'name_en';
        }

        $this->categories = Category::select('id', $this->category_column, 'name_en')->where('parent_id', 0)->get()->toArray();
        $this->divisions = Division::get()->toArray();
        // $this->district_list = District::get()->toArray();

    }
}

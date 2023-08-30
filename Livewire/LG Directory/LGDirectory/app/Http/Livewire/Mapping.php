<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Http;
use Livewire\Component;

class Mapping extends Component
{
    public $states;
    public $districts;
    public $tehsils;
    public $subdistrictCode;
    public $villageCode;
   public $villageDetails;
    public $villages;
    public $stateCode;
    public $districtCode;
    public $localBodies;
    public $localBodyCode;
    public $wards;
    public $wardCode;
    public $blockCode;
    public $blocks;
    public $gps;
    public $gpCode;
    public $areaType;

    public function render()
    {

        return view('livewire.mapping');
    }
    function mount()
    {
        $this->states = Http::post('https://lgdirectory.gov.in/webservices/lgdws/stateList', ['verify' => false])->json();
        // dd($this->states);

    }
    public function updatedstateCode($value)
    {
        //dd($value);
        $this->districts = Http::post('https://lgdirectory.gov.in/webservices/lgdws/districtList?stateCode=' . $value, ['verify' => false])->json();
        //dd($this->districts);
    }
    public function updateddistrictCode($value)
    {
        //dd($value);
        $this->tehsils = Http::post('https://lgdirectory.gov.in/webservices/lgdws/subdistrictList?districtCode=' . $value, ['verify' => false])->json();
        $this->localBodies = Http::post('https://lgdirectory.gov.in/webservices/lgdws/fetchUrbanLocalBodyForGivenDistrict?landRegionType=D&landRegionCode=' . $value, ['verify' => false])->json();
        //d($this->tehsils);
        $this->blocks = Http::post('https://lgdirectory.gov.in/webservices/lgdws/blockList?districtCode=' . $value, ['verify' => false])->json();

    }
    public function updatedsubdistrictCode($value)
    {
        //dd($value);
        $this->villages = Http::post('https://lgdirectory.gov.in/webservices/lgdws/villageList?subDistrictCode=' . $value, ['verify' => false])->json();
       // dd($this->villages);
    }
    public function updatedvillageCode($value)
    {
        //dd($value);
        $this->villageDetails = Http::post('https://lgdirectory.gov.in/webservices/lgdws/villageHierarachyDetails?villageCode=' . $value, ['verify' => false])->json();
        //dump($this->villageDetails);
    }
    public function updatedlocalBodyCode($value)
    {
        //dd($value);
        $this->wards = Http::post('https://lgdirectory.gov.in/webservices/lgdws/lbwiseWardDetails?localbodyCode=' . $value, ['verify' => false])->json();
        array_multisort(array_column($this->wards, 'wardCode'), SORT_ASC, $this->wards);        
        //dump($this->villageDetails);
    }
    public function updatedblockCode($value)
    {
        //dd($value);
        // array_multisort(array_column($this->blocks, 'wardCode'), SORT_ASC, $this->wards);        
        //dump($this->villageDetails);
                $this->gps = Http::post('https://lgdirectory.gov.in/webservices/lgdws/getBlockwiseMappedGP?blockCode=' . $value, ['verify' => false])->json();

    }
}

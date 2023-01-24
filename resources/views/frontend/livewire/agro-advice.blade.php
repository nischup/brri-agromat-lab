 @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    @if (session()->has('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
        <form class="row g-3">

                <div class="col-md-12">
                  <label for="inputName5" class="form-label nikosh-font">বিশেষ কৃষি পরামর্শঃ </label>
                    <select class="form-select form-control-sm" wire:model="agriculture_advice">
                        <option class="nikosh-font" selected>একটি নির্বাচন করুন </option>
                        <option value="ভারী বৃষ্টিপাত"> ভারী বৃষ্টিপাত </option>
                        <option value="তাপদাহ"> তাপদাহ </option>
                        <option value="শৈত প্রবাহ"> শৈত প্রবাহ </option>
                        <option value="তীব্র ঠান্ডা"> তীব্র ঠান্ডা </option>
                        <option value="শীলা বৃষ্টি"> শীলা বৃষ্টি </option>
                        <option value="খরা"> খরা </option>
                        <option value="আকস্মিক বন্যা"> আকস্মিক বন্যা </option>
                    </select>
                   @error('agriculture_advice') <span class="text-danger error">{{ $message }}</span> @enderror
                </div>                

                <div class="col-md-6">
                  <label for="inputName5" class="form-label nikosh-font">বিভাগঃ</label>
                    <select class="form-select form-control-sm" wire:model.defer="division_id" wire:click="divisionToDistrict($event.target.value)">
                        <option class="nikosh-font" selected>যেকোনো একটি বিভাগ নির্বাচন করুন </option>
                        @foreach ($divisions as $division)
                            <option class="nikosh-font" value="{{ $division['id'] }}"> {{ $division['bn_name'] }} - {{ $division['name'] }}</option>
                        @endforeach
                    </select>
                   @error('division_id') <span class="text-danger error">{{ $message }}</span> @enderror
                </div>                  

                <div class="col-md-6">
                  <label for="inputName5" class="form-label nikosh-font">জেলাঃ</label>
                    <select class="form-select form-control-sm" wire:model="district_id">
                        <option class="nikosh-font"  selected>একটি নির্বাচন করুন </option>
                        @if ($district_list)
                          @foreach ($district_list as $district)
                              <option class="nikosh-font" value="{{ $district['id'] }}"> {{ $district['bn_name'] }} - {{ $district['name'] }}</option>
                          @endforeach
                        @endif
                    </select>
                   @error('district_id') <span class="text-danger error">{{ $message }}</span> @enderror
                </div>                

                <div class="col-md-6">
                  <label for="inputName5" class="form-label nikosh-font">স্মারক পত্র নংঃ </label>
                  <input type="text" class="form-control" id="inputName5" wire:model="sarok_potro_no" placeholder="বিকৃপ-০০১">
                   @error('sarok_potro_no') <span class="text-danger error">{{ $message }}</span> @enderror
                </div>

                <div class="col-md-6">
                   <label for="inputState" class="form-label nikosh-font">তারিখ:</label>
                        <input type="date" class="form-control" wire:model="sarok_date">
                      @error('sarok_date') <span class="text-danger error">{{ $message }}</span> @enderror
                </div>                

                <div class="col-md-12">
                   <label for="inputState" class="form-label nikosh-font">পূর্বাভাসের সময়কালঃ</label>
                    <input type="date" name="" class="form-control" wire:model="purbavaser_somoykal">
                    @error('purbavaser_somoykal') <span class="text-danger error">{{ $message }}</span> @enderror
                </div>

                <div class="col-md-12">
                   <label for="inputState" class="form-label nikosh-font">পূর্বাভাসের সার-সংক্ষেপঃ</label>
                    <input type="text" name="" class="form-control" wire:model="purbavaser_sarsongkhep">
                    @error('purbavaser_sarsongkhep') <span class="text-danger error">{{ $message }}</span> @enderror
                </div>

                <div class="col-md-4">
                   <label for="inputState" class="form-label nikosh-font">ম্যাপঃ</label>
                    <input type="file" name="" class="form-control">
                      @error('project') <span class="text-danger error">{{ $message }}</span> @enderror
                </div>                


                <div class="col-md-4">
                   <label for="inputState" class="form-label nikosh-font">গ্রাফঃ</label>
                    <input type="file" name="" class="form-control">
                      @error('project_module') <span class="text-danger error">{{ $message }}</span> @enderror
                </div>    

                <div class="col-md-4">
                   <label for="inputState" class="form-label nikosh-font">টেবিলঃ</label>
                    <input type="text" class="form-control" id="inputAddres5s" wire:model="table_data" placeholder="">
                </div>                


                <div class="col-12">
                  <label for="inputAddress5" class="form-label nikosh-font">এসএমএস কৃষি পরামর্শঃ</label>
                  <input type="text" class="form-control" id="inputAddres5s" wire:model="sms_krishi_poramorsho" placeholder="">
                </div>


                <div class="col-12">
                  <label for="inputAddress5" class="form-label nikosh-font">ধান গাছের বৃদ্ধির পর্যায়ঃ</label>

                    <select class="form-select form-control-sm" wire:model="dhan_gacher_briddhi_porjay" >
                        <option class="nikosh-font" selected>একটি নির্বাচন করুন </option>
                        <option value="চারা অবস্থা"> চারা অবস্থা</option>
                        <option value="চারা রোপন"> চারা রোপন</option>
                        <option value="আগাম কুশি"> আগাম কুশি</option>
                        <option value="মধ্য কুশি"> মধ্য কুশি</option>
                        <option value="সর্বোচ্চ কুশি"> সর্বোচ্চ কুশি</option>
                        <option value="কাইচ থোড়"> কাইচ থোড়</option>
                        <option value="থোড়"> থোড়</option>
                        <option value="ফুল ফোঁটা"> ফুল ফোঁটা</option>
                        <option value="দুধ অবস্থা"> দুধ অবস্থা</option>
                        <option value="নরম দানা"> নরম দানা </option>
                        <option value="শক্ত দানা"> শক্ত দানা</option>
                        <option value="৭০% পরিপক্ক"> ৭০% পরিপক্ক</option>
                        <option value="৮০% পরিপক্ক"> ৮০% পরিপক্ক</option>
                    </select>
                    <br>
                  {{-- <textarea type="text" class="form-control" wire:model="dhan_gacher_briddhi_porjay_details"></textarea> --}}
                    <div wire:ignore>
                    <trix-editor class="formatted-content"
                        x-data
                        wire:model.debounce.120s="dhan_gacher_briddhi_porjay_details"
                    ></trix-editor>
                  </div> 

                </div>                

                <div class="col-12">
                  <label for="inputAddress5" class="form-label nikosh-font">কৃষিতাত্ত্বিক ব্যবস্থাপনাঃ </label>
                  {{-- <textarea type="text" class="form-control" wire:model="krishi_tattik_bebosthapona"></textarea> --}}
                  <div wire:ignore>
                    <trix-editor class="formatted-content"
                        x-data
                        wire:model.debounce.120s="krishi_tattik_bebosthapona"
                    ></trix-editor>
                  </div> 
                </div>


                <div class="col-12">
                  <label for="inputAddress5" class="form-label nikosh-font">সেচ ও পানি ব্যবস্থাপনাঃ</label>
                  {{-- <textarea type="text" class="form-control" wire:model="sesh_pani_bebosthapona"></textarea> --}}
                  <div wire:ignore>
                    <trix-editor class="formatted-content"
                        x-data
                        wire:model.debounce.120s="sesh_pani_bebosthapona"
                    ></trix-editor>
                  </div> 
                </div>

                <div class="col-12">
                  <label for="inputAddress5" class="form-label nikosh-font">রোগ-বালাই ব্যবস্থাপনাঃ </label>
                  {{-- <textarea type="text" class="form-control" wire:model="rog_balai_bebosthapona"></textarea> --}}
                  <div wire:ignore>
                    <trix-editor class="formatted-content"
                        x-data
                        wire:model.debounce.120s="rog_balai_bebosthapona"
                    ></trix-editor>
                  </div> 
                </div>

                <div class="col-12">
                  <label for="inputAddress5" class="form-label nikosh-font">পোকা-মাকড় ব্যবস্থাপনাঃ </label>
                  {{-- <textarea type="text" class="form-control" wire:model="poka_makor_bebosthapona"></textarea> --}}
                  <div wire:ignore>
                    <trix-editor class="formatted-content"
                        x-data
                        wire:model.debounce.120s="poka_makor_bebosthapona"
                    ></trix-editor>
                  </div> 
                </div>

                <div class="col-12">
                  <label for="inputAddress5" class="form-label nikosh-font">শারীরতাত্ত্বিক ব্যবস্থাপনাঃ </label>
                   <div wire:ignore>
                    <trix-editor class="formatted-content"
                        x-data
                        wire:model.debounce.120s="sorirtattik_bebosthapona"
                    ></trix-editor>
                  </div> 
                </div>                

                <div class="col-12">
                  <label for="inputAddress5" class="form-label nikosh-font">মৃত্তিকা ব্যবস্থাপনাঃ </label>
            

                <textarea class="ckeditor form-control" name="description"   
                    x-data
                    
                    wire:model.debounce.120s="mrittika_bebosthapona">
                          
                </textarea>

                </div>

                <div class="text-center">
                  <button type="button" class="btn btn-success" wire:click.prevent="storeTicket">Submit</button>
                  <button type="reset" class="btn btn-secondary">Reset</button>
                  <button type="button" class="btn btn-primary" onclick="window.location.reload(true);"/>Reload</button>
                </div>
              </form>
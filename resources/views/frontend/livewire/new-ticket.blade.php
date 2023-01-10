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
                <div class="col-md-6">
                  <label for="inputName5" class="form-label">স্মারক পত্র নাং:</label>
                  <input type="text" class="form-control" id="inputName5" wire:model="subject" placeholder="০০১">
                   @error('subject') <span class="text-danger error">{{ $message }}</span> @enderror
                </div>

                <div class="col-md-6">
                   <label for="inputState" class="form-label">তারিখ:</label>
                        <input type="date" class="form-control" name="">
                      @error('task_category') <span class="text-danger error">{{ $message }}</span> @enderror
                </div>                

                <div class="col-md-4">
                   <label for="inputState" class="form-label">পূর্বাভাসের সার-সংক্ষেপ:</label>
                    <input type="text" name="" class="form-control">
                    @error('company_id') <span class="text-danger error">{{ $message }}</span> @enderror
                </div>

                <div class="col-md-4">
                   <label for="inputState" class="form-label">ম্যাপ:</label>
                    <input type="file" name="" class="form-control">
                      @error('project') <span class="text-danger error">{{ $message }}</span> @enderror
                </div>                


                <div class="col-md-4">
                   <label for="inputState" class="form-label">গ্রাফ:</label>
                    <input type="file" name="" class="form-control">
                      @error('project_module') <span class="text-danger error">{{ $message }}</span> @enderror
                </div>    

                <div class="col-md-4">
                   <label for="inputState" class="form-label">টেবিল:</label>
                    <input type="text" class="form-control" id="inputAddres5s" wire:model="page_name" placeholder="">
                </div>                


                <div class="col-4">
                  <label for="inputAddress5" class="form-label">এসএমএস কৃষি পরামর্শ:</label>
                  <input type="text" class="form-control" id="inputAddres5s" wire:model="remarks" placeholder="">
                </div>


                <div class="col-12">
                  <label for="inputAddress5" class="form-label">ধান গাছের বৃদ্ধির পর্যায়: </label>
                  <textarea type="text" class="form-control" wire:model="issue_details"></textarea>
                </div>                

                <div class="col-12">
                  <label for="inputAddress5" class="form-label">কৃষিতাষিক ব্যবস্থাপনা: </label>
                  <textarea type="text" class="form-control" wire:model="issue_details"></textarea>
                </div>


                <div class="col-12">
                  <label for="inputAddress5" class="form-label">সেচ ও পানি ব্যবস্থাপনা: </label>
                  <textarea type="text" class="form-control" wire:model="issue_details"></textarea>
                </div>

                <div class="col-12">
                  <label for="inputAddress5" class="form-label">রোগ-বালাই ব্যবস্থাপনাঃ: </label>
                  <textarea type="text" class="form-control" wire:model="issue_details"></textarea>
                </div>

                <div class="col-12">
                  <label for="inputAddress5" class="form-label">পপাকা-মাকড় ব্যবস্থাপনা: </label>
                  <textarea type="text" class="form-control" wire:model="issue_details"></textarea>
                </div>

                <div class="col-12">
                  <label for="inputAddress5" class="form-label">শারীরতাষিক ব্যবস্থাপনা: </label>
                  <textarea type="text" class="form-control" wire:model="issue_details"></textarea>
                </div>                

                <div class="col-12">
                  <label for="inputAddress5" class="form-label">মৃষিকা ব্যবস্থাপনা: </label>
                  <textarea type="text" class="form-control" wire:model="issue_details"></textarea>
                </div>


                <div class="text-center">
                  <button type="button" class="btn btn-success" wire:click.prevent="storeTicket" disabled>Submit</button>
                  <button type="reset" class="btn btn-secondary">Reset</button>
                  <button type="button" class="btn btn-primary" onclick="window.location.reload(true);"/>Reload</button>
                </div>
              </form>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title> গনপ্রজাতন্ত্রী বাংলাদেশ সরকার | BRRI </title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<style>

    body {
        font-family: 'Kalpurush', sans-serif;
    }
</style>

<body>

    <section class="login-area" style="margin-top: 100px;">
        <div class="container">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                  <div class="row">
                        <div class="col-md-2">
                            <img class="newable-logo" 
                                src="{{ public_path('images/bd-logo.png') }}" alt="{{ public_path('images/bd-logo.png') }}" width="100" height="100" />
                        </div>
                        <div class="col-md-8">
                                <h3 class="text-center"> গনপ্রজাতন্ত্রী বাংলাদেশ সরকার </h3>
                                <p class="text-center">কৃষি মন্ত্রণালয়<br> বাংলাদেশ ধান গবেষণা ইনিস্টিটিউট <br> এগ্রোমেট ল্যাব</p>
                        </div>
                        <div class="col-md-2">
                             <img class="newable-logo" 
                                src="{{ public_path('images/brri-logo.jpg') }}"
                                alt="{{ public_path('images/brri-logo.jpg') }}" width="100" height="100" />
                        </div>
                  </div>
                </div>
                <div class="col-md-2"></div>
            </div>
           
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                </div>
                <div class="col-md-2"></div>
            </div>
        </div>
    </section>

    @livewireScripts

</body>
</html>

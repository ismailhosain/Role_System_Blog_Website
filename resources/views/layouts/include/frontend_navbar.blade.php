   <div class="global-navbar">
       <div class="container mt-3">
           <div class="row">
               <div class="col-md-3 d-none d-sm-none d-md-inline">
                   <img src="{{ asset('assets/images/logo.jpg') }}" alt="" class="w-100 p-2">
               </div>
               <div class="col-md-7 text-center border p-2">
                   <h5>Advertisement zone</h5>
               </div>
               <div class="col-md-2 text-center p-2">
                   <a href="{{ url('admin/dashboard') }}">
                       <button class="btn btn-primary">Admin/User Login</button>
                   </a>
               </div>
           </div>
       </div>
   </div>
   {{-- <div class="sticky-top"> --}}
   <nav class="navbar navbar-expand-lg navbar-dark bg-green mt-3">
       <div class="container">
           <a href="" class="navbar-brand d-inline d-sm-inline d-md-inline d-lg-none">
               <img src="{{ asset('assets/images/logo.jpg') }}" style="width:144px">
           </a>
           <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
               data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
               aria-label="Toggle navigation">
               <span class="navbar-toggler-icon"></span>
           </button>
           <div class="collapse navbar-collapse" id="navbarSupportedContent">
               <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                   <li class="nav-item">
                       <a class="nav-link" aria-current="page" href="{{ url('/') }}">Home</a>
                   </li>
                   @php
                       $categories = App\Models\category::where('navbar_status', '0')
                           ->where('status', '0')
                           ->get();
                   @endphp
                   @foreach ($categories as $catitem)
                       <li class="nav-item">
                           <a class="nav-link" href="{{ url('tutorials/' . $catitem->slug) }}">{{ $catitem->name }}</a>
                       </li>
                   @endforeach
               </ul>

           </div>
       </div>
   </nav>
   </div>

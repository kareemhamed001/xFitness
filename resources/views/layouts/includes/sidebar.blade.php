<div class="sidebar-wrapper sidebar-theme">

    @php
        $settings=\App\Models\SiteSetting::latest()->first();
    @endphp

    <nav id="sidebar">

        <div class="navbar-nav theme-brand flex-row  text-center">
            <div class="nav-logo">
                <div class="row">
                    @if($settings->show_logo)
                        <img style="object-fit: scale-down"
                             src="{{ asset($settings->logo_path)}}" class="" alt="logo">
                    @endif
                    @if($settings->show_name)
                        <div class="nav-item theme-text">
                            <a href="{{url('/coach')}}"
                               class="nav-link"> {{$settings['name_'.\Mcamara\LaravelLocalization\Facades\LaravelLocalization::setLocale()]}} </a>
                        </div>
                    @endif
                </div>


                <div class="nav-item theme-logo">
                </div>


            </div>
            <div class="nav-item sidebar-toggle">
                <div class="btn-toggle sidebarCollapse">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                         class="feather feather-chevrons-left">
                        <polyline points="11 17 6 12 11 7"></polyline>
                        <polyline points="18 17 13 12 18 7"></polyline>
                    </svg>
                </div>
            </div>
        </div>
        <div class="profile-info">
            <div class="user-info">


                <div class="profile-img">
                    <img style="object-fit: cover"
                         src="{{asset(Auth::user()?->profile_image??'assets/images/logo/xlogo.png')}}"
                         alt="avatar">
                </div>
                <div class="profile-content">
                    <a href="{{url('/coach/profile')}}">
                        <h6 class="">{{Auth::user()->name??'Name'}}</h6>
                        <p class="">Coach</p>
                    </a>
                </div>

            </div>
        </div>

        <div class="shadow-bottom"></div>
        <ul class="list-unstyled menu-categories " id="accordionExample" style="padding-bottom: 6rem">
            <li class="menu">
                <a href="#dashboard" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                             fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                             stroke-linejoin="round" class="feather feather-home">
                            <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                            <polyline points="9 22 9 12 15 12 15 22"></polyline>
                        </svg>
                        <span>{!! __('sidebar.dashboard')  !!}</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                             fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                             stroke-linejoin="round" class="feather feather-chevron-right">
                            <polyline points="9 18 15 12 9 6"></polyline>
                        </svg>
                    </div>
                </a>
                <ul class="collapse submenu list-unstyled" id="dashboard" data-bs-parent="#accordionExample">
                    <li>
                        <a href="{{url('coach/analytics')}}"> Analytics </a>
                    </li>
                    <li>
                        <a href="{{url('coach/sales')}}"> Sales </a>
                    </li>
                </ul>
            </li>

            <li class="menu">
                <a href="{{url('coach/users')}}" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <i class="fa-regular fa-user fa-2xs"></i>
                        <span>{!! __('sidebar.users')  !!}</span>
                    </div>
                </a>
            </li>
            <li class="menu">
                <a href="{{url('coach/logs')}}" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <i class="fa-regular fa-gear fa-2xs"></i>
                        <span>{!! __('sidebar.logs')  !!}</span>
                    </div>
                </a>
            </li>
            <li class="menu">
                <a href="" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <i class="fa-regular fa-megaphone fa-2xs"></i>
                        <span>{!! __('sidebar.ads')  !!}</span>
                    </div>
                </a>
            </li>

            <li class="menu">
                <a href="{{url('coach/categories')}}" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <i class="fa-regular fa-square fa-2xs"></i>
                        <span>{!! __('sidebar.categories')  !!}</span>
                    </div>
                </a>
            </li>

            @foreach(\App\Models\category::all() as $category)

                @switch($category->id)
                    @case($category->id==config('mainCategories.Coaches.id'))
                        <li class="menu menu-heading">
                            <div class="heading">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     fill="none"
                                     stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round"
                                     class="feather feather-minus">
                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                </svg>
                                <span class="text-uppercase">COACHES</span></div>
                        </li>
                        <li class="menu">
                            <a href="{{url('coach/coaches')}}" aria-expanded="false" class="dropdown-toggle">
                                <div class="">
                                    <i class="fa-regular fa-user-gear fa-2xs"></i>
                                    <span>{!! __('sidebar.coaches')  !!}</span>
                                </div>
                            </a>
                        </li>
                        @break

                    @case($category->id==config('mainCategories.Supplements.id'))
                        <li class="menu menu-heading">
                            <div class="heading">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     fill="none"
                                     stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round"
                                     class="feather feather-minus">
                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                </svg>
                                <span class="text-uppercase">Supplements</span></div>
                        </li>
                        <li class="menu">
                            <a href="{{url('coach/supplements/brands')}}" aria-expanded="false" class="dropdown-toggle">
                                <div class="">
                                    <i class="fa-regular fa-tag fa-2xs"></i>
                                    <span>{!! __('sidebar.brands')  !!}</span>
                                </div>
                            </a>
                        </li>
                        <li class="menu">
                            <a href="{{url('coach/supplements/products')}}" aria-expanded="false"
                               class="dropdown-toggle">
                                <div class="">
                                    <i class="fa-regular fa-box fa-2xs"></i>
                                    <span>{!! __('sidebar.products')  !!}</span>
                                </div>
                            </a>
                        </li>
                        @break
                    @case($category->id==config('mainCategories.GymDiscount.id'))
                        <li class="menu menu-heading">
                            <div class="heading">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     fill="none"
                                     stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round"
                                     class="feather feather-minus">
                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                </svg>
                                <span class="text-uppercase">GYM DISCOUNTS</span></div>
                        </li>
                        <li class="menu ">
                            <a href="{{url('coach/gyms')}}" aria-expanded="false" class="dropdown-toggle">
                                <div class="">
                                    <i class="fa-regular fa-dumbbell fa-2xs"></i>
                                    <span>{!! __('sidebar.gyms')  !!}</span>
                                </div>
                            </a>
                        </li>

                        @break
                    @case($category->id ==config('mainCategories.MusclesVideos.id'))
                        <li class="menu menu-heading">
                            <div class="heading">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     fill="none"
                                     stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round"
                                     class="feather feather-minus">
                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                </svg>
                                <span>{{$category['name_'.\Mcamara\LaravelLocalization\Facades\LaravelLocalization::setLocale()]}}</span>
                            </div>
                        </li>

                        <li class="menu">
                            <a href="#muscles" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                                <div class="">
                                    <i class="fa-light fa-person-walking"></i>
                                    <span>{!! __('sidebar.muscles')  !!}</span>
                                </div>
                                <div>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                         fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                         stroke-linejoin="round" class="feather feather-chevron-right">
                                        <polyline points="9 18 15 12 9 6"></polyline>
                                    </svg>
                                </div>
                            </a>
                            <ul class="collapse submenu list-unstyled" id="muscles" data-bs-parent="#accordionExample">
                                <li>
                                    <a href="{{url('coach/muscles')}}"> List </a>
                                </li>
                                <li>
                                    <a href="{{url('coach/muscles/create')}}"> Add </a>
                                </li>
                            </ul>
                        </li>
                        @break
                    @default
                        <li class="menu menu-heading">
                            <div class="heading">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     fill="none"
                                     stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round"
                                     class="feather feather-minus">
                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                </svg>
                                <span class="text-uppercase">{{$category->name_en}}</span></div>
                        </li>

                        <li class="menu">
                            <a href="{{url('coach/category/'.$category->id.'/sub-categories')}}" aria-expanded="false"
                               class="dropdown-toggle">
                                <div class="">
                                    <i class="fa-regular fa-square fa-2xs"></i>
                                    <span>{!! __('sidebar.subcategories')  !!}</span>
                                </div>
                            </a>
                        </li>
                        <li class="menu">
                            <a href="#products{{$category->id}}" data-bs-toggle="collapse" aria-expanded="false"
                               class="dropdown-toggle">
                                <div class="">
                                    <i class="fa-light fa-box-open fa-2xs"></i>
                                    <span>{!! __('sidebar.products')  !!}</span>
                                </div>
                                <div>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                         fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                         stroke-linejoin="round" class="feather feather-chevron-right">
                                        <polyline points="9 18 15 12 9 6"></polyline>
                                    </svg>
                                </div>
                            </a>
                            <ul class="collapse submenu list-unstyled" id="products{{$category->id}}"
                                data-bs-parent="#accordionExample">
                                <li>
                                    <a href="{{url('coach/category/'.$category->id.'/products')}}"> List </a>
                                </li>
                                <li>
                                    <a href="{{url('coach/category/'.$category->id.'/products/create')}}"> Add </a>
                                </li>
                            </ul>
                        </li>
                @endswitch
            @endforeach

            <li class="menu">
                <a href="{{url('coach/settings')}}" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <i class="fa-regular fa-gear fa-2xs"></i>
                        <span>{!! __('sidebar.settings')  !!}</span>
                    </div>
                </a>
            </li>
        </ul>

    </nav>

</div>

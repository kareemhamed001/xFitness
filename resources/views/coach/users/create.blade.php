@extends('layouts.app-blog-create')
@section('content')
    <div class="row my-2">

        <nav class="breadcrumb-style-one mb-3  col-lg-6" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('coach')}}">Coach / </a></li>
                <li class="breadcrumb-item"><a @if($role==1) href="{{url('coach/coaches')}}"  @elseif($role==2) href="{{url('coach/users')}}" @endif > @if($role==1) Coaches  @elseif($role==2) Users @endif </a></li>
                <li class="breadcrumb-item active" aria-current="page">Create user</li>
            </ol>
        </nav>
        <h4 class="my-3">{!! __('users.add') !!} @if($role==1) {!! __('users.coach') !!}  @elseif($role==2) {!! __('users.user') !!} @endif</h4>
        <img id="preview">
        <form id="adduserForm" class="my-2 row">
            @csrf
            <input type="hidden" name="coach_id" value="{{Auth::user()?->id}}">
            <input type="hidden" name="role_as" value="{{$role}}">

            <div class="form-group col-md-6 my-2 px-1">
                <label for="coverImage">{!! __('users.profileImage') !!}</label>
                <input name="profile_image" class="form-control" type="file" id="coverImage"
                       onchange="previewImage(event)">
                @error('profile_image')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>


            <div class="form-group col-md-6 my-2 px-1">
                <label for="userNameEn">{!! __('users.name') !!}</label>
                <input name="name" class="form-control" type="text" id="userNameEn"
                       placeholder="Enter user name *">
                @error('name')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="form-group col-md-6 my-2 px-1">
                <label for="email">{!! __('users.email') !!}</label>
                <input name="email" class="form-control" type="email" id="email"
                       placeholder="Enter valid email *">
                @error('email')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="form-group col-md-6 my-2 px-1">
                <label for="phone_number">{!! __('users.phoneNumber') !!}</label>
                <input name="phone_number" class="form-control" type="text" id="phone_number"
                       placeholder="Enter valid phone number *">
                @error('phone_number')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="form-group col-md-6 my-2 px-1">
                <label for="password">{!! __('users.password') !!}</label>
                <input name="password" class="form-control" type="password" id="password"
                       placeholder="Enter password *">
                @error('password')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="form-group col-md-6 my-2 px-1">
                <label for="country">{!! __('users.country') !!}</label>
                <input name="country" class="form-control" type="text" id="country"
                       placeholder="Enter user country *">
                @error('country')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="form-group col-md-4 col-12 my-2 px-1">
                <label for="address">{!! __('users.address') !!}</label>
                <input type="text" name="address" id="address" class="form-control" placeholder="Enter user address *">
                @error('address')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="form-group col-md-4 col-12 my-2 px-1">
                <label for="age">{!! __('users.age') !!}</label>
                <input name="age" class="form-control" type="text" id="age"
                       placeholder="Enter user age *">
                @error('age')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="form-group col-md-4 col-12 my-2 px-1">
                <label for="gender">{!! __('users.gender') !!}</label>
                <select name="gender" class="form-control" type="text" id="gender" onchange="">
                    <option>--{!! __('users.selectGender') !!}--</option>
                    <option value="0">{!! __('users.male') !!}</option>
                    <option value="1">{!! __('users.female') !!}</option>
                </select>
                @error('gender')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            @if($role==1)
                <h4 class="my-2">{!! __('users.coachInfo') !!}</h4>
                <div class="form-group col-md-6 my-2 px-1">
                    <label for="nick_name">{!! __('users.nickName') !!}</label>
                    <input name="coach_nick_name" class="form-control" type="text" id="nick_name"
                           placeholder="Enter coach nick name *">
                    @error('coach_nick_name')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group col-md-6 my-2 px-1">
                    <label for="email">{!! __('users.email') !!}</label>
                    <input name="coach_email" class="form-control" type="email" id="email"
                           placeholder="Enter coach email *">
                    @error('coach_email')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group col-md-6 my-2 px-1">
                    <label for="description">{!! __('users.description') !!}</label>
                    <input name="coach_description" class="form-control" type="text" id="description"
                           placeholder="Enter coach description *">
                    @error('coach_description')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group col-md-6 my-2 px-1">
                    <label for="phone_number">{!! __('users.phoneNumber') !!}</label>
                    <input name="coach_phone_number" class="form-control" type="text" id="phone_number"
                           placeholder="Enter coach phone number *">
                    @error('coach_phone_number')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group col-md-6 my-2 px-1">
                    <label for="experience">{!! __('users.experience') !!}</label>
                    <input name="coach_experience" class="form-control" type="text" id="experience"
                           placeholder="Enter coach experience *">
                    @error('coach_experience')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group col-md-6 my-2 px-1">
                    <label for="coach_intro_video">{!! __('users.introVideo') !!}</label>
                    <input name="coach_intro_video" class="form-control" type="file" id="coach_intro_video" placeholder="Coach intro video *">
                    @error('coach_intro_video')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

            @endif
            <div class="col-12 my-2 px-1">

                <button type="submit" class="btn btn-primary">{!! __('users.save') !!}</button>
            </div>

        </form>
    </div>

@endsection
@section('scripts')
    <script>
        let selectedType = document.getElementById('role_as')
        {{--let selectedTypeValue = null;--}}
        {{--selectedType.addEventListener('change', (e) => {--}}
        {{--    //selectedType.options[selectedType.selectedIndex].text--}}
        {{--    selectedTypeValue = e.target.value;--}}

        {{--    if (selectedTypeValue === '1') {--}}

        {{--        let coachInfo = document.getElementById('coachInfo');--}}
        {{--        coachInfo.style.display = 'flex';--}}
        {{--        coachInfo.innerHTML = `--}}
        {{--        <div class="form-group col-md-6 my-2 px-1">--}}
        {{--            <label for="nick_name">nick name</label>--}}
        {{--            <input name="coach_nick_name" class="form-control" type="text" id="nick_name"--}}
        {{--                   placeholder="Enter coach nick name *">--}}
        {{--        @error('coach_nick_name')--}}
        {{--        <span class="text-danger">{{$message}}</span>--}}
        {{--        @enderror--}}
        {{--        </div>--}}
        {{--        <div class="form-group col-md-6 my-2 px-1">--}}
        {{--            <label for="email">Email</label>--}}
        {{--            <input name="coach_email" class="form-control" type="email" id="email"--}}
        {{--                   placeholder="Enter coach email *">--}}
        {{--                   @error('coach_email')--}}
        {{--        <span class="text-danger">{{$message}}</span>--}}
        {{--        @enderror--}}
        {{--        </div>--}}
        {{--        <div class="form-group col-md-6 my-2 px-1">--}}
        {{--            <label for="description">description</label>--}}
        {{--            <input name="coach_description" class="form-control" type="text" id="description"--}}
        {{--                   placeholder="Enter coach description *">--}}
        {{--                   @error('coach_description')--}}
        {{--        <span class="text-danger">{{$message}}</span>--}}
        {{--        @enderror--}}
        {{--        </div>--}}
        {{--        <div class="form-group col-md-6 my-2 px-1">--}}
        {{--            <label for="phone_number">phone number</label>--}}
        {{--            <input name="coach_phone_number" class="form-control" type="text" id="phone_number"--}}
        {{--                   placeholder="Enter coach phone number *">--}}
        {{--                   @error('coach_phone_number')--}}
        {{--        <span class="text-danger">{{$message}}</span>--}}
        {{--        @enderror--}}
        {{--        </div>--}}
        {{--        <div class="form-group col-md-6 my-2 px-1">--}}
        {{--            <label for="experience">experience</label>--}}
        {{--            <input name="coach_experience" class="form-control" type="text" id="experience"--}}
        {{--                   placeholder="Enter coach experience *">--}}
        {{--                   @error('coach_experience')--}}
        {{--        <span class="text-danger">{{$message}}</span>--}}
        {{--        @enderror--}}
        {{--        </div>--}}
        {{--        <div class="form-group col-md-6 my-2 px-1">--}}
        {{--            <label for="coach_intro_video">intro video</label>--}}
        {{--            <input name="coach_intro_video" class="form-control" type="file" id="coach_intro_video" placeholder="Coach intro video *">--}}
        {{--            @error('coach_intro_video')--}}
        {{--        <span class="text-danger">{{$message}}</span>--}}
        {{--        @enderror--}}
        {{--        </div>--}}
        {{--        `;--}}
        {{--    } else {--}}
        {{--        let coachInfo = document.getElementById('coachInfo');--}}
        {{--        // coachInfo.style.display = 'none';--}}

        {{--        while (coachInfo.firstChild) {--}}
        {{--            coachInfo.removeChild(coachInfo.firstChild);--}}
        {{--        }--}}
        {{--    }--}}
        {{--});--}}

        let form = document.querySelector('#adduserForm')
        form.addEventListener('submit', async (e) => {
            e.preventDefault();
            let formData = new FormData(form)
            try {
                showLoader();
                let response = await fetch('/api/auth/register', {
                    method: 'POST',
                    body: formData,
                });
                console.log(response)

                let result = await response.json();
                removeLoader();

                if (result.status === 200) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: result.message,
                    })
                } else if (result.status === 400) {
                    let message = result.message;
                    let errorMessage = ``;
                    for (const key in message) {
                        errorMessage += `<span class="text-danger d-block"> ${message[key]}</span> \n`
                    }
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        html: errorMessage,
                    })
                }

            } catch (error) {
                console.error(error)
            }
        });


    </script>
@endsection

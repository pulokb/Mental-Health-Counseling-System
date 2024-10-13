@include('layouts.header')
<!-- BREADCRUMB AREA START -->
<div class="ltn__breadcrumb-area text-left bg-overlay-white-30 bg-image" data-bs-bg="{{ asset('view/img/bg/14.png') }}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="ltn__breadcrumb-inner">
                    <h1 class="page-title">Account</h1>
                    <div class="ltn__breadcrumb-list">
                        <ul>
                            <li><a href="{{ route('index') }}"><span class="ltn__secondary-color"><i class="fas fa-home"></i></span> Home</a></li>
                            <li>{{ $user->name }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- BREADCRUMB AREA END -->

<div class="container my-5">
    <div class="row">
        <div class="col-md-12">
            <!-- Display Success Message -->
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
        </div>
    </div>

    <div class="row">
        <!-- Left Side: User Information -->
        @php
    use Illuminate\Support\Str;
@endphp

<div class="col-md-4">
    <div class="card shadow-sm">
        <div class="card-body text-start">
            <!-- User Image -->
            <div class="mb-3 text-center">
                <img src="{{ $user->image ? asset('images/' . $user->image) : asset('view/img/default-avatar.png') }}"
                    alt="Profile Image"
                    class="rounded-circle img-thumbnail"
                    width="150px">
            </div>

            <!-- User Info -->
            <h4 class="card-title text-center">{{ $user->name }}</h4>
            <p class="card-text text-muted">Email: {{ $user->email }}</p>
            <p class="card-text">Phone Number: {{ $user->phone ? $user->phone : 'No Phone Provided' }}</p>
            <p class="card-text">Address: {{ $user->address ? $user->address : 'No Address Provided' }}</p>
            <p class="card-text">Age: {{ $user->age ? $user->age . ' years old' : 'No Age Provided' }}</p>
            <p class="card-text">Gender: {{ $user->gender ? $user->gender : 'No Gender Provided' }}</p>
            <p class="card-text">Occupation: {{ $user->occupation ? $user->occupation : 'No Occupation Provided' }}</p>
        </div>
    </div>

    <!-- Dashboard Button (Visible to Admins with mindquilo.com Email) -->
    @if(Str::endsWith($user->email, '@mindquilo.com'))
    <div class="text-center mt-3">
        <a href="{{ route('admin.dashboard') }}" class="theme-btn-1 btn btn-effect-1 text-uppercase" target="_blank" rel="noopener noreferrer">Dashboard</a>
    </div>
    @endif
</div>


        <!-- Right Side: Edit Profile Form -->
        <div class="col-md-8">
            <div class="card shadow-sm mb-4">
                <div class="ltn__form-box contact-form-box box-shadow white-bg">
                    <h4 class="title-2">Edit Profile</h4>
                </div>
                <div class="card-body">
                    <form data-parsley-validate enctype="multipart/form-data" action="{{ route('profilec') }}" method="POST">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="name">Name*</label>
                            <input maxlength="191" autofocus required type="text" value="{{ $user->name }}" name="name" id="name" class="form-control" placeholder="Enter Name">
                        </div>
                        <div class="form-group mb-3">
                            <label>Email address*</label>
                            <input disabled value="{{ $user->email }}" class="form-control" placeholder="Enter Email">
                        </div>
                        <div class="form-group mb-3">
                            <label for="phone">Phone</label>
                            <input value="{{ $user->phone }}" name="phone" type="text" id="phone" class="form-control" placeholder="Enter Phone">
                        </div>
                        <div class="form-group mb-3">
                            <label for="address">Address</label>
                            <input maxlength="191" value="{{ $user->address }}" name="address" type="text" id="address" class="form-control" placeholder="Enter Address">
                        </div>

                        <!-- New fields for Age, Gender, and Occupation -->
                        <div class="form-group mb-3">
                            <label for="age">Age</label>
                            <input value="{{ $user->age }}" name="age" type="number" id="age" class="form-control" placeholder="Enter Age">
                        </div>

                        <div class="form-group mb-3">
                            <label for="gender">Gender</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gender" id="genderMale" value="Male" {{ $user->gender == 'Male' ? 'checked' : '' }}>
                                <label class="form-check-label" for="genderMale">Male</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gender" id="genderFemale" value="Female" {{ $user->gender == 'Female' ? 'checked' : '' }}>
                                <label class="form-check-label" for="genderFemale">Female</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gender" id="genderOther" value="Other" {{ $user->gender == 'Other' ? 'checked' : '' }}>
                                <label class="form-check-label" for="genderOther">Other</label>
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <label for="occupation">Occupation</label>
                            <input value="{{ $user->occupation }}" name="occupation" type="text" id="occupation" class="form-control" placeholder="Enter Occupation">
                        </div>

                        <!-- Image Upload -->
                        <div class="form-group mb-3">
                            <label for="image">Profile Image</label>
                            <input type="file" class="form-control" name="image" id="image" accept="image/*">
                        </div>

                        <div class="form-footer pt-3">
                            <button type="submit" class="theme-btn-1 btn btn-effect-1 text-uppercase">
                                <i class="mdi mdi-checkbox-marked-outline"></i> Update Profile
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Change Password Section -->
            <div class="card shadow-sm">
                <div class="ltn__form-box contact-form-box box-shadow white-bg">
                    <h4 class="title-2">Change Password</h4>
                </div>
                <div class="card-body">
                    <form method="POST" id="change-password-form" action="{{ route('user.change.password') }}">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="oldpassword">{{ __('Old Password') }}</label>
                            <input class="form-control" id="oldpassword" type="password" name="oldpassword" placeholder="Old Password" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="password">{{ __('New Password') }}</label>
                            <input id="password" class="form-control" type="password" name="password" placeholder="New Password" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="password-confirm">{{ __('Confirm New Password') }}</label>
                            <input id="password-confirm" class="form-control" type="password" name="password_confirmation" placeholder="Confirm Password" required>
                        </div>

                        <div class="form-footer">
                            <button type="submit" class="theme-btn-1 btn btn-effect-1 text-uppercase">
                                {{ __('Change Password') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@include('layouts.footer')

<!-- Add JavaScript to Auto-hide the Success Message After 5 Seconds -->
<script>
    // Hide alert after 5 seconds (5000 milliseconds)
    setTimeout(function() {
        $('.alert').fadeOut('slow');
    }, 5000);
</script>

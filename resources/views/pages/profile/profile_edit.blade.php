@extends('layouts.app_profile')

@section('content')
    <div class="content-wrapper">
        <div class="content-wrapper-header">
            <div class="content-wrapper-context">
                <h3 class="img-content">
                    <div class="profile-img">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="" style="padding-left: 10%">
                        {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}
                    </div>
                </h3>
                <div class="content-text">Grab yourself jobs internationally and open up to oppotunities,
                    that will help you get to the next level in your life.</div>
            </div>
            <img class="content-wrapper-img" src="https://assets.codepen.io/3364143/glass.png" alt="">
        </div>

        @if (count($errors) > 0)
            <div class="alert alert-danger col-md-12">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="content-section">
            <div class="content-section-title">Your Information</div>
            <div class="apps-card mt-3">
                <div class="app-card">
                    <span>
                        <i class="fas fa-graduation-cap p-2"></i>
                        Your Details
                    </span>
                    <div class="app-card__subtext">
                        <form action="" class="app-content-form">
                            <div class="row">
                                <div style="margin-top:0;">
                                    <input type="text" name="phone" id="ipt1" class="form-control" />
                                    <label class="input-label" for="ipt1"> Phone: {{ $users->first()->phone }} </label>
                                </div><br>
                                <div style="margin-top:-5px;">
                                    <input type="text" name="gender" id="ipt2" class="form-control" />
                                    <label class="input-label" for="ipt2"> Gender: {{ $users->first()->gender }}
                                    </label>
                                </div><br>
                                <div style="margin-top:-5px;">
                                    <input type="text" name="country" id="ipt3" class="form-control" />
                                    <label class="input-label" for="ipt3"> Country: {{ $users->first()->country }}
                                    </label>
                                </div><br>
                                <div style="margin-top:-5px;">
                                    <input type="date" name="dob" id="ipt4" class="form-control" />
                                    <label class="input-label" for="ipt4"> Date Of Birth:
                                        {{ $users->first()->date_of_birth }} </label>
                                </div><br>
                            </div>
                            <div class="app-card-buttons">
                                <button type="submit" class="content-button status-button">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="app-card">
                    <span>
                        <i class="fas fa-graduation-cap p-2"></i>
                        Your Job Details
                    </span>
                    <div class="app-card__subtext">
                        <form action="" class="app-content-form">
                            <div class="row">
                                <div style="margin-top:0;">
                                    <input type="text" name="phone" id="ipt1" class="form-control" />
                                    <label class="input-label" for="ipt1"> Phone: {{ $users->first()->phone }} </label>
                                </div><br>
                                <div style="margin-top:-5px;">
                                    <input type="text" name="gender" id="ipt2" class="form-control" />
                                    <label class="input-label" for="ipt2"> Gender: {{ $users->first()->gender }}
                                    </label>
                                </div><br>
                                <div style="margin-top:-5px;">
                                    <input type="text" name="country" id="ipt3" class="form-control" />
                                    <label class="input-label" for="ipt3"> Country: {{ $users->first()->country }}
                                    </label>
                                </div><br>
                                <div style="margin-top:-5px;">
                                    <input type="date" name="dob" id="ipt4" class="form-control" />
                                    <label class="input-label" for="ipt4"> Date Of Birth:
                                        {{ $users->first()->date_of_birth }} </label>
                                </div><br>
                            </div>
                            <div class="app-card-buttons">
                                <button type="submit" class="content-button status-button">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="app-card">
                    <span>
                        <i class="fas fa-graduation-cap p-2"></i>
                        Your Education Background
                    </span>
                    <div class="app-card__subtext">
                        <form action="" class="app-content-form">
                            <div class="row">
                                <div style="margin-top:0;">
                                    <input type="text" name="phone" id="ipt1" class="form-control" />
                                    <label class="input-label" for="ipt1"> Phone: {{ $users->first()->phone }} </label>
                                </div><br>
                                <div style="margin-top:-5px;">
                                    <input type="text" name="gender" id="ipt2" class="form-control" />
                                    <label class="input-label" for="ipt2"> Gender: {{ $users->first()->gender }}
                                    </label>
                                </div><br>
                                <div style="margin-top:-5px;">
                                    <input type="text" name="country" id="ipt3" class="form-control" />
                                    <label class="input-label" for="ipt3"> Country: {{ $users->first()->country }}
                                    </label>
                                </div><br>
                                <div style="margin-top:-5px;">
                                    <input type="date" name="dob" id="ipt4" class="form-control" />
                                    <label class="input-label" for="ipt4"> Date Of Birth:
                                        {{ $users->first()->date_of_birth }} </label>
                                </div><br>
                            </div>
                            <div class="app-card-buttons">
                                <button type="submit" class="content-button status-button">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="apps-card mt-3">
                    <div class="app-card">
                        <span>
                            <i class="fas fa-graduation-cap p-2"></i>
                            Your Work Experiences
                        </span>
                        <div class="app-card__subtext">
                            <form action="" class="app-content-form">
                                <div class="row">
                                    <div style="margin-top:0;">
                                        <input type="text" name="phone" id="ipt1" class="form-control" />
                                        <label class="input-label" for="ipt1"> Phone: {{ $users->first()->phone }} </label>
                                    </div><br>
                                    <div style="margin-top:-5px;">
                                        <input type="text" name="gender" id="ipt2" class="form-control" />
                                        <label class="input-label" for="ipt2"> Gender: {{ $users->first()->gender }}
                                        </label>
                                    </div><br>
                                    <div style="margin-top:-5px;">
                                        <input type="text" name="country" id="ipt3" class="form-control" />
                                        <label class="input-label" for="ipt3"> Country: {{ $users->first()->country }}
                                        </label>
                                    </div><br>
                                    <div style="margin-top:-5px;">
                                        <input type="date" name="dob" id="ipt4" class="form-control" />
                                        <label class="input-label" for="ipt4"> Date Of Birth:
                                            {{ $users->first()->date_of_birth }} </label>
                                    </div><br>
                                </div>
                                <div class="app-card-buttons">
                                    <button type="submit" class="content-button status-button">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="app-card">
                        <span>
                            <i class="fas fa-graduation-cap p-2"></i>
                            Your Certificates
                        </span>
                        <div class="app-card__subtext">
                            <form action="" class="app-content-form">
                                <div class="row">
                                    <div style="margin-top:0;">
                                        <input type="text" name="phone" id="ipt1" class="form-control" />
                                        <label class="input-label" for="ipt1"> Phone: {{ $users->first()->phone }} </label>
                                    </div><br>
                                    <div style="margin-top:-5px;">
                                        <input type="text" name="gender" id="ipt2" class="form-control" />
                                        <label class="input-label" for="ipt2"> Gender: {{ $users->first()->gender }}
                                        </label>
                                    </div><br>
                                    <div style="margin-top:-5px;">
                                        <input type="text" name="country" id="ipt3" class="form-control" />
                                        <label class="input-label" for="ipt3"> Country: {{ $users->first()->country }}
                                        </label>
                                    </div><br>
                                    <div style="margin-top:-5px;">
                                        <input type="date" name="dob" id="ipt4" class="form-control" />
                                        <label class="input-label" for="ipt4"> Date Of Birth:
                                            {{ $users->first()->date_of_birth }} </label>
                                    </div><br>
                                </div>
                                <div class="app-card-buttons">
                                    <button type="submit" class="content-button status-button">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="app-card">
                        <span>
                            <i class="fas fa-graduation-cap p-2"></i>
                            Languages
                        </span>
                        <div class="app-card__subtext">
                            <form action="" class="app-content-form">
                                <div class="row">
                                    <div style="margin-top:0;">
                                        <input type="text" name="phone" id="ipt1" class="form-control" />
                                        <label class="input-label" for="ipt1"> Phone: {{ $users->first()->phone }} </label>
                                    </div><br>
                                    <div style="margin-top:-5px;">
                                        <input type="text" name="gender" id="ipt2" class="form-control" />
                                        <label class="input-label" for="ipt2"> Gender: {{ $users->first()->gender }}
                                        </label>
                                    </div><br>
                                    <div style="margin-top:-5px;">
                                        <input type="text" name="country" id="ipt3" class="form-control" />
                                        <label class="input-label" for="ipt3"> Country: {{ $users->first()->country }}
                                        </label>
                                    </div><br>
                                    <div style="margin-top:-5px;">
                                        <input type="date" name="dob" id="ipt4" class="form-control" />
                                        <label class="input-label" for="ipt4"> Date Of Birth:
                                            {{ $users->first()->date_of_birth }} </label>
                                    </div><br>
                                </div>
                                <div class="app-card-buttons">
                                    <button type="submit" class="content-button status-button">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="apps-card mt-3">
                        <div class="app-card">
                            <span>
                                <i class="fas fa-graduation-cap p-2"></i>
                                Your Legal Documents
                            </span>
                            <div class="app-card__subtext">
                                <form action="" class="app-content-form">
                                    <div class="row">
                                        <div style="margin-top:0;">
                                            <input type="text" name="phone" id="ipt1" class="form-control" />
                                            <label class="input-label" for="ipt1"> Phone: {{ $users->first()->phone }} </label>
                                        </div><br>
                                        <div style="margin-top:-5px;">
                                            <input type="text" name="gender" id="ipt2" class="form-control" />
                                            <label class="input-label" for="ipt2"> Gender: {{ $users->first()->gender }}
                                            </label>
                                        </div><br>
                                        <div style="margin-top:-5px;">
                                            <input type="text" name="country" id="ipt3" class="form-control" />
                                            <label class="input-label" for="ipt3"> Country: {{ $users->first()->country }}
                                            </label>
                                        </div><br>
                                        <div style="margin-top:-5px;">
                                            <input type="date" name="dob" id="ipt4" class="form-control" />
                                            <label class="input-label" for="ipt4"> Date Of Birth:
                                                {{ $users->first()->date_of_birth }} </label>
                                        </div><br>
                                    </div>
                                    <div class="app-card-buttons">
                                        <button type="submit" class="content-button status-button">Update</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="app-card">
                            <span>
                                <i class="fas fa-graduation-cap p-2"></i>
                                Your Resume
                            </span>
                            <div class="app-card__subtext">
                                <form action="" class="app-content-form">
                                    <div class="row">
                                        <div style="margin-top:0;">
                                            <input type="text" name="phone" id="ipt1" class="form-control" />
                                            <label class="input-label" for="ipt1"> Phone: {{ $users->first()->phone }} </label>
                                        </div><br>
                                        <div style="margin-top:-5px;">
                                            <input type="text" name="gender" id="ipt2" class="form-control" />
                                            <label class="input-label" for="ipt2"> Gender: {{ $users->first()->gender }}
                                            </label>
                                        </div><br>
                                        <div style="margin-top:-5px;">
                                            <input type="text" name="country" id="ipt3" class="form-control" />
                                            <label class="input-label" for="ipt3"> Country: {{ $users->first()->country }}
                                            </label>
                                        </div><br>
                                        <div style="margin-top:-5px;">
                                            <input type="date" name="dob" id="ipt4" class="form-control" />
                                            <label class="input-label" for="ipt4"> Date Of Birth:
                                                {{ $users->first()->date_of_birth }} </label>
                                        </div><br>
                                    </div>
                                    <div class="app-card-buttons">
                                        <button type="submit" class="content-button status-button">Update</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endsection

@extends('layouts.app')

@section('content')
    <div class="ctrlqFormContentWrapper">
        <div class="ctrlqHeaderMast"></div>
        <div class="ctrlqCenteredContent">
            <div class="ctrlqFormCard">
                <div class="ctrlqAccent"></div>
                <div class="ctrlqFormContent">

                    <form action="" method="post" enctype="multipart/form-data">

                        <div class="row">
                            <div class="input-field col s12 text-center">
                                <h4>Candidate Interview Form</h4>
                                <p>All fields are required</p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="input-field col-12 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder=" "
                                        required>
                                    <label for="exampleFormControlInput1">Frist Name</label>
                                </div>
                                <div id="e1"></div>
                            </div>
                            <div class="input-field col-12 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder=" "
                                        required>
                                    <label for="exampleFormControlInput1">Frist Name</label>
                                </div>
                                <div id="e1"></div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="input-field col-12 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder=" "
                                        required>
                                    <label for="exampleFormControlInput1">Your Email</label>
                                </div>
                                <div id="e2"></div>
                            </div>
                            <div class="input-field col-12 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <select class="form-control validate" id="gender" name="gender" data-error="#e3"
                                        required>
                                        <option value="" disabled selected>Choose Gender</option>
                                        <option>Male</option>
                                        <option>Female</option>
                                    </select>
                                </div>
                                <div id="e3"></div>
                            </div>
                        </div>
                        <hr>

                        <div class="row py-4">
                            <div class="col s12">
                                <div class="form row">
                                    <label for="inputPassword3" class="col-sm-3 col-form-label text-dark">Date of
                                        birth:</label>
                                    <div class="col-sm-9">
                                        <input type="datetime-local" name="selectedDate" class="form-control text-dark"
                                            type="text" id="selectedDate" value="">
                                        <input type="text" id="endDate" value="0" hidden="true">
                                    </div>
                                </div>
                                <hr>
                                <div id="e5"></div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="input-field col-12 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <input type="tel" id="phoneNumber" name="phoneNumber" class="form-control"
                                        id="exampleFormControlInput11" placeholder=" " required>
                                    <label for="exampleFormControlInput11">Phone Number (254)</label>
                                </div>
                                <div id="e2"></div>
                            </div>
                            <div class="input-field col-12 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <select class="form-control validate" id="select-state" id="gender" name="country"
                                        data-error="#e3" placeholder="Pick a country..." required>
                                        <option value="">Pick a country...</option>
                                        <option value="AL">Alabama</option>
                                        <option value="AK">Alaska</option>
                                        <option value="AZ">Arizona</option>
                                        <option value="AR">Arkansas</option>
                                        <option value="CA">California</option>
                                        <option value="CO">Colorado</option>
                                        <option value="CT">Connecticut</option>
                                        <option value="DE">Delaware</option>
                                        <option value="DC">District of Columbia</option>
                                        <option value="FL">Florida</option>
                                        <option value="GA">Georgia</option>
                                        <option value="HI">Hawaii</option>
                                        <option value="ID">Idaho</option>
                                        <option value="IL">Illinois</option>
                                        <option value="IN">Indiana</option>
                                    </select>
                                </div>
                                <div id="e3"></div>
                            </div>
                        </div>
                        <hr>

                        <div class="row py-4">
                            <div class="col s12">
                                <div class="form row">
                                    <label for="inputPassword3" class="col-sm-4 col-form-label text-dark">Education
                                        backgound:</label>
                                    <div class="col-sm-8">
                                        <select class="form-control validate" id="select-state" id="gender"
                                            name="country" data-error="#e3" placeholder="Education Background" required>
                                            <option value="">Pick a background...</option>
                                            <option value="AL">Alabama</option>
                                            <option value="AK">Alaska</option>
                                            <option value="AZ">Arizona</option>
                                            <option value="AR">Arkansas</option>
                                            <option value="CA">California</option>
                                            <option value="CO">Colorado</option>
                                            <option value="CT">Connecticut</option>
                                            <option value="DE">Delaware</option>
                                            <option value="DC">District of Columbia</option>
                                            <option value="FL">Florida</option>
                                            <option value="GA">Georgia</option>
                                            <option value="HI">Hawaii</option>
                                            <option value="ID">Idaho</option>
                                            <option value="IL">Illinois</option>
                                            <option value="IN">Indiana</option>
                                        </select>
                                    </div>
                                </div>
                                <div id="e5"></div>
                            </div>
                        </div>
                        <hr>

                        <div class="row py-4">
                            <div class="input-field col s12">
                                <div class="form-group">
                                    <textarea class="form-control" id="exampleFormControlTextarea11" rows="3" name="bio" data-error="#e6"
                                        required placeholder="Add (list) Proffessional certificates if any"></textarea>
                                </div>
                                <div id="e6"></div>
                            </div>
                        </div>
                        <hr>

                        <div class="row py-4">
                            <div class="col s12">
                                <div class="form row">
                                    <label for="inputGroupSelect04"
                                        class="col-sm-3 col-form-label text-dark">Language:</label>
                                    <div class="col-sm-9">
                                        <select id="inputGroupSelect04" placeholder="Add Language" multiple>
                                            <option value="Tiktok">Kiswahili</option>
                                            <option value="English">English</option>
                                            <option value="French">French</option>
                                            <option value="Arabic">Arabic</option>
                                            <option value="Germern">Germern</option>
                                            <option value="Germern">Chinies</option>
                                        </select>
                                    </div>
                                </div>
                                <div id="e5"></div>
                            </div>
                        </div>
                        <hr>

                        <div class="row py-4">
                            <div class="input-field col s12">
                                <div class="form-group">
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="bio" data-error="#e6"
                                        required placeholder="Add (list) Previous Work Experiences if any"></textarea>
                                </div>
                                <div id="e6"></div>
                            </div>
                        </div>
                        <hr>

                        <div class="row">
                            <div class="input-field col s12">
                                <p for="food_select">Preferred Industry:</p>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="custom-checkbox">
                                            <input type="checkbox" id="customCheck1" name="food" data-error="#e7">
                                            <label for="customCheck1"> &nbsp; Waiters/Waitress</label>
                                        </div>
                                        <div class="custom-checkbox">
                                            <input type="checkbox" id="customCheck2" name="food" data-error="#e7">
                                            <label for="customCheck2"> &nbsp; Chef Helper</label>
                                        </div>
                                        <div class="custom-checkbox">
                                            <input type="checkbox" id="customCheck3" name="food" data-error="#e7">
                                            <label for="customCheck3"> &nbsp; Excavator Operators</label>
                                        </div>
                                        <div class="custom-checkbox">
                                            <input type="checkbox" id="customCheck4" name="food" data-error="#e7">
                                            <label for="customCheck4"> &nbsp; Buldozer Operators</label>
                                        </div>
                                        <div class="custom-checkbox">
                                            <input type="checkbox" id="customCheck5" name="food" data-error="#e7">
                                            <label for="customCheck5"> &nbsp; Grill Manager</label>
                                        </div>
                                        <div class="custom-checkbox">
                                            <input type="checkbox" id="customCheck6" name="food" data-error="#e7">
                                            <label for="customCheck6"> &nbsp; Car Wash Attendant</label>
                                        </div>
                                        <div class="custom-checkbox">
                                            <input type="checkbox" id="customCheck7" name="food" data-error="#e7">
                                            <label for="customCheck7"> &nbsp; Bike Riders and Delivery</label>
                                        </div>
                                        <div class="custom-checkbox">
                                            <input type="checkbox" id="customCheck8" name="food" data-error="#e7">
                                            <label for="customCheck8"> &nbsp; Drivers Category B</label>
                                        </div>
                                        <div class="custom-checkbox">
                                            <input type="checkbox" id="customCheck9" name="food" data-error="#e7">
                                            <label for="customCheck9"> &nbsp; Truck Drivers</label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="custom-checkbox">
                                            <input type="checkbox" id="customCheck10" name="food" data-error="#e7">
                                            <label for="customCheck10"> &nbsp; Baristas</label>
                                        </div>
                                        <div class="custom-checkbox">
                                            <input type="checkbox" id="customCheck11" name="food" data-error="#e7">
                                            <label for="customCheck11"> &nbsp; Buchers</label>
                                        </div>
                                        <div class="custom-checkbox">
                                            <input type="checkbox" id="customCheck12" name="food" data-error="#e7">
                                            <label for="customCheck12"> &nbsp; Dish Wash and Kitchen Helpers</label>
                                        </div>
                                        <div class="custom-checkbox">
                                            <input type="checkbox" id="customCheck13" name="food" data-error="#e7">
                                            <label for="customCheck13"> &nbsp; Hotel Room Cleaners</label>
                                        </div>
                                        <div class="custom-checkbox">
                                            <input type="checkbox" id="customCheck14" name="food" data-error="#e7">
                                            <label for="customCheck14"> &nbsp; Electricians High and Low Current</label>
                                        </div>
                                        <div class="custom-checkbox">
                                            <input type="checkbox" id="customCheck15" name="food" data-error="#e7">
                                            <label for="customCheck15"> &nbsp; Solar Panel Technicians</label>
                                        </div>
                                        <div class="custom-checkbox">
                                            <input type="checkbox" id="customCheck16" name="food" data-error="#e7">
                                            <label for="customCheck16"> &nbsp; House Managers and Nannies</label>
                                        </div>
                                        <div class="custom-checkbox">
                                            <input type="checkbox" id="customCheck17" name="food" data-error="#e7">
                                            <label for="customCheck17"> &nbsp; Nurses</label>
                                        </div>
                                        <div class="custom-checkbox">
                                            <input type="checkbox" id="customCheck18" name="food" data-error="#e7">
                                            <label for="customCheck18"> &nbsp; General Cleaners</label>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>

                        <div class="row">
                            <div class="input-field col s12">
                                <div class="form">
                                    <p for="color">Level of Expxerience</p>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="customRadio1" name="customRadio"
                                            class="custom-control-input" value="">
                                        <label class="custom-control-label" for="customRadio1">Entry Level</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="customRadio2" name="customRadio"
                                            class="custom-control-input" value="">
                                        <label class="custom-control-label" for="customRadio2">Intermediate Level</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="customRadio3" name="customRadio"
                                            class="custom-control-input" value="">
                                        <label class="custom-control-label" for="customRadio3">Experienced Level</label>
                                    </div>
                                </div>
                                <div class="input-field">
                                    <div id="e4"></div>
                                </div>
                            </div>
                        </div>
                        <hr>

                        <div class="row">
                            <div class="input-field col s12">
                                <div class="form">
                                    <p for="color">Do You Have a Police Clearance certificate (max 4 months ago)?</p>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="customRadio1" name="customRadio"
                                            class="custom-control-input" value="">
                                        <label class="custom-control-label" for="customRadio1">Yes</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="customRadio2" name="customRadio"
                                            class="custom-control-input" value="">
                                        <label class="custom-control-label" for="customRadio2">No</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="customRadio3" name="customRadio"
                                            class="custom-control-input" value="">
                                        <label class="custom-control-label" for="customRadio3">Waiting</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="customRadio3" name="customRadio"
                                            class="custom-control-input" value="">
                                        <label class="custom-control-label" for="customRadio3">Older than 4 months (to be
                                            renewed)</label>
                                    </div>
                                </div>
                                <div class="input-field">
                                    <div id="e4"></div>
                                </div>
                            </div>
                        </div>
                        <hr>

                        <div class="row">
                            <div class="input-field col s12">
                                <div class="form">
                                    <p for="color">Do You Have a Valid Passport?</p>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="customRadio1" name="customRadio"
                                            class="custom-control-input" value="">
                                        <label class="custom-control-label" for="customRadio1">Yes</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="customRadio2" name="customRadio"
                                            class="custom-control-input" value="">
                                        <label class="custom-control-label" for="customRadio2">No</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="customRadio3" name="customRadio"
                                            class="custom-control-input" value="">
                                        <label class="custom-control-label" for="customRadio3">Waiting</label>
                                    </div>
                                </div>
                                <div class="input-field">
                                    <div id="e4"></div>
                                </div>
                            </div>
                        </div>
                        <hr>

                        <div class="row py-4">
                            <div class="input-field col s12">
                                <div class="form-group">
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="bio" data-error="#e6"
                                        required placeholder="Add (list) Skills and qualifications if any"></textarea>
                                </div>
                                <div id="e6"></div>
                            </div>
                        </div>
                        <hr>

                        <div class="row py-4">
                            <div class="col s12">
                                <div class="form row">
                                    <label for="inputGroupSelect04" class="col-sm-4 col-form-label text-dark">Where did
                                        you find us:</label>
                                    <div class="col-sm-8">
                                        <select id="inputGroupSelect04" placeholder="Where did you find us" multiple>
                                            <option value="Kiswahili">Tiktok</option>
                                            <option value="Instagram">Instagram</option>
                                            <option value="Facebook">Facebook</option>
                                            <option value="LinkedIn">LinkedIn</option>
                                            <option value="Agents">Agents</option>
                                        </select>
                                    </div>
                                </div>
                                <div id="e5"></div>
                            </div>
                        </div>
                        <hr>

                        <div class="row">
                            <div class="input-field col-12 col-md-6 col-lg-12">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="agents" placeholder=" " required>
                                    <label for="exampleFormControlInput1">Agents Name</label>
                                </div>
                                <div id="e1"></div>
                            </div>
                        </div>
                        <hr>

                        <div class="row">
                            <div class="file-field input-field col s12">
                                <div class="file-upload">
                                    <div class="row">
                                        <div class="col-sm-2">
                                            <span>Browse</span>
                                        </div>
                                        <div class="col-md-10">
                                            <input type="file" id="fileInput" class="file-input file-label"
                                                data-error="#e9" required />
                                            <input class="file-path validate form-control" type="text"
                                                placeholder="Select file to upload">
                                        </div>
                                    </div>
                                </div>
                                <div class="input-field">
                                    <div id="e9"></div>
                                </div>
                            </div>
                        </div>
                        <hr>

                        <div class="row py-4">
                            <div class="col s12">
                                <div class="form row">
                                    <label for="inputPassword3" class="col-sm-3 col-form-label text-dark">When will you be
                                        available to start work in romania:</label>
                                    <div class="col-sm-9">
                                        <input type="datetime-local" name="selectedDate" class="form-control text-dark"
                                            type="text" id="selectedDate" value="">
                                        <input type="text" id="endDate" value="0" hidden="true">
                                    </div>
                                </div>
                                <hr>
                                <div id="e5"></div>
                            </div>
                        </div>

                        <div class="row py-4">
                            <div class="input-field col s12">
                                <div class="form-group">
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="bio" data-error="#e6"
                                        required placeholder="Additional Comments"></textarea>
                                </div>
                                <div id="e6"></div>
                            </div>
                        </div>
                        <hr>

                        <div class="row">
                            <div class="input-field col s12">
                                <div class="form">
                                    <div class="custom-control custom-radio">
                                        <label for="color">Terms and Conditions</label> &nbsp; &nbsp; &nbsp; &nbsp;
                                        <input type="radio" id="customRadio1" name="customRadio"
                                            class="custom-control-input" value="" required>
                                        <label class="custom-control-label" for="customRadio1">Agree</label>
                                    </div>
                                </div>
                                <div class="input-field">
                                    <div id="e4"></div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <br>

                        <div class="col-12">
                            <button class="btn btn-secondary w-100 py-3" type="submit">Submit</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

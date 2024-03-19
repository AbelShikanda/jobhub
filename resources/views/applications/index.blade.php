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
                            <div class="input-field col s12">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder=" "
                                        required>
                                    <label for="exampleFormControlInput1">Your Name</label>
                                </div>
                                <div id="e1"></div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="input-field col s12">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder=" "
                                        required>
                                    <label for="exampleFormControlInput1">Your Email</label>
                                </div>
                                <div id="e2"></div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="input-field col s12">
                                <div class="form-group">
                                    <select class="form-control validate" id="gender" name="gender" data-error="#e3"
                                        required>
                                        <option value="" disabled selected>Choose Gender</option>
                                        <option>Option 1</option>
                                        <option>Option 2</option>
                                        <option>Option 3</option>
                                        <option>Option 4</option>
                                    </select>
                                </div>
                                <div id="e3"></div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="input-field col s12">
                                <div class="form">
                                    <label for="color">Favorite Radio</label>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="customRadio1" name="customRadio"
                                            class="custom-control-input" value="">
                                        <label class="custom-control-label" for="customRadio1">Option 1</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="customRadio2" name="customRadio"
                                            class="custom-control-input" value="">
                                        <label class="custom-control-label" for="customRadio2">Option 2</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="customRadio3" name="customRadio"
                                            class="custom-control-input" value="">
                                        <label class="custom-control-label" for="customRadio3">Option 3</label>
                                    </div>
                                </div>
                                <div class="input-field">
                                    <div id="e4"></div>
                                </div>
                            </div>
                        </div>

                        <div class="row py-4">
                            <div class="col s12">
                                <div class="form row">
                                    <hr>
                                    <label for="inputPassword3" class="col-sm-3 col-form-label text-dark">Date</label>
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
                                    <label for="exampleFormControlTextarea1">Example textarea</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="bio" data-error="#e6" required></textarea>
                                </div>
                                <div id="e6"></div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="input-field col s12">
                                <p for="food_select">Favorite Food</p>
                                <div class="custom-checkbox">
                                    <input type="checkbox" id="customCheck1" name="food" data-error="#e7">
                                    <label for="customCheck1"> &nbsp; Asian</label>
                                </div>
                                <div class="custom-checkbox">
                                    <input type="checkbox" id="customCheck1" name="food" data-error="#e7">
                                    <label for="customCheck1"> &nbsp; Indian</label>
                                </div>
                                <div class="custom-checkbox">
                                    <input type="checkbox" id="customCheck1" name="food" data-error="#e7">
                                    <label for="customCheck1"> &nbsp; Italian</label>
                                </div>
                                <div class="input-field">
                                    <br>
                                    <div id="e7"></div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="file-field input-field col s12">
                                <div class="file-upload">
                                    <span>Browse in your files</span>
                                    <input type="file" id="fileInput" class="file-input file-label" data-error="#e9"
                                        required />
                                    <input class="file-path validate form-control" type="text"
                                        placeholder="Select a file to upload">
                                </div>
                                <div class="input-field">
                                    <div id="e9"></div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- form-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/js/materialize.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.15.0/jquery.validate.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.15.0/additional-methods.min.js"></script>
@endsection

@extends('layouts.app')

<!-- form -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/css/materialize.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

@section('content')

      <div class="ctrlqFormContentWrapper">
        <div class="ctrlqHeaderMast"></div>
        <div class="ctrlqCenteredContent">
          <div class="ctrlqFormCard">
            <div class="ctrlqAccent"></div>
            <div class="ctrlqFormContent">
  
              <form>  
  
                <div class="row">
                  <div class="input-field col s12">
                    <h4>Candidate Interview Form</h4>
                    <p>All fields are required</p>
                  </div>
                </div>
  
                <div class="row">
                  <div class="input-field col s12">
                    <input id="name" name="name" type="text" class="validate" data-error="#e1" required>
                    <label for="name">Your Name</label>
                    <div id="e1"></div>
                  </div>
                </div>
  
                <div class="row">
                  <div class="input-field col s12">
                    <input id="email" name="email" type="text" class="validate" data-error="#e2" required>
                    <label for="email">Your Email</label>
                    <div id="e2"></div>
                  </div>
                </div>
  
                <div class="row">
                  <div class="input-field col s12">
                    <select id="gender" name="gender" class="validate" data-error="#e3" required>           
                      <option value="" disabled selected>Choose Gender</option>
                      <option value="Male">Male</option> 
                      <option value="Female">Female</option>
                    </select>
                    <div id="e3"></div>
                  </div>
                </div>
  
                <div class="row">
                  <div class="input-field col s12">
                    <p for="color">Favorite Color</p>
                    <div>
                      <input name="color" type="radio" id="color_red" value="Red" data-error="#e4" required>
                      <label for="color_red">Red</label>
                    </div>
                    <p>
                      <input name="color" type="radio" id="color_green" value="Green">
                      <label for="color_green">Green</label>
                    </p>
                    <p> 
                      <input name="color" type="radio" id="color_blue" value="Blue">
                      <label for="color_blue">Blue</label>
                    </p>
                    <div class="input-field">
                      <br>
                      <div id="e4"></div>
                    </div>
                  </div>
                </div>
  
                <div class="row">
                  <div class="col s12">
                    <div class="form-group row">
                        <label for="inputPassword3"
                            class="col-sm-3 col-form-label text-dark">Date</label>
                        <div class="col-sm-9">

                            <input type="datetime-local" name="selectedDate"
                                class="form-control text-dark" type="text" id="selectedDate"
                                value="">
                            {{-- 2024-02-25 03:27:00 --}}
                            <input type="text" id="endDate" value="0" hidden="true">
                        </div>
                    </div>
                    <div id="e5"></div>
                  </div>
                </div>
  
  
                <div class="row">
                  <div class="input-field col s12">
                    <textarea id="bio" name="bio" class="materialize-textarea" data-error="#e6" required></textarea>
                    <label for="bio">Short Bio</label>
                    <div id="e6"></div>
                  </div>
                </div>
  
                <div class="row">
                  <div class="input-field col s12">
                    <p for="food_select">Favorite Food</p>
                    <p>
                      <input type="checkbox" name="food" id="food_asian" data-error="#e7" required>
                      <label for="food_asian">Asian</label>
                    </p>
                    <p>
                      <input type="checkbox" name="food" id="food_french">
                      <label for="food_french">French</label>
                    </p>
                    <p> 
                      <input type="checkbox" name="food" id="food_japanese"> 
                      <label for="food_japanese">Japanese</label> 
                    </p>
                    <div class="input-field">
                      <br><div id="e7"></div>
                    </div>
                  </div>
                </div>
  
                <div class="row">
                  <div class="file-field input-field col s12">
                    <div class="btn">
                      <span>Browse</span>
                      <input type="file" data-error="#e9" required>
                    </div>
                    <div class="file-path-wrapper">
                      <input class="file-path validate" type="text" placeholder="Select a file to upload">
                    </div>
                    <div class="input-field">
                      <div id="e9"></div>
                    </div>
                  </div>
                </div>
                
                <div class="row">
                  <div class="file-field input-field col s12">
                    <div class="btn">
                      <span>Browse</span>
                      <input type="file" data-error="#e8" required>
                    </div>
                    <div class="file-path-wrapper">
                      <input class="file-path validate" type="text" placeholder="Select a file to upload">
                    </div>
                    <div class="input-field">
                      <div id="e8"></div>
                    </div>
                  </div>
                </div>
  
                
                <div class="row">
                  <div class="input-field col m6 s12">
                    <button type="submit" class="waves-effect waves-light btn-large"><i class="material-icons right">backup</i>Submit</button>
                  </div>
                </div>
  
              </form>
  
            </div>
          </div>
        </div>
      </div>
  
      <div class="fixed-action-btn" style="bottom: 45px; right: 24px;">
        <a class="btn-floating btn-large red" href="http://www.labnol.org/" target="_blank" title="YouTube Uploader Support">
          <i class="large material-icons">live_help</i>
        </a>
      </div>

      <!-- form-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/js/materialize.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.15.0/jquery.validate.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.15.0/additional-methods.min.js"></script>

@endsection
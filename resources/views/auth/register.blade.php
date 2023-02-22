<div class="modal fade" id="register"  tabindex="-1" aria-labelledby="exampleModalLabel2" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Register</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <!-- Pills navs -->

  <!-- Pills navs -->

  <!-- Pills content -->
  <div class="tab-content">
    <div class="tab-pane fade show active" id="pills-login" role="tabpanel" aria-labelledby="tab-login">
      <form id="register_form" >
        <div class="text-center mb-3 d-flex justify-content-between">
          <p>Register in with:</p>
         <div>
              <button type="button" class="btn btn-link btn-floating ">
            <i class="fab fa-facebook-f"></i>
          </button>

          <button type="button" class="btn btn-link btn-floating ">
            <i class="fab fa-google"></i>
          </button>

          <button type="button" class="btn btn-link btn-floating ">
            <i class="fab fa-twitter"></i>
          </button>

          <button type="button" class="btn btn-link btn-floating ">
            <i class="fab fa-github"></i>
          </button>
         </div>
        </div>

        <!-- Email input -->
        <div class="form-outline mb-2">
            <label class="form-label" for="Name">Name</label>
          <input type="text" id="Name" class="form-control r_fields" />
          <p class="r_error text-danger hidden">Enter A valid Name</p>

        </div>

        <div class="form-outline mb-2">
            <label class="form-label" for="registeremail">Email </label>
          <input type="email" id="registeremail" class="form-control r_fields" />
          <p class="r_error r_email_error text-danger hidden">Enter A valid Email</p>
        </div>

        <div class="form-outline mb-2">
            <label class="form-label" for="registerphone">Phone </label>
          <input type="text" id="registerphone" class="form-control r_fields" />
          <p class="r_error r_phone_error text-danger hidden">Enter A valid Phone Number</p>
        </div>

        <!-- Password input -->
        <div class="form-outline mb-2">
             <label class="form-label" for="registerPassword">Password</label>
          <input type="password" id="registerPassword" class="form-control r_fields" />
          <p class="r_error r_password_error text-danger hidden">Enter A valid Password</p>
        </div>
        
        <div class="form-outline mb-2">
            <label for="image">Profile Pic</label>
            <input type="file" id="image" name="image" class="form-control"/>
        </div>


   <!-- Submit button -->
        <button type="button" id="register_submit_btn" class="btn btn-modelform btn-block mb-4 w-100">Register</button>
        <!-- 2 column grid layout -->
        <!--<div class="row mb-4">-->
        <!--  <div class="col-md-6 d-flex justify-content-center">-->
            <!-- Checkbox -->
        <!--    <div class="form-check mb-3 mb-md-0">-->
        <!--      <input class="form-check-input" type="checkbox" value="" id="loginCheck" checked />-->
        <!--      <label class="form-check-label" for="loginCheck"> Remember me </label>-->
        <!--    </div>-->
        <!--  </div>-->

          <!--<div class="col-md-6 d-flex justify-content-center">-->
            <!-- Simple link -->
          <!--  <a href="#!">Forgot password?</a>-->
          <!--</div>-->
        <!--</div>-->



        <!-- Register buttons -->
        <div class="text-center">
          <p> If already registered,  <a href="#! " data-bs-toggle="modal" data-bs-target="#exampleModal"> Sign in</a></p>
        </div>
      </form>
    </div>

  </div>
  <!-- Pills content -->
        </div>

      </div>
    </div>
  </div>


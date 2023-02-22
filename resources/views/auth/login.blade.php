 <!--Login Modal -->
 <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Sign In</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <!-- Pills navs -->

  <!-- Pills navs -->

  <!-- Pills content -->
  <div class="tab-content">
    <div class="tab-pane fade show active" id="pills-login" role="tabpanel" aria-labelledby="tab-login">
      <form class="" action="#" method="POST" id="login-form">
        <div class="text-center mb-3 d-flex justify-content-between">
          <p>Sign in with:</p>
         <div>
              <button type="button" onclick="window.location='{{route("auth.facebook.redirect")}}'"  class="btn btn-link btn-floating ">
            <i class="fab fa-facebook-f"></i>
          </button>

          <button type="button" onclick="window.location='{{route("auth.google.redirect")}}'" class="btn btn-link btn-floating ">
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
            <label class="form-label" for="loginemail">Email or username</label>
          <input type="email" id="loginemail" name="email" class="form-control l_fields" />
          <p class="l_error l_email_error text-danger hidden">Enter A Valid Email</p>
        </div>

        <!-- Password input -->
        <div class="form-outline mb-2">
             <label class="form-label" for="loginPassword">Password</label>
          <input type="password" name="password" id="loginPassword" class="form-control l_fields" />
          <p class="l_error l_password_error text-danger hidden">Please Fill Password Field</p>
        </div>


   <!-- Submit button -->
        <button type="button" id="login_submit_btn" class="btn btn-modelform btn-block mb-4 w-100">Sign in</button>
        <!-- 2 column grid layout -->
        <div class="row mb-4">
          <div class="col-md-6 d-flex justify-content-center">
            <!-- Checkbox -->
            <div class="form-check mb-3 mb-md-0">
              <input class="form-check-input" type="checkbox" value="" id="loginCheck" checked />
              <label class="form-check-label" for="loginCheck"> Remember me </label>
            </div>
          </div>

          <div class="col-md-6 d-flex justify-content-center">
            <!-- Simple link -->
            <a href="#" id="forget_password">Forgot password?</a>
          </div>
        </div>
        <!-- Register buttons -->
        <div class="text-center">
          <p>Not a member? <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#register">Register</a></p>
        </div>
      </form>
    </div>

  </div>
  <!-- Pills content -->
        </div>

      </div>
    </div>
  </div>
  <!--Password Reset -->
  <div class="modal fade" id="passwordModel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Password Reset</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <!-- Pills navs -->

  <!-- Pills navs -->

  <!-- Pills content -->
  <div class="tab-content">
    <div class="tab-pane fade show active" id="pills-login" role="tabpanel" aria-labelledby="tab-login">
      <form  id="password-form">
        <!-- Email input -->
        <div class="form-outline mb-2">
            <label class="form-label" for="loginemail">Email or username</label>
          <input type="email" id="password_mail"  class="form-control l_fields" />
          <p class="l_error  text-danger" id="p_email_error"></p>
        </div>

   <!-- Submit button -->
        <button type="button" id="password_submit_btn" class="btn btn-modelform btn-block mb-4 w-100">Reset</button>
        <!-- 2 column grid layout -->
      </form>
    </div>

  </div>
  <!-- Pills content -->
        </div>

      </div>
    </div>
  </div>




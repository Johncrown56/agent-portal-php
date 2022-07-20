      <div class="row no-gutters">

        <div class="col-lg-12">
          <!-- Card -->
          <div class="card mb-4 mb-lg-7">
            <div class="card-header">
              <h5 class="card-title">Profile</h5>
            </div>

            <!-- Body -->
            <div class="card-body">
              <form class="js-validate" method="POST">

                <!-- Form Group -->
                <div class="row form-group">
                  <label for="firstNameLabel" class="col-sm-3 col-form-label input-label">Full name</label>

                  <div class="col-sm-9">
                    <div class="input-group">
                      <input type="text" class="form-control" name="firstName" id="firstNameLabel"  required aria-label="Clarice" value="<?php echo $userFirstName;?>">
                      <input type="text" class="form-control" name="lastName" id="lastNameLabel" required aria-label="Boone" value="<?php echo $userLastName;?>">
                    </div>
                  </div>
                </div>
                <!-- End Form Group -->

                <!-- Form Group -->
                <div class="row form-group">
                  <label for="usernameLabel" class="col-sm-3 col-form-label input-label">Username</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" name="username" id="usernameLabel" disabled required aria-label="usernameLabel" value="<?php echo $userUserName;?>">
                </div>
                </div>
                <!-- End Form Group -->   

                <!-- Form Group -->
                <div class="row form-group">
                  <label for="emailLabel" class="col-sm-3 col-form-label input-label">Email</label>
                  <div class="col-sm-9">
                    <input type="email" class="form-control" name="email" id="emailLabel" disabled required aria-label="johndoe@example.com" value="<?php echo $userEmailAddress;?>">
                  </div>
                </div>
                <!-- End Form Group --> 
                
                
              </form>
            </div>
            <!-- End Body -->

            <!-- Footer -->
            <div class="card-footer d-flex justify-content-end">
              <span class="mx-2"></span>
              <button type="submit" name="updateProfile" class="btn btn-primary">Save Changes</button>
            </div>
            <!-- End Footer -->
          </div>
          <!-- End Card -->

          <!-- Card -->
          <div class="card mb-3 mb-lg-5">
            <div class="card-header">
              <h5 class="card-title">Password</h5>
            </div>

            <!-- Body -->
            <div class="card-body">
              <!-- Form -->
              <form class="js-validate" method="POST">
                <!-- Form Group -->
                <div class="row form-group">
                  <label for="currentPasswordLabel" class="col-sm-3 col-form-label input-label">Current password</label>

                  <div class="col-sm-9">
                    <input type="password" class="form-control" name="currentPassword" required id="currentPasswordLabel" placeholder="Enter current password" aria-label="Enter current password">
                  </div>
                </div>
                <!-- End Form Group -->

                <!-- Form Group -->
                <div class="row form-group">
                  <label for="newPassword" class="col-sm-3 col-form-label input-label">New password</label>

                  <div class="col-sm-9">
                    <input type="password" class="form-control" name="newPassword" required id="newPassword" placeholder="Enter new password" aria-label="Enter new password">
                  </div>
                </div>
                <!-- End Form Group -->

                <!-- Form Group -->
                <div class="row form-group">
                  <label for="confirmNewPasswordLabel" class="col-sm-3 col-form-label input-label">Confirm new password</label>

                  <div class="col-sm-9">
                    <div class="mb-3">
                      <input type="password" class="form-control"required name="confirmNewPassword" id="confirmNewPasswordLabel" placeholder="Confirm your new password" aria-label="Confirm your new password">
                    </div>

                    <h5>Password requirements:</h5>

                    <p class="card-text font-size-1">Ensure that these requirements are met:</p>

                    <ul class="font-size-1">
                      <li>Minimum 12 characters long - the more, the better</li>
                      <li>At least one lowercase character</li>
                      <li>At least one uppercase character</li>
                      <li>At least one number, symbol, or whitespace character</li>
                    </ul>
                  </div>
                </div>
                <!-- End Form Group -->

                <div class="d-flex justify-content-end">
                  <a class="btn btn-white" href="javascript:;">Reset</a>
                  <span class="mx-2"></span>
                  <button type="submit" name="changePassword" class="btn btn-primary">Update Password</button>
                </div>
              </form>
              <!-- End Form -->
            </div>
            <!-- End Body -->
          </div>
          <!-- End Card -->
        </div>
      </div>
      <!-- End Row -->

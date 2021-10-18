
<div class="tab-pane fade show active" id="signin" role="tabpanel" aria-labelledby="signin-tab">
    <form id="signin-form" action="{{ url('login') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="singin-email">Email address *</label>
            <input type="email" class="form-control" id="singin-email" name="email" value="<?php echo empty(Cookie::get('email'))? '': Cookie::get('email'); ?>" required>
        </div><!-- End .form-group -->
        
        <div class="form-group">
            <label for="singin-password">Password *</label>
            <input type="password" class="form-control" id="singin-password" name="password" value="<?php echo empty(Cookie::get('password'))? '': Cookie::get('password'); ?>" required>
        </div><!-- End .form-group -->
        
        <div class="form-footer">
            <button type="submit" id="sign-in-btn" class="btn btn-outline-primary-2">
                <span>LOG IN</span>
                <i class="icon-long-arrow-right"></i>
            </button>

            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" name="signin-remember[]" id="signin-remember">
                <label class="custom-control-label" for="signin-remember">Remember Me</label>
            </div><!-- End .custom-checkbox -->

        </div><!-- End .form-footer -->
    </form>
    
</div><!-- .End .tab-pane -->



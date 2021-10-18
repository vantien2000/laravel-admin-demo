
<div class="tab-pane fade" id="register" role="tabpanel" aria-labelledby="register-tab">
    <form id="register_form" action="{{ url('register') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div id="first_name_group" class="form-group">
            <label>Your First Name *</label>
            <input name="first_name" id="first_name" type="text" class="form-control" >
        </div>
        @foreach ($errors->get('first_name') as $error)
            <div class="text text-danger">
            {{ $error }}
            </div>
        @endforeach
        <div id="last_name_group" class="form-group">
            <label>Your Last Name *</label>
            <input  name="last_name" id="last_name" type="text" class="form-control">
        </div>
        @foreach ($errors->get('last_name') as $error)
            <div class="text text-danger">
            {{ $error }}
            </div>
        @endforeach
        <div id="email_group" class="form-group">
            <label for="register-email">Your email address *</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div><!-- End .form-group -->
        @foreach ($errors->get('email') as $error)
            <div class="text text-danger">
            {{ $error }}
            </div>
        @endforeach
        <div id="pasword_group" class="form-group">
            <label for="register-password">Password *</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div><!-- End .form-group -->
        @foreach ($errors->get('password') as $error)
            <div class="text text-danger">
            {{ $error }}
            </div>
        @endforeach
        <div class="form-footer">
            <div class="custom-control custom-checkbox">
                <input name="policy[]" type="checkbox" class="custom-control-input" id="register-policy" value="1">
                <label class="custom-control-label" for="register-policy">I agree to the <a href="#">privacy policy</a> *</label>
            </div><!-- End .custom-checkbox -->
            <button type="submit" id="btn-register" class="btn btn-outline-primary-2">
                <span>SIGN UP</span>
                <i class="icon-long-arrow-right"></i>
            </button>

            
        </div><!-- End .form-footer -->
    </form>
    
</div><!-- .End .tab-pane --> 
@push('ajax')
    <script src="{{ asset('UI/assets/js/ajax.js') }}"></script>
@endpush


@extends('dashboard.authBase')

@section('content')

    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-6">
          <div class="card mx-4">
            <div class="card-body p-4">
                <!--
                 {!! Form::open(['method' => 'POST', 'route' => ['register'], 'novalidate' => 'novalidate', 'class' => 'needs-validation']) !!}

                 <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            <svg class="c-icon">
                              <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-envelope-open"></use>
                            </svg>
                          </span>
                        </div>
                        {{ Form::text('name', old('name'), ['placeholder' => __('register.placeholder_name'), 'required' => 'required', 'class' => ($errors->has('name')) ? 'form-control is-invalid' : 'form-control'])  }}
                      @if($errors->has('name'))
                          <div class="invalid-feedback">
                              {{ $errors->first('name') }}
                          </div>
                      @endif
                    </div>
                    
                <div class="form-group">
                      {!! Form::label('name', __('register.name') . "*", ['class' => 'control-label']) !!}
                      {{ Form::text('name', old('name'), ['placeholder' => __('register.placeholder_name'), 'required' => 'required', 'class' => ($errors->has('name')) ? 'form-control is-invalid' : 'form-control'])  }}
                      @if($errors->has('name'))
                          <div class="invalid-feedback">
                              {{ $errors->first('name') }}
                          </div>
                      @endif
                  </div>
                

                  <div class="form-group">
                      {!! Form::label('email', __('register.email') . "*", ['class' => 'control-label']) !!}
                      {{ Form::text('email', old('email'), ['placeholder' => __('register.placeholder_email'), 'required' => 'required', 'class' => ($errors->has('email')) ? 'form-control is-invalid' : 'form-control'])  }}
                      @if($errors->has('email'))
                          <div class="invalid-feedback">
                              {{ $errors->first('email') }}
                          </div>
                      @endif
                  </div>
                  <div class="form-group">
                                {!! Form::label('password', __('register.password') . "*", ['class' => 'control-label']) !!}
                                {{ Form::password('password', ['autocomplete'=>'off', 'placeholder' => __('register.placeholder_password'), 'required' => 'required', 'class' => ($errors->has('password')) ? 'form-control is-invalid' : 'form-control'])  }}
                                @if($errors->has('password'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('password') }}
                                    </div>
                                @endif
                            </div>

                            <div class="form-group">
                                {!! Form::label('password_confirmation', __('register.password_confirmation') . "*", ['class' => 'control-label']) !!}
                                {{ Form::password('password_confirmation', ['autocomplete'=>'off', 'placeholder' => __('register.placeholder_confirm_new_password'), 'required' => 'required', 'class' => ($errors->has('password_confirmation')) ? 'form-control is-invalid' : 'form-control'])  }}
                                @if($errors->has('password_confirmation'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('password_confirmation') }}
                                    </div>
                                @endif
                            </div>

                <div class="mt-3 text-center">
                    {!! Form::submit(trans('register.button_register'), ['class' => 'btn btn-primary w-sm waves-effect waves-light']) !!}
                    {!! Form::close() !!}
                </div> -->
            
              <form method="POST" action="{{ route('register') }}" class="needs-validation" novalidate="novalidate">
                    @csrf
                    <h1>{{ __('Register') }}</h1>
                    <p class="text-muted">Create your account</p>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            <svg class="c-icon">
                              <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-user"></use>
                            </svg>
                          </span>
                        </div>
                        <input class="form-control {{ ($errors->has('name')) ? 'form-control is-invalid' : 'form-control'}}" type="text" placeholder="{{ __('Name') }}" name="name" value="{{ old('name') }}" required autofocus>
                        @if($errors->has('name'))
                          <div class="invalid-feedback">
                              {{ $errors->first('name') }}
                          </div>
                      @endif
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            <svg class="c-icon">
                              <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-envelope-open"></use>
                            </svg>
                          </span>
                        </div>
                        <input class="form-control" type="text" placeholder="{{ __('E-Mail Address') }}" name="email" value="{{ old('email') }}" required>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            <svg class="c-icon">
                              <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-lock-locked"></use>
                            </svg>
                          </span>
                        </div>
                        <input class="form-control" type="password" placeholder="{{ __('Password') }}" name="password" required>
                    </div>
                    <div class="input-group mb-4">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            <svg class="c-icon">
                              <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-lock-locked"></use>
                            </svg>
                          </span>
                        </div>
                        <input class="form-control" type="password" placeholder="{{ __('Confirm Password') }}" name="password_confirmation" required>
                    </div>
                    <button class="btn btn-block btn-success" type="submit">{{ __('Register') }}</button>
                </form>
            </div>
            <!-- <div class="card-footer p-4">
              <div class="row">
                <div class="col-6">
                  <button class="btn btn-block btn-facebook" type="button">
                    <span>facebook</span>
                  </button>
                </div>
                <div class="col-6">
                  <button class="btn btn-block btn-twitter" type="button">
                    <span>twitter</span>
                  </button>
                </div>
              </div>
            </div> -->
          </div>
        </div>
      </div>
    </div>

@endsection

@section('javascript')

@endsection
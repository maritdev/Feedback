@extends('common_template')
<div class="container-fluid login-page-ui">
        <div class="row login-page-ui-row">
            <div class="col d-flex align-items-center login-lable-bg">
                <div class="login-dotted-top">
                    <img src="./assets/images/dotted-svg.svg" alt="dotted" />
                </div>

                <div class="login-heading">
                    <h1>Let us know what you think!</h1>
                    <div class="cloud-wave-svg">
                        <img src="./assets/images/cloud-wave.svg" alt="cloud wave" />
                        <img src="./assets/images/cloud-wave.svg" alt="cloud wave" />
                    </div>
                </div>
            </div>

            <div class="col d-flex justify-content-center align-items-center flex-column">
                <div class="cloud-wave-svg-single">
                    <img src="./assets/images/cloud-wave.svg" alt="cloud wave" />
                </div>
                <div class="login-form-screen">
                    <span class="warning-notifications">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.</span>

                   @if(Session::has('success'))
                      <div class="alert alert-success">
                        {{ Session::get('success') }}
                       </div>
                   @endif
                    <div class="d-flex justify-content-center position-relative">
                        <form class="login-form-control" method="post" action="feedback">
                            {{csrf_field()}}
                            <div class="mb-3">
                                <label for="examplename" class="form-label"> Name<span>*</span></label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Name" name="name" id="examplename" value="{{ old('name') }}" maxlength = "255">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                               <label for="exampleemail" class="form-label"> Email Address<span>*</span></label>
                               <input type="text" class="form-control @error('email') is-invalid @enderror" placeholder="Email" name="email" id="exampleemail" value="{{ old('email') }}" maxlength = "255">
                               @error('email')
                                   <span class="invalid-feedback" role="alert">
                                       <strong>{{ $message }}</strong>
                                   </span>
                               @enderror
                            </div>
                            <div class="mb-3">
                               <label for="exampleurl" class="form-label"> Website Url </label>
                               <input type="text" class="form-control @error('url') is-invalid @enderror" placeholder="Website Url" name="url" id="exampleurl" value="{{ old('url') }}" maxlength = "255">
                               @error('url')
                                   <span class="invalid-feedback" role="alert">
                                       <strong>{{ $message }}</strong>
                                   </span>
                               @enderror
                            </div>
                            <div class="mb-3">
                               <label for="floatingTextarea2" class="form-label">Your message to us<span>*</span></label>
                               <textarea class="form-control textarea @error('message') is-invalid @enderror" placeholder="Your message to us" name="message" id="floatingTextarea2" maxlength="5000">{{old('message') }}</textarea>
                               @error('message')
                                   <span class="invalid-feedback" role="alert">
                                       <strong>{{ $message }}</strong>
                                   </span>
                               @enderror
                            </div><button type="submit" class="btn btn-primary float-end">Send</button>
                        </form>
                        <div class="login-dotted-bottom">
                            <img src="./assets/images/dotted-svg.svg" alt="dotted" />
                        </div>
                    </div>
                </div>
                <div class="login-footer-logo">
                    <img src="./assets/images/logo.svg" alt="dotted" />
                </div>
            </div>
        </div>
      </div>

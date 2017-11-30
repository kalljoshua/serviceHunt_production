        <div class="modal-body login-block">
                <div class="tab-content">
                    <div class="tab-pane fade in active">
                        <div class="message">
                            <p class="error text-danger"><i class="fa fa-close"></i> You are not Logedin</p>
                            <p class="success text-success"><i class="fa fa-check"></i> You are not Logedin</p>
                        </div>
                        <form action="{{route('user.login.submit')}}" method="post">
                            {{ csrf_field() }}
                            <div class="form-group field-group">
                                <div class="input-user input-icon">
                                    <input type="email" name="email" placeholder="Email Address">
                                </div>
                                <div class="input-pass input-icon">
                                    <input type="password" name="password" placeholder="Password">
                                </div>
                            </div>
                            <div class="forget-block clearfix">
                                <div class="form-group pull-left">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox">
                                            Remember me
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group pull-right">
                                    <a href="#" data-toggle="modal" data-dismiss="modal" data-target="#pop-reset-pass">I forgot username and password</a>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary btn-block">Login</button>
                        </form>
                        <hr>
                        <a href="#" class="btn btn-social btn-bg-facebook btn-block"><i class="fa fa-facebook"></i> login with facebook</a>
                        <a href="#" class="btn btn-social btn-bg-linkedin btn-block"><i class="fa fa-linkedin"></i> login with linkedin</a>
                        <a href="#" class="btn btn-social btn-bg-google-plus btn-block"><i class="fa fa-google-plus"></i> login with Google</a>
                    </div>
                    <!-- Start of the Registration form-->
                    <div class="tab-pane fade">
                        <form action="{{route('user.submit')}}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <div class="field-group">
                                    <div class="input-user input-icon">
                                        <input type="text" name="first_name" placeholder="First Name">
                                    </div>
                                </div>
                                <div class="field-group">
                                    <div class="input-user input-icon">
                                        <input type="text" name="last_name" placeholder="Last Name">
                                    </div>
                                </div>
                                <div class="field-group">
                                    <div class="input-phone input-icon">
                                        <input type="text" name="username" placeholder="Username">
                                    </div>
                                </div>
                                <div class="field-group">
                                    <div class="input-phone input-icon">
                                        <input type="text" name="phone" placeholder="Phone Contact">
                                    </div>
                                </div>
                                <div class="field-group">
                                     <div class="input-email input-icon">
                                        <input type="email" name="email" placeholder="Email">
                                     </div>
                                 </div>

                                <div class="field-group">
                                    <div class="input-pass input-icon">
                                        <input type="password" name="password" placeholder="Password">
                                    </div>
                                </div>
                                
                            </div>
                            <div class="form-group">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox">
                                        I agree with your <a href="#">Terms & Conditions</a>.
                                    </label>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Register</button>
                        </form>
                        <hr>

                        <a href="#" class="btn btn-social btn-bg-facebook btn-block"><i class="fa fa-facebook"></i> login with facebook</a>
                        <a href="#" class="btn btn-social btn-bg-linkedin btn-block"><i class="fa fa-linkedin"></i> login with linkedin</a>
                        <a href="#" class="btn btn-social btn-bg-google-plus btn-block"><i class="fa fa-google-plus"></i> login with Google</a>
                    </div>
                </div>
            </div>



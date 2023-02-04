@csrf
                        <!-- Enter Name -->
                        <div class="row my-4">
                            <label for="name" class="col-md-4 col-form-label text-md-end" style="color: black;">{{ __('Name') }}</label>
                            
                            <!-- Error Alert -->
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" 
                                    value="{{ old('name') }}  @isset($user) {{ $user->name }} @endisset" 
                                        required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Enter Email -->
                        <div class="row my-4">
                            <label for="email" class="col-md-4 col-form-label text-md-end" style="color: black;">{{ __('Email Address') }}</label>

                            <!-- Error Alert -->
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" 
                                    value="{{ old('email') }}  @isset($user) {{ $user->email }} @endisset"
                                        required autocomplete="email" placeholder="Email Address">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Enter Password -->
                        @isset($create)
                        <div class="row my-4">
                            <label for="password" class="col-md-4 col-form-label text-md-end" style="color: black;">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        @endisset

                        
                        <!-- Enter Matric No -->
                        <div class="row my-4">
                            <label for="matric_no" class="col-md-4 col-form-label text-md-end" style="color: black;">{{ __('Matric No') }}</label>
                            
                            <!-- Error Alert -->
                            <div class="col-md-6">
                                <input id="matric_no" type="text" class="form-control @error('matric_no') is-invalid @enderror" name="matric_no" 
                                    value="{{ old('matric_no') }}  @isset($user) {{ $user->matric_no }} @endisset" 
                                        required autocomplete="matric_no" autofocus>

                                @error('matric_no')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Enter Phone No -->
                        <div class="row my-4">
                            <label for="phone_no" class="col-md-4 col-form-label text-md-end" style="color: black;">{{ __('Phone No') }}</label>
                            
                            <!-- Error Alert -->
                            <div class="col-md-6">
                                <input id="phone_no" type="text" class="form-control @error('phone_no') is-invalid @enderror" name="phone_no" 
                                    value="{{ old('phone_no') }}  @isset($user) {{ $user->phone_no }} @endisset" 
                                        required autocomplete="phone_no" autofocus>

                                @error('phone_no')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        

                        <!-- Choose Faculty -->
                        <div class="row my-4">
                            <label for="faculty" class="col-md-4 col-form-label text-md-end" style="color: black;">{{ __('Department') }}</label>
                            
                            <!-- Error Alert -->
                            <div class="col-md-6" style="color: black;">
                                @foreach($faculties as $faculty)
                                <div class="form-check">
                                    <input class="form-check-input" name="faculties[]" type="checkbox" 
                                        value="{{ $faculty->id }}" id="{{ $faculty->name }}" 
                                            @isset($user) @if(in_array($faculty->id, $user->faculties->pluck('id')->toArray())) checked @endif @endisset>
                                    <label class="form-check-label" for="{{ $faculty->name }}">
                                        {{ $faculty->name }}
                                    </label>
                                </div>
                                @endforeach   
                            </div>
                        </div>
                           
                        </div>

                        <!-- Button -->
                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-lg btn-primary px-5 float-center">
                                    {{ __('Confirm') }}
                                </button>
                            </div>
                        </div>
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <label for="hospitalName">اسم المستشفى</label>
                        <input type="text" name="hospital_name" class="form-control" id="hospitalName"
                            placeholder="اسم المستشفى">
                            <span class="text-red">    @error('hospital_name') <strong>{{ $message }}</strong> @enderror </span>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label for="hospitalName">العنوان </label>
                        <input type="text"  name="hospital_address" class="form-control" placeholder="العنوان ">
                        <span class="text-red">    @error('hospital_address') <strong>{{ $message }}</strong> @enderror </span>
                    </div>
                    <div class="col">
                        <label for="hospitalName"> الهاتف</label>
                        <input type="text" name="phone" class="form-control" placeholder="الهاتف ">
                        <span class="text-red">    @error('phone')<strong>{{ $message }}</strong>@enderror </span>
                    </div>
                </div><br>
                <div class="row">
                    <div class="col">
                        <label for="password"> كلمة المرور</label>
                        <input id="password" type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="كلمة المرور"  >
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

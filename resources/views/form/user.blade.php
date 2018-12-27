@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ isset($id) ? __('Edit user') : __('Create user') }}</div>

                <div class="card-body">
                    <form method="post" action="{{ isset($id) ? route('user-update', $id) : route('user-create') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $user->name ?? old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Email') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $user->email ?? old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="role" class="col-md-4 col-form-label text-md-right">{{ __('Select role') }}</label>

                            <div class="col-md-6">
                                <select class="form-control" id="role" name="role">
                                    @foreach ($roles as $role)
                                        @if ($role === ($user->role ?? ''))
                                            <option value="{{ $role }}" selected>{{ $role }}</option>
                                        @else
                                            <option value="{{ $role }}">{{ $role }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>                      
                                             
                        <div class="form-group row">
                            <label for="travel_agency_id" class="col-md-4 col-form-label text-md-right">{{ __('Travel agency id') }}</label>

                            <div class="col-md-6">
                                <input id="travel_agency_id" type="number" class="form-control{{ $errors->has('travel_agency_id') ? ' is-invalid' : '' }}" name="travel_agency_id" value="{{ $user->travel_agency_id ?? old('travel_agency_id') }}" autofocus>
                            </div>
                        </div>

                        @if (isset($id))
                            <div class="form-group row">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="block" id="block" value="1" {{ $isblock == 0 ? '' : 'checked' }}>

                                        <label class="form-check-label" for="block">
                                            {{ __('Block') }}
                                        </label>
                                    </div>
                                </div>
                            </div> 
                        @endif
                        
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ isset($id) ? __('Update') : __('Create') }}
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

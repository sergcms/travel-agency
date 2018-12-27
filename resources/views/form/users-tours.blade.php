@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ isset($id ) ? __('Edit assign the tour to the client') : __('Create assign the tour to the client') }}</div>

                <div class="card-body">
                    <form method="post" action="{{ isset($id) ? route('assign-update', $id) : route('assign-create') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="user_id" class="col-md-4 col-form-label text-md-right">{{ __('User ID') }}</label>

                            <div class="col-md-6">
                                <input id="user_id" type="number" class="form-control{{ $errors->has('user_id') ? ' is-invalid' : '' }}" name="user_id" value="{{ $assign->user_id ?? old('user_id') }}" required autofocus>

                                @if ($errors->has('user_id'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('user_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="tour_id" class="col-md-4 col-form-label text-md-right">{{ __('Tour ID') }}</label>

                            <div class="col-md-6">
                                <input id="tour_id" type="number" class="form-control{{ $errors->has('tour_id') ? ' is-invalid' : '' }}" name="tour_id" value="{{ $assign->tour_id ?? old('tour_id') }}" required autofocus>

                                @if ($errors->has('tour_id'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('tour_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
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

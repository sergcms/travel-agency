@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ isset($id) ? __('Edit tour') : __('Create tour') }}</div>

                <div class="card-body">
                    <form method="post" action="{{ isset($id) ? route('tour-update', $id) : route('tour-create') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="country" class="col-md-4 col-form-label text-md-right">{{ __('Country') }}</label>

                            <div class="col-md-6">
                                <input id="country" type="text" class="form-control{{ $errors->has('country') ? ' is-invalid' : '' }}" name="country" value="{{ $tour->country ?? old('country') }}" required autofocus>

                                @if ($errors->has('country'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('country') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="city" class="col-md-4 col-form-label text-md-right">{{ __('City') }}</label>

                            <div class="col-md-6">
                                <input id="city" type="text" class="form-control{{ $errors->has('city') ? ' is-invalid' : '' }}" name="city" value="{{ $tour->city ?? old('city') }}" required autofocus>

                                @if ($errors->has('city'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('city') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="hotel" class="col-md-4 col-form-label text-md-right">{{ __('Hotel') }}</label>

                            <div class="col-md-6">
                                <input id="hotel" type="text" class="form-control{{ $errors->has('hotel') ? ' is-invalid' : '' }}" name="hotel" value="{{ $tour->hotel ?? old('hotel') }}" required autofocus>

                                @if ($errors->has('hotel'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('hotel') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="food" class="col-md-4 col-form-label text-md-right">{{ __('Food') }}</label>

                            <div class="col-md-6">
                                <input id="food" type="text" class="form-control{{ $errors->has('food') ? ' is-invalid' : '' }}" name="food" value="{{ $tour->food ?? old('food') }}" required autofocus>

                                @if ($errors->has('food'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('food') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="people" class="col-md-4 col-form-label text-md-right">{{ __('Number people') }}</label>

                            <div class="col-md-6">
                                <input id="people" type="number" class="form-control{{ $errors->has('people') ? ' is-invalid' : '' }}" name="people" value="{{ $tour->people ?? old('people') }}" required autofocus>

                                @if ($errors->has('people'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('people') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="price" class="col-md-4 col-form-label text-md-right">{{ __('Price') }}</label>

                            <div class="col-md-6">
                                <input id="price" type="number" class="form-control{{ $errors->has('price') ? ' is-invalid' : '' }}" name="price" value="{{ $tour->price ?? old('price') }}" required autofocus>

                                @if ($errors->has('price'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('price') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="date_start" class="col-md-4 col-form-label text-md-right">{{ __('Date start') }}</label>

                            <div class="col-md-6">
                                <input id="date_start" type="date" class="form-control{{ $errors->has('date_start') ? ' is-invalid' : '' }}" name="date_start" value="{{ $tour->date_start ?? old('date_start') }}" required autofocus>

                                @if ($errors->has('date_start'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('date_start') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="date_end" class="col-md-4 col-form-label text-md-right">{{ __('Date end') }}</label>

                            <div class="col-md-6">
                                <input id="date_end" type="date" class="form-control{{ $errors->has('date_end') ? ' is-invalid' : '' }}" name="date_end" value="{{ $tour->date_end ?? old('date_end') }}" required autofocus>

                                @if ($errors->has('date_end'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('date_end') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="status" class="col-md-4 col-form-label text-md-right">{{ __('Select status') }}</label>

                            <div class="col-md-6">
                                <select class="form-control" id="status" name="status">
                                    @foreach ($collectionStatus as $status)
                                        @if ($status === ($tour->status ?? '')) 
                                            <option value="{{ $status }}" selected>{{ $status }}</option>
                                        @else
                                            <option value="{{ $status }}">{{ $status }}</option>
                                        @endif
                                    @endforeach
                                </select>
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

@extends('layouts.center')

@section('center-content')
<div class="card">
    <div class="card-header">{{ __('Hi') }}</div>
    <div class="card-body">
        <div>
            {{ __('I didn\'t touch Laravel deeply before so you may find this answer simple ') }}
        </div>
        <div>
            {{ __('Please click the Register on top right corner to login as an admin') }}
        </div>
        <div>
            {{ __('Don\'t worry, no email will be actually sent') }}
        </div>
    </div>
</div>
@endsection

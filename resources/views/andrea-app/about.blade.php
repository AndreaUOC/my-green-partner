@extends('layouts.public')
@section('content')

<div class="container-fluid">

    <div class="card-body text-center mt-5 mb-5">
        <p>{{__('transAbout.par1') }}</p>
        <p>{{__('transAbout.par2') }}</p>
        <p>{{__('transAbout.par3') }}</p>
        <p>{{__('transAbout.par4') }}</p>
        <p>{{__('transAbout.par5') }}</p>
    </div>

    <footer>
        <p class="text-center mt-5" >&copy; 2023 My Green Partner. All Rights Reserved.</p>
    </footer>
</div>


@endsection
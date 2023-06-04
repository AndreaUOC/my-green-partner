@extends('layouts.public')
@section('content')

    <div class="container-fluid">
        <div class="mt-5 mb-5">
            <h1 class="display-1 text-center" style="font-family: 'Arial', sans-serif; font-size: 4rem; font-weight: bold; text-transform: uppercase; color: #333; text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);"> My Green Partner</h1>
                <h4 class="text-center"><em> {{__('transApp.SubTitle') }}</em></h4>
                    <p class="mt-4 ">{{__('transApp.Intro.par1') }}</p>
                    <p>{{__('transApp.Intro.par2') }}</p>
                    <p>{{__('transApp.Intro.par3') }}</p>
                    <p>{{__('transApp.Intro.par4') }}</p>
                    <p>{{__('transApp.Intro.par5') }}</p>
            </div>
                <div class="card-body text-center mt-5 mb-5">
                    <nav>
                        <ul>
                            <p><a href="#section1" class="btn btn-success btn-lg" >{{__('transApp.Explore our variety of plants') }}</a></p>
                            <p><a href="#section2" class="btn btn-info btn-lg" >{{__('transApp.Participate in our green community') }}</a></p>
                            <p><a href="#section3" class="btn btn-secondary btn-lg" >{{__('transApp.Be part of our community') }}</a></p>
                        </ul>
                    </nav>
                </div>
            </div>
        <section id="section1" class="mt-5 mb-5">
            <h2 class="display-5" style="font-family: 'Arial', sans-serif; font-size: 2rem; font-weight: bold; color: #333;text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);">{{__('transApp.Find your perfect plant')}}</h2>
                <p>{{__('transApp.Section1.par1') }}</p>
                <p>{{__('transApp.Section1.par2') }}</p>
                <p>{{__('transApp.Section1.par3') }}</p>
                <p>{{__('transApp.Section1.par4') }}</p>
            <p><a href="{{ route('plantTable') }}" class="btn btn-outline-success btn-sm">{{__('transApp.Discover your green partner')}}</a></p>
            <p><a href="{{ route('database') }}" class="btn btn-outline-success btn-sm">{{__('transApp.Take a look in our database')}}</a></p>
        </section>
        <section id="section2" class="mt-5 mb-5">
            <h2 class="display-5" style="font-family: 'Arial', sans-serif; font-size: 2rem; font-weight: bold; color: #333;text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);">{{__('transApp.Join the community')}}</h2>
                <p>{{__('transApp.Section2.par1') }}</p>
                <p>{{__('transApp.Section2.par2') }}</p>
                <p>{{__('transApp.Section2.par3') }}</p>
            <p><a href="{{ route('index') }}" class="btn btn-outline-info btn-sm">{{__('transApp.Share your passion for plants')}}</a></p>
        </section>
        <section id="section3" class="mt-5 mb-5">
            <h2 class="display-5" style="font-family: 'Arial', sans-serif; font-size: 2rem; font-weight: bold; color: #333;text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);">{{__('transApp.Access to your personal space')}}</h2>
                <p>{{__('transApp.Section3.par1') }}</p>
                <p>{{__('transApp.Section3.par2') }}</p>   
                <p>{{__('transApp.Section3.par3') }}</p>
            <p><a href="{{ route('register') }}" class="btn btn-outline-secondary btn-sm">{{__('transApp.Create your personal account')}}</a></p>
        </section>
        <footer>
            <p class="text-center mt-5" >&copy; 2023 My Green Partner. All Rights Reserved.</p>
        </footer>
    </div>

@endsection
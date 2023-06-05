@extends('layouts.public')
@section('content')
{{-- GET->select, POST->insert, PUT->update, DELETE->delete --}}
    <nav class="mt-3 navbar bg-body-tertiary mt-5 mb-5">
        <div class="container-fluid">
            <form class="d-flex" role="search">
                <input class="form-control me-2 col-md-8" name="search" type="search" value="{{ request()->get('search') }}"
                    placeholder="{{__('transPlant.Name of the plant')}}" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">{{__('transLayout.Search')}}</button>
                <a class="btn btn-outline-warning" aria-current="page" href="{{ route('database') }}">{{__('transLayout.Reset')}}</a>
            </form>
        </div>
    </nav>
<div class="table-responsive">
    <table class="table table-striped">
        <tr>
            <th>
                Id
            </th>
            <th>
                Foto
            </th>
            <th>
                {{__('transPlant.Name')}}
            </th>
            <th>
                {{__('transPlant.Watering')}}
            </th>
            <th>
                {{__('transPlant.Sunlight')}}
            </th>
            <th>
                {{__('transPlant.Cycle')}}
            </th>
        </tr>
        @foreach ($plants as $p)
            <tr>
                <td>
                    {{ $p->id }}
                </td>
                <td>
                <img class="img-fluid" style="width: 120px; height: 100px; object-fit: cover;" src="{{ $p->image }}" alt="Imagen">
                </td>
                <td>
                    {{ $p->name }}
                </td>
                <td>
                    {{ __('transPlant.watering.' . Str::lower($p->watering)) }}
                </td>
                <td>
                    @foreach ($p->sunlights as $sunlight)
                        {{ __('transPlant.sunlight.' . Str::lower($sunlight->name)) }}
                        @if (!$loop->last)
                            ,
                        @endif
                    @endforeach
                </td>
                <td>
                    {{ __('transPlant.cycle.' . Str::lower($p->cycle)) }}
                </td>
            </tr>
        @endforeach
    </table>
</div>

    {{ $plants->links('vendor.pagination.bootstrap-5') }}
@endsection

@extends('layouts.public')
@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-12 col-md-3">
                <form method="get" action="{{ route('plantTable') }}">
                    
                    <label for="watering">{{__('transPlant.Watering')}}:</label>
                    @foreach ($watType as $w)
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="watering"
                                {{ request()->get('watering') == $w->watering ? 'checked' : '' }}
                                value="{{ $w->watering }}" id="watering_{{ $w->watering }}">
                            <label class="form-check-label" for="watering_{{ $w->watering }}">
                                {{ __('transPlant.watering.' . Str::lower($w->watering)) }}
                            </label>
                        </div>
                    @endforeach
                    <label for="sunlight">{{__('transPlant.Sunlight')}}:</label>
                    @foreach ($sunlights as $s)
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="sunlight[]"
                                @if (request()->has('sunlight')) {{ in_array($s['id'], request()->get('sunlight')) ? 'checked' : '' }} @endif
                                value="{{ $s['id'] }}" id="sunlight_{{ $s['id'] }}">
                            <label class="form-check-label" for="sunlight_{{ $s['id'] }}">
                                {{ __('transPlant.sunlight.' . Str::lower($s['name'])) }}
                            </label>
                        </div>
                    @endforeach
                    <label for="cycle">{{__('transPlant.Cycle')}}:</label>
                    @foreach ($cyType as $c)
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="cycle"
                                {{ request()->get('cycle') == $c->cycle ? 'checked' : '' }} value="{{ $c->cycle }}"
                                id="cycle_{{ $c->cycle }}">
                            <label class="form-check-label" for="cycle_{{ $c->cycle }}">
                                {{ __('transPlant.cycle.' . Str::lower($c->cycle)) }}
                            </label>
                        </div>
                    @endforeach
                    <div class="mt-3 mb-3">
                        <button type="submit" class="btn btn-success">{{__('transLayout.Submit')}}</button>
                        <a class="btn btn-warning" aria-current="page" href="{{ route('plantTable') }}">{{__('transLayout.Reset')}}</a>
                    </div>
                    </form>
            </div>
            <div class="col col-md-9">
                <div class="table-responsive">
                    <table class="table table-striped">
                    <tr>
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
                            <img src="{{ $p->image }}" class="img-fluid" style="height: 100px; width: 120px; object-fit: cover;" alt="Imagen">
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
                {{ $plants->appends(request()->query())->links('vendor.pagination.bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>

@endsection

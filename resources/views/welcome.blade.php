@extends('layouts.master')

@section('main')
    <h1>All Ads</h1>
    <div class="row">
        <div class="col-3 bg-secondary">
            <ul class="list-group-flush">
                @foreach ($categories as $cat)
                    <li class="list-group-item bg-secondary">
                        <a href="{{ route('welcome') }}?cat={{ $cat->name }}" class="text-light">{{ $cat->name }}</a>
                    </li>
                @endforeach
                <li class="list-group-item bg-secondary">
                    <form action="{{ route('welcome') }}" method="get">
                        <select name="type" class="form-control">
                            <option value="lower" {{ (isset(request()->type) && request()->type == 'lower') ? 'selected' : '' }}>Cene rastuće</option>
                            <option value="upper" {{ (isset(request()->type) && request()->type == 'upper') ? 'selected' : '' }}>Cene opadajuće</option>
                        </select>
                        <button type="submit" class="btn btn-success form-control mt-1">Search</button>
                    </form>
                </li>
                </ul>
        </div>
        <div class="col-9">
            <ul class="list-group">
                @foreach ($all_ads as $ad)
                    <li class="list-group-item">
                        <a href="{{ route('singleAd', ['id' => $ad->id]) }}">{{ $ad->title }}</a>
                        <span class="badge badge-warning float-right p-1">Pregleda {{ $ad->views }}</span>
                        <span class="badge badge-primary badge-pill p-1">{{ $ad->price }} rsd</span>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection
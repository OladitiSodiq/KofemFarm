@extends('layout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 mt-3 mt-md-0">
            <h1>Team Members</h1>
            <a href="{{ route('settings.create_team') }}" class="btn bg-success text-white p-2 px-4 mt-2">Add Team Member</a>
        </div>
    </div>
    <div class="row mt-4">
        @foreach($teamSettings as $teamMember)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="{{ asset('assets/assets/Landing-page/img/' . $teamMember->image) }}" class="card-img-top" alt="{{ $teamMember->name }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $teamMember->name }}</h5>
                        <p class="card-text">{{ $teamMember->designation }}</p>
                        <p>
                            @if($teamMember->twitter)
                                <a href="{{ $teamMember->twitter }}" target="_blank">Twitter</a>
                            @endif
                            @if($teamMember->facebook)
                                <a href="{{ $teamMember->facebook }}" target="_blank">Facebook</a>
                            @endif
                            @if($teamMember->instagram)
                                <a href="{{ $teamMember->instagram }}" target="_blank">Instagram</a>
                            @endif
                            @if($teamMember->linkedin)
                                <a href="{{ $teamMember->linkedin }}" target="_blank">LinkedIn</a>
                            @endif
                        </p>
                        <a href="{{ route('settings.edit_team_member', ['id' => $teamMember->id]) }}" class="btn btn-primary">Edit</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection

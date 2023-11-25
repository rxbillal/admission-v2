@extends('app.layout')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit User</div>
                {{-- {{ $user }} --}}
                {{-- @dd($user); --}}
                <div class="card-body">
                    <form action="{{ route('update-profile', $user->id) }}" method="POST">
                        @csrf
                        {{-- name --}}
                        <div class="form-group">
                            <label for="first_name">First Name</label>
                            <input type="text" name="first_name" id="first_name" class="form-control" value="{{ old('first_name', $user->personalInfo->first_name) }}">
                        </div>
                        <div class="form-group">
                            <label for="last_name">Last Name</label>
                            <input type="text" name="last_name" id="last_name" class="form-control" value="{{ old('last_name', $user->personalInfo->last_name) }}">
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" name="email" id="email" class="form-control" value="{{ old('email', $user->email) }}">
                        </div>

                        <div class="form-group">
                            <label for="Phone">Phone</label>
                            <input type="text" name="phone" id="phone" class="form-control" value="{{ old('phone', $user->personalInfo->phone) }}">
                        </div>

                        <div class="form-group">
                            <label for="Date of birth ">Date of birth</label>
                            <input type="text" name="b_date" id="b_date" class="form-control" value="{{ old('b_date', $user->personalInfo->b_date) }}">
                        </div>

                        <div class="form-group">
                            <label for="edu_type">Subject</label>
                            <input type="text" name="edu_type" id="edu_type" class="form-control" value="{{ old('type', $user->eduInfo->type) }}">
                        </div>
                        <div class="form-group">
                            <label for="blood">Blood</label>
                            <select class="form-control" name="blood" id="blood">
                                @foreach ($bloods as $blood)
                                <option @if ($user->personalInfo->blood == $blood->id)
                                    selected
                                @endif  value="{{ $blood->id }}">{{ $blood->blood_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="country">Country</label>
                            <select class="form-control" name="country" id="country">
                                @foreach ($country as $cou)
                                <option @if ($user->personalInfo->country == $cou->id)
                                    selected
                                @endif  value="{{ $cou->id }}">{{ $cou->country_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="state">City</label>
                            <select class="form-control" name="city" id="city">
                                @foreach ($citys as $city)
                                <option value="{{ $city->id }}">{{ $city->city_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="state">Relation</label>
                            <select class="form-control" name="relation" id="relation">
                                @foreach ($relations as $relation)
                                <option @if ($user->kinInfo->relation == $relation->id)
                                    selected
                                @endif  value="{{ $relation->id }}">{{ $relation->relation_name }}</option>
                                @endforeach
                            </select>
                        </div>

                        {{-- <div class="form-group">
                            <label for="first_name">Book</label>
                            <input type="text" name="first_name" id="first_name" class="form-control" value="{{ old('first_name', $user->first_name) }}">
                        </div>
                        <div class="form-group">
                            <label for="first_name">Grade</label>
                            <input type="text" name="first_name" id="first_name" class="form-control" value="{{ old('first_name', $user->first_name) }}">
                        </div>
                        <div class="form-group">
                            <label for="first_name">Subject</label>
                            <input type="text" name="first_name" id="first_name" class="form-control" value="{{ old('first_name', $user->first_name) }}">
                        </div>
                        <div class="form-group">
                            <label for="t_school">School</label>
                            <input type="text" name="t_school" id="t_school" class="form-control" value="{{ old('t_school', $user->eduInfo->t_school) }}">
                        </div> --}}

                        <button type="submit" class="btn btn-primary" align="right">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

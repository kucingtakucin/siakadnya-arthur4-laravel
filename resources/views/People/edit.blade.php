@extends('layouts.app')
@section('title', 'People Page | Edit')
@section('content')
    <section class="flex-center full-height">
        <div class="content container mt-5 mb-5 pb-5">
            <div class="row justify-content-center">
                <div class="title m-0 font-weight-bold">Update People</div>
                <div class="col-md-8 border shadow rounded-lg p-5">
                    <form action="{{ route('People.update', $person->id) }}" method="post">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label for="cardnumber">Card Number</label>
                            <input type="text" class="form-control  @error('cardnumber') is-invalid @enderror" id="cardnumber" value="{{ $person->cardnumber }}" autoComplete="off"
                                   name="cardnumber">
                            @error('cardnumber')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="firstname">First Name</label>
                            <input type="text" class="form-control  @error('firstname') is-invalid @enderror" id="firstname" value="{{ $person->firstname }}" autoComplete="off"
                                   name="firstname">
                            @error('firstname')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="lastname">Last Name</label>
                            <input class="form-control @error('lastname') is-invalid @enderror" id="lastname" value="{{ $person->lastname }}" autoComplete="off"
                                   name="lastname">
                            @error('lastname')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror"  id="name"
                                   value="{{ $person->name }}" autoComplete="off" name="name">
                            @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="jobtitle">Job Title</label>
                            <input type="text" class="form-control @error('jobtitle') is-invalid @enderror" id="jobtitle"
                                   value="{{ $person->jobtitle }}" autoComplete="off" name="jobtitle">
                            @error('jobtitle')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="year">Year</label>
                            <input type="number" min='0' class="form-control @error('year') is-invalid @enderror" id="year"
                                   value="{{ $person->year }}" autoComplete="off" name="year">
                            @error('year')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <a href="{{ route('People.index') }}" class="btn btn-secondary">Back</a>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection

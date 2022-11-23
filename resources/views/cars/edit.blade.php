@extends('layouts.app-master')

@section('content')
    <div class="bg-light p-5 rounded">

        <div class="container mt-2">
            <div class="row">
                <div class="col-lg-1 margin-tb">
                    <a class="btn btn-primary" href="{{ route('cars.index') }}">Back</a>
                </div>
                <div class="col-lg-9 margin-tb">
                    <div class="pull-left mb-2">
                        <h2>Edit Car  #ID {{ $car->id }}</h2>
                    </div>
                </div>
            </div>
            @if(session('status'))
                <div class="alert alert-success mb-1 mt-1">
                    {{ session('status') }}
                </div>
            @endif
            <form action="{{ route('cars.update',$car->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-xs-6 col-sm-6 col-md-6 mt-3 mb-3">
                        <div class="form-group">
                            <strong>Car Brand:</strong>
                            <input type="text" name="brand" value="{{ $car->brand }}" class="form-control" placeholder="Car Brand">
                            @error('brand')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6 mt-3 mb-3">
                        <div class="form-group">
                            <strong>Car Model:</strong>
                            <input type="text" name="model" value="{{ $car->model }}" class="form-control" placeholder="Car Model">
                            @error('model')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6 mt-3 mb-3">
                        <div class="form-group">
                            <strong>Car Price:</strong>
                            <input type="text" name="price" value="{{ $car->price }}" class="form-control" placeholder="Car Price">
                            @error('price')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6 mt-3 mb-3">
                        <div class="form-group">
                            <strong>Tax Percentage % :</strong>
                            <select name="taxPercentage" class="form-select" aria-label="Default select example">
                                <option value="1" {{ $car->taxPercentage == 14.0 ? 'selected' : '' }}>Local industry tax (14%)</option>
                                <option value="2" {{ $car->taxPercentage == 23.0 ? 'selected' : '' }}>Customs tax for imports (23%)</option>
                                <option value="3" {{ $car->taxPercentage == 37.0 ? 'selected' : '' }}>Electric vehicle tax (37%)</option>

                            </select>
                            @error('taxPercentage')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col text-center">
                        <button type="submit" class="btn btn-primary ml-3">Submit</button>
                    </div>
                </div>
            </form>
        </div>
@endsection

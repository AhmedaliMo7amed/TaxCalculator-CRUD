@extends('layouts.app-master')

@section('content')
        <div class="bg-light p-5 rounded">

        <div class="container mt-2">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left mb-2">
                        <h2>Add New Car</h2>
                    </div>
                    <div class="pull-right">
                        <a class="btn btn-primary" href="{{ route('cars.index') }}"> Back</a>
                    </div>
                </div>
            </div>
            @if(session('status'))
                <div class="alert alert-success mb-1 mt-1">
                    {{ session('status') }}
                </div>
            @endif
            <form action="{{ route('cars.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-xs-6 col-sm-6 col-md-6 mt-3 mb-3">
                        <div class="form-group">
                            <strong>Car Brand:</strong>
                            <input type="text" name="brand" class="form-control" placeholder="Car Brand">
                            @error('brand')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6 mt-3 mb-3">
                        <div class="form-group">
                            <strong>Car Model:</strong>
                            <input type="text" name="model" class="form-control" placeholder="Car Model">
                            @error('model')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6 mt-3 mb-3">
                        <div class="form-group">
                            <strong>Car Price:</strong>
                            <input type="text" name="price" class="form-control" placeholder="Car Price">
                            @error('price')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6 mt-3 mb-3">
                        <div class="form-group">
                            <strong>Tax Percentage % :</strong>
                            <select name="taxPercentage" class="form-select" aria-label="Default select example">
                                <option selected>Open this select menu</option>
                                <option value="1">Local industry tax (14%)</option>
                                <option value="2">Customs tax for imports (23%)</option>
                                <option value="3">Electric vehicle tax (37%)</option>
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
            </form>

    </div>
@endsection

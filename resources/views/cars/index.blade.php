@extends('layouts.app-master')

@section('content')
    <div class="bg-light p-5 rounded">

        <div class="container mt-2">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2>List Of Your Cars</h2>
                    </div>
                </div>
            </div>
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif
            <table class="table table-bordered">
                <tr>
                    <th>#ID</th>
                    <th>Car Model</th>
                    <th>Car Brand</th>
                    <th>Car Price</th>
                    <th>Tax % </th>
                    <th>Tax Cost</th>
                    <th>Total Price</th>
                    <th width="280px">Action</th>
                </tr>
                @foreach ($cars as $car)
                    <tr>
                        <td>{{ $car->id }}</td>
                        <td>{{ $car->model }}</td>
                        <td>{{ $car->brand }}</td>
                        <td>{{ $car->price }}</td>
                        <td>{{ $car->taxPercentage }}</td>
                        <td>{{ $car->taxCost }}</td>
                        <td>{{ $car->total }}</td>
                        <td>
                            <form action="{{ route('cars.destroy',$car->id) }}" method="Post">
                                <a class="btn btn-primary" href="{{ route('cars.edit',$car->id) }}">Edit</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
    </div>
@endsection

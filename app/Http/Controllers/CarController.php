<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Car;
use Illuminate\Support\Facades\Auth;

class CarController extends Controller
{
    // return all cars to index view with order by id (desc) &  with 5 elements in the page
    public function index(){
        $data['cars'] = Car::where('user_id',Auth::user()->id)->orderBy('id','asc')->paginate(20);
        return view('cars.index', $data);
    }

    // go to create new car view
    public function create(){
        return view('cars.create');
    }

    // add new company with validation
    public function store(Request $request){
        $user = User::find(Auth::user()->id);
        // validat requird data
        $request->validate([
            'model' => 'required',
            'brand' => 'required|string',
            'price' => 'required|integer',
            'taxPercentage' => 'required'
        ]);

        // new object from car model **
        $car = new Car();

        // passing request entities to the model
        switch($request->taxPercentage) {
            case('1'):
            $taxP = 14.0;
            break;
            case('2'):
            $taxP = 23.0;
            break;
            case('3'):
            $taxP = 37.0;
            break;
            default:
            $taxP = 0.0;
        }

        // calculate tax

        $tmp_orgPrice = $request->price;
        $tmp_taxCost = $tmp_orgPrice * ($taxP / 100) ;
        $tmp_total = $tmp_orgPrice + $tmp_taxCost;

        $car->model = $request->model;
        $car->brand = $request->brand;
        $car->price = $request->price;
        $car->taxPercentage = $taxP;
        $car->taxCost = $tmp_taxCost;
        $car->total = $tmp_total;

        // save the record to the db
        $user->car()->save($car);

        // redirect to index view with success msg
        return redirect()->route('cars.index')->with('success','Car has been created successfully.');
    }

    public function show(Car $car){
        // show specific car
        return view('cars.show',compact('car'));
    }


    // go to edit route with the $car var
    public function edit(Car $car){
        return view('cars.edit',compact('car'));
    }

    // update car details
    public function update(Request $request, $id){
        $user = User::find(Auth::user()->id);
        // validat requird data
        $request->validate([
            'model' => 'required',
            'brand' => 'required|string',
            'price' => 'required|integer',
            'taxPercentage' => 'required'
        ]);

        // get car record from model by -> id
        $car = Car::find($id);

        // passing request entities to the model
        switch($request->taxPercentage) {
            case('1'):
                $taxP = 14.0;
                break;
            case('2'):
                $taxP = 23.0;
                break;
            case('3'):
                $taxP = 37.0;
                break;
            default:
                $taxP = 0.0;
        }

        // calculate tax

        $tmp_orgPrice = $request->price;
        $tmp_taxCost = $tmp_orgPrice * ($taxP / 100) ;
        $tmp_total = $tmp_orgPrice + $tmp_taxCost;

        $car->model = $request->model;
        $car->brand = $request->brand;
        $car->price = $request->price;
        $car->taxPercentage = $taxP;
        $car->taxCost = $tmp_taxCost;
        $car->total = $tmp_total;

        // update new values
        $car->update();

        return redirect()->route('cars.index')->with('success','Car Has Been updated successfully');
    }

    // delete specific car
    public function destroy(Car $car)
    {
        $car->delete();
        return redirect()->route('cars.index')->with('success','Car has been deleted successfully');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Command;
use App\Models\Meal;
use App\Models\Menu;
use App\Models\Reserve;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use LDAP\Result;

class PageController extends Controller
{
    protected static $user;

    public function __construct()
    {
        self::$user = Auth::guard('client')->user();
    }

    public function verify(Request $request)
    {

        for($i=1 ;$i< 21 ; $i++){
            $client = Client::find($i);
            $client->password = Hash::make($client->password);
            $client->update();
        }
        
        if($request->role == 1){
            //dd($request);
            return redirect()->route('clientLogin',$request);
        }
        return view('orbitPages.home', compact('dishes', 'restaurants','client'));
    }

    public function home(Request $request)
    {
        $dishes = Meal::all();
        $restaurants = Restaurant::all();
        $client = self::$user;

        dd($client);
        return view('orbitPages.home', compact('dishes', 'restaurants','client'));
    }

    public function dishes()
    {
        $dishes = Meal::all();
        $client = self::$user;
        return view('orbitPages.clients.dishes', compact('dishes','client'));
    }

    public function restaurant()
    {
        $restaurants = Restaurant::all();
        $client = self::$user;
        return view('orbitPages.clients.restaurants', compact('restaurants','client'));
    }

    public function profile()
    {
        $client = self::$user;
        //dd($client->commands[0]->menu->meal);
        return view('orbitPages.clients.profile', compact('client'));
    }

    public function reserve(Request $res)
    {
        $restaurant = Restaurant::find($res->id);
        $client = self::$user;
        return view('orbitPages.clients.reservation', compact('restaurant', 'client'));
    }

    public function login()
    {
        return view('orbitPages.door.login');
    }

    public function toregister()
    {
        return view('orbitPages.door.register');
    }

    public function register()
    {
        return view('orbitPages.door.login');
    }

    public function resList(Request $request)
    {
        $dishe = Meal::find($request->id);
        $client = self::$user;
        return view('orbitPages.clients.restaurant-list', compact('dishe','client'));
    }

    public function command(Request $request)
    {
        $menu = Menu::find($request->id);
        $client = self::$user;
        return view('orbitPages.clients.command', compact('menu', 'client'));
    }

    public function storingCommand(Request $comm)
    {
        $comm->validate([
            'date' => 'required',
        ]);
        //dd($comm);
        Command::create([
            'menus_id' => $comm->idmenu,
            'clients_id' => $comm->idclt,
            'Targetdate' => $comm->date,
            'Canceldate' => $comm->date,
            'numOfSites' => 1,
            'transactionID' => '1123433',
            'status' => 'good',
            'cost' => $comm->price
        ]);
        return redirect()->route('home.dishes');
    }

    public function storingReserve(Request $res)
    {
        $res->validate([
            'date' => 'required',
        ]);
        //dd($res);
        Reserve::create([
            'restaurants_id' => $res->idrest,
            'clients_id' => $res->idclt,
            'Targetdate' => $res->date,
            'Canceldate' => $res->date,
            'numOfSites' => 1,
            'transactionID' => '1123433',
            'status' => 'good',
            'cost' => $res->price
        ]);
        return redirect()->route('home.restaurant');
    }

    public function menu(Request $res)
    {
        $restaurant = Restaurant::find($res->id);
        $client = self::$user;
        return view('orbitPages.clients.menu', compact('restaurant','client'));
    }

    public function deletReservation(Request $del) 
    {
        Reserve::find($del->id)->delete();
        return redirect()->route('home.profile');
    }

    public function deletCommand(Request $del) 
    {
        Command::find($del->id)->delete();
        return redirect()->route('home.profile');
    }
}
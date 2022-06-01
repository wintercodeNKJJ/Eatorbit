<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Command;
use App\Models\Manager;
use App\Models\Meal;
use App\Models\Menu;
use App\Models\Reserve;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use LDAP\Result;

class PageController extends Controller
{

    public function resetfunction()
    {
        for($i=1 ;$i< 21 ; $i++){
            $client = Manager::find($i);
            $client->password = Hash::make($client->password);
            $client->update();
        }
    }

    public function verify(Request $request)
    {      
        if($request->role == 1){
            return redirect()->route('clientLogin',$request);
        }else{

            // $this->resetfunction();
            // $manager = Manager::find(18);
            // $restaurants = null;
            // $Menu = Restaurant::find($request->id);
            // //dd($manager->restaurants[0]->menus);
            // return view('orbitPages.manager.1manager',compact('manager','Menu','restaurants'));
            return redirect()->route('managerLogin',$request);
        }
    }

    public function verifyRegister(Request $request)
    {      
        if($request->role == 1){
                $request->validate([
                    'name' => 'required',
                    'email' => 'required|email',
                    'password' => 'required',
                    'address' => 'required',
                    'phone' => 'required',
                    'profilePicture' => 'required|image|mimes:png,jpg|max:5048',
                ]);
                
                //dd($request);
        
                $newImageName = time().$request->file('profilePicture')->getClientOriginalName();
                $request->profilePicture->move(public_path('images/clients'),$newImageName);
                
                //dd($request);
                Client::create([
                    'profilePicture' => $newImageName,
                    'name' => $request->name,
                    'email' => $request->email,
                    'email_verified_at' => now(),
                    'remember_token' => Str::random(10),
                    'password' => Hash::make($request->password),
                    'address' => $request->address,
                    'phone' => $request->phone,
                ]);

                //dd($request);
        
                return redirect()->route('door.login');
        }else{
            
            $request->validate([
                'name' => 'required',
                'email' => 'required|email',
                'password' => 'required',
                'address' => 'required',
                'phone' => 'required',
                'profilePicture' => 'required|image|mimes:png,jpg|max:5048',
            ]);
            
            //dd($request);
    
            $newImageName = time().$request->file('profilePicture')->getClientOriginalName();
            $request->profilePicture->move(public_path('images/clients'),$newImageName);
            
            //dd($request);
            Manager::create([
                'profilePicture' => $newImageName,
                'name' => $request->name,
                'email' => $request->email,
                'email_verified_at' => now(),
                'remember_token' => Str::random(10),
                'password' => Hash::make($request->password),
                'address' => $request->address,
                'phone' => $request->phone,
            ]);

            //dd($request);
    
            return redirect()->route('door.login');
        }
    }

    public function home(Request $request)
    {
        $dishes = Meal::all();
        $restaurants = Restaurant::all();
        $client = Auth::guard('client')->user();

        return view('orbitPages.home', compact('dishes', 'restaurants','client'));
    }

    public function dishes()
    {
        $dishes = Meal::all();
        $client = Auth::guard('client')->user();;
        return view('orbitPages.clients.dishes', compact('dishes','client'));
    }

    public function restaurant()
    {
        $restaurants = Restaurant::all();
        $client = Auth::guard('client')->user();;
        return view('orbitPages.clients.restaurants', compact('restaurants','client'));
    }

    public function profile()
    {
        $client = Auth::guard('client')->user();;
        //dd($client->commands[0]->menu->meal);
        return view('orbitPages.clients.profile', compact('client'));
    }

    public function reserve(Request $res)
    {
        $restaurant = Restaurant::find($res->id);
        $client = Auth::guard('client')->user();;
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
        return view('orbitPages.door.register');
    }

    public function resList(Request $request)
    {
        $dishe = Meal::find($request->id);
        $client = Auth::guard('client')->user();;
        return view('orbitPages.clients.restaurant-list', compact('dishe','client'));
    }

    public function command(Request $request)
    {
        $menu = Menu::find($request->id);
        $client = Auth::guard('client')->user();;
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
        $client = Auth::guard('client')->user();;
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


    //Manager pages

    public function managerLogin()
    {
        return view('orbitPages.manager.1manager');
    }

    //restaurant reservations
    public function reserves(Request $request)
    {   
        $manager = Auth::guard('manager')->user();;
        $restaurants = Restaurant::find($request->id);
        return view('orbitPages.manager.1manager',compact('manager','restaurants'));
    }

    public function retaurantmenu(Request $request)
    {   
        $manager = Auth::guard('manager')->user();;
        $Menu = Restaurant::find($request->id);
        return view('orbitPages.manager.1manager',compact('manager','Menu'));
    }

    public function restauranredit(Request $request)
    {   
        $manager = Auth::guard('manager')->user();;
        $restaurants = Restaurant::find($request->id);
        return view('orbitPages.manager.1editrestaurant',compact('manager','restaurants'));
    }

    public function restaurantdelet(Request $request)
    {   
        Manager::find($request->id)->delet();
        return view('orbitPages.manager.1manager',compact('manager'));
    }

    public function addRestaurant(Request $request)
    {
        return view('orbitPages.manager.1addrestaurant');
    }

    public function restauranreditdish(Request $request)
    {
        $dish = Meal::find($request->id);
        return view('orbitPages.manager.1editdish',compact('dish'));
    }

    public function restaurantdeletdish(Request $request)
    {
        Menu::where('id',$request->id)->delete();
        return redirect()->route('manager.home');
    }

    public function restaurantdeletreserv(Request $request)
    {
        Reserve::find($request->id)->delete();
    }

    public function managerhome(Request $request)
    {
        $manager = Auth::guard('manager')->user();
        $Menu = Restaurant::find($request->id);
        return view('orbitPages.manager.1manager',compact('Menu','manager'));
    }
    
    
    public function addMeal()
    {
        return view('orbitPages.manager.1adddish');
    }
}
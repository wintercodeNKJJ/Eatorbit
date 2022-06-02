<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Command;
use App\Models\Manager;
use App\Models\Meal;
use App\Models\Menu;
use App\Models\Notice;
use App\Models\Reserve;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use LDAP\Result;

class PageController extends Controller
{

    public function resetfunction()
    {
        $pics = array(1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25);
        for($i=1 ;$i< 111 ; $i++){
            $client = Manager::find($i);
            $j = $pics[array_rand($pics,1)];
            $client->profilePicture = $j;
            $client->update();
        }
    }

    public function verify(Request $request)
    {      
        if($request->role == 1){
            //$this->resetfunction();
            //dd('done');
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

    /**
     * permites the registration of either a client or a manager
     * @param request should contain the user or manager to be created
     */
    public function verifyRegister(Request $request)
    {      
        if($request->role == 1){
                $request->validate([
                    'name' => 'required',
                    'email' => 'required|email',
                    'password' => 'required',
                    'address' => 'required',
                    'phone' => 'required',
                    'profilePicture' => 'required|image|mimes:jpeg|max:5048',
                ]);
                
                //dd($request);
                $file = $request->file('profilePicture')->getClientOriginalName();
                $filename = pathinfo($file, PATHINFO_FILENAME);
                //dd($filename);


                
                $newImageName = time().$request->file('profilePicture')->getClientOriginalName();
                $request->profilePicture->move(public_path('images/clients'),$newImageName);
                
                //dd($request);
                Client::create([
                    'profilePicture' => time().$filename,
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
                'profilePicture' => 'required|image|mimes:jpeg|max:5048',
            ]);
            
            //dd($request);
            $file = $request->file('profilePicture')->getClientOriginalName();
            $filename = pathinfo($file, PATHINFO_FILENAME);
    
            $newImageName = time().$request->file('profilePicture')->getClientOriginalName();
            $request->profilePicture->move(public_path('images/clients'),$newImageName);
            
            //dd($request);
            Manager::create([
                'profilePicture' => time().$filename,
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

    /**
     * a client is ridirected to this window afrter registration
     * @param request i dont know what it contains yet
     */
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
        //dd($restaurants->reserves);
        return view('orbitPages.manager.1manager',compact('manager','restaurants'));
    }

    public function restaurantmenu(Request $request)
    {   
        $manager = Auth::guard('manager')->user();
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
        $menu = Menu::find($request->id);
        $dish = $menu->meal;
        $manager = Auth::guard('manager')->user();
        return view('orbitPages.manager.1editdish',compact('dish','manager'));
    }

    public function restaurantdeletdish(Request $request)
    {
        Menu::where('id',$request->id)->delete();
        return redirect()->route('manager.home');
    }

    /**
     * permits a manager to deletes a reservation made by a client in restaurant
     * @param request contains the resrvation id
     * searches the resrvation and deletes it
     */
    public function restaurantdeletreserv(Request $request)
    {
        Reserve::find($request->id)->delete();
        return redirect()->route('manager.home');
    }

    /**
     * sends us to the manager home view with or without a restaurant menu to show
     * @param request shold contain thre restaurant id
     */
    public function managerhome(Request $request)
    {
        $manager = Auth::guard('manager')->user();
        $Menu = Restaurant::find($request->id);
        return view('orbitPages.manager.1manager',compact('Menu','manager'));
    }
    
    /**
     * permites a manager to add a meal to a particular restaurant
     * @param request contains the informations related to the specific restaurant
     */
    public function addMeal(Request $request)
    {
        return view('orbitPages.manager.1adddish');
    }
}
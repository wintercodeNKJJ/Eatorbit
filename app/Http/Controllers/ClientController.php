<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Manager;
use App\Models\Menu;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index(){
        return view('testsf.page');
    }
    
    public function clients(){
        $clients = Client::all();
        //dd($clients[0]->reserves[0]->restaurant);
        return view('testsf.showers.client',compact('clients'));
        // dd('clients');
    }

    public function menu(){
        $clients = Menu::all();
        //dd($clients[2]->restaurant);
        return view('testsf.showers.menu',compact('clients'));
        dd('menu');
    }

    public function manager(){
        $clients = Manager::all();
        return view('testsf.showers.manager',compact('clients'));
        dd('manager');
    }

    public function modify(Request $item){
        $client = Client::find($item->id);
        return view('testsf.showers.modify',compact('client'));
        dd('manager');
    }

    public function stor(Request $item){
        $client = Client::find($item->id);
        $item->validate([
            'image' => 'required|image|mimes:png,jpg|max:5048'
        ]);
        $newImageName = time().$item->file('image')->getClientOriginalName();
        $item->image->move(public_path('images/clients'),$newImageName);
        $client->profilePicture = $newImageName;
        $client->update();
        return redirect()->route('info.clients');
    }
}
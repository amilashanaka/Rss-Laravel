<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Channel;

class HomeController extends Controller
{
    public function index(){
        $table_data = Channel::all();
        return view('index', compact('table_data'));
    }

    public function store(Request $request){
        $xml = simplexml_load_file($request->filename);
        if (empty($xml)) {
            return 'empty'; 
        }
        
        $channel = Channel::create([
            'title' => $xml->channel->title,
            'link' => $xml->channel->link,
            'description' => $xml->channel->description,
        ]);

        foreach ($xml->channel->item as $feed_item) {

            $channel->items()->create([
                'title' => $feed_item->title,
                'link' => $feed_item->link,
                'description' => $feed_item->description,
            ]);


        }

        return redirect('/');

    }

    public function view($id){
        $channel = Channel::find($id);
        return view('view', compact('channel'));

    }
}

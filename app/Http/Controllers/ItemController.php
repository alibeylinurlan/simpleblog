<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Http\Requests\StoreItemRequest;
use App\Http\Requests\UpdateItemRequest;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Item::orderByDesc('id')
            ->paginate(3)
            ->fragment('item');

        return view('pages.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function info($name, $id)
    {
        $id = $id/4321;

        $item = Item::find($id);
        if ($item == null) {
            return redirect()->route('index');
        }
        $datas = [];
        foreach ($item->texts as $text)
        {
            $datas += [$text->order => $text->text];
        }
        foreach ($item->photos as $photo)
        {
            $datas += [$photo->order => $photo->photo_link.'--photo--'];
        }
        foreach ($item->videos as $video)
        {
            $datas += [$video->order => $video->video_link.'--photo--'];
        }
        foreach ($item->otherlinks as $otherlink)
        {
            $datas += [$otherlink->order => $otherlink->link.'--link--||||'.$otherlink->link_text];
        }

        ksort($datas);

        $similars = Item::query()->where('category', $item->category)->inRandomOrder()->limit(7)->get();
        $similars = $similars->shuffle();

        return view('pages.info',
            compact(
                'item',
                'datas',
                'similars'
            ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreItemRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreItemRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateItemRequest  $request
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateItemRequest $request, Item $item)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
        //
    }
}

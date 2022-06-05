<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Crud extends Controller
{
    public function index()
    {
        $categories = Item::query()
            ->whereNotNull('category')
            ->distinct()
            ->pluck('category')
            ->toArray();

        return view('dashboard', compact('categories'));
    }

    public function add(Request $r)
    {
        DB::transaction(function () use($r) {
            $item = new Item;
            $item->header = $r->header;
            $item->slogan = $r->slogan;
            $item->body = $r->body;
            $item->category = $r->newcategory == null ? $r->category : $r->newcategory;
            $item->reference_link = $r->reference_link;
            $item->save();

            foreach ($r->foto_link as $foto_link)
            {
                $image = new Photo;
                $image->item_id = $item->id;
                $image->foto_link = $foto_link;
                $image->save();
            }
            if (isset($r->video_link))
            {
                foreach ($r->video_link as $video_link)
                {
                    $video = new Photo;
                    $video->item_id = $item->id;
                    $video->video_link = $video_link;
                    $video->save();
                }
            }
        });
        return redirect()->route('index');
    }

    public function edit(Request $r)
    {
        $item = Item::find($r->id);
        $foto_links = $item->photos->whereNotNull('foto_link')->pluck('foto_link')->toArray();
        $video_links = $item->photos->whereNotNull('video_link')->pluck('video_link')->toArray();

        $categories = Item::query()
            ->whereNotNull('category')
            ->distinct()
            ->pluck('category')
            ->toArray();

        return view('pages.edit.item',
            compact(
            'item',
            'categories',
            'foto_links',
                'video_links'
            )
        );
    }


    public function uptade(Request $r)
    {

        DB::transaction(function () use($r) {
            $photos = Photo::where('item_id', $r->id)->delete();
            $old_item = Item::find($r->id)->delete();

            $item = new Item;
            $item->header = $r->header;
            $item->slogan = $r->slogan;
            $item->body = $r->body;
            $item->category = $r->newcategory == null ? $r->category : $r->newcategory;
            $item->reference_link = $r->reference_link;
            $item->save();

            foreach ($r->foto_link as $foto_link)
            {
                $image = new Photo;
                $image->item_id = $item->id;
                $image->foto_link = $foto_link;
                $image->save();
            }
            if (isset($r->video_link))
            {
                foreach ($r->video_link as $video_link)
                {
                    $video = new Photo;
                    $video->item_id = $item->id;
                    $video->video_link = $video_link;
                    $video->save();
                }
            }
        });
        return redirect()->route('index');
    }

    public function delete(Request $r)
    {
        DB::transaction(function () use($r) {
            $photos = Photo::where('item_id', $r->id)->delete();
            $old_item = Item::find($r->id)->delete();
        });
        return redirect()->route('index');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\OtherLink;
use App\Models\Photo;
use App\Models\Item;
use App\Models\Text;
use App\Models\Video;
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
        $r->validate([
            'header_photo_link' => 'required|unique:items|max:254',
            'photo_links' => 'max:254',
            'video_links' => 'max:254',
        ]);

        DB::transaction(function () use($r) {
            $item = new Item;
            $item->header = $r->header;
            $item->slogan = $r->slogan;
            $item->header_photo_link = $r->header_photo_link;
            $item->category = $r->newcategory == null ? $r->category : $r->newcategory;
            $item->save();

            if (isset($r->photo_links))
            {
                foreach ($r->photo_links as $photo_link) {
                    $image = new Photo;
                    $image->item_id = $item->id;
                    $image->photo_link = $photo_link;
                    $image->save();
                }
            }
            if (isset($r->video_links))
            {
                foreach ($r->video_links as $video_link)
                {
                    $video = new Video;
                    $video->item_id = $item->id;
                    $video->video_link = $video_link;
                    $video->save();
                }
            }
            if (isset($r->texts))
            {
                foreach ($r->texts as $text)
                {
                    $video = new Text;
                    $video->item_id = $item->id;
                    $video->text = $text;
                    $video->save();
                }
            }
        });
        return redirect()
            ->route('index')
            ->with('success', 'Item added successfully!');
    }

    public function edit(Request $r)
    {
        $item = Item::find($r->id);
        $photo_links = $item->photos->whereNotNull('photo_link')->pluck('photo_link')->toArray() ?? [];
        $video_links = $item->videos->whereNotNull('video_link')->pluck('video_link')->toArray() ?? [];
        $texts = $item->texts->whereNotNull('text')->pluck('text')->toArray() ?? [];
        $other_links = $item->otherlinks->whereNotNull('link')->pluck('link')->toArray() ?? [];

        $categories = Item::query()
            ->whereNotNull('category')
            ->distinct()
            ->pluck('category')
            ->toArray();

        return view('pages.edit.item',
            compact(
            'item',
            'categories',
            'photo_links',
                'video_links',
                'texts',
                'other_links'

            )
        );
    }


    public function uptade(Request $r)
    {
        DB::transaction(function () use($r) {
            $old_item = Item::find($r->id)->delete();

            $item = new Item;
            $item->header = $r->header;
            $item->slogan = $r->slogan;
            $item->header_photo_link = $r->header_photo_link;
            $item->category = $r->newcategory == null ? $r->category : $r->newcategory;
            $item->save();

            if (isset($r->photo_links))
            {
                foreach ($r->photo_links as $photo_link) {
                    $image = new Photo;
                    $image->item_id = $item->id;
                    $image->photo_link = $photo_link;
                    $image->save();
                }
            }
            if (isset($r->video_links))
            {
                foreach ($r->video_links as $video_link)
                {
                    $video = new Video;
                    $video->item_id = $item->id;
                    $video->video_link = $video_link;
                    $video->save();
                }
            }
            if (isset($r->texts))
            {
                foreach ($r->texts as $text)
                {
                    $video = new Text;
                    $video->item_id = $item->id;
                    $video->text = $text;
                    $video->save();
                }
            }
            if (isset($r->other_links))
            {
                foreach ($r->other_links as $other_link)
                {
                    $video = new OtherLink;
                    $video->item_id = $item->id;
                    $video->link = $other_link;
                    $video->save();
                }
            }
        });
        return redirect()
            ->route('index')
            ->with('success', 'Item upteded successfully!');
    }

    public function delete(Request $r)
    {
//        DB::transaction(function () use($r) {
//            $item = Item::find($r->id)->delete();
//            //all child with delete migration cascade
//        });
        return redirect()
            ->route('index')
            ->with('success', 'Item and its children deleted successfully!');;
    }
}

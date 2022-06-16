<?php

namespace App\Http\Controllers;

use App\Models\OtherLink;
use App\Models\Photo;
use App\Models\Item;
use App\Models\Text;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

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

    public function toStorefromUrl($url)
    {
        $contents = file_get_contents($url);
        $name = rand(1,999).substr($url, strrpos($url, '/') + 1);
        Storage::put('public/blog_images/'.$name, $contents);
        return $name;
    }
    public function add(Request $r)
    {

        $r->validate([
            'header_photo_link' => 'required|max:254',
            'photo_links' => 'max:254',
            'video_links' => 'max:254',
        ]);

        DB::transaction(function () use($r) {
            $item = new Item;
            $item->header = $r->header;
            $item->slogan = $r->slogan;
            if ($r->headerphotosave == 1) {
                $name = $this->toStorefromUrl($r->header_photo_link);
                $item->header_photo_link = '/storage/blog_images/'.$name;
            }
            else {
                $item->header_photo_link = $r->header_photo_link;
            }
            $item->category = $r->newcategory == null ? $r->category : $r->newcategory;
            $item->save();

            if (isset($r->photo_links))
            {
                $photo_count = count($r->photo_links);
                for ($i = 0; $i < $photo_count; $i++) {

                    $photo = new Photo;
                    $photo->item_id = $item->id;
                    if ($r->tosave[$i] == 1) 
                    {
                        $name = $this->toStorefromUrl($r->photo_links[$i]);
                        $photo->photo_link = '/storage/blog_images/'.$name;                        
                    }
                    else {
                        $photo->photo_link = $r->photo_links[$i];
                    }
                    $photo->order = $r->photo_orders[$i];
                    $photo->save();
                    
                }
            }
            if (isset($r->video_links))
            {
                $video_count = count($r->video_links);
                for ($i = 0; $i < $video_count; $i++) {
                    $video = new Video;
                    $video->item_id = $item->id;
                    $video->video_link = $r->video_links[$i];
                    $video->order = $r->video_orders[$i];
                    $video->save();
                }
            }
            if (isset($r->texts))
            {
                $text_count = count($r->texts);
                for ($i = 0; $i < $text_count; $i++) {
                    $text = new Text;
                    $text->item_id = $item->id;
                    $text->text = $r->texts[$i];
                    $text->order = $r->text_orders[$i];
                    $text->save();
                }
            }

            if (isset($r->other_links))
            {
                $other_links_count = count($r->other_links);
                for ($i = 0; $i < $other_links_count; $i++) {
                    $other_link = new OtherLink;
                    $other_link->item_id = $item->id;
                    $other_link->link = $r->other_links[$i];
                    $other_link->link_text = $r->other_link_texts[$i];
                    $other_link->order = $r->other_link_orders[$i];
                    $other_link->save();
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
                $photo_count = count($r->photo_links);
                for ($i = 0; $i < $photo_count; $i++) {
                    $photo = new Photo;
                    $photo->item_id = $item->id;
                    $photo->photo_link = $r->photo_links[$i];
                    $photo->order = $r->photo_orders[$i];
                    $photo->save();
                }
            }
            if (isset($r->video_links))
            {
                $video_count = count($r->video_links);
                for ($i = 0; $i < $video_count; $i++) {
                    $video = new Video;
                    $video->item_id = $item->id;
                    $video->video_link = $r->video_links[$i];
                    $video->order = $r->video_orders[$i];
                    $video->save();
                }
            }
            if (isset($r->texts))
            {
                $text_count = count($r->texts);
                for ($i = 0; $i < $text_count; $i++) {
                    $text = new Text;
                    $text->item_id = $item->id;
                    $text->text = $r->texts[$i];
                    $text->order = $r->text_orders[$i];
                    $text->save();
                }
            }

            if (isset($r->other_links))
            {
                $other_links_count = count($r->other_links);
                for ($i = 0; $i < $other_links_count; $i++) {
                    $other_link = new OtherLink;
                    $other_link->item_id = $item->id;
                    $other_link->link = $r->other_links[$i];
                    $other_link->link_text = $r->other_link_texts[$i];
                    $other_link->order = $r->other_link_orders[$i];
                    $other_link->save();
                }
            }
        });
        return redirect()
            ->route('index')
            ->with('success', 'Item upteded successfully!');
    }

    public function delete(Request $r)
    {
        DB::transaction(function () use($r) {
            $item = Item::find($r->id)->delete();
            //all child with delete migration cascade
        });
        return redirect()
            ->route('index')
            ->with('success', 'Item and its children deleted successfully!');;
    }
}

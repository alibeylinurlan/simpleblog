@extends('../home')
@section('index')
    <style>
        .page-link {
            margin: 3px;
            border-radius: 3px;
        }
        .page-item {
            border-radius: 10px;
            overflow: hidden;
        }
    </style>

    <div id="categories"  style="max-width: 800px;margin: auto;">
        <br>
        <h2><span class="topper">Categories</span></h2>
        {{-- <x-categories /> --}}
        @livewire('categories')
        <h2><span class="topper">New added</span></h2>
    </div>
    @forelse($items as $k => $item)
        {{-- <x-item  :item="$item"/> --}}
        <livewire:item :item="$item">
        {{-- @livewire('item', ['item' => $item]) --}}
    @empty
        <br><br>
        <a href="dashboard">
            <div class="shadow p-4 text-2xl rounded-md" style="max-width: 800px;margin: auto;text-align: center;background: white;">
                Add first item
            </div>
        </a>
    @endforelse
    <div style="max-width: 800px;margin: auto;text-align: right;">
        {{ $items->links() }}
    </div>
    <br><br><br>
@endsection

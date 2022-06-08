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
        <x-categories />
        @if($_GET['page'] == 1 || $_GET['page'] == null)
            <h2><span class="topper">New added</span></h2>
        @endif
    </div>
    @forelse($items as $k => $item)
        <x-item  :item="$item"/>
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

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

<div style="max-width: 800px;margin: auto;z-index: 5;">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

        <div id="searchclose" style="cursor: pointer;float:left;">
            <i class='bx bx-arrow-back' style="font-size:22px;font-weight: bold;"></i>
        </div>
        <div style="float:left;width: 90%;margin-left: 10px;">
            <input type="text" wire:model="name" id="search" autocomplete="off" style="border: none; width: 100%;outline: none; font-size: 18px;">
        </div>
    <br><br>
    <hr style="margin-top: -5px;">
    <div wire:loading>
        <img src="{{asset('images/processing.gif')}}" width="20" alt="" style="margin-left: 30px;">
    </div>
    @foreach($items as $k => $item)
        <a href="{{route('info', ['name' => urlencode(trim($item->header)), 'id' => $item->id*53478])}}" style="color: black;">
            <div style="padding-inline: 10px;margin-bottom: -10px; width: 100%;">
                <div style="overflow: hidden;height: 23px;width: 90%;float:left;font-size: 18px;">
                    {{ $item->header }}
                </div>
                <div style="width: 10%;float:right;">
                    <i style="font-size:22px;font-weight: bold;color: gray;" class='bx bx-search'></i>
                </div>
            </div>
        </a>
        <br><br><br>
    @endforeach
</div>

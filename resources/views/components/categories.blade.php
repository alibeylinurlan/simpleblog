<div>
    <style type="text/css">
        .catagories-div {
            white-space: nowrap;
            overflow: auto;
            margin-top: 7px;
            width: 100%;
            scroll-behavior: smooth;
        }
        .catagories {
            white-space: nowrap;
            width: 100%;
            overflow-x: auto;
        }
        .catagories li {
            float: left;
            padding: 3px;
            margin: 5px
        }
        .catagories li span {
            padding: 3px;
            padding-inline: 10px;
            font-size: 16px;
            background: #eee;
        }
    </style>
    <div class="catagories-div">
        <ul class="catagories">
            @forelse($categories as $category)
                <li>
                    <span class="shadow">{{ $category }}</span>
                </li>
            @empty
                No category yet.
            @endforelse
        </ul>
    </div>
</div>

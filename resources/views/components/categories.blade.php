<div>
    <style type="text/css">
        .catagories {
            white-space: nowrap;
            width: 100%;
            overflow-x: auto;
        }
        .catagories li {
            float: left;
            font-size: 16px;
            background: gray;
            border-radius: 5px;
            margin-right: 12px;
            padding: 3px;
            padding-inline: 10px;
        }
    </style>
    <div>
        <ul class="catagories">
            @forelse($categories as $category)
                <li class="shadow">
                    {{ $category }}
                </li>
            @empty
                No category yet.
            @endforelse
        </ul>
    </div>
</div>
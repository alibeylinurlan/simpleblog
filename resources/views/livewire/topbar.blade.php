<div>
    <style>
        .topbar {
            position: fixed;
            top: 0;
            width: 100%;
            margin: 0;
            padding: 5px;
            background: white;
            justify-content: center;
            align-items: center;
            z-index: 3;
        }
        .bx.bx-menu {
            font-size: 22px;
        }
        .menu-o {
            cursor: pointer;
        }
    </style>
    <div class="topbar shadow">
        <div style="display: flex;">
            <div class="menu-o" style="flex-grow: 1;">
                <i class='bx bx-menu'></i>
            </div>
            <div style="flex-grow: 2;text-align: center;">
                <b style="font-size: 18px;">{{config('app.name')}}</b>
            </div>
            <div style="flex-grow: 1;text-align: right;">
                <div style="float:right;">
                    {{-- <x-geo-ip /> --}}
                    <livewire:geo-ip />
                </div>
            </div>
        </div>
    </div>
    <br><br>
    <script>
        $(document).ready(function(){

        });
    </script>
</div>

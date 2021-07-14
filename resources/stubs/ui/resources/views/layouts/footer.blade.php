<footer class="small text-muted py-3 mt-auto">
    <div class="container">
        <div class="row justify-content-center">
        {{--<div class="row justify-content-between">--}}
            <div class="col-auto">
                &copy; {{ now()->format('Y') }}
                <x-bs::link :label="config('app.name')" url="/"/>
            </div>
            {{--<div class="col-auto">--}}
            {{--    <ul class="list-inline mb-0">--}}
            {{--        <li class="list-inline-item">--}}
            {{--                <x-bs::link :label="__('Contact')" href="#"/>--}}
            {{--        </li>--}}
            {{--        <li class="list-inline-item">--}}
            {{--                <x-bs::link :label="__('Terms')" href="#"/>--}}
            {{--        </li>--}}
            {{--        <li class="list-inline-item">--}}
            {{--                <x-bs::link :label="__('Privacy')" href="#"/>--}}
            {{--        </li>--}}
            {{--    </ul>--}}
            {{--</div>--}}
        </div>
    </div>
</footer>

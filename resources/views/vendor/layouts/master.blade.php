
@include('vendor.layouts._head')

<body class="nk-body bg-lighter npc-general has-sidebar ">
<div class="nk-app-root">
    <!-- main @s -->
    <div class="nk-main ">
        @include('vendor.layouts._leftNav')
        <!-- wrap @s -->
        @include('vendor.layouts._topNav')


        @yield('content')

@include('vendor.layouts._footer')
        </div>
        <!-- wrap @e -->
    </div>
    <!-- main @e -->
</div>
<!-- app-root @e -->
@include('vendor.layouts._jsScript')
</body>

</html>


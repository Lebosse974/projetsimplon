<!DOCTYPE html>
<html lang="en">

@include('layouts.head')

<body>
    <div id="app" class="bg-gray-100 font-roboto">
      @include('layouts.navback')

        @yield('main')
    </div>
</body>
</html>

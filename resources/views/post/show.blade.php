{{-- post --}}
@foreach ( $posts as $post )
    

<div class="px-4 my-4 bg-white rounded-lg shadow-md ">
    <div class="flex flex-col ">
        <div class="flex items-center">
            <img src="https://getuikit.com/docs/images/slider4.jpg" alt="" class="rounded-full"
                width="24" height="26">
            <a href="#"
                class="hidden px-2 font-bold text-black lg:block sm:text-xs lg:text-base">chieef
                kieef</a>
            <p class="text-sm lg:text-base"> posted by {{$post->users->name}}. <span class="text-gray-500">1
                    heure</span></p>
        </div>
        <p class="text-sm lg:text-base">{{$post->content}}</p>
        <img src="{{ asset('storage/' . $post->image) }}"
            alt="" class=" sm:h-[250px] py-4 lg:w-full md:h-[450px] lg:h-[650px]">
    </div>
</div>
@endforeach
{{-- post --}}
@foreach ($posts as $post)
    <div class="px-4 my-4 bg-white rounded-lg shadow-md ">
        <div class="flex flex-col border-b border-black ">
            <div class="flex items-center">
                <img src="https://getuikit.com/docs/images/slider4.jpg" alt="" class="rounded-full" width="24"
                    height="26">
                <a href="#" class="hidden px-2 font-bold text-black lg:block sm:text-xs lg:text-base">chieef
                    kieef</a>
                <p class="text-sm lg:text-base"> posted by {{ $post->users->name }}. <span class="text-gray-500">1
                        heure</span></p>
            </div>
            <p class="text-sm lg:text-base">{{ $post->content }}</p>
            <img src="{{ asset('storage/' . $post->image) }}" alt=""
                class=" sm:h-[250px] py-4 lg:w-full md:h-[450px] lg:h-[650px]">
            <img src="{{ Storage::url($post->image) }}" alt="">
        </div>
        @if (Auth::user())
            {{-- ajouter un commentaire --}}
            <div class="flex flex-col my-3 border-b border-black ">
                <div class="flex items-center justify-between">
                    <form action="{{ route('comment.store') }}" method="post">
                        @csrf
                        <input type="hidden" name="post_id" value="{{ $post->id }}">
                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                        <img src="https://i-sam.unimedias.fr/2021/10/01/bienfaits-pommes.jpeg?auto=format%2Ccompress&cs=tinysrgb&h=630&w=1200"
                            alt="" class="mx-2 rounded-full h-[26px]" width="24">

                        <input type="text" class="w-full my-3 bg-gray-200 rounded-lg"
                            placeholder="ajouter un commentaire" name="commentaire" required>
                        <input type="submit" value="" class="hidden " style="display:none;">
                    </form>
                </div>
            </div>
        @endif
        {{-- partie commentaire --}}
        <div class="flex mb-2">
            <img src="https://i-sam.unimedias.fr/2021/10/01/bienfaits-pommes.jpeg?auto=format%2Ccompress&cs=tinysrgb&h=630&w=1200"
                alt="" class="mx-2 rounded-full h-[26px]" width="24">

            <div class="flex flex-col bg-gray-100 rounded-2xl item-center">
                <a href="#" class="mx-2 font-bold text-black lg:block sm:text-xs lg:text-base">chieef
                    kieef</a>
                <p class="m-2"> they want me cause they know i'm next </p>
            </div>


        </div>
    </div>
@endforeach

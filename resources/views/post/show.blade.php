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
            <h1 class="text-xl font-bold text-gray-700 md:text-2xl"> {{ $post->title }}</h1>
            <p class="text-sm lg:text-base text-justify">{{ $post->content }}</p>
            <img src="{{ Storage::url($post->image) }}" alt=""
            class=" flex sm:h-[250px] py-4  md:h-[350px] lg:h-[450px] justify-center">
          
        </div>
        @if (Auth::user())
            {{-- ajouter un commentaire --}}
            <div class="flex flex-col my-3 border-b border-black ">
                <div class="flex items-center justify-between">
                    <form action="{{ route('commentaire.store') }}" method="post">
                        @csrf
                        <input type="hidden" name="post_id" value="{{ $post->id }}">
                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                        <img src="{{ Storage::url(Auth::user()->avatar)}}"
                            alt="" class="mx-2 rounded-full h-[26px]" width="24">

                        <input type="text" class="w-full my-3 bg-gray-200 rounded-lg"
                            placeholder="ajouter un commentaire" name="commentaire" required>
                        <input type="submit"  class="" style="display:none;">
                    </form>
                </div>
            </div>
        @endif

        @foreach ($post->commentaires as $commentaire )
            
        {{-- partie commentaire --}}
        <div class="flex mb-2">
            <img src="https://i-sam.unimedias.fr/2021/10/01/bienfaits-pommes.jpeg?auto=format%2Ccompress&cs=tinysrgb&h=630&w=1200"
                alt="" class="mx-2 rounded-full h-[26px]" width="24">

            <div class="flex flex-col mb-3 bg-gray-100 rounded-2xl item-center">
                <a href="#" class="mx-2 font-bold text-black lg:block sm:text-xs lg:text-base">{{$commentaire->user->name}}</a>
                <p class="m-2"> {{$commentaire->commentaire }}</p>
            </div>
        </div>
        @endforeach
    </div>
@endforeach

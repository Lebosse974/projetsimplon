<div class="px-4 py-6 bg-white rounded-lg shadow-md ">
    <div class="flex items-center justify-between">
        <h1 class="text-xl font-bold text-gray-700 md:text-2xl">Tendance du jour</h1>
    </div>
    <div class="mt-6">


        <div class="uk-position-relative uk-visible-toggle uk-light " tabindex="-1" uk-slider>
            <ul class="uk-slider-items uk-child-width-1-2 uk-child-width-1-3@s uk-child-width-1-4@m">
                @foreach ($hasars as $hasar)
                    <li>
                        <img src="{{ Storage::url($hasar->cover) }}" class="w-[195px] h-[190px] mx-1" alt="">
                        <div class="uk-position-center uk-panel">
                            <a class="mx-3 text-base font-bold" href="{{route('communaute.show',$hasar->id)}}">{{ $hasar->name }}</a>
                        </div>
                    </li>
                @endforeach
            </ul>
            <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous
                uk-slider-item="previous"></a>
            <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next
                uk-slider-item="next"></a>
        </div>
    </div>

</div>

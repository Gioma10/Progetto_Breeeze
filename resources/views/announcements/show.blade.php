<x-layout>
    <div class="container padding-header-show">
        <div class="row ">
            <div class="col-12 col-md-12">
                <h1 class="text-start">{{$announcement->title}} $ {{$announcement->price}}</h1>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-12 col-md-12 p-0 ">
                <div id="wrapperItems" class="wrapper-image-detail main">
                    <div class="container-image-detail">

                        @if ($announcement->images)
                            @foreach ($announcement->images as $image)
                                {{-- <div class="@if($loop->first)active @endif"> --}}
                                    <img src="{{$image->getUrl(400, 300)}}" class="image-detail" alt="...">
                                {{-- </div> --}}
                             @endforeach
                        @else
                            <img src="https://picsum.photos/200" class="d-inline-block p-2" alt="">
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container  ">
        <div class="row">
            <div class="col-12 col-md-10 mt-4 ">
                <h2 class="my-3 fw-normal">Descrizione:</h2>
                <p>{{$announcement->description}}</p>
                

            </div>
         
        </div>
        <div class="d-flex justify-content mt-4">
            <a href="{{route('announcements_index')}}" class="btn btn-primary">Continua a cercare</a>

        </div>
    </div>


        
</x-layout>
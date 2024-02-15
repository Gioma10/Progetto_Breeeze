<x-layout>
    <div class="container-fluid my-2">
        <div class="row">
            <div class="col-12 col-md-12 ">
                <h1 class="text-center">Dettaglio Annuncio {{$announcement->title}}</h1>
            </div>
        </div>
        <div class="row justify-content-center ms-5 ">
            <div class="col-12 col-md-12 p-0 myborder">
                <div id="wrapperItems" class="wrapper-image-detail">
                    <div class="container-image-detail">
                        @if ($announcement->images)
                            @foreach ($announcement->images as $image)
                                <div class="@if($loop->first)active @endif">
                                    <img src="{{Storage::url($image->path)}}" class="img-fluid p-3 rounded" alt="...">
                                </div>
                             @endforeach
                        @else
                            <img src="https://picsum.photos/200" class="d-inline-block p-2" alt="">
                            <img src="https://picsum.photos/200" class="d-inline-block p-2" alt="">
                            <img src="https://picsum.photos/200" class="d-inline-block p-2" alt="">
                            <img src="https://picsum.photos/200" class="d-inline-block p-2" alt="">
                            <img src="https://picsum.photos/200" class="d-inline-block p-2" alt="">
                            <img src="https://picsum.photos/200" class="d-inline-block p-2" alt="">
                            <img src="https://picsum.photos/200" class="d-inline-block p-2" alt="">
                        @endif
                        {{-- <img src="https://picsum.photos/300/200" class="image-detail">
                        <img src="https://picsum.photos/300/200" class="image-detail">
                        <img src="https://picsum.photos/300/200" class="image-detail">
                        <img src="https://picsum.photos/300/200" class="image-detail">
                        <img src="https://picsum.photos/300/200" class="image-detail">
                        <img src="https://picsum.photos/300/200" class="image-detail">
                        <img src="https://picsum.photos/300/200" class="image-detail">
                        <img src="https://picsum.photos/300/200" class="image-detail">
                        <img src="https://picsum.photos/300/200" class="image-detail">
                        <img src="https://picsum.photos/300/200" class="image-detail"> --}}
                    </div>
                </div>
                {{-- <div class="ciao"></div> --}}
            </div>
        </div>
    </div>
    <div class="container ">
        <div class="row justify-content-center">
            <div class="col-12 col-md-4">
                <h2>{{$announcement->title}}</h2>
                <p>{{$announcement->description}}</p>
                <p>{{$announcement->price}}</p>

            </div>
            <div class="col-12 col-md-4 bg-info">

                <p>aggiungi al carello </p>
            </div>
        </div>
        <div class="d-flex justify-content-center mt-4">
            <a href="{{route('home')}}" class="btn btn-primary">Continua a cercare</a>

        </div>
    </div>


        
</x-layout>
<x-layout>
<div class="container padding-header">
    <div class="row">
        <div class="col-12 col-md-8">
            <h1>{{$announcement_to_check ? 'Ecco l\'annuncio da revisionare' : 'Non ci sono annunci da revisionare'}}</h1>
        </div>
    </div>
</div>

@if($announcement_to_check)
    <div class="container">
        <div class="row justify-content-center border">
            <div class="col-12 col-md-6">
                <div id="wrapperItems" class="wrapper-image-detail main">
                    <div class="container-image-detail">
                        @if ($announcement_to_check->images)
                            @foreach ($announcement_to_check->images as $image)
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
            <div class="col-12 col-md-3 border-start">
                <h5 class="tc-accent text-center mt-3">Tags</h5>
                <div class="p-2">
                    @foreach ($announcement_to_check->images as $image)
                    @if($image->labels)
                
                        @foreach ($image->labels as $label)
                            <p class="d-inline">{{$label}}</p>
                    
                        @endforeach
                    @endif
                    @endforeach
                </div>
            </div>
            <div class="col-12 col-md-3 border-start">
                <div class="card-body">
                    <h5 class="tc-accent text-center mt-3">Revisione Immagini</h5>
                    @foreach($announcement_to_check->images as $image)
                    <div class="mt-5">


                        <p>Adulti: <span class="{{$image->adult}}"></span></p>
                        <p>Satira: <span class="{{$image->spoof}}"></span></p>
                        <p>Medicina: <span class="{{$image->medical}}"></span></p>
                        <p>Violenza: <span class="{{$image->violence}}"></span></p>
                        <p>Contenuto Ammiccante: <span class="{{$image->racy}}"></span></p>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div >
            <h5 class="card-title mt-3">Titolo : {{$announcement_to_check->title}}</h5>
            <p class="card-body mt-3">Descrizione : {{$announcement_to_check->description}}</p>
            <p class="card-body">Prezzo : € {{$announcement_to_check->price}}</p>
            <p class="card-footer">Pubblicato il: {{$announcement_to_check->created_at}}</p>
        </div>
        <div class="row ">
            <div class="col-12 col-md-6 ">
                <form action="{{route('revisor.accept_announcement', ['announcement'=>$announcement_to_check])}}" method="POST">
                @csrf
                @method('PATCH')
                <button type="submit" class="btn btn-success shadow">Accetta</button>
            </form>
                <form action="{{route('revisor.reject_announcement', ['announcement'=>$announcement_to_check])}}" method="POST">
                @csrf
                @method('PATCH')
                <button type="submit" class="btn btn-danger shadow">Riufiuta</button>
            </form>
            </div>
        </div>
    </div>
@endif

</x-layout>
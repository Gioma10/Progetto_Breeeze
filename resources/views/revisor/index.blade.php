<x-layout>
<div class="container">
    <div class="row">
        <div class="col-12 col-md-8">
            <h1>{{$announcement_to_check ? 'Ecco l\'annuncio da revisionare' : 'Non ci sono annunci da revisionare'}}</h1>
        </div>
    </div>
</div>

@if($announcement_to_check)
    <div class="container">
        <div class="row justify-content-center">
        
            <div class="col-12 col-md-6 slide-show-img">
                @if ($announcement_to_check->images)
                    @foreach ($announcement_to_check->images as $image)
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
            </div>
            <div >
                <h5 class="card-title mt-3">Titolo : {{$announcement_to_check->title}}</h5>
                <p class="card-body mt-3">Descrizione : {{$announcement_to_check->description}}</p>
                <p class="card-body">Prezzo : € {{$announcement_to_check->price}}</p>
                <p class="card-footer">Pubblicato il: {{$announcement_to_check->created_at}}</p>
            </div>
                
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
<x-layout>
   <div class="container-fluid my-2">
     <div class="row ">
        <div class="col-12 col-md-12 ">
            <h1 class="text-center">Dettaglio Annuncio {{$announcement->title}}</h1>
           
        </div>
     </div>
     
     <div class="row justify-content-center">
         <div class="col-12 col-md-6 slide-show-img">

             <img src="https://picsum.photos/200" class="d-inline-block p-2" alt="">
             <img src="https://picsum.photos/200" class="d-inline-block p-2" alt="">
             <img src="https://picsum.photos/200" class="d-inline-block p-2" alt="">
             <img src="https://picsum.photos/200" class="d-inline-block p-2" alt="">
             <img src="https://picsum.photos/200" class="d-inline-block p-2" alt="">
             <img src="https://picsum.photos/200" class="d-inline-block p-2" alt="">
             <img src="https://picsum.photos/200" class="d-inline-block p-2" alt="">
            
             
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
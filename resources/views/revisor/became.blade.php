<x-layout>
    
    <div class="container">
        <div class="row ">
            <div class="col-10 mx-auto">
                <div class="mt100">
            
                    <h1 class="breeeze-master-title">{{__('ui.breeezeMaster')}}</h1>
                    <h2>Raccontaci le tue motivazioni</h2>
                    <textarea rows="6" cols="50" placeholder=" ... "></textarea>
                    <div>
                        <button class="my-btn-2 mt-5"><a href="{{route('become.revisor')}}" class="a-none">{{__('ui.send-revisor')}}</a></button>
                    </div>
            
                </div>
            </div>
        </div>
    </div>


</x-layout>
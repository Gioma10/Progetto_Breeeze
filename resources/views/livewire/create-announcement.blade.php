<div>
    <div class="container padding-header pb-5">
        <div class="row  justify-content-center">
            <div class="col-10">
                @if (session()->has('message'))
                    <div class="flex flex-row justify-center my-2 alert alert-success">
                        {{session('message')}}
                    </div>
                @endif
                
                <form wire:submit="store">
                    <div class="mb-3">
                        <label for="InputTitle" class="form-label">Titolo</label>
                        <input wire:model.lazy='title' type="text" class="form-control @error('title') is-invalid @enderror">
                    </div>

                    <div class="mb-3">
                        <label for="InputDescription" class="form-label">Descrizione</label>
                        <textarea  wire:model.lazy='description' id="InputDescription" cols="30" rows="10" class="@error('description') is-invalid @enderror form-control "></textarea>
                    @error('description')
                        <div class="text-danger">
                            {{$message}}
                        </div>
                    @enderror
                    </div>
                    <div class="mb-3">
                        <label for="InputPrice" class="form-label">Prezzo</label>
                        <input wire:model.lazy='price' type="text" class="form-control @error('price') is-invalid @enderror" id="InputPrice">
                    @error('price')
                        <div class="text-danger">
                            {{$message}}
                        </div>
                    @enderror
                    </div>
                    <select class="form-control" wire:model.defer="category" id="category">
                        <option value="">Scegli la tua categoria</option>
                        @foreach ($categories as $category)
                            <option value="{{$category->id}}">
                                {{$category->name}}
                            </option>
                        @endforeach
                    </select>
                    @error('category')
                        <div class="text-danger">
                            {{$message}}
                        </div>
                    @enderror
                    <div class="mb-3">
                        <label for="InputTitle" class="form-label">Titolo</label>
                        <input wire:model.lazy='temporary_images' type="file" name="images" multiple class="form-control @error('temporary_images.*') is-invalid @enderror" placeholder="Img"/>
                        @error('temporary_images.*')
                            <div class="text-danger">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    @if (!empty($images))
                        <div class="row">
                            <div class="col-12">
                                <p>Photo preview:</p>
                                <div class="row border border-4 border-info rounded py-4">
                                 @foreach ($images as $key => $image)
                                    <div class="col my-3">
                                        <div class="preview mx-auto rounded" style="background-image: url({{$image->temporaryUrl()}});"></div>
                                        <button type="button" class="btn btn-danger d-block text-center mt-2 mx-auto" wire:click="removeImage({{$key}})">Cancella</button>

                                    </div>
                                     
                                 @endforeach  

                                </div>
                            </div>
                        </div>
                    @endif
                    <button type="submit" class="mt-3 btn btn-primary">Inserisci Annuncio</button>
                </form>
            </div>
        </div>
    </div>
</div>

<x-layout>
    @include('partials._header')
    <div class="container mt-5">
        <div class="card mb-3">
            <img src="{{$blog->image ? asset('storage/' . $blog->image) : asset('/images/no-image.png')}}" class="card-img-top">
            <div class="card-body">
              <h5 class="card-title">{{$blog["title"] ? $blog["title"] : "No title Available"}}</h5>
              <div class="mt-3">
                <h6>Summary : </h6>
                <p class="card-text">{{$blog["summary"] ? $blog["summary"] : "No summary Available"}}</p>
              </div>
              <div class="mt-3">
                <h6>Content : </h6>
                <p class="card-text">{{$blog["content"] ? $blog["content"] : "No content Available"}}</p>
              </div>

              <div class="mt-3">
                <small class="text-body-secondary">Created At : {{$blog["created_at"] ? $blog["created_at"] : "-"}}</small> <br>
                <small class="text-body-secondary">Last Updated At : {{$blog["updated_at"] ? $blog["updated_at"] : "-"}}</small>  
              </div>
             
              @auth
                  @if (auth()->user()->id == $blog["user_id"])
                  <div class="mt-2 d-flex">
                    <a href="/blog/edit/{{$blog->id}}" class="btn btn-outline-secondary ">Edit Blog</a>
                    <form method="POST" action="/blog/{{$blog->id}}" class="mx-2">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger">Delete Blog</button>
                    </form>
                  </div>
                    
                      
                  @endif
              @endauth
            </div>
          </div>
    </div>

</x-layout>
<x-layout>
    @include('partials._header')
    <a class="btn btn-primary mx-5 mt-2" href="/blog/create" role="button">Create new Blog</a>

    @if ($blogs->isEmpty())
    <div class="text-center">
      <h3>No Blog Availables</h3>
      <h4>click on Create new blog to create a blog</h4>
  </div>
    @else
    <div class="row m-5">
        @foreach ($blogs as $blog)
        <div class="col-sm-3 my-3 mb-sm-0">
        <div class="card" style="width: 18rem;">
            <img src="{{$blog->image ? asset('storage/' . $blog->image) : asset('/images/no-image.png')}}" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">{{ $blog["title"] ? $blog["title"] : "Not Title Available"}}</h5>
              <p class="card-text">{{ $blog["summary"] ? $blog["summary"] : "Not summary Available"}}</p>
              <a href="/blog/{{$blog["id"]}}" class="btn btn-secondary">More</a>
            </div>
          </div>
        </div>
        @endforeach
    @endif

</x-layout>
@props(['blog'])

<div class="col-sm-3 mb-3 mb-sm-0">
    <div class="card m-3 border-dark" style="width: 18rem;">
        <img src="{{$blog->image ? asset('storage/' . $blog->image) : asset('/images/no-image.png')}}" class="card-img-top object-fit-cover" style="max-height: 200px">
        <div class="card-body">
        <h5 class="card-title">{{ $blog["title"] ? $blog["title"] : "Not Title Available"}}</h5>
        <p class="card-text">{{ $blog["summary"] ? $blog["summary"] : "Not summary Available"}}</p>
        <a href="/blog/{{$blog->id}}" class="btn btn-secondary">More</a>
        </div>
    </div>
</div>
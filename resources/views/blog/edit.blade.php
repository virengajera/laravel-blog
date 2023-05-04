<x-layout>
    @include('partials._header')
  
    <div class="container mt-4">
      <form action="/blog/edit/{{$blog->id}}" method="POST" enctype="multipart/form-data">
      @csrf
      @method("PUT")
      <div class="mb-3">
        <label for="title" class="form-label">Title</label>
        <input class="form-control" type="text" placeholder="Enter Title of blog here" name="title" id="title" value="{{$blog["title"] ? $blog["title"] : ""}}" required>
      </div>
      <div class="mb-3">
        <label for="summary" class="form-label">Summary</label>
        <textarea class="form-control" rows="3" id="summary" name="summary" >{{$blog["summary"] ? $blog["summary"] : ""}}</textarea>
      </div>
      <div class="mb-3">
        <img src={{$blog->image ? asset('storage/' . $blog->image) : asset('/images/no-image.png')}} alt="" srcset="" style="height:100px; width:100px"><br>
        <input class="form-control" type="file" id="blogfile" name="image">
      </div>
      <div class="mb-3">
        <label for="content" class="form-label">Blog content</label>
        <textarea class="form-control" id="content" rows="3" name="content">{{$blog["content"] ? $blog["content"] : ""}}</textarea>
      </div>
      <div class="col-12">
        <button class="btn btn-success" type="submit">Edit Blog</button>
        <button class="btn btn-info" type="reset">Reset</button>
      </div>
    </form>
    </div>
  
  </x-layout>
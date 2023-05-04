<x-layout>
  @include('partials._header')

  <div class="container mt-5">
    <form action="/blog/create" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
      <label for="title" class="form-label">Title</label>
      <input class="form-control" type="text" placeholder="Enter Title of blog here" name="title" id="title" required>
    </div>
    <div class="mb-3">
      <label for="summary" class="form-label">Summary</label>
      <textarea class="form-control" rows="3" id="summary" name="summary"></textarea>
    </div>
    <div class="mb-3">
      <label for="blogfile" class="form-label">Choose file</label>
      <input class="form-control" type="file" id="blogfile" name="image">
    </div>
    <div class="mb-3">
      <label for="content" class="form-label">Blog content</label>
      <textarea class="form-control" id="content" rows="3" name="content"></textarea>
    </div>
    <div class="col-12">
      <button class="btn btn-success" type="submit">Create Blog</button>
      <button class="btn btn-info" type="reset">Reset</button>
    </div>
  </form>
  </div>

</x-layout>
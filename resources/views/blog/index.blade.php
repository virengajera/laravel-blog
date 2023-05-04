<x-layout>
@include('partials._header')

    @if (count($blogs)==0)
        <div class="text-center">
            <h3>No Blog Availables</h3>
            <h4>Login -> Go to MyBlogs -> click on Create new blog to create a blog</h4>
        </div>
    @endif

    <div class="row m-4">

        @foreach ($blogs as $blog)

            <x-blog-card :blog=$blog />
            
        @endforeach

    </div>

</x-layout>
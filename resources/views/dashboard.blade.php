<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Post') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('post.store') }}" method="post" >
                        @csrf
                        @error('body')
                        <span class="text-error">{{ $message }}</span>
                        @enderror
                        <textarea name="body" class="w-full  block rounded textarea-accent @error('body') textarea-error  @enderror"  placeholder="Post Something" rows="3">{{ old('body') }}</textarea>
                        <input type="submit" value="POST" class="btn mt-2 ">
                    </form>
                </div>
            </div>

           @foreach($posts as $post)
           <div class="card w-full bg-base-80 shadow-xl my-3 ">
            <div class="card-body">
              <h2 class="card-title text-gray-500">{{ $post->user->name }} - <span class="">{{ $post->created_at->diffForHumans() }}</span></h2>
              <p>{{ $post->body }}</p>
              <div class="card-actions justify-end">
                <a href="{{ route('post.show', $post) }}" class=" link link-primary">Comment ({{ $post->comments_count }})</a>
              </div>
              </div>
            </div>
            @endforeach

        </div>
        </div>
    </div>
</x-app-layout>

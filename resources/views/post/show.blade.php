<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Post Detail
        </h2>
    </x-slot>

    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="card w-full bg-base-80 shadow-xl my-3 ">
                <div class="card-body">
                  <h2 class="card-title text-gray-500">{{ $post->user->name }} - <span class="">{{ $post->created_at->diffForHumans() }}</span></h2>
                  <p>{{ $post->body }}</p>
                  </div>
                </div>
            </div>

            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <form action="{{ route('post.comment.store', $post) }}" method="post" >
                            @csrf
                            @error('body')
                            <span class="text-error">{{ $message }}</span>
                            @enderror
                            <textarea name="body" class="w-full  block rounded textarea-accent @error('body') textarea-error  @enderror"  placeholder="Leave a comment ...." rows="3">{{ old('body') }}</textarea>
                            <input type="submit" value="POST" class="btn mt-2 ">
                        </form>
                    </div>
                </div>
        </div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h1 class="text-2x1 my-3 text-gray-500">Comments</h1>
        @foreach ($comments as $comment)
                <div class="card w-full bg-base-80 shadow-xl my-3 ">
                    <div class="card-body">
                      <h2 class="card-title text-gray-500">{{ $comment->user->name }} -
                        <span class="">{{ $comment->created_at->diffForHumans() }}</span>
                       @can('delete', $comment)
                       <form action="{{ route('post.comment.destroy', [$comment->post, $comment]) }}"
                        method="post">
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="Delete" class=" btn btn-error text-white">
                       </form>
                        @endcan
                     </h2>
                      <p>{{ $comment->body }}</p>
                      </div>
                    </div>
            @endforeach
        </div>
</x-app-layout>
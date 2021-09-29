@extends('layouts.master')
@section('content')

    <div class="container mx-auto px-4 pt-16">
        <div class="populer-actors">
            <h2 class="uppercase tracking-wider text-orange-500 text-lg font-semibold"> popular actors</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5  gap-8">

                @foreach($populerActors as $actor)
                <div class="actor mt-border ">
                <div class=" flex justify-center">
                    <a>
                        <img src="{{ 'https://image.tmdb.org/t/p/w235_and_h235_face'.$actor['profile_path']}}" alt="poster" class="hover:opacity-75 transition ease-in-out duration-150">
                    </a>
                </div>
                    <div class="mt-2 flex justify-center">
                        <a href="" class="text-lg hover:text-gray-300">{{$actor['name']}}</a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <div class="flex justify-between mt-16 ">
            <a class="border-2 py-2 px-3 border-gray-500 bg-gray-700 rounded-2xl mb-8"> Previous</a>
            <a class="border-2 px-3 py-2 border-gray-500 bg-gray-700 rounded-2xl mb-8"> Next</a>
        </div>
    </div>


@stop
@section('scripts')
    <script src="https://unpkg.com/infinite-scroll@4/dist/infinite-scroll.pkgd.min.js"></script>
    <!-- or -->
    <script>
        let elem = document.querySelector('.grid');
        let infScroll = new InfiniteScroll( elem, {
            // options
            path: '/actors/page/@{{#}}',
            append: '.actor',
            // history: false,
        });

        // element argument can be a selector string
        //   for an individual element
        let infScroll = new InfiniteScroll( '.container', {
            // options
        });
    </script>

@endsection

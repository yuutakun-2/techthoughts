<x-layout>
    <section class="w-full max-h-[60vh] mx-auto items-center">
        <div class="carousel-box bg-gray-500 relative">
            <div class="box" id="box1">
                <div class="box-image" style="background: url('img/3.png') no-repeat center/cover;"></div>
            </div>
            <div class="box" id="box2">
                <div class="box-image" style="background: url('img/4.png') no-repeat center/cover;"></div>
            </div>
            <div class="box" id="box3">
                <div class="box-image" style="background: url('img/5.png') no-repeat center/cover;"></div>
            </div>
            <div class="controls absolute w-full top-1/2 flex justify-between items-center">
                <button id="prev">&laquo; Prev</button>
                <button id="next">Next &raquo;</button>
            </div>
        </div>
        <div class="carouselNavigator"></div>
    </section>

    <script src="{{asset('js/carousel.js')}}"></script>
</x-layout>
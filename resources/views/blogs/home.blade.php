<x-layout>
    <div class="w-full">
        <img src="{{ asset('img/logo_bg.png') }}" alt="" class="object-cover h-[660px] w-full">
        <link rel="stylesheet" href="{{ asset('css/scrolldown.css') }}">
        <div class="scroll-down"></div>
        <!-- <style>
            body {
                background-color: #000;
                overflow: hidden;
            }

            .scroll-down {
                position: absolute;
                left: 50%;
                bottom: 40px;
                display: block;
                text-align: center;
                font-size: 20px;
                z-index: 100;
                text-decoration: none;
                text-shadow: 0;
                width: 26px;
                height: 26px;
                border-bottom: 2px solid #fff;
                border-right: 2px solid #fff;
                z-index: 9;
                left: 50%;
                transform: translate(-50%, 0%) rotate(45deg);
                animation: fade_move_down 4s ease-in-out infinite;
            }

            /*animated scroll arrow animation*/
            @keyframes fade_move_down {
                0% {
                    transform: translate(0, -10px) rotate(45deg);
                    opacity: 0;
                }
                50% {
                    opacity: 1;
                }
                100% {
                    transform: translate(0, 10px) rotate(45deg);
                    opacity: 0;
                }
            }
        </style> -->
    </div>
</x-layout>
<body>
      <section class="text-gray-600 body-font bg-gradient-to-b from-gray-600 to-black absolute w-full h-full overflow-hidden">
     <!-- CAROUSEL -->
        <div class=" my-40">
      <h1 class=" my-2 text-center text-white hover:text-red-500 text-4xl">Tätowierung&CoverUp</h1>

    <div class="relative w-[600px] mx-auto">
        <div class="slide relative">
            <img class="w-full h-[400px] object-cover"
                src="./fotos/tattoo_1.png">
            <div class="absolute bottom-0 w-full px-5 py-3 bg-black/40 text-center text-white">Wings</div>
        </div>

        <div class="slide relative">
            <img class="w-full h-[400px] object-cover"
                src="./fotos/tattoo_2.png">
            <div class="absolute bottom-0 w-full px-5 py-3 bg-black/40 text-center text-white">Lion</div>
        </div>

        <div class="slide relative">
            <img class="w-full h-[400px] object-cover"
                src="./fotos/tattoo_3.png">
            <div class="absolute bottom-0 w-full px-5 py-3 bg-black/40 text-center text-white">Flowers
            </div>
        </div>

        <!-- zurück button -->
        <a class="absolute left-0 top-1/2 p-4 -translate-y-1/2 bg-black/30 hover:bg-black/50 text-white hover:text-red-500 cursor-pointer"
            onclick="moveSlide(-1)">❮</a>

        <!-- weiter button -->
        <a class="absolute right-0 top-1/2 p-4 -translate-y-1/2 bg-black/30 hover:bg-black/50 text-white hover:text-red-500 cursor-pointer"
            onclick="moveSlide(1)">❯</a>

    </div>

    <br>

    <!-- punkte -->
    <div class="flex justify-center items-center space-x-5 relative bottom-4">
        <div class="dot w-4 h-4 rounded-full cursor-pointer" onclick="currentSlide(1)"></div>
        <div class="dot w-4 h-4 rounded-full cursor-pointer" onclick="currentSlide(2)"></div>
        <div class="dot w-4 h-4 rounded-full cursor-pointer" onclick="currentSlide(3)"></div>
    </div>
    </section>

</body>
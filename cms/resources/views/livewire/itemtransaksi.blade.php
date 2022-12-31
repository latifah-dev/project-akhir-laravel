<section class="relative text-white mb-8">
        <div class="absolute bg-secondary-500 h-full right-0 top-0 w-full lg:w-7/12">
        </div>
        <form action="">
            <div class="container mx-auto pb-24 pt-24 px-4 relative">
                <div class="-mx-4 flex flex-wrap space-y-6 lg:space-y-0">
                  <div class="px-4 w-full lg:w-6/12"> 
                    <div class="bg-secondary-500 lg:p-4">
                      <div class="poster relative" style="height: 50vh;"></div>
                    </div>               
                  </div>
                  <div class="px-4 w-full lg:w-6/12"> 
                    <h1 class="font-bold mb-4 text-5xl sm:text-6xl lg:text-7xl">CupCake Rainbow</h1>
                    <p class="border-opacity-50 border-white border-t border-b py-6 text-white text-2xl">Rp. 100.0000</p>
                    <p class="mb-6 text-opacity-50 text-white text-xl sm:pr-12">Deskripsi : Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus pulvinar faucibus neque, nec rhoncus nunc ultrices sit amet.</p>
                    <p class="text-white text-2xl">Size</p>
                    <div class="flex items-center w-screen h-screen">
                            <div>
                                <input class="hidden" id="radio_1" type="radio" name="radio" checked>
                                <label class="flex flex-col p-4 border-2 border-gray-400 cursor-pointer" for="radio_1">
                                    <span class="text-xs font-semibold uppercase">Small</span>
                                </label>
                            </div>
                            <div>
                                <input class="hidden" id="radio_2" type="radio" name="radio">
                                <label class="flex flex-col p-4 border-2 border-gray-400 cursor-pointer" for="radio_2">
                                    <span class="text-xs font-semibold uppercase">Medium</span>
                                </label>
                            </div>
                            <div>
                                <input class="hidden" id="radio_3" type="radio" name="radio">
                                <label class="flex flex-col p-4 border-2 border-gray-400 cursor-pointer" for="radio_3">
                                    <span class="text-xs font-semibold uppercase">Big</span>
                                </label>
                            </div>
                    </div>
                    <p class="text-white text-2xl pt-6 pb-2">Tanggal Pengiriman</p>
                    <input class="appearance-none border-none w-full text-gray-700 mr-3 py-1 px-2 leading-tight focus:outline-none" type="date" placeholder="JaneDoe@gmail.com" aria-label="email">
                    <p class="text-white text-2xl pt-6 pb-2">Jumlah</p>
                    <div class="flex flex-row h-10 rounded-lg mt-1">
                        <button data-action="decrement" class="bg-white text-black w-20 rounded-l cursor-pointer outline-none">
                          <span class="m-auto text-2xl font-thin">−</span>
                        </button>
                        <input type="number" class="outline-none focus:outline-none text-center bg-white font-semibold text-md hover:text-black focus:text-black  md:text-basecursor-default flex items-center text-black  outline-none" name="custom-input-number" value="1"></input>
                      <button data-action="increment" class="bg-white text-black w-20 rounded-r cursor-pointer">
                        <span class="m-auto text-2xl font-thin">+</span>
                      </button>
                    </div>
                    <p class="text-white text-2xl pt-6 pb-2">Alamat Pengiriman</p>
                    <textarea name="" id="" cols="30" rows="5" class="text-black w-full"></textarea>
                    
                    <p class="text-white text-2xl pt-6 pb-2">Kode Pos</p>
                    <input class="appearance-none border-none w-full text-gray-700 mr-3 py-1 px-2 leading-tight focus:outline-none" type="text" placeholder="50775" aria-label="email">
                    <p class="text-white text-2xl pt-6 pb-2">Nomor Telepon</p>
                    <input class="appearance-none border-none w-full text-gray-700 mr-3 py-1 px-2 leading-tight focus:outline-none" type="text" placeholder="08797545336" aria-label="email">
                    <p class="text-white text-2xl pt-6 pb-2">Ucapan</p>
                    <textarea name="" id="" cols="30" rows="5" class="text-black w-full"></textarea>
                    
                    <p class="border-opacity-50 py-2"></p>
                    <a href="#" class="bg-color3-600 hover:bg-secondary-700 hover:text-white inline-block px-6 py-2 text-black">Order Now</a> 
                  </div>
                </div>
              </div>
        </form>
        
      </section>
      <script>
        function decrement(e) {
          const btn = e.target.parentNode.parentElement.querySelector(
            'button[data-action="decrement"]'
          );
          const target = btn.nextElementSibling;
          let value = Number(target.value);
          value--;
          target.value = value;
        }
      
        function increment(e) {
          const btn = e.target.parentNode.parentElement.querySelector(
            'button[data-action="decrement"]'
          );
          const target = btn.nextElementSibling;
          let value = Number(target.value);
          value++;
          target.value = value;
        }
      
        const decrementButtons = document.querySelectorAll(
          `button[data-action="decrement"]`
        );
      
        const incrementButtons = document.querySelectorAll(
          `button[data-action="increment"]`
        );
      
        decrementButtons.forEach(btn => {
          btn.addEventListener("click", decrement);
        });
      
        incrementButtons.forEach(btn => {
          btn.addEventListener("click", increment);
        });
      </script>
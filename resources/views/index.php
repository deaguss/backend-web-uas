<section class="home" id="home">
    <div class="home-slider" style="position: relative">
    <div class="wrapper">
        <div class="slide flex items-center flex-wrap gap-2">
        <div class="content flex-auto pl-20">
            <span class="font-medium text-xl text-orange-400">Beautiful view with special dish</span>
            <h3 class="font-bold text-5xl text-blue-950">Fairy Cafe</h3>
            <p class="text-gray-500 text-lg font-normal py-4 leading-relaxed">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ipsam, quasi!</p>
            <a href="#menu" class="btn mt-1 inline-block text-lg text-white bg-blue-950 rounded cursor-pointer px-8 py-2 hover:bg-orange-400 hover:tracking-widest">Order Now</a>
        </div>
        <div class="image w-1/2 flex-auto p-20">
            <img src="assets/img/beef steak.png" alt="" />
        </div>
        </div>
    </div>
    <div class="custom-shape-divider-bottom-1718376782">
        <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
        <path
            d="M0,0V46.29c47.79,22.2,103.59,32.17,158,28,70.36-5.37,136.33-33.31,206.8-37.5C438.64,32.43,512.34,53.67,583,72.05c69.27,18,138.3,24.88,209.4,13.08,36.15-6,69.85-17.84,104.45-29.34C989.49,25,1113-14.29,1200,52.47V0Z"
            opacity=".25"
            class="shape-fill"
        ></path>
        <path
            d="M0,0V15.81C13,36.92,27.64,56.86,47.69,72.05,99.41,111.27,165,111,224.58,91.58c31.15-10.15,60.09-26.07,89.67-39.8,40.92-19,84.73-46,130.83-49.67,36.26-2.85,70.9,9.42,98.6,31.56,31.77,25.39,62.32,62,103.63,73,40.44,10.79,81.35-6.69,119.13-24.28s75.16-39,116.92-43.05c59.73-5.85,113.28,22.88,168.9,38.84,30.2,8.66,59,6.17,87.09-7.5,22.43-10.89,48-26.93,60.65-49.24V0Z"
            opacity=".5"
            class="shape-fill"
        ></path>
        <path d="M0,0V5.63C149.93,59,314.09,71.32,475.83,42.57c43-7.64,84.23-20.12,127.61-26.46,59-8.63,112.48,12.24,165.56,35.4C827.93,77.22,886,95.24,951.2,90c86.53-7,172.46-45.71,248.8-84.81V0Z" class="shape-fill"></path>
        </svg>
    </div>
    </div>
</section>
<section class="w-full bg-orange-400 grid justify-items-center" id="menu ">
    <h1 class="text-4xl font-extrabold text-white py-20">Our Best Dishs</h1>
    <div class="flex justify-center gap-20 flex-wrap mb-32">
    <?php foreach ($menu as $menus) {
            ?>
            <div id="menu" class="bg-white px-8 py-5 rounded-lg shadow-lg mt-5 w-80 hover:shadow-2xl">
                <div>
                    <img src="assets/menu/<?= $menus->image ?>" class="w-60" alt="" />
                </div>
                <h1 class="font-bold text-2xl mb-3 text-gray-800 capitalize"><?= $menus->name ?></h1>
                <p class="text-gray-600 capitalize"><?= $menus->description ?></p>
                <div class="flex items-center justify-between">
                    <p class="text-xl font-bold text-gray-800">$<?= $menus->price ?></p>

                    <?php
                        $isAuthenticated = isset($_SESSION['username']);
                    ?>
                    <button type="submit" 
                            class="btn mb-3 inline-block text-lg mt-3 text-white bg-yellow-900 rounded cursor-pointer px-4 py-1 hover:bg-yellow-600 hover:tracking-widest add-to-cart"
                            <?= $isAuthenticated ? '' : 'disabled' ?>
                            data-product-id="<?= $menus->id ?>"
                            data-product-name="<?= $menus->name ?>"
                            data-product-image="assets/menu/<?= $menus->image ?>"
                            data-product-price="<?= $menus->price ?>">
                        <i class="bi bi-bag-plus mr-1.5"></i>
                        Add
                    </button>

                </div>
            </div>
        <?php }
    ?>
        
    
    </div>
</section>
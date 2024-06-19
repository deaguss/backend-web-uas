<div class="bg-white flex justify-around px-10 py-5 shadow-md fixed w-full z-10">
    <div class="logo flex justify-center items-center">
    <a href="/" class="flex items-center">
        <img src="assets/img/logo.png" alt="logo" class="w-11 rounded-full" />
        <h1 class="text-xl font-bold">Fairy <span class="text-orange-500">Cafe</span></h1>
    </a>
    </div>

    <div class="text-lg font-medium flex justify-center text-gray-500 items-center">
    <div class="mr-5 px-2 py-1 hover:bg-orange-500 rounded-lg hover:text-white"><a href="/">Home</a></div>

    <?= (isset($_SESSION['username'])) ? '<div class="mr-5 px-2 py-1 hover:bg-orange-500 rounded-lg hover:text-white"><a href="/kitchen">Kitchen</a></div>' : ''; ?>

    </div>

    <div class="flex justify-center items-center">
        <?php if (isset($_SESSION['username'])) : ?>
            <div class="flex gap-x-4 items-center">
                <button id="cartButton" data-modal-target="default-modal-cart" data-modal-toggle="default-modal-cart" class="ml-4">
                    <i class="bi bi-cart bg-gray-200 px-3 py-2 text-gray-700 rounded-full cursor-pointer hover:bg-orange-500 hover:text-white text-base">&nbsp;Cart</i>
                </button>
            </div>

            <div class="flex gap-x-4 items-center">
                <button data-modal-target="default-modal-menu" data-modal-toggle="default-modal-menu" class="ml-4">
                    <i class="bi bi-file-plus bg-gray-200 px-3 py-2 text-gray-700 rounded-full cursor-pointer hover:bg-orange-500 hover:text-white text-base">&nbsp;Menu</i>
                </button>
            </div>

            <div class="flex gap-x-4 items-center">
                <a href="/auth/signout" class="ml-4">
                    <i class="bi bi-box-arrow-left bg-gray-200 px-3 py-2 text-gray-700 rounded-full cursor-pointer hover:bg-orange-500 hover:text-white text-base">&nbsp;Log out</i>
                </a>
            </div>
        <?php else : ?>
            <div class="flex gap-x-4 items-center">
                <button data-modal-target="default-modal-login" data-modal-toggle="default-modal-login" class="ml-4">
                    <i class="bi bi-box-arrow-in-righ bg-gray-200 px-3 py-2 text-gray-700 rounded-full cursor-pointer hover:bg-orange-500 hover:text-white text-base">&nbsp;Login</i>
                <button/>
            </div>
        <?php endif ?>
        </div>
    </div>
</div>

<!-- modal login -->
<div id="default-modal-login" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-2xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                <h3 class="text-xl font-semibold text-gray-900">
                    login to your account right now!
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-hide="default-modal-login">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <form class="py-6 px-10" action="/auth/signin" method="POST">
                <div class="py-2">
                    <label for="username" class="block mb-2 text-sm font-medium text-gray-900">Your
                        Username</label>
                    <input type="text" name="username" id="username"
                        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-yellow-600 focus:border-yellow-600 block w-full p-2.5"
                        placeholder="arthur" required="">
                </div>
                <div>
                    <label for="password" class="block mb-2 text-sm font-medium text-gray-900 ">Password</label>
                    <input type="password" name="password" id="password" placeholder="••••••••"
                        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-yellow-600 focus:border-yellow-600 block w-full p-2.5"
                        required="">
                </div>
                <button type="submit"
                    class="w-full text-white bg-yellow-600 hover:bg-yellow-700 focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mb-5 mt-4">Login</button>
            </form>
        </div>
    </div>
</div>

<!-- modal add menu -->
<div id="default-modal-menu" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                <h3 class="text-lg font-semibold text-gray-900">
                    Create New Menu
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-toggle="default-modal-menu">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <form action="/menu" method="POST" enctype="multipart/form-data" class="p-4 md:p-5">
                <div class="grid gap-4 mb-4 grid-cols-2">
                    <div class="col-span-2">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Name</label>
                        <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Type product name" required="">
                    </div>
                    <div class="col-span-2 sm:col-span-1">
                        <label for="price" class="block mb-2 text-sm font-medium text-gray-900">Price</label>
                        <input type="number" name="price" id="price" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="$2999" required="">
                    </div>
                    <div class="col-span-2 sm:col-span-1">
                        <label for="category" class="block mb-2 text-sm font-medium text-gray-900">Category</label>
                        <select id="category" name="category" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5">
                            <option selected="">Select category</option>
                            <option value="food">Food</option>
                            <option value="drink">Drink</option>
                        </select>
                    </div>
                    <div class="col-span-2">
                        <label for="description" class="block mb-2 text-sm font-medium text-gray-900">Product Description</label>
                        <textarea id="description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" placeholder="Write product description here" name="description"></textarea>                    
                    </div>
                    <div class="col-span-2">
                        <label class="block mb-2 text-sm font-medium text-gray-900" for="file_input">Upload Image</label>
                        <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50" id="file_input" type="file" name="image">
                    </div>
                </div>
                <button type="submit" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                    <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                    Add new menu
                </button>
            </form>
        </div>
    </div>
</div>

<div id="default-modal-cart" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 z-50 w-full md:inset-0 h-full">
    <div class="relative p-4 w-full max-h-full">
        <div class="relative bg-white rounded-lg shadow">
            <button type="button" class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-hide="default-modal-cart">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="p-4 md:p-5">
                <section class="bg-white py-8 antialiased md:py-16">
                    <div class="mx-auto max-w-screen-xl px-4 2xl:px-0">
                        <h2 class="text-xl font-semibold text-gray-900 sm:text-2xl">Shopping Cart</h2>
                        <div class="mt-6 sm:mt-8 md:gap-6 lg:flex lg:items-start xl:gap-8">
                            <div id="cart-items" class="mx-auto w-full flex-none lg:max-w-2xl xl:max-w-4xl">
                                <!-- Cart items -->
                            </div>
                            <div class="mx-auto mt-6 max-w-4xl flex-1 space-y-6 lg:mt-0 lg:w-full">
                                <form id="checkout-form" action="/order" method="POST" enctype="multipart/form-data">
                                    <div class="space-y-4 rounded-lg border border-gray-200 bg-white p-4 shadow-sm sm:p-6">
                                        <p class="text-xl font-semibold text-gray-900">Order summary</p>
                                        <div class="space-y-4">
                                            <div class="space-y-2">
                                                <dl class="flex items-center justify-between gap-4">
                                                    <dt class="text-base font-normal text-gray-500">Total Price</dt>
                                                    <dd id="total-price" class="text-base font-medium text-gray-900">$0.00</dd>
                                                </dl>
                                            </div>
                                        </div>
                                        <input type="hidden" name="cart" id="cart-input" />
                                        <button 
                                        type="submit" id="proceed-to-checkout" class="flex w-full items-center justify-center rounded-lg bg-yellow-700 px-5 py-2.5 text-sm font-medium text-white hover:bg-yellow-800 focus:outline-none focus:ring-4 focus:ring-yellow-300">Pay?</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>






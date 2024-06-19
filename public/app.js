document.addEventListener("DOMContentLoaded", function () {
  const addToCartButtons = document.querySelectorAll(".add-to-cart");
  const cartForm = document.getElementById("checkout-form");
  const submitCartButton = document.getElementById("proceed-to-checkout");

  addToCartButtons.forEach((button) => {
    button.addEventListener("click", function (event) {
      event.preventDefault();

      const productId = this.dataset.productId;
      const productName = this.dataset.productName;
      const productImage = this.dataset.productImage;
      const productPrice = parseFloat(this.dataset.productPrice);
      const quantity = 1;

      let cart = JSON.parse(localStorage.getItem("cart")) || [];

      const existingProductIndex = cart.findIndex(
        (item) => item.productId === productId
      );

      if (existingProductIndex !== -1) {
        cart[existingProductIndex].quantity += 1;
      } else {
        cart.push({
          productId,
          productName,
          productImage,
          productPrice,
          quantity,
        });
      }

      localStorage.setItem("cart", JSON.stringify(cart));
      alert("Product added to cart!");
      updateCartView();
    });
  });

  if (cart.length === 0) {
    submitCartButton.style.display = "none";
  } else {
    submitCartButton.style.display = "block";
  }

  if (submitCartButton) {
    submitCartButton.addEventListener("click", function (event) {
      event.preventDefault();

      const cart = JSON.parse(localStorage.getItem("cart"));
      const cartInput = document.getElementById("cart-input");
      cartInput.value = JSON.stringify(cart);

      cartForm.submit();
    });
  }

  function updateCartView() {
    const cartItemsContainer = document.getElementById("cart-items");
    const totalPriceElement = document.getElementById("total-price");
    cartItemsContainer.innerHTML = "";

    const cart = JSON.parse(localStorage.getItem("cart")) || [];
    let totalPrice = 0;

    cart.forEach((item) => {
      const itemElement = document.createElement("div");
      itemElement.classList.add(
        "rounded-lg",
        "border",
        "border-gray-200",
        "bg-white",
        "p-4",
        "shadow-sm",
        "md:p-6"
      );
      itemElement.innerHTML = `
              <div class="space-y-4 md:flex md:items-center md:justify-between md:gap-6 md:space-y-0">
                  <a href="#" class="shrink-0 md:order-1">
                      <img class="h-20 w-20" src="${item.productImage}" alt="${
        item.productName
      }" />
                  </a>
                  <label for="counter-input" class="sr-only">Choose quantity:</label>
                  <div class="flex items-center justify-between md:order-3 md:justify-end">
                      <div class="text-end flex gap-x-4 items-center md:order-4 md:w-32">
                          <p class="text-base py-0.5 px-1.5 bg-gray-200 rounded-full text-gray-900">Qty: ${
                            item.quantity
                          }</p>
                          <p class="text-base font-bold text-gray-900">$${
                            item.productPrice * item.quantity
                          }</p>
                      </div>
                  </div>
                  <div class="w-full min-w-0 flex-1 space-y-4 md:order-2 md:max-w-md">
                      <a href="#" class="text-base font-medium text-gray-900 hover:underline capitalize">${
                        item.productName
                      }</a>
                      <div class="flex items-center">
                          <button type="button" class="remove-item inline-flex items-center text-sm font-medium text-red-600 hover:underline" data-product-id="${
                            item.productId
                          }">
                              <svg class="me-1.5 h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18 17.94 6M18 18 6.06 6" />
                              </svg>
                              Remove
                          </button>
                      </div>
                  </div>
              </div>
          `;

      totalPrice += item.productPrice * item.quantity;
      cartItemsContainer.appendChild(itemElement);
    });

    totalPriceElement.innerText = `$${totalPrice.toFixed(2)}`;

    const removeItemButtons = document.querySelectorAll(".remove-item");
    removeItemButtons.forEach((button) => {
      button.addEventListener("click", function () {
        const productId = this.dataset.productId;
        removeItemFromCart(productId);
        updateCartView();
      });
    });
  }

  function removeItemFromCart(productId) {
    let cart = JSON.parse(localStorage.getItem("cart")) || [];
    cart = cart.filter((item) => item.productId !== productId);
    localStorage.setItem("cart", JSON.stringify(cart));
  }

  updateCartView();
});

document.addEventListener('DOMContentLoaded', () => {
    const cartItemsContainer = document.getElementById('cart-items');
    const cartSummaryContainer = document.getElementById('cart-summary');
    const form = document.querySelector('form');

    function updateCart() {
        let cart = JSON.parse(localStorage.getItem('cart')) || [];

        if (cart.length === 0) {
            cartItemsContainer.innerHTML = '<p>Твојата кошничка е празна.</p>';
            cartSummaryContainer.innerHTML = '';
        } else {
            let total = 0;
            cartItemsContainer.innerHTML = ''; // Clear the container first
            cart.forEach((item, index) => {
                const itemTotal = item.price * item.quantity;
                total += itemTotal;

                const itemElement = document.createElement('div');
                itemElement.className = 'cart-item';
                itemElement.innerHTML = `
                    <div>
                        <h2>${item.name}</h2>
                        <p>Цена: ${item.price.toFixed()} мкд</p>
                        <p>Броја: ${item.quantity}</p>
                    </div>
                    <p>Вкупно: ${itemTotal.toFixed()} мкд</p> <br>
                    <button class="remove-btn" onclick="removeFromCart(${index})">Избриши</button>
                `;
                cartItemsContainer.appendChild(itemElement);
            });

            cartSummaryContainer.innerHTML = `
                <h2 class="total-price">Вкупно за плаќање: ${total.toFixed()} денари</h2>

            `;
        }
    }

    window.removeFromCart = function(index) {
        let cart = JSON.parse(localStorage.getItem('cart')) || [];
        cart.splice(index, 1); // Remove item at index
        localStorage.setItem('cart', JSON.stringify(cart));
        updateCart();
    };

    window.proceedToCheckout = function() {
        // Open the popup form
        document.getElementById('popupForm').style.display = 'block';
    };

    document.querySelector('.close').addEventListener('click', function() {
        document.getElementById('popupForm').style.display = 'none';
    });

    window.addEventListener('click', function(event) {
        if (event.target == document.getElementById('popupForm')) {
            document.getElementById('popupForm').style.display = 'none';
        }
    });

    // Add cart data to form before submission
    form.addEventListener('submit', function(event) {
        // Get cart data
        let cart = JSON.parse(localStorage.getItem('cart')) || [];
        let cartData = JSON.stringify(cart);

        // Create a hidden input field for the cart data
        let input = document.createElement('input');
        input.type = 'hidden';
        input.name = 'cart';
        input.value = cartData;

        // Append it to the form
        this.appendChild(input);

        // Clear the cart from localStorage
        localStorage.removeItem('cart');
    });

    updateCart();
});

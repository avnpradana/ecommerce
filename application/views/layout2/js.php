<!-- Js Plugins -->
<script src="<?=base_url('userr/')?>js/jquery-3.3.1.min.js"></script>
    <script src="<?=base_url('userr/')?>js/bootstrap.min.js"></script>
    <script src="<?=base_url('userr/')?>js/jquery.nice-select.min.js"></script>
    <script src="<?=base_url('userr/')?>js/jquery.nicescroll.min.js"></script>
    <script src="<?=base_url('userr/')?>js/jquery.magnific-popup.min.js"></script>
    <script src="<?=base_url('userr/')?>js/jquery.countdown.min.js"></script>
    <script src="<?=base_url('userr/')?>js/jquery.slicknav.js"></script>
    <script src="<?=base_url('userr/')?>js/mixitup.min.js"></script>
    <script src="<?=base_url('userr/')?>js/owl.carousel.min.js"></script>
    <script src="<?=base_url('userr/')?>js/main.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <script>
    document.addEventListener('DOMContentLoaded', function () {
        const updateCartButton = document.getElementById('update-cart-btn');

        updateCartButton.addEventListener('click', function () {
            const cartItems = [];
            const rows = document.querySelectorAll('.shopping__cart__table tbody tr');

            rows.forEach(row => {
                const qtyInput = row.querySelector('.qty-input');
                const keranjangId = qtyInput.dataset.id;
                const qty = parseInt(qtyInput.value);

                cartItems.push({ keranjang_id: keranjangId, qty: qty });
            });

            // Kirim data ke server
            fetch('<?= base_url("front/Cart_details/update_cart/") ?>', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({ items: cartItems }),
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert('Cart updated successfully!');
                    location.reload(); // Reload halaman untuk melihat perubahan
                } else {
                    alert('Failed to update cart!');
                }
            })
            .catch(error => console.error('Error:', error));
        });
    });

    document.querySelector('#search-input').addEventListener('keypress', function(e) {
    if (e.key === 'Enter') {
        e.preventDefault(); // Hindari submit form
        let query = this.value.trim(); // Ambil input pencarian
        if (query) {
            // Redirect ke URL pencarian produk
            window.location.href = `<?= base_url('product/cari/') ?>${query}`;
        }
    }
});

</script>

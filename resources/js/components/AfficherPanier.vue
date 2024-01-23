<template>
  <html lang="en">

  <Menu title="Page Title" />

  <body>
    <div class="container-fluid">

        <div class="row min-vh-100">
            <div class="col-12">
             
            </div>

            <div class="col-12">
                <!-- Main Content -->
                <div class="row">
                    <div class="col-12 mt-3 text-center text-uppercase">
                        <h2>Shopping Cart</h2>
                    </div>
                </div>

                <main class="row">
                    <div class="col-12 bg-white py-3 mb-3">
                        <div class="row">
                            <div class="col-lg-6 col-md-8 col-sm-10 mx-auto table-responsive">
                                <form class="row">
                                    <div class="col-12"  v-for="product in Cart" :key="product.id">
                                        <table class="table table-striped table-hover table-sm">
                                            <thead>
                                            <tr>
                                                <th>Product</th>
                                                <th>Price</th>
                                                <th>Qty</th>
                                                <th>Amount</th>
                                                <th></th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            <tr>
                                                <td>
                                                  <img :src="product.gallerie" class="img-fluid">
                                                    {{ product.name }}                                                </td>
                                                <td>
                                                  {{ product.price }} DT
                                                </td>
                                                <td>
                                                    <input type="number" min="1" value="1">
                                                </td>
                                                <td>
                                                  {{ product.price }} DT
                                                </td>
                                                <td>
                                                    <button class="btn btn-link text-danger"><i class="fas fa-times" @click="deleteArticleFromPanier(product.id)"></i></button>
                                                </td>
                                            </tr>
                                      
                                            </tbody>
                                            <tfoot>
                                            <tr>
                                               
                                                
                                                <th></th>
                                            </tr>
                                            </tfoot>
                                        </table>
                                        
                                    </div>
                                    <th> Total: {{ formatPrice(totalPrice) }}</th>
                                    <div class="col-12 text-right">
                                        <button class="btn btn-outline-secondary me-3" type="submit">Update</button>
                                        <a href="#" class="btn btn-outline-success"  @click="Payment(totalPrice)">Checkout</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </main>
                <!-- Main Content -->
            </div>

            <div class="col-12 align-self-end">
                <!-- Footer -->
                <footer class="row">
                    <div class="col-12 bg-dark text-white pb-3 pt-5">
                        <div class="row">
                            <div class="col-lg-2 col-sm-4 text-center text-sm-left mb-sm-0 mb-3">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="footer-logo">
                                            <a href="index.html">E-Commerce</a>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <address>
                                            221B Baker Street<br>
                                            London, England
                                        </address>
                                    </div>
                                    <div class="col-12">
                                        <a href="#" class="social-icon"><i class="fab fa-facebook-f"></i></a>
                                        <a href="#" class="social-icon"><i class="fab fa-twitter"></i></a>
                                        <a href="#" class="social-icon"><i class="fab fa-pinterest-p"></i></a>
                                        <a href="#" class="social-icon"><i class="fab fa-instagram"></i></a>
                                        <a href="#" class="social-icon"><i class="fab fa-youtube"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-8 text-center text-sm-left mb-sm-0 mb-3">
                                <div class="row">
                                    <div class="col-12 text-uppercase">
                                        <h4>Who are we?</h4>
                                    </div>
                                    <div class="col-12 text-justify">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam imperdiet vel ligula vel sodales. Aenean vel ullamcorper purus, ac pharetra arcu. Nam enim velit, ultricies eu orci nec, aliquam efficitur sem. Quisque in sapien a sem vestibulum volutpat at eu nibh. Suspendisse eget est metus. Maecenas mollis quis nisl ac malesuada. Donec gravida tortor massa, vitae semper leo sagittis a. Donec augue turpis, rutrum vitae augue ut, venenatis auctor nulla. Sed posuere at erat in consequat. Nunc congue justo ut ante sodales, bibendum blandit augue finibus.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-2 col-sm-3 col-5 ms-lg-auto ms-sm-0 ms-auto mb-sm-0 mb-3">
                                <div class="row">
                                    <div class="col-12 text-uppercase">
                                        <h4>Quick Links</h4>
                                    </div>
                                    <div class="col-12">
                                        <ul class="footer-nav">
                                            <li>
                                                <a href="#">Home</a>
                                            </li>
                                            <li>
                                                <a href="#">Contact Us</a>
                                            </li>
                                            <li>
                                                <a href="#">About Us</a>
                                            </li>
                                            <li>
                                                <a href="#">Privacy Policy</a>
                                            </li>
                                            <li>
                                                <a href="#">Terms & Conditions</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-1 col-sm-2 col-4 me-auto mb-sm-0 mb-3">
                                <div class="row">
                                    <div class="col-12 text-uppercase text-underline">
                                        <h4>Help</h4>
                                    </div>
                                    <div class="col-12">
                                        <ul class="footer-nav">
                                            <li>
                                                <a href="#">FAQs</a>
                                            </li>
                                            <li>
                                                <a href="#">Shipping</a>
                                            </li>
                                            <li>
                                                <a href="#">Returns</a>
                                            </li>
                                            <li>
                                                <a href="#">Track Order</a>
                                            </li>
                                            <li>
                                                <a href="#">Report Fraud</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 text-center text-sm-left">
                                <div class="row">
                                    <div class="col-12 text-uppercase">
                                        <h4>Newsletter</h4>
                                    </div>
                                    <div class="col-12">
                                        <form action="#">
                                            <div class="mb-3">
                                                <input type="text" class="form-control" placeholder="Enter your email..." required>
                                            </div>
                                            <div class="mb-3">
                                                <button class="btn btn-outline-light text-uppercase">Subscribe</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>
                <!-- Footer -->
            </div>
        </div>

    </div>
</body>

  </html>
</template>

<script setup>
import { RouterLink } from 'vue-router';
import { useRoute } from 'vue-router';
import { useRouter } from 'vue-router';
import axios from "axios"
import Menu from "../components/Menu.vue";
import { ref, onMounted, computed } from "vue"

const route = useRoute();
const router = useRouter();
const Cart = ref([]);
const allcart = ref([]);
let Username = localStorage.getItem('user');
let token = localStorage.getItem('token');
const total1 = ref(0);

const getCartItems = () => {
  axios.get('http://localhost:8000/api/Cart/getCartsByUsername/${productId}`', {
    headers: {
      'Authorization': `Bearer ${token}`
    },
    params: {
      Username // Replace 'Ahmed' with the actual username
    }
  })
  .then(async (response) => {
    console.log('Response data:', response.data);

    // Ensure that response.data is an array
    const cartItems = Array.isArray(response.data) ? response.data : [];

    // Fetch product details for each cart item
    Cart.value = await Promise.all(cartItems.map(async (cartItem) => {
      try {
        const productResponse = await axios.get(`http://localhost:8000/api/Product/${cartItem.product_id}`, {
          headers: {
            'Authorization': `Bearer ${token}`
          }
        });

        return productResponse.data;
      } catch (error) {
        console.error('Error fetching product details:', error.message);
        // You can handle errors for individual product requests here
        return null;
      }
    }));
  })
  .catch(error => {
    console.error('Error fetching cart items:', error.message);
  });
};





onMounted(async () => {
  await getCartItems();
});



const totalPrice = computed(() => {
  total1.value = Cart.value.reduce((total, product) => {
    return total + parseFloat(product.price);
  }, 0);

  console.log('Total1:', total1.value); // Add this log to check the value

  return total1.value;
});



const formatPrice = (price) => {
  return new Intl.NumberFormat('fr-FR', { style: 'currency', currency: 'TND' }).format(price);
};

const deleteArticleFromPanier = async (productId) => {
  try {
    console.log(productId)
    if (productId) {
      await axios.delete(`http://localhost:8000/api/Cart/promise/${productId}`, {
        headers: {
          'Authorization': `Bearer ${token}`
        }
      });

      await getCartItems();
    } else {
      console.log(productId)
      console.error('Product ID is undefined or null');
    }
  } catch (error) {
    console.error('Error deleting article from cart:', error.message);
  }
};

const Payment = (total1) => {
  router.push({
    name: 'Payment',
    params: { total1 },
  });
};

</script>

<style lang="scss" scoped>
body {
  font-family: 'Arial', sans-serif;
  margin: 0;
  padding: 0;
  background-color: #f4f4f4;
}

.product-container {
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
  gap: 20px;
}

.product {
  background-color: #fff;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  padding: 20px;
  border-radius: 8px;
  text-align: center;
}

.product img {
  max-width: 100%;
  height: auto;
  border-radius: 4px;
}

.checkout-container {
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 20px;
}

.total {
  font-size: 18px;
}

.checkout-buttons {
  flex-grow: 1;
  text-align: right;
}

.checkout-buttons button {
  background-color: #28a745;
  color: #fff;
}

@media screen and (max-width: 600px) {
  .product-container {
    grid-template-columns: 1fr;
  }
}
</style>


<template>
  <div class="container-fluid">
    
    <div >
        <div class="col-12">
            <header class="row">
                <!-- Top Nav -->
               <!-- Top Nav -->
<div class="col-12 bg-dark py-2 d-md-block d-none">
    <div class="row">
        <div class="col-auto me-auto">
            <ul class="top-nav">
                <li>
                    <a href="tel:+123-456-7890"><i class="fa fa-phone-square me-2"></i>+123-456-7890</a>
                </li>
                <li>
                    <a href="mailto:mail@ecom.com"><i class="fa fa-envelope me-2"></i>mail@ecom.com</a>
                </li>
            </ul>
        </div>
        <div class="col-auto">
            <ul class="top-nav">
                <template v-if="!token">
                    <!-- Affiche lorsque l'utilisateur n'est pas connecté -->
                    <li>
                        <a href="AfficherSenregistrer"><i class="fas fa-user-edit me-2"></i>Register</a>
                    </li>
                    <li>
                        <a href="login.html"><i class="fas fa-sign-in-alt me-2"></i>Login</a>
                    </li>
                </template>
                <template v-else>
                    <!-- Affiche lorsque l'utilisateur est connecté -->
                    <li>
                        <a href="/AfficherCategory"><i class="fas fa-sign-in-alt me-2"></i>Bonjour {{ userName }}</a>
                    </li>
                    <li v-if="token">
    <a href="#" @click.prevent="logout"><i class="fas fa-sign-out-alt me-2"></i>Se déconnecter</a>
</li>
                </template>
  

            </ul>
        </div>
    </div>
</div>

                <div class="col-12 bg-white pt-4">
                    <div class="row">
                        <div class="col-lg-auto">
                            <div class="site-logo text-center text-lg-left">
                                <a href="index.html">E-Commerce</a>
                            </div>
                        </div>
                        <div class="col-lg-5 mx-auto mt-4 mt-lg-0">
                            <form action="#">
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="search" class="form-control border-dark" placeholder="Search..." required>
                                        <button class="btn btn-outline-dark"><i class="fas fa-search"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-lg-auto text-center text-lg-left header-item-holder">
                            <a href="#" class="header-item">
                                <i class="fas fa-heart me-2"></i><span id="header-favorite">0</span>
                            </a>
                            <a href="/AfficherPanier" class="header-item">
                                <i class="fas fa-shopping-bag me-2"></i><span id="header-qty" class="me-3">2</span>
                                <i class="fas fa-money-bill-wave me-2"></i><span id="header-price">$4,000</span>
                            </a>
                        </div>
                    </div>

                    <!-- Nav -->
                    <div class="row">
                        <nav class="navbar navbar-expand-lg navbar-light bg-white col-12">
                            <button class="navbar-toggler d-lg-none border-0" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="mainNav">
                                <ul class="navbar-nav mx-auto mt-2 mt-lg-0">
                                    <li class="nav-item active">
                                        <a class="nav-link" href="index.html">Home <span class="sr-only">(current)</span></a>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" id="electronics" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Electronics</a>
                                        <div class="dropdown-menu" aria-labelledby="electronics">
                                            <a class="dropdown-item" href="category.html">Computers</a>
                                            <a class="dropdown-item" href="category.html">Mobile Phones</a>
                                            <a class="dropdown-item" href="category.html">Television Sets</a>
                                            <a class="dropdown-item" href="category.html">DSLR Cameras</a>
                                            <a class="dropdown-item" href="category.html">Projectors</a>
                                        </div>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" id="fashion" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Fashion</a>
                                        <div class="dropdown-menu" aria-labelledby="fashion">
                                            <a class="dropdown-item" href="category.html">Men's</a>
                                            <a class="dropdown-item" href="category.html">Women's</a>
                                            <a class="dropdown-item" href="category.html">Children's</a>
                                            <a class="dropdown-item" href="category.html">Accessories</a>
                                            <a class="dropdown-item" href="category.html">Footwear</a>
                                        </div>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" id="books" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Books</a>
                                        <div class="dropdown-menu" aria-labelledby="books">
                                            <a class="dropdown-item" href="category.html">Adventure</a>
                                            <a class="dropdown-item" href="category.html">Horror</a>
                                            <a class="dropdown-item" href="category.html">Romantic</a>
                                            <a class="dropdown-item" href="category.html">Children's</a>
                                            <a class="dropdown-item" href="category.html">Non-Fiction</a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                    <!-- Nav -->

                </div>
                <!-- Header -->

            </header>
            </div>
            </div></div>

</template>

<script setup>
import axios from 'axios';
import { useRouter } from 'vue-router';
const router = useRouter();

let token=""
let userName=""
token=localStorage.getItem('token')
userName=localStorage.getItem('user')
console.log(token)
console.log(userName)

const logout = async () => {
  console.log("hi");
  
  try {
    const response = await axios.post(
      'http://127.0.0.1:8000/api/logout',
      null,  // pass null as the second argument if you don't have data to send
      {
        headers: {
          'Authorization': `Bearer ${token}`
        }
      }
    );

    console.log("hi");
    console.log(response);

    localStorage.removeItem('token');
    localStorage.removeItem('user');
    router.push("/Bienvenue");
  } catch (error) {
    console.log(error);
    alert(error);
  }
};


</script>


<style lang="scss" scoped>

  .navbar {
    background-color: #3498db;
  }

  /* Change font color */
  .navbar-brand,
  .nav-link {
    color: #ffffff; /* Example color: White */
  }

  /* Change font style and size */
  .navbar-brand,
  .nav-link {
    font-family: 'Arial', sans-serif; /* Example font: Arial */
    font-size: 16px;
  }

  /* Example of changing color for the search button */
  .btn-secondary {
    background-color: #2ecc71; /* Example color: Green */
    color: #ffffff;
  }

  /* Example of changing color for the active link */
  .nav-item.active .nav-link {
    color: #e74c3c; /* Example color: Red */
    font-weight: bold;
  }
</style>

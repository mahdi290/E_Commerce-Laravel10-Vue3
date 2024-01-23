<template>
  
  <div>
    <Menu title="Page Title" />
  </div>
  
  <div class="container-fluid">

<div class="row min-vh-100">
   <div class="col-12">
    
</div>





<div>
 <div class="login-register-container">
   <div class="register-container">
     <h2>S'inscrire</h2>
     <!-- Display success message if user is added successfully -->
     <div v-if="registrationSuccess">
       <p>Utilisateur ajouté avec succès !</p>
     </div>
     <!-- Display error message if password length is less than 3 -->
     <div v-if="passwordError">
       <p>{{ passwordError }}</p>
     </div>
     <form @submit.prevent="ajouterclient">
       <label for="newUsername">Nom d'utilisateur :</label>
       <input type="text" id="newUsername" v-model="newuser.name" required>

       <label for="newEmail">Email</label>
       <input type="text" id="newEmail" v-model="newuser.email" required>

       <label for="newPassword">Mot de passe :</label>
       <input
         type="password"
         id="newPassword"
         v-model="newuser.password"
         required
       >

       <button type="submit">S'inscrire</button>
     </form>

     <p>Vous avez déjà un compte ? <router-link to="/Bienvenue">Connectez-vous ici</router-link>.</p>
   </div>
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
         </div>
</template>

<script>
import { ref } from 'vue';
import axios from 'axios';
import { useRouter } from 'vue-router';
import Menu from "../components/Menu.vue";


export default {
setup() {
 const newuser = ref({
   name: "",
   email: "",
   password: ""
 });

 const router = useRouter();
 const passwordError = ref(""); // New state for password error message
 const registrationSuccess = ref(false); // New state for registration success message

 const ajouterclient = async () => {
   try {
     // Validate password length before submitting the form
     if (newuser.value.password.length < 3) {
       passwordError.value = "Le mot de passe doit contenir au moins 3 caractères.";
       registrationSuccess.value = false; // Reset success message
       return;
     }

     // Clear password error if validation passes
     passwordError.value = "";

     await axios.post('http://localhost:8000/api/register', newuser.value);

     // Reset the form and show success message
     newuser.value = {
       name: "",
       email: "",
       password: ""
     };
     registrationSuccess.value = true;
   } catch (error) {
     console.error(error);
   }
 };

 return {
   newuser,
   passwordError,
   registrationSuccess,
   ajouterclient
 };
}
};
</script>




<style scoped>
/* ... Styles existants */

.login-register-container {
 display: flex;
 justify-content: center;
 align-items: center;
 height: 100vh;
}

.register-container {
 width: 100%;
 max-width: 400px;
 margin: 20px;
 padding: 20px;
 background-color: #fff;
 border-radius: 8px;
 box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
 text-align: center;
}

h2 {
 color: #333;
}

form {
 display: flex;
 flex-direction: column;
 align-items: center;
}

label {
 margin-top: 10px;
 color: #555;
}

input {
 width: 100%;
 padding: 8px;
 margin-top: 5px;
 margin-bottom: 10px;
 box-sizing: border-box;
}

button {
 background-color: #4CAF50;
 color: #fff;
 padding: 10px 20px;
 border: none;
 border-radius: 5px;
 cursor: pointer;
 transition: background-color 0.3s;
}

button:hover {
 background-color: #45a049;
}
</style>
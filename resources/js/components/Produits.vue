<template>

  <!DOCTYPE html>
  <div>
    <Menu title="Page Title" />
  </div>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Page de Produits</title>
  </head>

  <body>
   

    <main>
      <section class="product-container">
        <div v-for="prod in produit" :key="prod.id" class="product">
          <img :src="prod.gallerie" width="100" height="200" />
          <h2>{{ prod.name }}</h2>
          <p>{{ prod.description }}</p>
          <p class="price">{{ prod.price }} DT</p>
         <div v-if="successMessage" class="success-message">
       
      </div>
          <button type="button" class="btn btn-success" @click="addarticletopanier(prod.id)">Ajouter au panier</button>
           
        </div>
         {{ successMessage }} 
      </section>
    </main>
  </body>

  </html>
</template>

<script setup>
import { RouterLink } from 'vue-router';
import { useRoute } from 'vue-router';
import { useRouter } from 'vue-router';
import axios from "axios"
import { ref, onMounted } from "vue"
import Menu from "../components/Menu.vue"
const route = useRoute();
const router = useRouter();
const scategoryId = route.params.id;
const produit = ref([])
const articleid = ref('');
const successMessage = ref('');

let token = "";
token = localStorage.getItem('token');

const addarticletopanier = async (productId) => {
    try {
        const username = localStorage.getItem('user');
        console.log(productId);
        console.log(username);

        await axios.post("http://localhost:8000/api/Cart/", { product_id: productId, username }, {
            headers: {
                'Authorization': `Bearer ${token}`
            }
        });

        successMessage.value = 'Article ajouté avec succès !';
    } catch (error) {
        successMessage.value = 'Echec';
        console.error('Error:', error.message);

        if (error.response) {
            console.error('Response data:', error.response.data);
            console.error('Response status:', error.response.status);
            console.error('Response headers:', error.response.headers);
        } else if (error.request) {
            console.error('No response received:', error.request);
        } else {
            console.error('Request setup error:', error.message);
        }
    }
};


const getproduits = async () => {
  await axios.get(`http://localhost:8000/api/produit/${scategoryId}`, {
            headers: {
                'Authorization': `Bearer ${token}`
            }
        })
    .then(res => {
      produit.value = res.data
    })
    .catch(error => {
      console.log(error)
    })
}
onMounted(() => {
  getproduits();
})
</script>

<style lang="scss" scoped>
body {
  font-family: 'Arial', sans-serif;
  margin: 0;
  padding: 0;
  background-color: #f4f4f4;
}

header {
  background-color: #333;
  color: #fff;
  text-align: center;
  padding: 1em 0;
}

main {
  max-width: 1200px;
  margin: 0 auto;
  padding: 20px;
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

.price {
  font-weight: bold;
  color: #007bff;
}

button {
  background-color: #007bff;
  color: #fff;
  padding: 8px 16px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  transition: background-color 0.3s;
}

button:hover {
  background-color: #0056b3;
}

footer {
  background-color: #333;
  color: #fff;
  text-align: center;
  padding: 1em 0;
  position: fixed;
  width: 100%;
  bottom: 0;
}
</style>

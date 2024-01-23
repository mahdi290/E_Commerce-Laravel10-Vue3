<template>
<div>
  <header>
    <Menu title="Page Title" />
  </header>
  </div>
  <body>
  <div>
    

    <div class="category-page">
      <h2>Choisissez une sous catégorie :</h2>
     <table class="table table-striped">
            <thead>
                <tr>
                    <th>Image sous catégorie</th>
                    <th>Nom sous categorie</th>
                    <th>Selectionner</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="scat in scateg" :key="scat.id">
                    <td><img :src="scat.imagescategorie" width="200" height="100" /></td>
                    <td>{{ scat.nomscategorie }}</td>
                    <td><router-link :to="{name: 'Produits', params: { id:scat.id }}" class="btn btn-success">Select</router-link></td>

                </tr>
            </tbody>


        </table>
    </div>

    <router-view></router-view>
  </div>
</body>
</template>

<script setup>
import { RouterLink } from 'vue-router';
import axios from "axios";
import { useRoute } from 'vue-router';
import { ref, onMounted } from "vue";
import Menu from "../components/Menu.vue";



const route = useRoute();
const scateg = ref([])
const categoryId = route.params.id;
let Username = localStorage.getItem('user');
let token = "";
token = localStorage.getItem('token');

const getcategories = async () => {
    await axios
    .get(`http://localhost:8000/api/scat/${categoryId}`, {
            headers: {
                'Authorization': `Bearer ${token}`
            }
        })
        .then(res => {
            scateg.value = res.data
        })
        .catch(error => {
            console.log(error)
        })
}
onMounted(() => {
    getcategories();
})
</script>

<style scoped>
/* ... Styles existants */

.category-page {
  max-width: 600px;
  margin: 20px auto;
  padding: 20px;
  background-color: #fff;
  border-radius: 8px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  text-align: center;
}

h2 {
  color: #333;
}

ul {
  list-style-type: none;
  padding: 0;
}

li {
  margin: 10px 0;
}

router-link {
  text-decoration: none;
  color: #4CAF50;
  font-weight: bold;
  cursor: pointer;
  transition: color 0.3s;
}

router-link:hover {
  color: #45a049;
}
</style>

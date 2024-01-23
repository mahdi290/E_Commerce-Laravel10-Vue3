<template>

  <div>
    <header>
        <div>
          <Menu/>
        </div>
    </header>

    <div class="category-page">
      <h2>Choisissez une catégorie :</h2>
     <table class="table table-striped">
            <thead>
                <tr>
                    <th>Image catégorie</th>
                    <th>Nom categorie</th>
                    <th>Selectionner</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="cat in categ" :key="cat.id">
                    <td><img :src="cat.imagecategorie" width="200" height="100" /></td>
                    <td>{{ cat.nomcategorie }}</td>
                    <td><router-link :to="{ name: 'AfficherSCategory', params: { id: cat.id } }" class="btn btn-success">Select</router-link></td>
                </tr>
            </tbody>


        </table>
    </div>

    <router-view></router-view>
  </div>
</template>

<script setup>
import { ref, onMounted } from 'vue';
import axios from 'axios';
import { useRouter } from 'vue-router';
import Menu from "../components/Menu.vue"
const router = useRouter();
const categ = ref([]);

let token = "";
token = localStorage.getItem('token');
let Username = localStorage.getItem('user');
console.log(token);
console.log(Username);
const getcategories = async () => {
    try {
        const response = await axios.get("http://localhost:8000/api/Category", {
            headers: {
                'Authorization': `Bearer ${token}`
            }
        });
        categ.value = response.data;
        console.log("success");
    } catch (error) {
        console.error(error);
    }
};

onMounted(() => {
    getcategories();
});

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

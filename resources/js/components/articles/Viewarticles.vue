<template>
    <div>
        <div v-if="isLoading">
            <h2>Loading ....</h2>
        </div>
        <div v-else class="py-6">
            <table class="table table-striped shadow">
                <thead>
                    <tr>
                        <th scope="col">Image</th>
                        <th scope="col">Référence</th>
                        <th scope="col">Désignation</th>
                        <th scope="col">Marque</th>
                        <th scope="col">Quantité Stock</th>
                        <th scope="col">Prix</th>
                        <th scope="col">View</th>
                        <th scope="col">Modifier</th>
                        <th scope="col">Supprimer</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="art in articles" :key="art.id">
                        <td>
                            <img :src="art.imageart" width="70" height="80" />
                        </td>
                        <td>{{ art.reference }}</td>
                        <td>{{ art.designation }}</td>
                        <td>{{ art.marque }}</td>
                        <td>{{ art.qtestock }}</td>
                        <td>{{ art.prix }}</td>
                        <td>
                            <button class="btn btn-outline-primary mx-2">
                                <i class="fa-solid fa-pen-to-square"></i>
                                Edit
                            </button>
                        </td>
                        <td>
                            <button
                                class="btn btn-outline-danger mx-2"
                                @click="deletearticle(art.id)"
                            >
                                <i class="fa-solid fa-trash-can"></i>
                                Delete
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>
<script setup>
import { ref, onMounted } from "vue";
import axios from "axios";
const articles = ref([]);
const isLoading = ref(true);
const getarticles = async () => {
    await axios
        .get("http://localhost:8000/api/articles")
        .then((res) => {
            articles.value = res.data;
            isLoading.value = false;
        })
        .catch((error) => {
            console.log(error);
        });
};
onMounted(() => {
    getarticles();
});
const deletearticle = async (id) => {
    try {
        await axios.delete(`http://localhost:8000/api/articles/${id}`);
        getarticles();
    } catch (error) {
        console.log(error);
    }
};
</script>
<style lang="scss" scoped></style>

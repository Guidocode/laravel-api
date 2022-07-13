<template>
    <div class="container p-5">

        <div class="bg-dark p-2 mb-5">
            <h2 class="title-content text-info">Posts divisi per categorie</h2>

            <nav id="navbar-example2" class="navbar navbar-light bg-light d-flex justify-content-center">
                <ul class="nav nav-pills">

                    <li class="nav-item"
                    v-for="category in postsCat.categories" :key="category.id">

                        <a class="nav-link" :href="'#category' + category.id">{{category.name}}</a>

                    </li>

                </ul>
            </nav>

            <div data-spy="scroll" data-target="#navbar-example2" data-offset="0" class="position-relative" style="height: 400px; overflow-y: scroll;">
                <ul class="list-group">

                    <div v-for="category in postsCat.categories" :key="category.id">

                        <h3 class="bg-light mt-3 mb-0" :id="'category' + category.id"><span class="badge bg-info text-dark m-2">{{category.name}}</span></h3>

                        <div v-if="category.posts">
                            <li class="list-group-item d-flex justify-content-between align-items-center"
                            v-for="post in category.posts" :key="post.id">
                                <h4>{{post.title}}</h4>
                            </li>
                        </div>


                        <div v-else>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Nessun post appartenente a questa categoria
                            </li>
                        </div>

                    </div>

                </ul>
            </div>
        </div>

    </div>
</template>

<script>
import Axios from 'axios';

export default {

    name: 'App',

    data(){
        return{
            apiUrl: 'http://127.0.0.1:8001/api/posts',
            postsCat: []
        }
    },

    methods:{
        getApi(){
            Axios.get(this.apiUrl)
            .then(resp =>{
                this.postsCat = resp.data;
                console.log(this.postsCat);
            })
        }
    },

    mounted(){
        this.getApi()
    }
}
</script>

<style>

</style>

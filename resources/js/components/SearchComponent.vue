<template>
    <div class="container">
        <div class="row justify-content-center">
            <div id="searcher" class="col-sm-8">
              <div class="form-group mx-sm-3 mb-2">
                <input v-model="query" type="text" name="q" class="form-control" placeholder="Buscar ..">
              </div>
            </div>
            
            <div v-for="article in articles"  class="col-sm-8">
                <div class="card-body">
                    <h5 class="card-title">{{ article.title }}</h5>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import axios from 'axios'

    export default {
        data() {
            return {
                query: '',
                articles: {}
            }
        },

        watch: {
            query: function(val) {
                axios.get('/search?q=' + this.query)
                .then(response => {
                    if(response.data.length > 0)
                        this.articles = response.data;
                })
                .catch(e => {
                    console.log(e);
                });
            }
        }
    }
</script>

<style>
    #searcher {
        margin-top: 100px;
    }
</style>

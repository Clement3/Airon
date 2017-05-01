<template>
    <div class="mt-10">
        <a href="#" class="btn btn-primary btn-block" v-if="isFavorited" @click.prevent="unFavorite(item)">
            Supprimer des favoris
        </a>
        <a href="#" class="btn btn-primary btn-block" v-else @click.prevent="favorite(item)">
            Ajouter aux favoris
        </a>        
    </div>      
</template>

<script>
    export default {
        props: ['item', 'favorited'],

        data: function() {
            return {
                isFavorited: '',
            }
        },

        mounted() {
            this.isFavorited = this.isFavorite ? true : false;
        },

        computed: {
            isFavorite() {
                return this.favorited;
            },
        },

        methods: {
            favorite(item) {
                axios.post('favorite/'+item)
                    .then(response => this.isFavorited = true)
                    .catch(response => console.log(response.data));
            },

            unFavorite(item) {
                axios.post('unfavorite/'+item)
                    .then(response => this.isFavorited = false)
                    .catch(response => console.log(response.data));
            }
        }
    }
</script>
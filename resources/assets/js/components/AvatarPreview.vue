<template>
    <div class="column col-12">

        <div class="text-center">
            <figure v-show="! imageSrc" class="avatar avatar-xl" :data-initial="avatarName" style="background-color: #5764c6;">
            </figure> 

            <figure v-show="imageSrc" class="avatar avatar-xl">
                <img :src="imageSrc" />
            </figure> 
        </div>     

        <div class="mt-20">
            <label class="form-label" for="avatar">{{ langLabel }}</label>

            <div class="input-group">
                <input @change="previewThumbnail" class="form-input" type="file" id="avatar" name="avatar">
                <a v-show="destroyLink" :href="destroyLink" class="btn btn-primary input-group-btn btn-lg">{{ langDelete }}</a> 
            </div>
        </div>                                 
    </div>
</template>

<script>
    export default {
        props: ['imageSrc', 'avatarName', 'destroyLink', 'langLabel', 'langDelete'],

        methods: {
            previewThumbnail: function(event) {

                var input = event.target;

                if (input.files && input.files[0]) {
                    
                    var reader = new FileReader();

                    var vm = this;

                    reader.onload = function(e) {
                        vm.imageSrc = e.target.result;
                    }

                    reader.readAsDataURL(input.files[0]);
                }
            }
        }        
    }
</script>

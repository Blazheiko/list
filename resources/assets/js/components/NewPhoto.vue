<template>
    <div class="input-group">

        <span>Select New Photo</span>
        <input ref="photo" type="file" class="form-control" name="photo" @change="update">

    </div>
</template>

<script>
    export default {
        props: ['user'],
        data() {
            return {
                photos: []
            }
        },
        mounted() {
            this.getPhotos();
            this.listen();
        },
        methods: {
            update(e) {
                e.preventDefault();

                axios.post('/api/upload/photo?api_token=' + this.user.api_token, this.gatherFormData())
                    .then(response => this.photos.unshift(response.data));
            },
            /**
             * Gather the form data for the photo upload.
             */
            gatherFormData() {
                const data = new FormData();

                data.append('photo', this.$refs.photo.files[0]);

                return data;
            },
            getPhotos() {
                axios.get('/api/photos').then(response => this.photos = response.data);
            },
            listen() {
                Echo.private('photos')
                    .listen('NewPhoto', (e) => this.photos.unshift(e.photo));
            }
        },
    }
</script>

<template>
    <div class="input-group">

        <span>Select New Photo</span>
        <input ref="photo" type="file" class="form-control" name="photo" @change="update">
        <li class="left clearfix" v-for="photo in photos">
            <div class="chat-body clearfix">

                <div class="container">
                    <div class="row">
                        <div class="col-md-10 col-md-offset-1">
                            <img v-bind:src="photo"  style="width:150px; height:150px; float:left; border-radius:50%; margin-right:25px;">

                            <!--<img v-bind:src="/uploads/photos/ v-html="message.photo_url "  " style="width:150px; height:150px; float:left; border-radius:50%; margin-right:25px;">-->
                        </div>
                    </div>
                </div>


            </div>
        </li>

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

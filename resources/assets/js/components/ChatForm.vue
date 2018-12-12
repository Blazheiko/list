<template>
    <div class="input-group">

        <input id="btn-input" type="text" name="message" class="form-control input-sm" placeholder="Type your message here..." v-model="newMessage" @keyup.enter="sendMessage">
        <input ref="photo" type="file" class="form-control" name="photo" @change="urlFile">
        <!--<input id="photo-input"type="file" name="photo_url" class="form-control input-sm" placeholder="Type your photo here..." v-model="newPhoto" @keyup.enter="sendMessage">-->
        <span class="input-group-btn">
            <button class="btn btn-primary btn-sm" id="btn-chat" @click="sendMessage">
                Send
            </button>
        </span>
        <!--<input ref="photo" type="file" class="form-control" name="photo" @change="update">-->

    </div>
</template>

<script>
    export default {
        props: ['user'],

        data() {
            return {
                newMessage: '',
                newPhoto:''
            }
        },

        methods: {
            sendMessage() {
                this.$emit('messagesent', {
                    user: this.user,
                    message: this.newMessage,
                    photo_url: this.newPhoto
                });

                this.newMessage = '';
                this.newPhoto = ''

            },
            urlFile(){
                newPhoto = gatherFormData()
            },

            update(e) {
                e.preventDefault();

                axios.post('/upload/photo?api_token=' + this.user.api_token, this.gatherFormData())
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
        }
    }
</script>
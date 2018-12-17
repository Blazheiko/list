<template>
    <div class="input-group">
        <input id="btn-input" type="text" name="message" class="form-control input-sm" placeholder="Type your message here..." v-model="newMessage" @keyup.enter="sendMessage">

        <span class="input-group-btn">
            <button class="btn btn-primary btn-sm" id="btn-chat" @click="sendMessage">
                Send
            </button>
        </span>
        <!--<input ref="photo" type="file" class="form-control" name="photo" @change="sync">-->

    </div>
</template>

<script>
    export default {
        props: ['user'],

        data() {
            return {
                newMessage: '',
                // photo:''
            }
        },

        methods: {
            sendMessage() {
                if (this.newMessage !='') {this.$emit('messagesent', {
                    user: this.user,
                    message: this.newMessage
                });
                    this.newMessage = ''}

            },
            // sync (e) {
            //     e.preventDefault();
            //     let photo = e.target.files[0];
            //     const data = new FormData();
            //     data.append('photo', photo);
            //
            //     this.$emit('photosend', {
            //         photo: data
            //
        }
    }
</script>
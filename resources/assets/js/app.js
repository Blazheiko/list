
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
window.Vue = require('vue');

//Vue.component('example', require('./components/Example.vue'));
Vue.component('chat-messages', require('./components/ChatMessages.vue'));
Vue.component('chat-form', require('./components/ChatForm.vue'));
// Vue.component('new-photo', require('./components/NewPhoto.vue'));

const app = new Vue({
    el: '#app',

    data: {
        messages: []
    },

    created() {
        this.fetchMessages();

        Echo.private('chat')
            .listen('MessageSent', (e) => {
                this.messages.push({
                    message: e.message.message,
                    photo_url: e.message.photo_url,
                    is_photo:e.message.is_photo,
                    user: e.user
                });
            });


    },
    updated(){
        var container =app.$refs.messageDisplay;
        // var container = document.getElementById('#chatcontainer');
        container.scrollTop = container.scrollHeight;
    },

    methods: {
        fetchMessages() {
            axios.get('/messages').then(response => {
                this.messages = response.data;
            });
           // this.scrollToBottom('#chat-container')
        },

        addMessage(message) {
            this.messages.push(message);

            axios.post('/messages', message).then(response => {
                console.log(response.data);
            });
            // this.scrollToBottom('#chat-container')
        },
        update(e) {
            e.preventDefault();

            let photoname = this.gatherFormData();

            axios.post('photo', photoname )
                .then(response => this.messages.push({
                    message: response.data.message.message,
                    photo_url: response.data.message.photo_url,
                    is_photo:response.data.message.is_photo,
                    user: response.data.user
                }));
            // this.scrollToBottom('#chat-container')
            // axios.post('photo', photoname )
            //     .then(response => {console.log(response.data);
            //     });
            // this.messages = [] ;
            // this.fetchMessages();

        },

        gatherFormData() {
            const data = new FormData();

            data.append('photo', this.$refs.photo.files[0]);

            return data;
        },
        // scrollToBottom(id) {
        //     var container = document.getElementById(id);
        //     container.scrollTop = container.scrollHeight;
        // },
        // scrollToEnd(id) {
        //     var container = this.$el.querySelector(id);
        //     container.scrollTop = container.scrollHeight;
        // },


    }
});

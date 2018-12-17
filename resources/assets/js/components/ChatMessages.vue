
    <template>
        <ul class="chat">
            <li class="left clearfix" v-for="message in messages">
                <div   class="chat-body clearfix">
                    <div class="header">

                        <strong class="primary-font">
                            <img v-bind:src="'/uploads/avatars/'+ message.user.photo " style="width:32px; height:32px; border-radius:50%">
                            {{ message.user.name }}
                        </strong>
                    </div>
                    <p>
                        {{ message.message }}
                    </p>

                    <span v-if="message.is_photo">
                        <div class="container">
                           <div class="row">
                              <div class="col-md-10 col-md-offset-1">
                                 <img v-bind:src="'/uploads/photos/'+ message.photo_url"  style="width:150px; height:150px; float:left; margin-right:25px;">

                                  <!--<img v-bind:src="/uploads/photos/ v-html="message.photo_url "  " style="width:150px; height:150px; float:left; border-radius:50%; margin-right:25px;">-->
                               </div>
                           </div>
                         </div>

                    </span>



                </div>
            </li>
        </ul>
    </template>

    <script>


        export default {
            props: ['messages'],
        };</script>


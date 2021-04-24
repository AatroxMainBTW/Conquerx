<template>
<div >
  <button class="bg-red-500 text-sm py-3 px-4 text-white rounded-full hover:bg-red-700 transition duration-500" @click="likePost" v-text="buttonText">

  </button>
</div>
</template>

<script>
      export default {
        props:[
            'postId',
            'likes'
        ],
        mounted() {
            console.log('Component mounted.')
        },


        data:function(){
            return {
                status: this.likes,
                }
            },
        methods:{
            likePost(){
                axios.post('/post/like/'+this.postId)
                .then(response =>{
                    this.status = ! this.status;
                    console.log(response.data)
                    console.log(this.status)
            })
            }
        },
        computed:{
            buttonText(){
                return (this.status) ? 'Unlike' : 'Like'
                },

            }
    }
</script>

<template>

  <button class="bg-red-500 px-4 py-2 text-white text-sm rounded-full hover:bg-red-700 transition duration-500 mr-5" @click="followProfile" v-text="buttonText">
    <span>Follow</span>
  </button>

</template>

<script>
      export default {
      props:[
            'profileId',
            'follows'
        ],
         data:function(){
            return {
                status: this.follows,
                }
            },
        mounted() {
            console.log('Component mounted.')
        },
  methods:{
    followProfile(){
      axios.post('/profile/follow/'+this.profileId)
      .then(response=>{
        this.status = ! this.status;
        console.log(response.data);
      })
    }
  },
  computed:{
            buttonText(){
                return (this.status) ? 'Unfollow' : 'Follow'
                },

            }
    }
</script>

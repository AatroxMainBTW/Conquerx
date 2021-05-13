<template>
<div>

 <div class="max-w-sm rounded overflow-hidden shadow-lg bg-white ">
           <img class="w-full" :src="img" >
            <div class="px-6 py-4">
              <p class="text-gray-700 text-base">
                    {{caption}}
              </p>
            </div>
             <div class="px-6 pt-4 pb-2">
              <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">
                <strong>Likes :</strong>
                <strong>{{LikeCount}}</strong>
              </span>
              <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">Comment : 0</span>
            </div>



    </div>

  <div class="flex flex-row justify-center mt-2 mr-80">

 <button class="bg-red-500 text-sm py-3 px-4 text-white rounded-full hover:bg-red-700 transition duration-500" @click="likePost" v-text="buttonText">
   Likes
  </button>

<button class="bg-red-500 text-sm py-3 px-4 text-white rounded-full hover:bg-red-700 transition duration-500 ml-3">
    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline-block" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" />
      </svg>
    <span class="ml-2">Comment</span>
</button>
</div>
</div>



</template>
<script>
      export default {

        mounted() {
            console.log('Component mounted.')
        },
        props:[
          'img',
          'caption',
          'postId',
          'likes',
          'likec'
        ],
      data:function(){
            return {
                status: this.likes,
                LikeCount: this.likec,
                }
            },
        methods:{
            likePost(){
                axios.post('/post/like/'+this.postId )
                .then(response =>{
                    this.status = ! this.status;
                    if(this.status){
                      this.LikeCount++;
                    }else{
                      this.LikeCount--;
                    }
                    console.log(response.data)
                    console.log(this.LikeCount)
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

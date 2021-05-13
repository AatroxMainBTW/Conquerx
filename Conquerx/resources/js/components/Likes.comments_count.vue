<template>
<div class="px-6 pt-4 pb-2">
              <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">
                <strong>Likes : </strong>
                <strong>{{likesCount}}</strong>
              </span>
              <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">
                <strong >Comment: </strong>
                <strong>0</strong>
              </span>
            </div>
</template>


<script>
      export default {
        props:[
            'likesCount'
        ],
        mounted() {
            console.log('Component mounted.')
        },
      data:function(){
        return{
          'likesCount':this.likesCount,
        }

      },
      computed:{
            buttonText(){
                return this.likesCount;
                },

            }

    }
</script>

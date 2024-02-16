<template>
    <div>
      <span class="like-btn" @click="likeReceta" :class="{ 'like-active' : this.like }"></span>
    </div>
    <p> {{ cantidadLikes }} Les gustó esta receta</p>
</template>


<script>

  export default{

    props: ['recetaId', 'like', 'likes'],
    data: function(){
      return {
        totalLikes: this.likes
      }
    },
    methods: {

      likeReceta(){
        console.log('Diste me gusta', this.recetaId);
        axios.post('/recetas/'+this.recetaId)
          .then(respuesta => {
            if (respuesta.data.attached.length > 0) {
              this.$data.totalLikes++;
            } else {
              this.$data.totalLikes--;
            }

          })
          .catch(error =>{
            if (error.response.status=== 401) {
              window.location= '/register';
            }
          })
      }
    },
    computed: {
      cantidadLikes: function(){

        return this.totalLikes
      }
    }
  }
</script>
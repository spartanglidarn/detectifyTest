<template>
  <div class="movies">
    <ul>
      <li v-for="item in items" :key="item.id">
        {{item.title}}
      </li>
    </ul>
  </div>
</template>

<script>
import Vue from 'vue'
let movies = fetch('/backend/public/get-top-rated-movies')
  .then(function (response) {
    return new Vue({
      el: '#movies',
      data: {
        items: response.json()
      }
    })
  })

// export default {
//   name: 'TopRatedMovies',
//   data () {
//     return {
//       items: movies
//     }
//   }
// }

</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
h1, h2 {
  font-weight: normal;
}
ul {
  list-style-type: none;
  padding: 0;
}
li {
  display: inline-block;
  margin: 0 10px;
}
a {
  color: #42b983;
}
</style>

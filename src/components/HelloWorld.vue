<template>
  <v-container
    class="container"
  >
    <v-layout
      text-xs-center
      wrap
    >
      <v-flex xs12 sm6>
        <div class="nyancat"></div>
      </v-flex>
      <v-flex xs12 sm6 class="maintitle">
        <p class="display-2">卍乂_煞氣a貓耳邪教祭典_乂卍</p>
        <p class="display-1">三校聯合茶會</p>
        <p class="title">8/1 - 8/2</p>
      </v-flex>
    </v-layout>
  </v-container>

</template>

<script>
  export default {
    data: () => ({
      card: 0,
      scrollA: 0,
      scrollB: 0
    }),
    methods: {

    }
  }
</script>

<style>
  .maintitle {
    display: flex;
    flex-direction: column;
    justify-content: center;
  }
  .container {
    height: 100%;
    background-color: #0b4177;
  }
  .nyancat {
    height: 80vh;
    background-size: contain;
    background-position: center;
    background-repeat: no-repeat;
    background-image: url(https://requestreduce.org/images/nyan-cat-clipart-11.png);
  }
  @media (max-width:500px) {
    .nyancat {
      height: 300px;
    }
  }
</style>

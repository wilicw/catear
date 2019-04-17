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
        <p class="headline">8/3 - 8/4</p>
      </v-flex>
    </v-layout>
  </v-container>

</template>

<script>
  export default {
    data: () => ({
    }),
    methods: {
    }
  }
</script>

<style lang="scss">
  .maintitle {
    display: flex;
    flex-direction: column;
    justify-content: center;
  }
  .nyancat {
    height: 80vh;
    background-size: contain;
    background-position: center;
    background-repeat: no-repeat;
    background-image: url(../assets/logo.png);
  }
  @media (max-width:500px) {
    .nyancat {
      width: 90vw;
      height: 50vh;
    }
  }
</style>

<template>
  <v-container
    class="container"
  >
    <v-layout
      text-xs-center
      wrap
    >
      <v-flex xs12 sm6 class="px-5">
        <div class="nyancat"></div>
      </v-flex>
      <v-flex xs12 sm6 class="maintitle">
        <p class="display-2">卍乂_煞氣a貓耳邪教祭典_乂卍<br>
        <p class="display-1">三校聯合茶會<br>
        <p class="headline">8/3 - 8/4<br>
        <p class="title">問何為真理？ 貓說：「貓耳」<br><br>
        問何為正義？  貓說：「乃可愛的貓耳」<br><br>
        問何人拯救世界，為凡人帶來救贖？  貓說：「唯有戴上可愛的貓耳之人能為世間帶來美好」<br><br>
        <b>貓耳</b><br><br>
        帶來精神上的富足，帶來愛與關懷<br><br>
        在貓耳的世界裡忘卻時間的流逝</p>
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

<template>
  <v-container
    class="container"
  >
    <v-layout
      text-xs-center
      wrap
    >
      <v-flex xs12 sm6 class="px-5">
        <p class="display-2 mt-5">住宿</p>
        <hr>
        <br>
        <p class="headline">背包棧旅店-西門店</p>
        <p class="title"><v-icon>home</v-icon> 台北市萬華區康定路25巷13號</p>
        <p class="title"><v-icon>phone</v-icon> 02 89783666</p>
        <br>
        <p class="title"><b>注意事項</b></p>
        <p class="title">住宿 + 保險費共 650 元，請於當天攜帶<p>
        <p class="title">欲住宿者請交住宿<a href="家長同意書.pdf">家長同意書</a></p>
      </v-flex>
      <v-flex xs12 sm6 class="pt-5">
        <v-img src="hotel.jpg"></v-img>
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
  .display-2 {
    font-weight: 500;
  }
  .title {
    font-weight: 400;
  }
  hr {
    color: rgba(0, 0, 0, 0.5);
  }
</style>

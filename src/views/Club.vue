<template>
  <v-container
    class="container"
  >
    <p class="display-2 text-xs-center mb-5">主辦單位</p>
    <v-layout
      text-xs-center
      wrap
    >
      <v-flex xs12 sm12 md12 lg4 class="px-2">
        <v-img src="ssinrc.jpg"></v-img>
        <br>
        <p class="headline">臺北市立松山高級中學資訊研究社</p>
      </v-flex>
      <v-flex xs12 sm12 md12 lg4 class="px-2">
        <v-img src="dacsc.jpg"></v-img>
        <br>
        <p class="headline">臺北市立大安高級工業職業學校電腦研究社</p>
      </v-flex>
      <v-flex xs12 sm12 md12 lg4 class="px-2">
        <v-img src="cnmc.jpg"></v-img>
        <br>
        <p class="headline">國立臺灣師範大學附屬高級中學校園網路管理小組</p>
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

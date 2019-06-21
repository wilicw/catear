<template>
  <v-container
    class="container"
  >
    <v-layout
      text-xs-center
      wrap
      class="pt-5"
    >
      <v-flex xs12 sm6>
        <p class="display-1">活動地點</p>
        <p class="headline mt-5">茶會 - 松山高中大講堂</p>
        <p class="headline mt-5">夜遊 - 西門町</p>
        <p class="headline mt-5">臺北遊 - 猴侗</p>
        </p>
      </v-flex>

      <v-flex xs12 sm6>
        <p class="display-1">茶會時程</p>
        <p class="headline mt-3"><span style="font-weight: 350;">12:30 ~ 13:00</span> 接待外賓入席</p>
        <p class="headline mt-3"><span style="font-weight: 350;">13:00 ~ 13:30</span> 三校三社幹部介紹</p>
        <p class="headline mt-3"><span style="font-weight: 350;">13:45 ~ 14:00</span> 友社介紹</p>
        <p class="headline mt-3"><span style="font-weight: 350;">14:00 ~ 14:30</span> 公關時間</p>
        <p class="headline mt-3"><span style="font-weight: 350;">14:30 ~ 16:00</span> 遊戲時間</p>
        <p class="headline mt-3"><span style="font-weight: 350;">16:00 ~ 17:00</span> 交接時間</p>
        <p class="headline mt-3"><span style="font-weight: 350;">17:00 ~ </span> 夜遊西門</p>
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
    align-items: center;
  }
</style>

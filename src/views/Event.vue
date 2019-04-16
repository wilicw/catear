<template>
  <v-container
    class="container"
  >
    <v-layout
      text-xs-center
      wrap
    >
      <v-flex xs12 sm6 class="maintitle">
        <p class="display-2">活動地點</p>
        <p class="display-1">
          茶會 - 松山高中大講堂<br>
          夜遊 - 公館商圈<br>
          台北遊 - 大稻埕 ~ 社子島<br>
        </p>
      </v-flex>

      <v-flex xs12 sm6>
        <v-card>
          <v-card-title primary-title>
            <div>
              <h3 class="headline mb-0">茶會時間</h3>
              <div>
                7／21 - 13：00 ~ 17：00<br>
                幹部介紹 	13：00 ~ 13：40<br>
                友社介紹 	13：40 ~ 14：00<br>
                公關時間 	14：00 ~ 14：30<br>
                遊戲時間 	14：30 ~ 15：30<br>
                交接時間 	15：30 ~ 17：00<br>
                7／22 - 台北遊
              </div>
            </div>
          </v-card-title>
        </v-card>
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

<style>
  .maintitle {
    display: flex;
    flex-direction: column;
    justify-content: center;
  }
</style>

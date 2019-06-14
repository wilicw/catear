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
        星盒青年旅館
      </v-flex>
      <v-flex xs12 sm6>
        <GmapMap
          :center="center"
          :options="{
             zoomControl: true,
             mapTypeControl: false,
             scaleControl: false,
             streetViewControl: false,
             rotateControl: false,
             fullscreenControl: false,
             disableDefaultUi: false
           }"
          :zoom="13"
          class="map mt-5"
        >
          <GmapMarker
            v-for="(m,index) in markers"
            :key="index"
            :position="m.position"
            :clickable="true"
            :draggable="true"
            @click="center=m.position"
          />
        </GmapMap>
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
  .map {
    width: 100%;
    height: 70vh;
  }
  @media (max-width: 600px) {
    .map {
      display: none;
    }
  }
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

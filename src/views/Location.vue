<template>
  <v-container
    class="container"
  >
    <v-layout
      text-xs-center
      wrap
    >
      <v-flex xs12>
        <GmapMap
          :center="position"
          :zoom="17"
          style="width: 40vw; height: 80vh"
        >
          <GmapMarker
            :key="index"
            :position="position"
            :clickable="true"
            :draggable="true"
            @click="center=position"
          />
        </GmapMap>
      </v-flex>
    </v-layout>
  </v-container>

</template>

<script>
  export default {
    data: () => ({
      position: {
          lat: 25.0435189,
          lng: 121.5651127
        }
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

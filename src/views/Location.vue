<template>
  <v-container
    class="container"
  >
    <v-layout
      text-xs-center
      wrap
    >
      <v-flex xs12 sm6 class="px-5">
        <p class="display-2 mt-5">集合地點</p>
        <hr>
        <div text-xs-left>
          <div
            v-for="(m, index) in markers"
            @click.stop="showmap(m)"
          >
            <p class="headline mt-4"><v-icon>room</v-icon> {{m.location}} <br v-if="!($vuetify.breakpoint.lgOnly||$vuetify.breakpoint.xlOnly)"><span style="font-weight: 350;">{{m.time}}</span></p>
            <p class="title mt-0" v-for="i in m.contact">{{i.name}} {{i.phone}}<br></p>
            <br>
          </div>
        </div>
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
      <v-dialog
       v-model="dialog"
       :max-width="dialogwidth()"
     >
       <v-card>
         <v-card-title class="headline">{{mobilemap.location}}</v-card-title>

         <v-card-text>
           <GmapMap
             :center="mobilemap.position"
             :options="{
                zoomControl: true,
                mapTypeControl: false,
                scaleControl: false,
                streetViewControl: false,
                rotateControl: false,
                fullscreenControl: false,
                disableDefaultUi: false
              }"
             :zoom="18"
             style="width: 100%; height: 500px"
           >
             <GmapMarker
               :position="mobilemap.position"
               :clickable="true"
               :draggable="true"
               @click="center=mobilemap.position"
             />
           </GmapMap>
         </v-card-text>
       </v-card>
     </v-dialog>
    </v-layout>
  </v-container>

</template>

<script>
  export default {
    data: () => ({
      dialog: null,
      center: {
        lat: 25.045035,
        lng: 121.543078
      },
      mobilemap: {
        location: "",
        position: {
          lat: 0,
          lng: 0
        }
      },
      markers: [
        {
          location: "臺北車站",
          time: "12:00 ~ 12:30",
          contact:[
            {
              name: "牟懋軒",
              phone: "0965490268"
            },
            {
              name: "林婷君",
              phone: "0988904289"
            }
          ],
          position: {
            lat: 25.048333,
            lng: 121.518214
          }
        },
        {
          location: "捷運市府站",
          time: "12:15 ~ 12:45",
          contact:[
            {
              name: "張庭瑋",
              phone: "0983183978"
            },
            {
              name: "林楷傑",
              phone: "0921199292"
            }
          ],
          position: {
            lat: 25.041262,
            lng: 121.567177
          }
        },
        {
          location: "松山高中正門口",
          time: "12:40 ~ 12:55",
          contact:[
            {
              name: "范茗翔",
              phone: "0983556832"
            },
            {
              name: "左昌平",
              phone: "0981729340"
            }
          ],
          position: {
            lat: 25.043519,
            lng: 121.565113
          }
        }
      ]
    }),
    methods: {
      showmap: function (m) {
        this.dialog = true
        this.mobilemap.location = m.location
        this.mobilemap.position.lat = m.position.lat
        this.mobilemap.position.lng = m.position.lng
      },
      dialogwidth: function () {
        if (this.$vuetify.breakpoint.lgOnly||this.$vuetify.breakpoint.xlOnly) {
          return "70vh"
        }
        return "100vh"
      }
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

<template>
  <v-container
    v-touch="{
      left: () => swipe('Left'),
      right: () => swipe('Right'),
      up: () => swipe('Up'),
      down: () => swipe('Down')
    }"
    v-model="page"
    style="height: 100%"
  >
    <v-layout
      text-xs-center
      wrap
    >
    <div class="card" :class="{'hidd': card!=0}">
      <v-flex xs12>
        <v-img
          :src="require('../assets/logo.svg')"
          class="my-5"
          contain
          height="200"
        ></v-img>
      </v-flex>

      <v-flex mb-4>
        <h1 class="display-2 font-weight-light mb-3">
          卍乂_煞氣a貓耳邪教祭典_乂卍0
        </h1>
      </v-flex>
      <img width="100%" src="https://ziad-saab.github.io/nyan/nyan.gif"/>

    </div>

    <div class="card" :class="{'hidd': card!=1}">
      <v-flex mb-4>
        <h1 class="display-2 font-weight-light mb-3">
          卍乂_煞氣a貓耳邪教祭典_乂卍1
        </h1>
      </v-flex>
      <img width="100%" src="https://ziad-saab.github.io/nyan/nyan.gif"/>

    </div>
  </v-layout>
  </v-container>

</template>

<script>
  export default {
    data: () => ({
      card: 0,
      scrollA: 0,
      scrollB: 0,
      page: null,
      scrollflag: true
    }),
    created() {
      this.init()
    },
    methods: {
      init: function () {
        let self = this
        document.addEventListener('mousewheel', function(e){
          self.chromemouseScroll(e)
        })
        document.addEventListener('DOMMouseScroll', function(e){
          self.firefoxmouseScroll(e)
        })
      },
      chromemouseScroll: function (e) {
        this.swipePage(e.deltaY)
      },
      firefoxmouseScroll: function (e) {
        switch (e.detail) {
          case 3:
            this.swipePage(55)
            break
          case -3:
            this.swipePage(-55)
            break
        }
      },
      swipePage: function (y) {
        if (this.scrollflag) {
          this.scrollflag = !1
          let dy = Math.round(y)
          if (dy>=50) {
            this.card++
          } else if (dy <= -50) {
            this.card--
          }
          if (this.card < 0) {
            this.card = 0
          }
          console.log(this.card)
        }
        setTimeout(()=>{this.scrollflag = !0}, 800)
      },
      swipe: function (f) {
        if (f=='Up') {
          this.swipePage(55)
        } else if (f=='Down') {
          this.swipePage(-55)
        }
      }
    }
  }
</script>

<style>
.card {
  transition-duration: .3s;
  overflow: visible;
}

.hidd {
  height: 0;
  opacity: 0;

}
</style>

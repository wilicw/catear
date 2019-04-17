<template>
  <v-app dark>
    <v-toolbar app>
      <v-toolbar-title class="title" @click="$router.push('/')">
        <span>卍乂_煞氣a貓耳邪教祭典_乂卍</span>
      </v-toolbar-title>
      <v-spacer></v-spacer>
      <div class="desktop title" v-if="!($vuetify.breakpoint.xsOnly||$vuetify.breakpoint.smOnly)">
        <v-btn large flat v-for="item in menu" :key="item.id" @click="goto(item.id)">
          <span class="subheading">{{item.text}}</span>
        </v-btn>
      </div>
      <v-icon
        class="mobile"
        color="white"
        @click.stop="drawer = !drawer"
      >menu</v-icon>
    </v-toolbar>

    <v-navigation-drawer
      v-model="drawer"
      absolute
      temporary
    >
      <v-list-tile
        v-for="item in menu"
        :key="item.id"
        class="my-2"
        @click="goto(item.id)"
      >
          <v-list-tile-content>
            <v-list-tile-title>{{ item.text }}</v-list-tile-title>
          </v-list-tile-content>
        </v-list-tile>
      </v-list>
    </v-navigation-drawer>

    <v-content>
      <router-view></router-view>
    </v-content>
  </v-app>
</template>

<script>

export default {
  name: 'App',
  components: {
  },
  data () {
    return {
      drawer: false,
      menu: [
        {id: 0, text: '活動', link: '/event'},
        {id: 1, text: '地點', link: '/'},
        {id: 2, text: '住宿', link: '/'},
        {id: 3, text: '主辦單位', link: '/'}
      ]
    }
  },
  methods: {
    goto: function (id) {
      this.drawer = false
      this.$router.push(this.menu[id].link)
    }
  }
}
</script>

<style lang="scss">
  %background {
    background:
      linear-gradient(
        rgba(0, 0, 0, 0.3)
        rgba(0, 0, 0, 0.3)
      ),
      url(assets/background.jpg) repeat;
  }
  @media (max-width: 850px) {
    .mobile {
      display: block;
    }
    .desktop {
      display: none;
    }
    .container {
      height: 90%;
    }
  }
  .v-content {
    @extend %background;
  }
  .container {
    height: 100%;
    @extend %background;
  }

  .desktop {
    display: block;
  }
  .mobile {
    display: none;
  }
</style>

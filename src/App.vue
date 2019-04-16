<template>
  <v-app dark>
    <v-toolbar app>
      <v-toolbar-title class="title">
        <span>卍乂_煞氣a貓耳邪教祭典_乂卍</span>
      </v-toolbar-title>
      <v-spacer></v-spacer>
      <div class="title" v-if="!$vuetify.breakpoint.xsOnly">
        <v-btn flat v-for="item in menu">
          <span>{{item.text}}</span>
        </v-btn>
      </div>
      <v-icon
        v-if="$vuetify.breakpoint.xsOnly"
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
        @click=""
      >
          <v-list-tile-content>
            <v-list-tile-title>{{ item.text }}</v-list-tile-title>
          </v-list-tile-content>
        </v-list-tile>
      </v-list>
    </v-navigation-drawer>

    <v-content>
      <HelloWorld/>
    </v-content>
  </v-app>
</template>

<script>
import HelloWorld from './components/HelloWorld'

export default {
  name: 'App',
  components: {
    HelloWorld
  },
  data () {
    return {
      drawer: false,
      menu: [
        {id: 0, text: '活動', link: '/'},
        {id: 1, text: '地點', link: '/'},
        {id: 2, text: '住宿', link: '/'},
        {id: 3, text: '主辦單位', link: '/'}
      ]
    }
  }
}
</script>

<style>
  .v-content {
    background-color: #0b4177;
  }
</style>

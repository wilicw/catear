<template>
  <v-container
    class="container"
  >
    <v-layout
      text-xs-center
      wrap
    >
      <v-flex xs12 sm10 offset-sm1 class="px-5" v-if="showform">
        <p class="display-2 mt-5">報名</p>
        <v-alert
          :value="true"
          v-if="success"
          type="success"
        >
          報名成功！
        </v-alert>
        <v-form ref="form" v-model="Signform">
        <v-text-field
          color="indigo lighten-4"
          v-model="name"
          label="姓名"
          :rules="rule"
        ></v-text-field>
        <v-select
          v-model="sex"
          color="indigo lighten-4"
          :items="['其它', '女', '男']"
          :rules="rule"
          label="性別"
        ></v-select>
        <v-text-field
          color="indigo lighten-4"
          v-model="phone"
          label="手機"
          :rules="rule"
        ></v-text-field>
        <v-text-field
          v-model="club_name"
          label="社團名稱"
          :rules="rule"
          color="indigo lighten-4"
        ></v-text-field>
        <v-select
          v-model="year"
          color="indigo lighten-4"
          :rules="rule"
          label="屆別"
          :items="['百十', '百九', '百八以上 & 其他']"
        ></v-select>
        <v-select
          v-model="day"
          color="indigo lighten-4"
          :items="['第一天', '第二天', '全程參與']"
          :rules="rule"
          label="參與日期"
        ></v-select>
        <v-text-field
          v-model="id"
          color="indigo lighten-4"
          label="身份證字號（保險用）"
        ></v-text-field>
        <v-text-field
          v-model="em_name"
          color="indigo lighten-4"
          :rules="rule"
          label="緊急連絡人"
        ></v-text-field>
        <v-text-field
          v-model="em_phone"
          color="indigo lighten-4"
          label="緊急連絡人電話"
          :rules="rule"
        ></v-text-field>
        <v-checkbox
          v-model="room"
          color="indigo lighten-4"
          label="住宿"
        ></v-checkbox>
        <v-checkbox
          v-model="night"
          color="indigo lighten-4"
          label="參加夜遊"
        ></v-checkbox>
        <v-btn @click="submit">送出</v-btn>
      </v-form>
      </v-flex>
    </v-layout>
  </v-container>

</template>

<script>
  const axios = require('axios')
  export default {
    data: () => ({
      Signform: true,
      name: '',
      sex: '',
      club_name: '',
      phone: '',
      year: '',
      day: '',
      night: '',
      room: '',
      id: '',
      em_name: '',
      em_phone: '',
      success: false,
      rule: [
        v => !!v || '此欄必填！',
      ],
      showform: true
    }),
    mounted: function () {
      let ua = navigator.userAgent || navigator.vendor || window.opera
      let res = (ua.indexOf("FBAN") > -1) || (ua.indexOf("FBAV") > -1)
      if (res) {
        alert("請用 Google Chrome 或 Firefox 報名")
        console.log("don't using the fucking facebook app")
        this.showform = false
      }
    },
    methods: {
      submit: function () {
        if (this.$refs.form.validate()) {
          let url = `https://script.google.com/macros/s/AKfycby8fEy63h-8U-_cR52pfhXrB7P8gMnxsa9aqw2lgxDgp-tJf0E/exec?name=${this.name}&sex=${this.sex}&club_name=${this.club_name}&year=${this.year}&phone=${this.phone}&em_name=${this.em_name}&em_phone=${this.em_phone}&day=${this.day}&room=${this.room}&id=${this.id}&night=${this.night}`
          let iframe = document.createElement('iframe');
          iframe.style.display = "none";
          iframe.src = url;
          document.body.appendChild(iframe)
          this.success = true
        } else {
        }
      }
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
  v-text-field, input, input:before, input:after {
    -webkit-user-select: initial;
    -khtml-user-select: initial;
    -moz-user-select: initial;
    -ms-user-select: initial;
    user-select: initial;
  }
</style>

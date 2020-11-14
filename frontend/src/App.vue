<template>
  <v-app id="admin-pro" :class="`${!$vuetify.breakpoint.smAndDown ? 'full-sidebar' : 'mini-sidebar'}`">
      <router-view />
  </v-app>

</template>

<script>

export default {
  name: 'App',

  components: {

  },
  mounted() {

  }

};
</script>

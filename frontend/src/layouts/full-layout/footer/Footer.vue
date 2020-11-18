<template>
  <v-footer app class="footerpart" inset>
    <v-col cols="12">
      <span class="font-weight-medium"
        >© {{ new Date().getFullYear() }} — Admin Dog by
        <a href="https://admin.dog/" target="_blank">admin.dog</a></span
      >
    </v-col>
  </v-footer>
</template>
<script>
export default {
  name: "Footer",
  data: () => ({}),
};
</script>
<style lang="scss">
.v-application .footerpart {
  border-top: 1px solid rgba(0, 0, 0, 0.1) !important;
}
.theme--light.v-footer {
  background: white;
}
</style>

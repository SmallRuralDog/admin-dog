<template>
  <v-app id="inspire" :class="{ horizontalstyle: setHorizontalLayout }">
    <VerticalHeader
      v-if="!setHorizontalLayout"
      v-model="expandOnHover"
    ></VerticalHeader>
    <HorizontalHeader v-else></HorizontalHeader>
    <v-main>
      <v-container fluid class="page-wrapper">
        <transition
          name="router-anim"
          enter-active-class="fade-enter-active fade-enter"
          leave-active-class="fade-leave-active fade-enter"
        >
          <router-view :key="$route.fullPath"></router-view>
        </transition>
        <v-btn
          bottom
          color="primary"
          dark
          fab
          fixed
          right
          @click.stop="setCustomizerDrawer(!Customizer_drawer)"
        >
          <v-icon>mdi-cog</v-icon>
        </v-btn>
      </v-container>
    </v-main>
    <VerticalSidebar
      v-if="!setHorizontalLayout"
      :expand-on-hover.sync="expandOnHover"
    ></VerticalSidebar>
    <HorizontalSidebar v-else></HorizontalSidebar>

    <Customizer v-model="expandOnHover"></Customizer>

    <Footer v-if="!setHorizontalLayout"></Footer>
    <HorizontalFooter v-else></HorizontalFooter>
  </v-app>
</template>

<script>
import HorizontalHeader from "./horizontal-header/HorizontalHeader";
import VerticalHeader from "./vertical-header/VerticalHeader";
import HorizontalSidebar from "./horizontal-sidebar/HorizontalSidebar";
import VerticalSidebar from "./vertical-sidebar/VerticalSidebar";
import Footer from "./footer/Footer";
import HorizontalFooter from "./horizontal-footer/HorizontalFooter";
import Customizer from "./customizer/Customizer";
import { mapState, mapMutations } from "vuex";
export default {
  name: "Layout",

  components: {
    HorizontalHeader,
    VerticalHeader,
    HorizontalSidebar,
    VerticalSidebar,
    Footer,
    HorizontalFooter,
    Customizer,
  },

  props: {
    source: String,
  },
  data: () => ({
    expandOnHover: false,
  }),
  computed: {
    ...mapState(["Customizer_drawer", "setHorizontalLayout"]),
  },

  methods: {
    ...mapMutations({
      setCustomizerDrawer: "SET_CUSTOMIZER_DRAWER",
    }),
  },
};
</script>

<style>
</style>

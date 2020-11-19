import Vue from "vue";
import Vuetify, {VSnackbar, VBtn, VIcon} from "vuetify/lib";
import "@/scss/vuetify/overrides.scss";
import VuetifyToast from 'vuetify-toast-snackbar-ng'

Vue.use(Vuetify, {
    components: {
        VSnackbar,
        VBtn,
        VIcon
    }
})

Vue.use(VuetifyToast, {
    x: 'center',
    y: 'top',
    color: '',
    showClose: true,
    //closeText: 'close',
    closeIcon: 'mdi-close',
    slot: [
    ],
})

const theme = {
    primary: "#398bf7", // change header color from here || "#1e88e6", "#21c1d6", "#fc4b6c", "#563dea", "#9C27b0", "#ff9800"
    info: "#1e88e5",
    success: "#06d79c",
    accent: "#ef5350",
    default: "#563dea",
};

export default new Vuetify({
    theme: {
        themes: {
            dark: theme,
            light: theme,
        },
        dark: false, // If you want to set dark theme then dark:true else set to false
    },
    rtl: false, // If you want to set rtl theme then rtl:true else set to false
});

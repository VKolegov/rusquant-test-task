import {createApp} from "vue/dist/vue.esm-bundler";
import FeedbackForm from "./pages/FeedbackForm.vue";


const app = createApp({
    components: {FeedbackForm},
});

app.mount("#feedback-app");

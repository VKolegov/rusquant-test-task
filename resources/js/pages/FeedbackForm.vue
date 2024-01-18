<script setup>
import {reactive, ref} from "vue";
import feedbackAPI from "../services/feedback.js";

/**
 *
 * @type {import("vue").UnwrapNestedRefs<FeedbackData>}
 */
const feedbackData = reactive({});
const formDisabled = ref(false);


async function onSubmit() {

    formDisabled.value = true;

    try {

        const feedback = await feedbackAPI.create(feedbackData);

        let successMsg = 'Сообщение успешно отправлено';

        if (feedback.id) {
            successMsg = `${successMsg} (id обращения: ${feedback.id})`;
        }

        alert(successMsg);
    } catch (e) {
        alert(e);
    }

    formDisabled.value = false;
}

</script>

<template>
<form @submit.prevent="onSubmit">
    <div class="form-group">
        <label for="name">Ваше имя</label>
        <input v-model.trim="feedbackData.name"
               type="text"
               class="form-control"
               id="name"
               name="name"
               placeholder="Иван"

               :disabled="formDisabled"
        >
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input v-model.trim="feedbackData.email"
               type="email"
               class="form-control"
               id="email"
               name="email"
               placeholder="ivan@gmail.com"
               required

               :disabled="formDisabled"
        >
    </div>
    <div class="form-group">
        <label for="text">Содержание</label>
        <textarea
            v-model.trim="feedbackData.text"
            class="form-control"
            id="text"
            name="text"
            rows="3"
            minlength="16"
            maxlength="65536"
            required

            :disabled="formDisabled"
        ></textarea>
    </div>
    <button type="submit" class="btn btn-primary" :disabled="formDisabled">Отправить</button>
</form>
</template>

<style scoped>

</style>

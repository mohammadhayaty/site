<script setup>
// import { onMounted } from "vue";
// import { ref } from "vue";
import { useAuthStore } from "../stores/auth";

const authStore = useAuthStore();

// const form = ref({
//     email: "",
//     password: "",
// });
// onMounted(async () => {
//   refreshPage();
// });
const refreshPage = () => {
  window.location.reload(); // Reloads the current page
};
refreshPage();
</script>

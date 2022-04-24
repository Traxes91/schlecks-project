<template>
  <div>
    <h2 class="center">My Application</h2>
  </div>
</template>

<script>
  export default {
    data() {
      return {
        message: "A list of words",
        words: []
      };
    },

    created() {
      console.log('created');
    }
  };
</script>

<style>
.center {
  text-align: center;
}
</style>
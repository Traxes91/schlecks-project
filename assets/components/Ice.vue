<template>
  <div>
    <h2 class="center">My Ice</h2>
    <button type="button" class="btn btn-danger" @click="onClick"> clicker</button>
    {{ counter }}
  </div>
  <div>
    <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
      <option selected>Open this select menu</option>
      <option v-for="ice in ice" value="{{ ice }}">{{ ice }}</option>
    </select>
  </div>
</template>

<script>
export default {
  data() {
    return {
      message: "A list of words",
      counter: 0
    };
  },
  computed: {
    ice() {
      return [
        'Schoko',
        'Vanille',
        'Kirsche',
        'Mango'
      ];
    },
  },
  created() {

  },
  methods: {
    onClick() {
      this.counter++;
    }
  }
};
</script>

<style>
.center {
  text-align: center;
}
</style>
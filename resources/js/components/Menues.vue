<template>
  <div class="row">
    <div class="col-md-12 text-center">
      <h2>Menu de selecciones</h2>
    </div>
    <div class="col-md-4">
      <a href="/Administracion/home">
        <Card class="btn" style="width: 20rem; margin-bottom: 2em">
          <template #header>
            <img
              alt="user header"
              src="https://digital.la.synnex.com/hubfs/2019/Blogpost/Janeiro/21_01_header_Comstor.png"
            />
          </template>
          <template #title> Administración </template>
        </Card>
      </a>
    </div>
    <div class="col-md-4">
      <a href="#">
      <Card class="btn" style="width: 20rem; margin-bottom: 2em">
        <template #header>
          <img
            alt="user header"
            src="https://image.winudf.com/v2/image/bXBsLmNvbS5jb21pbmdzb29uX3NjcmVlbl8wXzE1MzQ3NTgxODFfMDQ0/screen-0.jpg?fakeurl=1&type=.jpg"
          />
        </template>
        <template #title> Pronto... </template>
      </Card>
      </a>
    </div>
    <div class="col-md-4">
      <a href="#">
      <Card class="btn" style="width: 20rem; margin-bottom: 2em">
        <template #header>
          <img
            alt="user header"
            src="https://image.winudf.com/v2/image/bXBsLmNvbS5jb21pbmdzb29uX3NjcmVlbl8wXzE1MzQ3NTgxODFfMDQ0/screen-0.jpg?fakeurl=1&type=.jpg"
          />
        </template>
        <template #title> Pronto... </template>
      </Card>
      </a>
    </div>
  </div>
</template>

<script>
import Card from "primevue/card";
import Button from "primevue/Button";
import Tag from "primevue/tag";
export default {
  name: "Menues",
  components: {
    Card: Card,
    Button: Button,
    Tag: Tag,
  },
  methods: {
    changeViewFromSelectMenu(route) {
      window.location.href = window.location.origin + route;
    },
  },
};
</script>

<style>
.btn:hover {
  box-shadow: 0 10px 16px 0 rgb(0 0 0 / 20%), 0 6px 20px 0 rgb(0 0 0 / 19%) !important;
}
</style>
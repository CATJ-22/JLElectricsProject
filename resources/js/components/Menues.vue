<template>
  <div class="row">
    <div class="col-md-12 text-center mb-3">
        <Button
          class="float-left p-button-rounded p-button-personal"
          label="Cerrar sesión"
          icon="pi pi-lock"
          iconPos="left"
          @click="logout"
        />
      <h1>
        <span class="title-chip">Lista de Módulos</span>
      </h1>
    </div>
    <div class="col-md-4">
      <a href="/Administracion/Home">
        <Card class="btn" style="width: 20rem; margin-bottom: 2em">
          <template #header>
            <img alt="user header" src="/img/administracion.png" />
          </template>
          <template #title
            ><Chip
              class="font-weight-bold p-chip-warning"
              label="Modulo Administración"
              icon="pi pi-database"
            ></Chip>
          </template>
        </Card>
      </a>
    </div>
    <div class="col-md-4">
      <a href="#">
        <Card class="btn" style="width: 20rem; margin-bottom: 2em">
          <template #header>
            <img
              alt="user header"
              src="/img/comparativas.png"
            />
          </template>
          <template #title
            ><Chip
              class="font-weight-bold p-chip-warning"
              label="Pronto..."
              icon="pi pi-list"
            ></Chip>
          </template>
        </Card>
      </a>
    </div>
    <div class="col-md-4">
      <a href="#">
        <Card class="btn" style="width: 20rem; margin-bottom: 2em">
          <template #header>
            <img
              alt="user header"
              src="img/taskmanager.png"
            />
          </template>
          <template #title
            ><Chip
              class="font-weight-bold p-chip-warning"
              label="Pronto..."
              icon="pi pi-book"
            ></Chip>
          </template>
        </Card>
      </a>
    </div>
  </div>
</template>

<script>
export default {
  name: "Menues",
  methods: {
    changeViewFromSelectMenu(route) {
      window.location.href = window.location.origin + route;
    },
    logout() {
      window.location.href = window.location.origin + "/Logout";
    },
  },
};
</script>

<style>
.btn:hover {
  box-shadow: 0 10px 16px 0 rgb(0 0 0 / 20%), 0 6px 20px 0 rgb(0 0 0 / 19%) !important;
}
.p-button-personal {
  color: #ffffff;
  background: #0074b3;
}
.title-chip {
  background-color: #f5d20c;
    border-radius: 16px;
    padding: 0 0.5rem;
}
.p-chip {
    background-color: #f5d20c;
    color: #495057;
    border-radius: 16px;
    padding: 0 0.5rem;
}
</style>
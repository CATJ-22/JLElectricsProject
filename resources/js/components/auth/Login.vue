<template>
    <div class="card w-25 mx-auto">
      <div class="card-header text-center h4 font-weight-bold">Inicio de sesión</div>
      <div class="card-body">
        <form id="formLogin" @submit.prevent="login">
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label for="my-input">Usuario</label>
                <input
                  v-model="userInfo.usuario"
                  class="form-control"
                  type="text"
                  placeholder="JLelectric"
                  required
                />
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <label for="my-input">Contraseña</label>
                <input
                  v-model="userInfo.password"
                  class="form-control"
                  type="password"
                  placeholder="********"
                  required
                />
              </div>
            </div>
          </div>
        </form>
      </div>
      <div class="card-footer">
        <button type="submit" form="formLogin" class="btn btn-primary btn-block">
          Iniciar sesión
          <span class="spinner-border text-light spinner-border-sm" v-show="showProgress"> </span>
        </button>
      </div>
    </div>
</template>
<script>
import * as AuthServices from "../../services/auth";
export default {
  name: "Login",
  data() {
    return {
      userInfo: {
        usuario: null,
        password: null,
      },
      showProgress: false,
    };
  },
  methods: {
    login() {
      Swal.fire({
        icon:'info',
        title: "Cargando La información de la sesión!",
        allowOutsideClick:false,
        didOpen: () => {
          Swal.showLoading();
        },
      });
      AuthServices
      .Login(this.userInfo)
      .then((res)=>{
        console.log(res);
      }).catch((res)=>{
        console.log(res);
      })
      
    },
  },
  mounted(){
  }
};
</script>

<style>
</style>
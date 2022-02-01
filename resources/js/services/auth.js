import { ApiService } from "./api.service";

//#region Historial de envios
export const Login = (userInfo) => {
  return new Promise(async resolve => {
    return ApiService.post("/Login",userInfo)
      .then((response) => {
        resolve(response);
      })
      .catch(({ response }) => {
        resolve(response);
      });
  });
}
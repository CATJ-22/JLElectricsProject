import { ApiService } from "./api.service";

//#region Historial de envios
export const SaveMaterialToInventario = (material) => {
  return new Promise(async resolve => {
    return ApiService.post("/Inventario/Save",material)
      .then((response) => {
        resolve(response);
      })
      .catch(({ response }) => {
        resolve(response);
      });
  });
}

export const GetInventario = (material) => {
  return new Promise(async resolve => {
    return ApiService.get("/Inventario/All")
      .then((response) => {
        resolve(response);
      })
      .catch(({ response }) => {
        resolve(response);
      });
  });
}

export const SaveEditMaterial = (material) => {
  return new Promise(async resolve => {
    return ApiService.put("/Inventario/Edit", material)
      .then((response) => {
        resolve(response);
      })
      .catch(({ response }) => {
        resolve(response);
      });
  });
}
export const DeleteMaterial = (idMaterial) => {
  return new Promise(async resolve => {
    return ApiService.delete("/Inventario/Delete/"+idMaterial)
      .then((response) => {
        resolve(response);
      })
      .catch(({ response }) => {
        resolve(response);
      });
  });
}
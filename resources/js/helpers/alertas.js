export const toasters = (res, toast) => {
  if (res.status == 200) {
    toast.add({
      severity: 'success',
      summary: 'Exito!',
      detail: res.data.mensaje
    });
  } else if (res.status == 400) {
    toast.add({
      severity: 'warn',
      summary: 'Upss!!',
      detail: res.data.mensaje
    });
  } else {
    return toast.add({
      severity: 'error',
      summary: 'Error⚠️',
      detail: 'A ocurrido un error inexplicable, por favor contacte con el programador!'
    });
  }
}

export const alerts = (res) => {
  if (res.status == 200) {
    Swal.fire("Exito!!", res.data.mensaje, "error");
  } else if (res.status == 400) {
    Swal.fire("upss!!", res.data.mensaje, "warning");
  } else {
    Swal.fire("Error⚠️", "A ocurrido un error inexplicable, por favor contacte con el programador!", "error");
  }
}
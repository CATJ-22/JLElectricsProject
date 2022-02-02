<template>
  <div>
    <TabView :activeIndex="activeTab">
      <TabPanel key="0" header="Lista de materiales">
        <DataTable
          :value="materiales"
          :paginator="true"
          :rows="10"
          responsiveLayout="scroll"
          :rowsPerPageOptions="[10, 20, 50]"
          :filters="filters"
          dataKey="id"
          removableSort
        >
          <Column field="nombre" header="Nombre" sortable></Column>
          <Column field="cantidad" header="Cantidad" sortable></Column>
          <Column
            field="cantidad_minima"
            header="Cantidad Mínima"
            sortable
          ></Column>
          <Column field="descripcion" header="Descripción"></Column>
          <Column header="Estado">
            <template #body="slotMaterial">
              <Badge
                value="INSTOCK"
                severity="success"
                v-if="
                  slotMaterial.data.cantidad > slotMaterial.data.cantidad_minima
                "
              ></Badge>
              <Badge v-else value="LOWSTOCK" severity="danger"></Badge>
            </template>
          </Column>
          <Column header="Estado">
            <template #body="slotMaterial">
              <Button
                icon="pi pi-pencil"
                class="p-button-rounded p-button-warning"
                v-tooltip.top="'Editar Material'"
                @click="toggleEditMaterial(slotMaterial.data)"
              />
              <Button
                icon="pi pi-trash"
                class="p-button-rounded p-button-danger"
                v-tooltip.top="'Borrar Material'"
                @click="deleteMaterial(slotMaterial.data)"
              />
            </template>
          </Column>
          <template #header>
            <div class="row">
              <div class="col-md-12">
                <span class="p-input-icon-left">
                  <i class="pi pi-search" />
                  <InputText
                    v-model="filters['global'].value"
                    placeholder="Buscador por palabras"
                  />
                </span>
                <Button
                  type="button"
                  label="Refrescar Lista"
                  icon="pi pi-refresh"
                  class="p-button-sm"
                  @click="getInventario"
                />
              </div>
            </div>
          </template>
        </DataTable>
      </TabPanel>
      <TabPanel key="1" header="Insertar/Editar Materiales">
        <form @submit.prevent="saveMaterialToInventario">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="">Nombre del material</label>
                <input
                  v-model="material.nombre"
                  class="form-control"
                  type="text"
                  required
                />
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="">Cantidad del material</label>
                <input
                  v-model="material.cantidad"
                  class="form-control"
                  type="number"
                  required
                />
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="">Cantidad mínima en inventario</label>
                <input
                  v-model="material.cantidad_minima"
                  class="form-control"
                  type="number"
                  required
                />
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <label for="">Descripción (opcional)</label>
                <textarea
                  v-model="material.descripcion"
                  class="form-control"
                  rows="4"
                ></textarea>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 text-center">
              <button class="btn btn-primary" type="submit" v-if="!editMode">
                Guardar Material
                <div
                  class="spinner-grow spinner-grow-sm text-light"
                  role="status"
                  v-if="showProgress"
                ></div>
              </button>
              <button
                class="btn btn-warning"
                type="button"
                v-else
                @click="saveEditMaterial"
              >
                Actualizar Material
                <div
                  class="spinner-grow spinner-grow-sm text-light"
                  role="status"
                  v-if="showProgress"
                ></div>
              </button>
              <button
                class="btn btn-danger ml-2"
                type="button"
                @click="clearMaterialForm"
              >
                Limpiar formulario
              </button>
            </div>
          </div>
        </form>
      </TabPanel>
    </TabView>
    <Toast position="bottom-right" />
  </div>
</template>
<script>
import * as AlertasHelper from "../../helpers/alertas";
import * as InventarioServices from "../../services/inventario";
import { FilterMatchMode } from "primevue/api/";
export default {
  name: "Inventario",
  data() {
    return {
      filters: {
        global: { value: null, matchMode: FilterMatchMode.CONTAINS },
      },
      activeTab: 0,
      editMode: false,
      showProgress: false,
      materiales: [],
      material: {
        nombre: null,
        cantidad: 0,
        cantidad_minima: 0,
        descripcion: null,
      },
    };
  },
  methods: {
    clearMaterialForm() {
      this.editMode = false;
      this.material = {
        nombre: null,
        cantidad: 0,
        cantidad_minima: 0,
        descripcion: null,
      };
    },
    getInventario() {
      InventarioServices.GetInventario()
        .then((res) => {
          this.materiales = res.data;
        })
        .catch((res) => {
          console.log(res);
        });
    },
    saveMaterialToInventario() {
      if (
        this.material.cantidad !== this.material.cantidad_minima &&
        this.material.cantidad > this.material.cantidad_minima
      ) {
        this.showProgress = true;
        InventarioServices.SaveMaterialToInventario(this.material)
          .then((res) => {
            AlertasHelper.toasters(res, this.$toast);
            if (res.status == 200) {
              this.clearMaterialForm();
              this.getInventario();
              this.showProgress = false;
            }
          })
          .catch((res) => {
            console.log(res);
          });
      } else {
        AlertasHelper.toasters(
          {
            status: 400,
            data: {
              mensaje:
                "la cantidad del material debe ser mayor a la cantidad mínima en inventario y ambas deben ser diferentes",
            },
          },
          this.$toast
        );
      }
    },
    deleteMaterial(material) {
      Swal.fire({
        title:
          "Esta Seguro que desea efeminar el material(" +
          material.nombre +
          ")?",
        showCancelButton: true,
        confirmButtonText: "Eliminar",
      }).then((result) => {
        if (result.isConfirmed) {
          InventarioServices.DeleteMaterial(material.id).then((res) => {
            AlertasHelper.toasters(res, this.$toast);
            this.getInventario();
          });
        }
      });
    },
    toggleEditMaterial(material) {
      this.material = material;
      this.editMode = true;
      this.activeTab = 1;
    },
    saveEditMaterial() {
      this.showProgress = true;
      InventarioServices.SaveEditMaterial(this.material).then((res) => {
        AlertasHelper.toasters(res, this.$toast);
        if (res.status == 200) {
          this.getInventario();
          this.clearMaterialForm();
          this.activeTab = 0;
        }
      });
    },
  },
  mounted() {
    this.getInventario();
  },
};
</script>

<style>
</style>
import axios from "axios";

export const ApiService = axios.create({
  baseURL: window.location.origin + "/",
  headers: {
    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
    'X-Requested-With': 'XMLHttpRequest'
  }
});
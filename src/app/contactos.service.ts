import { Injectable } from '@angular/core';
import { HttpClient, HttpParams } from '@angular/common/http';
import { HttpHeaders } from '@angular/common/http';
// import { environment } from 'src/environments/environment';

import { Observable } from 'rxjs';
import { Contacto } from './model/Contacto';

const httpOptions = {
  headers: new HttpHeaders({
    'Content-Type': 'application/json',
    Authorization: 'my-auth-token'
  })
};

@Injectable()
export class ContactosService {
  // baseUrl = environment.baseUrl

  constructor(
    private http: HttpClient,
  ) { }

  /** GET heroes from the server */
  getContactos(): Observable<Contacto[]> {
    return this.http.get<Contacto[]>("http://contactos.api.u9.local/contactos")
  }

  getContacto(id: any): Observable<any> {
    return this.http.get<Contacto>(`http://contactos.api.u9.local/contactos/${id}`);
  }

  addContacto(contacto: Contacto) {
    return this.http.post(`http://contactos.api.u9.local/contactos`, contacto);
  }

  updateContacto(contacto: Contacto) {
    return this.http.put(`http://contactos.api.u9.local/contactos`, contacto);
  }

  deleteContacto(id: any) {
    return this.http.delete(`http://contactos.api.u9.local/contactos/${id}`);
  }
}
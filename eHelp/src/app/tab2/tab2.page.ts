import { Component } from '@angular/core';
import { NgForm } from '@angular/forms';

import { User, Session } from '../services/classes';

import { MySQLService } from '../services/my-sql.service';
import { StorageService } from '../services/storage.service';

@Component({
  selector: 'app-tab2',
  templateUrl: 'tab2.page.html',
  styleUrls: ['tab2.page.scss']
})
export class Tab2Page {

  inicioUser: User = { userId: null, username: null, password: null, email: null, nombre: null };

  constructor(
    private registerSQL: MySQLService,
    private storageService: StorageService
    ) {}

  login(form: NgForm) {
    if (form.valid) {
      //console.log(form.value);
      this.registerSQL.login(form.value).subscribe((response: Session) => {
        //console.log(response);
        if (response.valid == true) {
          this.storageService.presentToast("Sesión iniciada correctamente", "success");
          if (response.admin == true) {
            this.storageService.presentToast("Hola admin...", "success");
          }
          this.storageService.setCurrentSession(response);
        } else {
          this.storageService.presentToast("Usuario o contraseña incorrecta", "danger");
        }
      });
    } else {
      this.storageService.presentToast("Datos no válidos", "danger");
    }
  }

}

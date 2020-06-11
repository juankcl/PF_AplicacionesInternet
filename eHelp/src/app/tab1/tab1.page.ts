import { Component } from '@angular/core';

import { MySQLService } from '../services/my-sql.service';
import { StorageService } from '../services/storage.service';

@Component({
  selector: 'app-tab1',
  templateUrl: 'tab1.page.html',
  styleUrls: ['tab1.page.scss']
})
export class Tab1Page {

  constructor(
    private registerSQL: MySQLService,
    private storageService: StorageService
  ) {}

  onClick() {
      console.log(this.storageService.isAuthenticated());
      if(!this.storageService.isAuthenticated())
      {
        this.storageService.presentToast("Necesitas iniciar sesión para poder utilizar el botón", "danger");
      }
  }

}

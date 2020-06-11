import { Component, OnInit } from '@angular/core';
import { NgForm } from '@angular/forms';
import { Router } from '@angular/router';

import { User, Message } from '../services/classes';
import { MySQLService } from '../services/my-sql.service';
import { StorageService } from '../services/storage.service';

@Component({
  selector: 'app-tab4',
  templateUrl: './tab4.page.html',
  styleUrls: ['./tab4.page.scss'],
})
export class Tab4Page implements OnInit {

  constructor(
    private router: Router,
    private registerSQL: MySQLService,
    private storage: StorageService
  ) { }

  registroUser: User = { id: null, username: null, password: null, email: null, nombre: null };
  password2: String = null;


  ngOnInit() {
  }

  register(form: NgForm) {
    if(form.valid){
      if (form.value['password'] == form.value['password2']) {
        //console.log(form.value);
        this.registerSQL.registro(form.value).subscribe((response: Message) => {
          this.storage.presentToast(response.message, response.type);
          if (response.type == "success") {
            this.router.navigateByUrl('/tabs/tab2');
            form.resetForm();
          }
        });
      } else {
        this.storage.presentToast("Las contraseñas no coinciden", "danger");
      }
    }
  }

}

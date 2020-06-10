import { Component } from '@angular/core';
import { NgForm } from '@angular/forms';

import { User } from '../services/classes';

@Component({
  selector: 'app-tab2',
  templateUrl: 'tab2.page.html',
  styleUrls: ['tab2.page.scss']
})
export class Tab2Page {

  inicioUser: User = { userId: null, username: null, password: null, email: null };

  constructor() {}

  login(form: NgForm) {

  }

}

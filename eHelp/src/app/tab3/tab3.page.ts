import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';

import { StorageService } from '../services/storage.service';
import { User } from '../services/classes';

@Component({
  selector: 'app-tab3',
  templateUrl: 'tab3.page.html',
  styleUrls: ['tab3.page.scss']
})
export class Tab3Page implements OnInit {

  constructor(
    private router: Router,
    private storageSer: StorageService
    ) { }

  usuario: User;

  ngOnInit() {
    this.usuario = this.storageSer.getCurrentUser();
  }
  
  ionViewWillEnter() {
    this.usuario = this.storageSer.getCurrentUser();
  }

  logout() {
    this.storageSer.logout();
    this.router.navigateByUrl('/tabs/tab1');
  }

}

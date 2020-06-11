import { Component } from '@angular/core';
import { StorageService } from '../services/storage.service';

@Component({
  selector: 'app-tabs',
  templateUrl: 'tabs.page.html',
  styleUrls: ['tabs.page.scss']
})
export class TabsPage {

  constructor(private storageSer: StorageService) {}

  tab:string="tab2";

  onClick() {
    console.log(this.storageSer.getCurrentUser());
    if (this.storageSer.getCurrentUser() == null) {
      this.tab = "tab2";
    } else {
      this.tab = "tab3";
    }
  }

}
